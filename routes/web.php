<?php

use Illuminate\Support\Facades\Route;

// Helper function untuk check admin
if (!function_exists('checkAdmin')) {
    function checkAdmin() {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        return null;
    }
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori', function () {
    return view('kategori');
});

Route::get('/produk/{slug}', function ($slug) {
    $product = \App\Models\Product::where('slug', $slug)->firstOrFail();
    return view('detail-produk', compact('product'));
})->name('product.detail');

Route::post('/produk/{id}/rating', function ($id) {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $validated = request()->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:1000',
    ]);
    
    $product = \App\Models\Product::findOrFail($id);
    
    // Check if user already rated this product
    $existingRating = \App\Models\ProductRating::where('product_id', $id)
        ->where('user_id', auth()->id())
        ->first();
    
    if ($existingRating) {
        // Update existing rating
        $existingRating->rating = $validated['rating'];
        $existingRating->comment = $validated['comment'] ?? null;
        $existingRating->save();
    } else {
        // Create new rating
        \App\Models\ProductRating::create([
            'product_id' => $id,
            'user_id' => auth()->id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);
    }
    
    return redirect()->route('product.detail', $product->slug)->with('success', 'Rating berhasil disimpan!');
})->name('product.rating');

Route::post('/cart/add/{id}', function ($id) {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $validated = request()->validate([
        'quantity' => 'required|integer|min:1',
    ]);
    
    $product = \App\Models\Product::findOrFail($id);
    
    // Check stock
    if ($product->stock < $validated['quantity']) {
        return redirect()->route('product.detail', $product->slug)
            ->with('error', 'Stok tidak mencukupi!');
    }
    
    // Get or create cart for user
    $cart = \App\Models\Cart::firstOrCreate(['user_id' => auth()->id()]);
    
    $finalPrice = $product->discount_price ?? $product->price;
    
    // Check if product already in cart
    $cartItem = \App\Models\CartItem::where('cart_id', $cart->id)
        ->where('product_id', $id)
        ->first();
    
    if ($cartItem) {
        // Update quantity
        $newQuantity = $cartItem->quantity + $validated['quantity'];
        if ($newQuantity > $product->stock) {
            return redirect()->route('product.detail', $product->slug)
                ->with('error', 'Stok tidak mencukupi!');
        }
        $cartItem->quantity = $newQuantity;
        $cartItem->subtotal = $cartItem->quantity * $finalPrice;
        $cartItem->save();
    } else {
        // Create new cart item
        \App\Models\CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $id,
            'quantity' => $validated['quantity'],
            'price' => $finalPrice,
            'subtotal' => $validated['quantity'] * $finalPrice,
        ]);
    }
    
    return redirect()->route('product.detail', $product->slug)
        ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
})->name('cart.add');

Route::post('/order/direct/{id}', function ($id) {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $validated = request()->validate([
        'quantity' => 'required|integer|min:1',
    ]);
    
    $product = \App\Models\Product::findOrFail($id);
    
    // Check stock
    if ($product->stock < $validated['quantity']) {
        return redirect()->route('product.detail', $product->slug)
            ->with('error', 'Stok tidak mencukupi!');
    }
    
    // Get or create cart for user
    $cart = \App\Models\Cart::firstOrCreate(['user_id' => auth()->id()]);
    
    $finalPrice = $product->discount_price ?? $product->price;
    
    // Add to cart first, then redirect to cart/checkout
    $cartItem = \App\Models\CartItem::where('cart_id', $cart->id)
        ->where('product_id', $id)
        ->first();
    
    if ($cartItem) {
        $cartItem->quantity = $validated['quantity'];
        $cartItem->price = $finalPrice;
        $cartItem->subtotal = $validated['quantity'] * $finalPrice;
        $cartItem->save();
    } else {
        \App\Models\CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $id,
            'quantity' => $validated['quantity'],
            'price' => $finalPrice,
            'subtotal' => $validated['quantity'] * $finalPrice,
        ]);
    }
    
    // Redirect to cart page
    return redirect()->route('cart')->with('success', 'Produk ditambahkan ke keranjang!');
})->name('order.direct');

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/keranjang', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
    $cartItems = $cart ? $cart->items()->with('product')->get() : collect();
    
    return view('keranjang', compact('cartItems', 'cart'));
})->name('cart');

Route::get('/status-pesanan', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    return view('status-pesanan');
})->name('status-pesanan');

Route::put('/cart/{id}', function ($id) {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $validated = request()->validate([
        'quantity' => 'required|integer|min:1',
    ]);
    
    $cartItem = \App\Models\CartItem::findOrFail($id);
    
    // Verify ownership
    if ($cartItem->cart->user_id !== auth()->id()) {
        abort(403);
    }
    
    // Check stock
    if ($cartItem->product->stock < $validated['quantity']) {
        return redirect()->route('cart')
            ->with('error', 'Stok tidak mencukupi!');
    }
    
    $finalPrice = $cartItem->product->discount_price ?? $cartItem->product->price;
    $cartItem->quantity = $validated['quantity'];
    $cartItem->price = $finalPrice;
    $cartItem->subtotal = $validated['quantity'] * $finalPrice;
    $cartItem->save();
    
    return redirect()->route('cart')->with('success', 'Keranjang berhasil diperbarui!');
})->name('cart.update');

Route::delete('/cart/{id}', function ($id) {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $cartItem = \App\Models\CartItem::findOrFail($id);
    
    // Verify ownership
    if ($cartItem->cart->user_id !== auth()->id()) {
        abort(403);
    }
    
    $cartItem->delete();
    
    return redirect()->route('cart')->with('success', 'Produk berhasil dihapus dari keranjang!');
})->name('cart.remove');

Route::get('/checkout', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
    if (!$cart) {
        return redirect()->route('cart')->with('error', 'Keranjang kosong!');
    }
    
    $cartItems = $cart->items()->with('product')->get();
    if ($cartItems->isEmpty()) {
        return redirect()->route('cart')->with('error', 'Keranjang kosong!');
    }
    
    // Check stock availability
    foreach ($cartItems as $item) {
        if ($item->product->stock < $item->quantity) {
            return redirect()->route('cart')->with('error', 'Stok produk ' . $item->product->name . ' tidak mencukupi!');
        }
    }
    
    $subtotal = $cartItems->sum('subtotal');
    
    return view('checkout', compact('cartItems', 'subtotal'));
})->name('checkout');

Route::post('/checkout', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $validated = request()->validate([
        'shipping_name' => 'required|string|max:255',
        'shipping_phone' => 'required|string|max:255',
        'shipping_address' => 'required|string',
        'notes' => 'nullable|string',
    ]);
    
    $cart = \App\Models\Cart::where('user_id', auth()->id())->first();
    if (!$cart) {
        return redirect()->route('cart')->with('error', 'Keranjang kosong!');
    }
    
    $cartItems = $cart->items()->with('product')->get();
    if ($cartItems->isEmpty()) {
        return redirect()->route('cart')->with('error', 'Keranjang kosong!');
    }
    
    // Check stock and calculate total
    $totalAmount = 0;
    foreach ($cartItems as $item) {
        if ($item->product->stock < $item->quantity) {
            return redirect()->route('checkout')->with('error', 'Stok produk ' . $item->product->name . ' tidak mencukupi!');
        }
        $totalAmount += $item->subtotal;
    }
    
    // Generate unique order number
    $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(substr(md5(time() . auth()->id()), 0, 8));
    while (\App\Models\Order::where('order_number', $orderNumber)->exists()) {
        $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(substr(md5(time() . auth()->id() . rand()), 0, 8));
    }
    
    // Create or get customer record based on email
    $customer = \DB::table('customers')->where('email', auth()->user()->email)->first();
    if (!$customer) {
        // Create customer record if doesn't exist
        $customerId = \DB::table('customers')->insertGetId([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'total_orders' => 0,
            'total_spent' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    } else {
        $customerId = $customer->id;
    }
    
    // Create order
    $order = \App\Models\Order::create([
        'user_id' => auth()->id(),
        'customer_id' => $customerId,
        'order_number' => $orderNumber,
        'subtotal' => $totalAmount,
        'tax' => 0,
        'shipping_cost' => 0,
        'total' => $totalAmount,
        'total_amount' => $totalAmount,
        'status' => 'new', // Using 'new' instead of 'pending' to match enum
        'payment_status' => 'pending',
        'payment_method' => 'whatsapp',
        'shipping_name' => $validated['shipping_name'],
        'shipping_phone' => $validated['shipping_phone'],
        'shipping_address' => $validated['shipping_address'],
        'notes' => $validated['notes'] ?? null,
        'order_date' => now()->toDateString(),
    ]);
    
    // Create order items (stock will be reduced when admin confirms payment)
    foreach ($cartItems as $item) {
        \App\Models\OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'product_name' => $item->product->name,
            'quantity' => $item->quantity,
            'price' => $item->price,
            'subtotal' => $item->subtotal,
        ]);
    }
    
    // Clear cart
    $cart->items()->delete();
    
    // Redirect to payment page
    return redirect()->route('payment.page', $order->id)->with('success', 'Order berhasil dibuat! Silakan lakukan pembayaran.');
})->name('checkout.store');

Route::get('/login', function () {
    // Redirect jika sudah login
    if (auth()->check()) {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.produk');
        }
        return redirect('/');
    }
    return view('login');
})->name('login');

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt login
    if (auth()->attempt($credentials, true)) {
        $user = auth()->user();
        
        if ($user && $user->isAdmin()) {
            return redirect('/admin/produk')->with('success', 'Selamat datang, Admin!');
        }
        
        return redirect('/')->with('success', 'Selamat datang!');
    }

    return redirect('/login')->withErrors(['email' => 'Email atau password salah.'])->withInput(request()->only('email'));
})->name('login.post');

Route::get('/register', function () {
    // Redirect jika sudah login
    if (auth()->check()) {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.produk');
        }
        return redirect('/');
    }
    return view('register');
})->name('register');

Route::post('/register', function () {
    $validated = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => $validated['password'],
        'role' => 'user',
    ]);

    return redirect()->route('login')->with('success', 'Akun anda telah berhasil register');
})->name('register.post');

// Admin Routes
Route::get('/admin/dashboard', function () {
    // Redirect ke dashboard produk
    return redirect()->route('admin.produk');
})->name('admin.dashboard');

Route::get('/admin/produk', function () {
    $category = request()->get('category');
    return view('admin.produk', compact('category'));
})->name('admin.produk');

Route::get('/admin/produk/tambah', function () {
    return view('admin.tambah-produk');
})->name('admin.produk.tambah');

Route::post('/admin/produk', function () {
    $validated = request()->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|in:bunga,aksesoris,gift_set',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'material_description' => 'nullable|string',
        'color' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'type' => 'required|in:standart,premium,exclusive',
        'image' => 'nullable|image|max:2048',
        'image_2' => 'nullable|image|max:2048',
        'image_3' => 'nullable|image|max:2048',
    ]);
    
    // Generate unique slug from product name
    $slug = \Illuminate\Support\Str::slug($validated['name']);
    $originalSlug = $slug;
    $counter = 1;
    while (\App\Models\Product::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }
    
    // Generate unique SKU
    $categoryPrefix = match($validated['category']) {
        'bunga' => 'BGN',
        'aksesoris' => 'AKS',
        'gift_set' => 'GFT',
        default => 'PRD',
    };
    $sku = $categoryPrefix . '-' . strtoupper(substr(md5(time() . $validated['name']), 0, 6));
    $originalSku = $sku;
    $skuCounter = 1;
    while (\App\Models\Product::where('sku', $sku)->exists()) {
        $sku = $originalSku . '-' . $skuCounter;
        $skuCounter++;
    }
    
    $product = new \App\Models\Product();
    $product->name = $validated['name'];
    $product->slug = $slug;
    $product->sku = $sku;
    $product->category = $validated['category'];
    $product->category_id = null; // Set to null since we're using category string
    $product->price = $validated['price'];
    $product->stock = $validated['stock'];
    $product->description = $validated['description'] ?? null;
    $product->material_description = $validated['material_description'] ?? null;
    $product->color = $validated['color'] ?? null;
    $product->city = $validated['city'] ?? null;
    $product->type = $validated['type'];
    $product->is_active = true;
    
    // Handle image uploads
    if (request()->hasFile('image')) {
        $file = request()->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = '1_' . time() . '_' . uniqid() . '.' . $extension;
        $file->move(public_path('img/products'), $fileName);
        $product->image = 'img/products/' . $fileName;
    }
    
    if (request()->hasFile('image_2')) {
        $file = request()->file('image_2');
        $extension = $file->getClientOriginalExtension();
        $fileName = '2_' . time() . '_' . uniqid() . '.' . $extension;
        $file->move(public_path('img/products'), $fileName);
        $product->image_2 = 'img/products/' . $fileName;
    }
    
    if (request()->hasFile('image_3')) {
        $file = request()->file('image_3');
        $extension = $file->getClientOriginalExtension();
        $fileName = '3_' . time() . '_' . uniqid() . '.' . $extension;
        $file->move(public_path('img/products'), $fileName);
        $product->image_3 = 'img/products/' . $fileName;
    }
    
    $product->save();
    
    return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan!');
})->name('admin.produk.store');

Route::get('/admin/produk/{id}/edit', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    return view('admin.edit-produk', compact('product'));
})->name('admin.produk.edit');

Route::put('/admin/produk/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    
    $validated = request()->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|in:bunga,aksesoris,gift_set',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'material_description' => 'nullable|string',
        'color' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'type' => 'required|in:standart,premium,exclusive',
        'image' => 'nullable|image|max:2048',
        'image_2' => 'nullable|image|max:2048',
        'image_3' => 'nullable|image|max:2048',
        'is_active' => 'boolean',
    ]);
    
    // Update slug if name changed
    if ($product->name !== $validated['name']) {
        $slug = \Illuminate\Support\Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 1;
        while (\App\Models\Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        $product->slug = $slug;
    }
    
    $product->name = $validated['name'];
    $product->category = $validated['category'];
    $product->price = $validated['price'];
    $product->stock = $validated['stock'];
    $product->description = $validated['description'] ?? null;
    $product->material_description = $validated['material_description'] ?? null;
    $product->color = $validated['color'] ?? null;
    $product->city = $validated['city'] ?? null;
    $product->type = $validated['type'];
    // Checkbox: jika tidak dicentang, browser tidak mengirim field, jadi cek dengan has()
    $product->is_active = request()->has('is_active') ? true : false;
    
    // Handle image uploads
    if (request()->hasFile('image')) {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        $file = request()->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = '1_' . time() . '_' . uniqid() . '.' . $extension;
        $file->move(public_path('img/products'), $fileName);
        $product->image = 'img/products/' . $fileName;
    }
    
    if (request()->hasFile('image_2')) {
        if ($product->image_2 && file_exists(public_path($product->image_2))) {
            unlink(public_path($product->image_2));
        }
        $file = request()->file('image_2');
        $extension = $file->getClientOriginalExtension();
        $fileName = '2_' . time() . '_' . uniqid() . '.' . $extension;
        $file->move(public_path('img/products'), $fileName);
        $product->image_2 = 'img/products/' . $fileName;
    }
    
    if (request()->hasFile('image_3')) {
        if ($product->image_3 && file_exists(public_path($product->image_3))) {
            unlink(public_path($product->image_3));
        }
        $file = request()->file('image_3');
        $extension = $file->getClientOriginalExtension();
        $fileName = '3_' . time() . '_' . uniqid() . '.' . $extension;
        $file->move(public_path('img/products'), $fileName);
        $product->image_3 = 'img/products/' . $fileName;
    }
    
    $product->save();
    
    return redirect()->route('admin.produk')->with('success', 'Produk berhasil diperbarui!');
})->name('admin.produk.update');

Route::delete('/admin/produk/{id}', function ($id) {
    $product = \App\Models\Product::findOrFail($id);
    
    // Delete images
    if ($product->image && file_exists(public_path($product->image))) {
        unlink(public_path($product->image));
    }
    if ($product->image_2 && file_exists(public_path($product->image_2))) {
        unlink(public_path($product->image_2));
    }
    if ($product->image_3 && file_exists(public_path($product->image_3))) {
        unlink(public_path($product->image_3));
    }
    
    $product->delete();
    
    return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus!');
})->name('admin.produk.hapus');

Route::get('/admin/promo', function () {
    return view('admin.promo');
})->name('admin.promo');

Route::get('/admin/promo/products', function () {
    $category = request()->get('category');
    if (!$category) {
        return response()->json([]);
    }
    
    $products = \App\Models\Product::where('category', $category)
        ->where('is_active', true)
        ->get(['id', 'name', 'price', 'discount_price', 'image']);
    
    return response()->json($products);
});

Route::post('/admin/promo', function () {
    $products = request()->input('products', []);
    $discounts = request()->input('discounts', []);
    
    foreach ($products as $productId) {
        $product = \App\Models\Product::find($productId);
        if ($product && isset($discounts[$productId])) {
            $discountPercent = floatval($discounts[$productId]);
            if ($discountPercent > 0 && $discountPercent <= 100) {
                $discountPrice = $product->price - ($product->price * $discountPercent / 100);
                $product->discount_price = round($discountPrice, 2);
                $product->save();
            } else {
                // Remove discount if 0 or invalid
                $product->discount_price = null;
                $product->save();
            }
        } else if ($product) {
            // Remove discount if product not selected
            $product->discount_price = null;
            $product->save();
        }
    }
    
    return redirect()->route('admin.promo')->with('success', 'Promo berhasil diperbarui!');
})->name('admin.promo.update');

Route::get('/admin/stok-bahan', function () {
    return view('admin.stok-bahan');
})->name('admin.stok-bahan');

Route::get('/admin/pelanggan', function () {
    return view('admin.pelanggan');
})->name('admin.pelanggan');

Route::get('/admin/pesanan', function () {
    return view('admin.pesanan');
})->name('admin.pesanan');

Route::put('/admin/pesanan/{id}/status', function ($id) {
    $order = \App\Models\Order::findOrFail($id);
    
    $validated = request()->validate([
        'status' => 'required|in:new,processing,shipped,delivered,cancelled',
    ]);
    
    $order->status = $validated['status'];
    $order->save();
    
    return redirect()->route('admin.pesanan')->with('success', 'Status pesanan berhasil diperbarui!');
})->name('admin.pesanan.update-status');

Route::get('/admin/laporan', function () {
    return view('admin.laporan');
})->name('admin.laporan');

Route::get('/admin/pengiriman', function () {
    return view('admin.pengiriman');
})->name('admin.pengiriman');

Route::get('/admin/pengiriman/{id}', function ($id) {
    $shipping = \App\Models\Shipping::findOrFail($id);
    return response()->json($shipping);
});

Route::post('/admin/pengiriman', function () {
    $validated = request()->validate([
        'order_id' => 'required|exists:orders,id',
        'courier' => 'nullable|string|max:255',
        'tracking_number' => 'nullable|string|max:255',
        'status' => 'required|in:pending,packed,shipped,in_transit,delivered,failed',
        'shipped_date' => 'nullable|date',
        'estimated_delivery_date' => 'nullable|date',
        'delivered_date' => 'nullable|date',
        'notes' => 'nullable|string',
    ]);
    
    // Check if shipping already exists for this order
    $existingShipping = \App\Models\Shipping::where('order_id', $validated['order_id'])->first();
    if ($existingShipping) {
        return redirect()->route('admin.pengiriman')->with('error', 'Pengiriman untuk pesanan ini sudah ada!');
    }
    
    $shipping = \App\Models\Shipping::create($validated);
    
    // Update order status if shipping is created
    $order = \App\Models\Order::find($validated['order_id']);
    if ($order && ($order->status == 'processing' || $order->status == 'new')) {
        $order->status = 'shipped';
        $order->save();
    }
    
    return redirect()->route('admin.pengiriman')->with('success', 'Pengiriman berhasil dibuat!');
})->name('admin.pengiriman.store');

Route::put('/admin/pengiriman/{id}', function ($id) {
    $shipping = \App\Models\Shipping::findOrFail($id);
    
    $validated = request()->validate([
        'courier' => 'nullable|string|max:255',
        'tracking_number' => 'nullable|string|max:255',
        'status' => 'required|in:pending,packed,shipped,in_transit,delivered,failed',
        'shipped_date' => 'nullable|date',
        'estimated_delivery_date' => 'nullable|date',
        'delivered_date' => 'nullable|date',
        'notes' => 'nullable|string',
    ]);
    
    $shipping->update($validated);
    
    // Update order status based on shipping status
    $order = $shipping->order;
    if ($order) {
        if ($validated['status'] == 'delivered' && $order->status != 'delivered') {
            $order->status = 'delivered';
            $order->save();
        } elseif ($validated['status'] == 'shipped' && $order->status != 'shipped') {
            $order->status = 'shipped';
            $order->save();
        }
    }
    
    return redirect()->route('admin.pengiriman')->with('success', 'Pengiriman berhasil diperbarui!');
})->name('admin.pengiriman.update');

Route::get('/admin/pembayaran', function () {
    return view('admin.pembayaran');
})->name('admin.pembayaran');

Route::put('/admin/pembayaran/{id}/verify', function ($id) {
    $payment = \App\Models\Payment::findOrFail($id);
    
    $validated = request()->validate([
        'status' => 'required|in:paid,failed',
    ]);
    
    // Check if payment was already paid before (to avoid reducing stock multiple times)
    $wasAlreadyPaid = $payment->status == 'paid';
    
    $payment->status = $validated['status'];
    if ($validated['status'] == 'paid') {
        $payment->paid_at = now();
        
        // Update order status to processing and payment_status to paid
        $order = $payment->order;
        if ($order) {
            if ($order->status == 'new' || $order->status == 'pending') {
                $order->status = 'processing';
            }
            $order->payment_status = 'paid';
            $order->save();
            
            // Reduce product stock only if payment was not already paid
            if (!$wasAlreadyPaid) {
                // Load order items with products
                $order->load('orderItems.product');
                
                foreach ($order->orderItems as $orderItem) {
                    if ($orderItem->product) {
                        $product = $orderItem->product;
                        $quantity = $orderItem->quantity;
                        
                        // Reduce stock, ensure it doesn't go below 0
                        $newStock = max(0, $product->stock - $quantity);
                        $product->stock = $newStock;
                        $product->save();
                    }
                }
            }
        }
    } else if ($validated['status'] == 'failed') {
        // Update order payment_status to failed
        $order = $payment->order;
        if ($order) {
            $order->payment_status = 'failed';
            $order->save();
        }
    }
    $payment->save();
    
    return redirect()->route('admin.pembayaran')->with('success', 'Status pembayaran berhasil diperbarui!');
})->name('admin.pembayaran.verify');

Route::get('/pembayaran/{orderId}', function ($orderId) {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $order = \App\Models\Order::with('payment')->findOrFail($orderId);
    
    // Verify ownership
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }
    
    return view('pembayaran', compact('orderId'));
})->name('payment.page');

Route::post('/pembayaran/{orderId}/process', function ($orderId) {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    $order = \App\Models\Order::findOrFail($orderId);
    
    // Verify ownership
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }
    
    // Check if payment already exists
    if ($order->payment && $order->payment->status == 'paid') {
        return redirect()->route('payment.page', $orderId)->with('error', 'Pembayaran sudah dikonfirmasi!');
    }
    
    $validated = request()->validate([
        'payment_method' => 'required|in:whatsapp',
    ]);
    
    // Create or update payment record for WhatsApp payment
    $payment = \App\Models\Payment::updateOrCreate(
        ['order_id' => $order->id],
        [
            'payment_method' => 'whatsapp',
            'status' => 'pending', // Admin will verify later
            'amount' => $order->total_amount,
            'notes' => 'Pembayaran via WhatsApp - Menunggu verifikasi admin',
        ]
    );
    
    // Order status remains 'new' until admin verifies payment
    // Payment status is 'pending' until admin confirms
    
    return redirect()->route('status-pesanan')->with('success', 'Terima kasih! Kami telah mencatat bahwa Anda sudah melakukan pembayaran via WhatsApp. Admin akan segera memverifikasi pembayaran Anda.');
})->name('payment.process');

Route::get('/admin/pengaturan', function () {
    return view('admin.pengaturan');
})->name('admin.pengaturan');

Route::get('/admin/footer/{id}', function ($id) {
    $footer = \App\Models\FooterContent::findOrFail($id);
    return response()->json($footer);
});

Route::post('/admin/footer', function () {
    $validated = request()->validate([
        'column' => 'required|in:column_1,column_2,column_3,column_4',
        'type' => 'required|in:title,description,list_item,social_link',
        'title' => 'nullable|string|max:255',
        'content' => 'nullable|string',
        'url' => 'nullable|url|max:500',
        'icon' => 'nullable|in:facebook,instagram,whatsapp,email',
        'order' => 'nullable|integer|min:0',
    ]);
    
    \App\Models\FooterContent::create($validated);
    
    return redirect()->route('admin.pengaturan')->with('success', 'Item footer berhasil ditambahkan!');
})->name('admin.footer.store');

Route::put('/admin/footer/{id}', function ($id) {
    $footer = \App\Models\FooterContent::findOrFail($id);
    
    $validated = request()->validate([
        'column' => 'required|in:column_1,column_2,column_3,column_4',
        'type' => 'required|in:title,description,list_item,social_link',
        'title' => 'nullable|string|max:255',
        'content' => 'nullable|string',
        'url' => 'nullable|url|max:500',
        'icon' => 'nullable|in:facebook,instagram,whatsapp,email',
        'order' => 'nullable|integer|min:0',
    ]);
    
    $footer->update($validated);
    
    return redirect()->route('admin.pengaturan')->with('success', 'Item footer berhasil diperbarui!');
})->name('admin.footer.update');

Route::delete('/admin/footer/{id}', function ($id) {
    $footer = \App\Models\FooterContent::findOrFail($id);
    $footer->delete();
    
    return redirect()->route('admin.pengaturan')->with('success', 'Item footer berhasil dihapus!');
})->name('admin.footer.delete');

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

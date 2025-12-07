<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - Debora Craft</title>
    
    <style>
        /* Font Face Declarations */
        @font-face {
            font-family: 'Cotoris';
            src: url('{{ asset('fonts/Cotoris-Regular.otf') }}') format('opentype'),
                 url('{{ asset('fonts/Cotoris-Regular.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        
        @font-face {
            font-family: 'Cotoris';
            src: url('{{ asset('fonts/Cotoris-Bold.otf') }}') format('opentype'),
                 url('{{ asset('fonts/Cotoris-Bold.ttf') }}') format('truetype');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        
        @font-face {
            font-family: 'Cotoris';
            src: url('{{ asset('fonts/Cotoris-Heavy.otf') }}') format('opentype'),
                 url('{{ asset('fonts/Cotoris-Heavy.ttf') }}') format('truetype');
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }
        
        @font-face {
            font-family: 'Cotoris';
            src: url('{{ asset('fonts/Cotoris-Italic.otf') }}') format('opentype'),
                 url('{{ asset('fonts/Cotoris-Italic.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: italic;
            font-display: swap;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Cotoris', sans-serif;
            color: #2d2d2d;
            background: #f5f5f5;
        }
        
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 1.5rem 5%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .header-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .logo-icon {
            width: 32px;
            height: 32px;
            object-fit: contain;
        }
        
        .logo-text {
            font-family: 'Cotoris', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            align-items: center;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #2d2d2d;
            font-size: 0.95rem;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: #e91e63;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .cart-icon-wrapper {
            position: relative;
            display: inline-block;
        }
        
        .shipping-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
            color: #2d2d2d;
            position: relative;
            transition: color 0.3s;
        }
        
        .shipping-icon:hover {
            color: #e91e63;
        }
        
        .shipping-icon-wrapper {
            position: relative;
            display: inline-block;
        }
        
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #e91e63;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .user-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e91e63;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            cursor: pointer;
            position: relative;
        }
        
        .user-dropdown {
            position: relative;
        }
        
        .user-dropdown-menu {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 180px;
            padding: 0.5rem 0;
            display: none;
            z-index: 1000;
        }
        
        .user-dropdown-menu.show {
            display: block;
        }
        
        .user-dropdown-item {
            padding: 0.75rem 1.5rem;
            color: #2d2d2d;
            text-decoration: none;
            display: block;
            transition: background 0.3s;
            font-size: 0.95rem;
        }
        
        .user-dropdown-item:hover {
            background: #f5f5f5;
        }
        
        .user-dropdown-item.logout {
            color: #ef4444;
            border-top: 1px solid #e0e0e0;
        }
        
        .user-dropdown-item.logout:hover {
            background: #fee2e2;
        }
        
        .main-content {
            margin-top: 80px;
            padding: 3rem 5%;
        }
        
        .product-detail {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            padding: 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
        
        .product-images {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .main-image {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }
        
        .thumbnail-images {
            display: flex;
            gap: 1rem;
        }
        
        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            border: 2px solid #e0e0e0;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .thumbnail:hover,
        .thumbnail.active {
            border-color: #e91e63;
        }
        
        .product-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .product-title {
            font-family: 'Cotoris', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .rating-stars {
            color: #fbbf24;
            font-size: 1.2rem;
        }
        
        .rating-value {
            font-weight: 500;
            color: #2d2d2d;
        }
        
        .rating-count {
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .product-price-section {
            padding: 1.5rem 0;
            border-top: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .current-price {
            font-size: 2rem;
            font-weight: 700;
            color: #e91e63;
            margin-bottom: 0.5rem;
        }
        
        .original-price {
            font-size: 1.2rem;
            color: #9ca3af;
            text-decoration: line-through;
        }
        
        .discount-badge {
            display: inline-block;
            background: #ef4444;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-left: 1rem;
        }
        
        .product-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .btn-cart,
        .btn-order {
            flex: 1;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-cart {
            background: #f3f4f6;
            color: #2d2d2d;
            border: 2px solid #e5e7eb;
        }
        
        .btn-cart:hover {
            background: #e5e7eb;
            border-color: #d1d5db;
        }
        
        .btn-order {
            background: #2d2d2d;
            color: white;
        }
        
        .btn-order:hover {
            background: #1a1a1a;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .quantity-label {
            font-weight: 500;
            color: #2d2d2d;
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 0.5rem;
        }
        
        .quantity-btn {
            width: 32px;
            height: 32px;
            border: none;
            background: #f3f4f6;
            color: #2d2d2d;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        
        .quantity-btn:hover {
            background: #e5e7eb;
        }
        
        .quantity-input {
            width: 60px;
            text-align: center;
            border: none;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .quantity-input:focus {
            outline: none;
        }
        
        .product-details {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .detail-item {
            display: flex;
            gap: 1rem;
        }
        
        .detail-label {
            font-weight: 500;
            min-width: 120px;
            color: #5a5a5a;
        }
        
        .detail-value {
            color: #2d2d2d;
        }
        
        .product-description {
            line-height: 1.8;
            color: #5a5a5a;
        }
        
        .rating-section {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #e0e0e0;
        }
        
        .rating-form {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        
        .rating-form-title {
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .star-rating {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .star {
            font-size: 2rem;
            color: #d1d5db;
            cursor: pointer;
            transition: color 0.2s;
        }
        
        .star.active,
        .star:hover {
            color: #fbbf24;
        }
        
        .rating-comment {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-family: 'Inter', sans-serif;
            resize: vertical;
            min-height: 100px;
        }
        
        .btn-submit-rating {
            padding: 0.75rem 1.5rem;
            background: #2d2d2d;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-submit-rating:hover {
            background: #1a1a1a;
        }
        
        .reviews-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .review-item {
            padding: 1.5rem;
            background: #f9f9f9;
            border-radius: 8px;
        }
        
        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .review-user {
            font-weight: 500;
        }
        
        .review-date {
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .review-rating {
            color: #fbbf24;
            margin-bottom: 0.5rem;
        }
        
        .review-comment {
            color: #5a5a5a;
            line-height: 1.6;
        }
        
        @media (max-width: 768px) {
            .product-detail {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo-section">
                <img src="{{ asset('img/logo.jpg') }}" alt="Debora Craft" class="logo-icon">
                <span class="logo-text">Debora Craft</span>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/kategori') }}">Kategori</a></li>
                    <li><a href="{{ url('/tentang') }}">Tentang</a></li>
                </ul>
            </nav>
            <div class="header-right">
                @auth
                    <a href="{{ url('/keranjang') }}" class="cart-icon-wrapper" style="text-decoration: none; color: #2d2d2d;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 2L7 6H2L4 20H20L22 6H17L15 2H9Z"/>
                        </svg>
                        @php
                            $cartCount = \App\Models\Cart::where('user_id', auth()->id())->first();
                            $totalItems = $cartCount ? $cartCount->items()->sum('quantity') : 0;
                        @endphp
                        @if($totalItems > 0)
                            <span class="cart-badge">{{ $totalItems }}</span>
                        @endif
                    </a>
                    <a href="{{ route('status-pesanan') }}" class="shipping-icon-wrapper" title="Status Pesanan" style="text-decoration: none; color: #2d2d2d;">
                        <svg class="shipping-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                    </a>
                    <div class="user-dropdown">
                        <div class="user-icon" onclick="toggleUserDropdown()">{{ substr(auth()->user()->name, 0, 1) }}</div>
                        <div class="user-dropdown-menu" id="userDropdown">
                            <div class="user-dropdown-item" style="font-weight: 600; color: #5a5a5a; border-bottom: 1px solid #e0e0e0;">
                                {{ auth()->user()->name }}
                            </div>
                            <a href="{{ route('logout') }}" class="user-dropdown-item logout">Logout</a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" style="text-decoration: none; color: #2d2d2d;">Login</a>
                @endauth
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="main-content">
        @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #c3e6cb; max-width: 1200px; margin-left: auto; margin-right: auto;">
            {{ session('success') }}
        </div>
        @endif
        
        @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #f5c6cb; max-width: 1200px; margin-left: auto; margin-right: auto;">
            {{ session('error') }}
        </div>
        @endif
        
        <div class="product-detail">
            <!-- Product Images -->
            <div class="product-images">
                <img src="{{ asset($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->name }}" class="main-image" id="main-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                <div class="thumbnail-images">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="thumbnail active" onclick="changeImage('{{ asset($product->image) }}')">
                    @endif
                    @if($product->image_2)
                        <img src="{{ asset($product->image_2) }}" alt="{{ $product->name }}" class="thumbnail" onclick="changeImage('{{ asset($product->image_2) }}')">
                    @endif
                    @if($product->image_3)
                        <img src="{{ asset($product->image_3) }}" alt="{{ $product->name }}" class="thumbnail" onclick="changeImage('{{ asset($product->image_3) }}')">
                    @endif
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="product-info">
                <h1 class="product-title">{{ $product->name }}</h1>
                
                @if($product->ratings->count() > 0)
                <div class="product-rating">
                    <span class="rating-stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($product->average_rating))
                                ★
                            @elseif($i - 0.5 <= $product->average_rating)
                                ☆
                            @else
                                ☆
                            @endif
                        @endfor
                    </span>
                    <span class="rating-value">{{ number_format($product->average_rating, 1) }}</span>
                    <span class="rating-count">({{ $product->ratings->count() }} ulasan)</span>
                </div>
                @endif
                
                <div class="product-price-section">
                    @php
                        $finalPrice = $product->discount_price ?? $product->price;
                        $discount = $product->discount_price ? round((($product->price - $product->discount_price) / $product->price) * 100) : 0;
                    @endphp
                    <div class="current-price">Rp {{ number_format($finalPrice, 0, ',', '.') }}</div>
                    @if($product->discount_price)
                        <div>
                            <span class="original-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="discount-badge">{{ $discount }}%</span>
                        </div>
                    @endif
                    
                    @auth
                    <div class="quantity-selector">
                        <span class="quantity-label">Jumlah:</span>
                        <div class="quantity-controls">
                            <button type="button" class="quantity-btn" onclick="decreaseQuantity()">-</button>
                            <input type="number" id="quantity" name="quantity" class="quantity-input" value="1" min="1" max="{{ $product->stock }}" onchange="validateQuantity()">
                            <button type="button" class="quantity-btn" onclick="increaseQuantity()">+</button>
                        </div>
                    </div>
                    
                    <div class="product-actions">
                        <form method="POST" action="{{ route('cart.add', $product->id) }}" style="flex: 1;">
                            @csrf
                            <input type="hidden" name="quantity" id="cart-quantity" value="1">
                            <button type="submit" class="btn-cart">Masukkan Keranjang</button>
                        </form>
                        <form method="POST" action="{{ route('order.direct', $product->id) }}" style="flex: 1;">
                            @csrf
                            <input type="hidden" name="quantity" id="order-quantity" value="1">
                            <button type="submit" class="btn-order">Order</button>
                        </form>
                    </div>
                    @else
                    <div class="product-actions">
                        <a href="{{ route('login') }}" class="btn-cart" style="flex: 1; text-align: center;">Masukkan Keranjang</a>
                        <a href="{{ route('login') }}" class="btn-order" style="flex: 1; text-align: center;">Order</a>
                    </div>
                    @endauth
                </div>
                
                <div class="product-details">
                    <div class="detail-item">
                        <span class="detail-label">Kategori:</span>
                        <span class="detail-value">{{ $product->category_name }}</span>
                    </div>
                    @if($product->color)
                    <div class="detail-item">
                        <span class="detail-label">Warna:</span>
                        <span class="detail-value">{{ $product->color }}</span>
                    </div>
                    @endif
                    @if($product->city)
                    <div class="detail-item">
                        <span class="detail-label">Kota:</span>
                        <span class="detail-value">{{ $product->city }}</span>
                    </div>
                    @endif
                    @if($product->type)
                    <div class="detail-item">
                        <span class="detail-label">Tipe:</span>
                        <span class="detail-value">{{ ucfirst($product->type) }}</span>
                    </div>
                    @endif
                    <div class="detail-item">
                        <span class="detail-label">Stok:</span>
                        <span class="detail-value">{{ $product->stock }} unit</span>
                    </div>
                    @if($product->total_sold > 0)
                    <div class="detail-item">
                        <span class="detail-label">Terjual:</span>
                        <span class="detail-value">{{ $product->total_sold }} unit</span>
                    </div>
                    @endif
                </div>
                
                @if($product->description)
                <div class="product-description">
                    <h3 style="margin-bottom: 0.5rem; font-weight: 600;">Deskripsi:</h3>
                    <p>{{ $product->description }}</p>
                </div>
                @endif
                
                @if($product->material_description)
                <div class="product-description">
                    <h3 style="margin-bottom: 0.5rem; font-weight: 600;">Bahan:</h3>
                    <p>{{ $product->material_description }}</p>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Rating Section -->
        <div class="rating-section">
            @auth
            <div class="rating-form">
                <h3 class="rating-form-title">Beri Rating & Ulasan</h3>
                <form method="POST" action="{{ route('product.rating', $product->id) }}">
                    @csrf
                    <div class="star-rating" id="star-rating">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star" data-rating="{{ $i }}" onclick="selectRating({{ $i }})">☆</span>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating-input" value="0" required>
                    <textarea name="comment" class="rating-comment" placeholder="Tulis ulasan Anda..."></textarea>
                    <button type="submit" class="btn-submit-rating">Kirim Ulasan</button>
                </form>
            </div>
            @else
            <div style="text-align: center; padding: 2rem; background: #f9f9f9; border-radius: 8px;">
                <p>Silakan <a href="{{ route('login') }}" style="color: #e91e63;">login</a> untuk memberikan rating dan ulasan</p>
            </div>
            @endauth
            
            <h3 style="margin-bottom: 1.5rem; font-weight: 600;">Ulasan Pelanggan ({{ $product->ratings->count() }})</h3>
            
            @if($product->ratings->count() > 0)
                <div class="reviews-list">
                    @foreach($product->ratings()->latest()->get() as $rating)
                        <div class="review-item">
                            <div class="review-header">
                                <span class="review-user">{{ $rating->user->name }}</span>
                                <span class="review-date">{{ $rating->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="review-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    {{ $i <= $rating->rating ? '★' : '☆' }}
                                @endfor
                            </div>
                            @if($rating->comment)
                                <div class="review-comment">{{ $rating->comment }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div style="text-align: center; padding: 2rem; color: #6b7280;">
                    Belum ada ulasan untuk produk ini
                </div>
            @endif
        </div>
    </main>
    
    <script>
        function changeImage(src) {
            document.getElementById('main-image').src = src;
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            event.target.classList.add('active');
        }
        
        function selectRating(rating) {
            document.getElementById('rating-input').value = rating;
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.textContent = '★';
                    star.classList.add('active');
                } else {
                    star.textContent = '☆';
                    star.classList.remove('active');
                }
            });
        }
        
        function increaseQuantity() {
            const input = document.getElementById('quantity');
            const max = parseInt(input.getAttribute('max'));
            let value = parseInt(input.value) || 1;
            if (value < max) {
                value++;
                input.value = value;
                updateQuantityInputs();
            }
        }
        
        function decreaseQuantity() {
            const input = document.getElementById('quantity');
            let value = parseInt(input.value) || 1;
            if (value > 1) {
                value--;
                input.value = value;
                updateQuantityInputs();
            }
        }
        
        function validateQuantity() {
            const input = document.getElementById('quantity');
            const max = parseInt(input.getAttribute('max'));
            let value = parseInt(input.value) || 1;
            if (value < 1) value = 1;
            if (value > max) value = max;
            input.value = value;
            updateQuantityInputs();
        }
        
        function updateQuantityInputs() {
            const quantity = document.getElementById('quantity').value;
            document.getElementById('cart-quantity').value = quantity;
            document.getElementById('order-quantity').value = quantity;
        }
        
        // Update quantity inputs when page loads
        document.addEventListener('DOMContentLoaded', function() {
            updateQuantityInputs();
        });
        
        function toggleUserDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const userIcon = event.target.closest('.user-icon');
            if (dropdown && !userIcon && !event.target.closest('.user-dropdown-menu')) {
                dropdown.classList.remove('show');
            }
        });
    </script>
</body>
</html>


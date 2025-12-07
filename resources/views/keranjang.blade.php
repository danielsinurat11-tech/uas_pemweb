<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja - Debora Craft</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    
    
    <!-- Styles -->
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
            overflow-x: hidden;
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
            font-weight: 400;
            transition: color 0.3s;
            position: relative;
        }
        
        .nav-links a.active {
            color: #e91e63;
        }
        
        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e91e63;
        }
        
        .nav-links a:hover {
            color: #e91e63;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .cart-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
            color: #2d2d2d;
            position: relative;
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
        
        .cart-icon-wrapper {
            position: relative;
            display: inline-block;
        }
        
        .login-text {
            color: #2d2d2d;
            font-size: 0.95rem;
            font-weight: 400;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .login-text:hover {
            color: #e91e63;
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
        
        .cart-section {
            margin-top: 80px;
            padding: 3rem 5%;
            background: #ffffff;
        }
        
        .cart-container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .cart-title {
            font-family: 'Cotoris', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d2d2d;
            margin-bottom: 2rem;
        }
        
        .empty-cart-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 500px;
            text-align: center;
        }
        
        .cart-icon-large {
            width: 120px;
            height: 120px;
            margin-bottom: 2rem;
            opacity: 0.3;
        }
        
        .empty-cart-title {
            font-family: 'Cotoris', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 1rem;
        }
        
        .empty-cart-message {
            font-size: 1.1rem;
            color: #5a5a5a;
            margin-bottom: 2rem;
            max-width: 500px;
        }
        
        .view-products-btn {
            padding: 1rem 2.5rem;
            background: #e91e63;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .view-products-btn:hover {
            background: #c2185b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(233, 30, 99, 0.3);
        }
        
        .cart-items-container {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .cart-item {
            display: flex;
            gap: 1.5rem;
            padding: 1.5rem;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
        }
        
        .cart-item-image {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }
        
        .cart-item-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .cart-item-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .cart-item-price {
            font-size: 1.1rem;
            font-weight: 600;
            color: #e91e63;
        }
        
        .cart-item-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 0.5rem;
        }
        
        .quantity-btn {
            width: 28px;
            height: 28px;
            border: none;
            background: #f3f4f6;
            color: #2d2d2d;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .quantity-input {
            width: 50px;
            text-align: center;
            border: none;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .remove-btn {
            padding: 0.5rem 1rem;
            background: #fee2e2;
            color: #991b1b;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .remove-btn:hover {
            background: #fecaca;
        }
        
        .cart-summary {
            margin-top: 2rem;
            padding: 1.5rem;
            background: #f9f9f9;
            border-radius: 12px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        
        .summary-total {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d2d2d;
            padding-top: 1rem;
            border-top: 2px solid #e0e0e0;
        }
        
        .checkout-btn {
            width: 100%;
            padding: 1rem;
            background: #2d2d2d;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1.5rem;
        }
        
        .checkout-btn:hover {
            background: #1a1a1a;
        }
        
        /* Footer Styles */
        .footer {
            background: #0a0e27;
            color: #e0e0e0;
            padding: 4rem 5% 2rem;
            margin-top: 0;
        }
        
        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }
        
        .footer-column h3 {
            font-family: 'Cotoris', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 1rem;
        }
        
        .footer-column p {
            font-size: 0.95rem;
            line-height: 1.7;
            color: #b0b0b0;
            margin-top: 0.5rem;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 0.75rem;
        }
        
        .footer-column ul li a {
            color: #b0b0b0;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s;
        }
        
        .footer-column ul li a:hover {
            color: #ffffff;
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #e0e0e0;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .social-icon:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            transform: translateY(-2px);
        }
        
        .social-icon svg {
            width: 20px;
            height: 20px;
        }
        
        .footer-divider {
            max-width: 1400px;
            margin: 2rem auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .footer-copyright {
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
            padding-top: 1.5rem;
            color: #b0b0b0;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .header {
                padding: 1rem 3%;
            }
            
            .nav-links {
                gap: 1rem;
                font-size: 0.85rem;
            }
            
            .logo-text {
                font-size: 1.25rem;
            }
            
            .cart-section {
                padding: 2rem 3%;
            }
            
            .cart-title {
                font-size: 2rem;
            }
            
            .empty-cart-title {
                font-size: 1.5rem;
            }
            
            .footer {
                padding: 3rem 3% 1.5rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo-section">
                <img src="{{ asset('img/logo.jpg') }}" alt="Debora Craft Logo" class="logo-icon">
                <a href="{{ url('/') }}" style="text-decoration: none;">
                    <span class="logo-text">Debora Craft</span>
                </a>
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
                    <a href="{{ url('/keranjang') }}" class="cart-icon-wrapper">
                        <svg class="cart-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        @php
                            $cartCount = \App\Models\Cart::where('user_id', auth()->id())->first();
                            $totalItems = $cartCount ? $cartCount->items()->sum('quantity') : 0;
                        @endphp
                        @if($totalItems > 0)
                            <span class="cart-badge">{{ $totalItems }}</span>
                        @endif
                    </a>
                    <a href="{{ route('status-pesanan') }}" class="shipping-icon-wrapper" title="Status Pesanan">
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
                    <a href="{{ route('login') }}" class="login-text">Login</a>
                @endauth
            </div>
        </div>
    </header>
    
    <!-- Cart Section -->
    <section class="cart-section">
        <div class="cart-container">
            <h1 class="cart-title">Keranjang Belanja</h1>
            
            @if($cartItems->count() > 0)
                <div class="cart-items-container">
                    @foreach($cartItems as $item)
                        <div class="cart-item">
                            <img src="{{ asset($item->product->image ?? 'img/placeholder.jpg') }}" alt="{{ $item->product->name }}" class="cart-item-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                            <div class="cart-item-info">
                                <h3 class="cart-item-name">{{ $item->product->name }}</h3>
                                <div class="cart-item-price">Rp {{ number_format($item->price, 0, ',', '.') }} x {{ $item->quantity }}</div>
                                <div class="cart-item-actions">
                                    <form method="POST" action="{{ route('cart.update', $item->id) }}" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <div class="quantity-control">
                                            <button type="button" class="quantity-btn" onclick="decreaseQuantity({{ $item->id }}, {{ $item->product->stock }})">-</button>
                                            <input type="number" name="quantity" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}" class="quantity-input" onchange="updateQuantity({{ $item->id }}, {{ $item->product->stock }})">
                                            <button type="button" class="quantity-btn" onclick="increaseQuantity({{ $item->id }}, {{ $item->product->stock }})">+</button>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('cart.remove', $item->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="remove-btn">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 1.2rem; font-weight: 700; color: #2d2d2d;">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="cart-summary">
                    @php
                        $subtotal = $cartItems->sum('subtotal');
                    @endphp
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row summary-total">
                        <span>Total</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="checkout-btn" style="text-decoration: none; display: block; text-align: center;">Checkout</a>
                </div>
            @else
                <div class="empty-cart-container">
                    <svg class="cart-icon-large" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <h2 class="empty-cart-title">Keranjang Anda Kosong</h2>
                    <p class="empty-cart-message">Mulai berbelanja dan tambahkan produk ke keranjang Anda</p>
                    <a href="{{ url('/kategori') }}" class="view-products-btn">Lihat Produk</a>
                </div>
            @endif
        </div>
    </section>
    
    <script>
        function increaseQuantity(itemId, maxStock) {
            const input = document.getElementById('quantity-' + itemId);
            let value = parseInt(input.value) || 1;
            if (value < maxStock) {
                value++;
                input.value = value;
                updateCartItem(itemId, value);
            }
        }
        
        function decreaseQuantity(itemId, maxStock) {
            const input = document.getElementById('quantity-' + itemId);
            let value = parseInt(input.value) || 1;
            if (value > 1) {
                value--;
                input.value = value;
                updateCartItem(itemId, value);
            }
        }
        
        function updateQuantity(itemId, maxStock) {
            const input = document.getElementById('quantity-' + itemId);
            let value = parseInt(input.value) || 1;
            if (value < 1) value = 1;
            if (value > maxStock) value = maxStock;
            input.value = value;
            updateCartItem(itemId, value);
        }
        
        function updateCartItem(itemId, quantity) {
            const form = document.querySelector(`form[action*="/cart/${itemId}"]`);
            if (form) {
                const input = form.querySelector('input[name="quantity"]');
                if (input) {
                    input.value = quantity;
                    form.submit();
                }
            }
        }
        
        function toggleUserDropdown() {
            const dropdown = document.getElementById('userDropdown');
            if (dropdown) {
                dropdown.classList.toggle('show');
            }
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
    
    <!-- Footer -->
    @php
        $col1Items = \App\Models\FooterContent::where('column', 'column_1')->where('is_active', true)->orderBy('order')->get();
        $col2Items = \App\Models\FooterContent::where('column', 'column_2')->where('is_active', true)->orderBy('order')->get();
        $col3Items = \App\Models\FooterContent::where('column', 'column_3')->where('is_active', true)->orderBy('order')->get();
        $col4Items = \App\Models\FooterContent::where('column', 'column_4')->where('is_active', true)->orderBy('order')->get();
        
        $col1Title = $col1Items->where('type', 'title')->first();
        $col1Desc = $col1Items->where('type', 'description')->first();
        $col2Title = $col2Items->where('type', 'title')->first();
        $col3Title = $col3Items->where('type', 'title')->first();
        $col4Title = $col4Items->where('type', 'title')->first();
        $col4Socials = $col4Items->where('type', 'social_link');
    @endphp
    <footer class="footer">
        <div class="footer-content">
            <!-- Column 1: Debora Craft -->
            <div class="footer-column">
                @if($col1Title)
                    <h3>{{ $col1Title->title }}</h3>
                @endif
                @if($col1Desc)
                    <p>{{ $col1Desc->content }}</p>
                @endif
            </div>
            
            <!-- Column 2: Produk -->
            <div class="footer-column">
                @if($col2Title)
                    <h3>{{ $col2Title->title }}</h3>
                @endif
                <ul>
                    @foreach($col2Items->where('type', 'list_item') as $item)
                        <li><a href="{{ $item->url ?: '#' }}">{{ $item->content }}</a></li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Column 3: Layanan -->
            <div class="footer-column">
                @if($col3Title)
                    <h3>{{ $col3Title->title }}</h3>
                @endif
                <ul>
                    @foreach($col3Items->where('type', 'list_item') as $item)
                        <li><a href="{{ $item->url ?: '#' }}">{{ $item->content }}</a></li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Column 4: Hubungi Kami -->
            <div class="footer-column">
                @if($col4Title)
                    <h3>{{ $col4Title->title }}</h3>
                @endif
                <div class="social-icons">
                    @foreach($col4Socials as $social)
                        <a href="{{ $social->url ?: '#' }}" class="social-icon" aria-label="{{ ucfirst($social->icon) }}" target="_blank" rel="noopener noreferrer">
                            @if($social->icon == 'facebook')
                                <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            @elseif($social->icon == 'instagram')
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"></rect>
                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" stroke-width="2"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke-width="2"></line>
                                </svg>
                            @elseif($social->icon == 'whatsapp')
                                <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"></path>
                                </svg>
                            @elseif($social->icon == 'email')
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="footer-divider"></div>
        
        <div class="footer-copyright">
            <p>© 2024 Debora Craft. Hak cipta dilindungi.</p>
        </div>
    </footer>
</body>
</html>


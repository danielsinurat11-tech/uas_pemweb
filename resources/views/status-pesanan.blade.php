<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Pesanan - Debora Craft</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    
    
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
        
        .cart-icon-wrapper {
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
        
        .shipping-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
            color: #e91e63;
            position: relative;
            transition: color 0.3s;
        }
        
        .shipping-icon-wrapper {
            position: relative;
            display: inline-block;
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
        
        .main-content {
            margin-top: 100px;
            padding: 2rem 5%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .page-title {
            font-family: 'Cotoris', serif;
            font-size: 2.5rem;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            color: #5a5a5a;
            margin-bottom: 2rem;
        }
        
        .order-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .order-info {
            flex: 1;
        }
        
        .order-number {
            font-weight: 600;
            font-size: 1.2rem;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .order-date {
            font-size: 0.9rem;
            color: #5a5a5a;
        }
        
        .order-status {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .status-badge.new {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-badge.processing {
            background: #cfe2ff;
            color: #084298;
        }
        
        .status-badge.shipped {
            background: #d1e7dd;
            color: #0f5132;
        }
        
        .status-badge.delivered {
            background: #d4edda;
            color: #155724;
        }
        
        .status-badge.cancelled {
            background: #f8d7da;
            color: #721c24;
        }
        
        .order-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .order-items {
            flex: 1;
        }
        
        .items-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2d2d2d;
        }
        
        .order-item {
            display: flex;
            gap: 1rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .order-item:last-child {
            border-bottom: none;
        }
        
        .item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
        }
        
        .item-details {
            flex: 1;
        }
        
        .item-name {
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 0.25rem;
        }
        
        .item-info {
            font-size: 0.85rem;
            color: #5a5a5a;
        }
        
        .item-price {
            font-weight: 600;
            color: #2d2d2d;
            text-align: right;
        }
        
        .order-summary {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
        }
        
        .summary-row.total {
            font-weight: 600;
            font-size: 1.2rem;
            padding-top: 0.75rem;
            border-top: 2px solid #2d2d2d;
            margin-top: 0.75rem;
        }
        
        .shipping-info {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        
        .info-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2d2d2d;
        }
        
        .info-text {
            font-size: 0.9rem;
            color: #5a5a5a;
            line-height: 1.6;
        }
        
        .tracking-info {
            background: #e8f4f8;
            padding: 1rem;
            border-radius: 6px;
            margin-top: 1rem;
        }
        
        .tracking-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .tracking-label {
            color: #5a5a5a;
        }
        
        .tracking-value {
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .order-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .btn-action {
            padding: 0.75rem 1.5rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            background: #ffffff;
            color: #2d2d2d;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-action:hover {
            background: #f5f5f5;
        }
        
        .btn-action.primary {
            background: #2d2d2d;
            color: #ffffff;
            border-color: #2d2d2d;
        }
        
        .btn-action.primary:hover {
            background: #1a1a1a;
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #5a5a5a;
        }
        
        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        
        .empty-state-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .empty-state-text {
            font-size: 1rem;
            margin-bottom: 2rem;
        }
        
        .btn-primary {
            padding: 0.75rem 2rem;
            background: #2d2d2d;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary:hover {
            background: #1a1a1a;
        }
        
        .footer {
            background: #0a0e27;
            color: #e0e0e0;
            padding: 4rem 5% 2rem;
            margin-top: 4rem;
        }
        
        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
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
            color: #b0b0b0;
            transition: all 0.3s;
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
            .order-content {
                grid-template-columns: 1fr;
            }
            
            .order-header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .footer {
                padding: 3rem 3% 1.5rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .footer-column h3 {
                font-size: 1.25rem;
            }
            
            .social-icons {
                justify-content: flex-start;
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
    
    <!-- Main Content -->
    <main class="main-content">
        <h1 class="page-title">Status Pesanan</h1>
        <p class="page-subtitle">Lihat status dan detail pesanan Anda</p>
        
        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #f5c6cb;">
                {{ session('error') }}
            </div>
        @endif
        
        @php
            $orders = \App\Models\Order::where('user_id', auth()->id())
                ->with(['orderItems.product', 'shipping', 'payment'])
                ->orderBy('created_at', 'desc')
                ->get();
            
            $statusLabels = [
                'new' => 'Pesanan Baru',
                'processing' => 'Sedang Diproses',
                'shipped' => 'Sedang Dikirim',
                'delivered' => 'Terkirim',
                'cancelled' => 'Dibatalkan',
            ];
        @endphp
        
        @forelse($orders as $order)
            <div class="order-card">
                <div class="order-header">
                    <div class="order-info">
                        <div class="order-number">Order #{{ $order->order_number }}</div>
                        <div class="order-date">Tanggal: {{ $order->created_at->format('d M Y, H:i') }}</div>
                    </div>
                    <div class="order-status">
                        <span class="status-badge {{ $order->status }}">{{ $statusLabels[$order->status] ?? $order->status }}</span>
                    </div>
                </div>
                
                <div class="order-content">
                    <div class="order-items">
                        <div class="items-title">Item Pesanan</div>
                        @foreach($order->orderItems as $item)
                            <div class="order-item">
                                <img src="{{ asset($item->product->image ?? 'img/placeholder.jpg') }}" alt="{{ $item->product->name }}" class="item-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                                <div class="item-details">
                                    <div class="item-name">{{ $item->product->name ?? $item->product_name }}</div>
                                    <div class="item-info">Qty: {{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                                </div>
                                <div class="item-price">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div>
                        <div class="order-summary">
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($order->total_amount ?? $order->total, 0, ',', '.') }}</span>
                            </div>
                            <div class="summary-row total">
                                <span>Total</span>
                                <span>Rp {{ number_format($order->total_amount ?? $order->total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        
                        <div class="shipping-info">
                            <div class="info-label">Alamat Pengiriman</div>
                            <div class="info-text">
                                <strong>{{ $order->shipping_name }}</strong><br>
                                {{ $order->shipping_phone }}<br>
                                {{ $order->shipping_address }}
                            </div>
                        </div>
                        
                        @if($order->shipping)
                            <div class="tracking-info">
                                <div class="info-label">Informasi Pengiriman</div>
                                <div class="tracking-row">
                                    <span class="tracking-label">Kurir:</span>
                                    <span class="tracking-value">{{ $order->shipping->courier ?? '-' }}</span>
                                </div>
                                <div class="tracking-row">
                                    <span class="tracking-label">Tracking Number:</span>
                                    <span class="tracking-value">{{ $order->shipping->tracking_number ?? '-' }}</span>
                                </div>
                                @if($order->shipping->shipped_date)
                                <div class="tracking-row">
                                    <span class="tracking-label">Tanggal Pengiriman:</span>
                                    <span class="tracking-value">{{ $order->shipping->shipped_date->format('d M Y') }}</span>
                                </div>
                                @endif
                                @if($order->shipping->estimated_delivery_date)
                                <div class="tracking-row">
                                    <span class="tracking-label">Estimasi Sampai:</span>
                                    <span class="tracking-value">{{ $order->shipping->estimated_delivery_date->format('d M Y') }}</span>
                                </div>
                                @endif
                                @php
                                    $shippingStatusLabels = [
                                        'pending' => 'Menunggu',
                                        'packed' => 'Dikemas',
                                        'shipped' => 'Dikirim',
                                        'in_transit' => 'Dalam Perjalanan',
                                        'delivered' => 'Terkirim',
                                        'failed' => 'Gagal',
                                    ];
                                @endphp
                                <div class="tracking-row">
                                    <span class="tracking-label">Status:</span>
                                    <span class="tracking-value">{{ $shippingStatusLabels[$order->shipping->status] ?? $order->shipping->status }}</span>
                                </div>
                            </div>
                        @endif
                        
                        @if($order->payment)
                            <div class="shipping-info" style="margin-top: 1rem;">
                                <div class="info-label">Status Pembayaran</div>
                                <div class="info-text">
                                    @php
                                        $paymentStatusLabels = [
                                            'pending' => 'Menunggu Verifikasi',
                                            'processing' => 'Sedang Diproses',
                                            'paid' => 'Sudah Dibayar',
                                            'failed' => 'Gagal',
                                        ];
                                    @endphp
                                    <strong>{{ $paymentStatusLabels[$order->payment->status] ?? $order->payment->status }}</strong>
                                    @if($order->payment->payment_method == 'bank_transfer')
                                        <br><small>Metode: Transfer Bank</small>
                                    @else
                                        <br><small>Metode: Simulasi Payment</small>
                                    @endif
                                </div>
                            </div>
                        @elseif($order->status == 'new')
                            <div class="order-actions">
                                <a href="{{ route('payment.page', $order->id) }}" class="btn-action primary">Bayar Sekarang</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-state-icon">📦</div>
                <div class="empty-state-title">Belum Ada Pesanan</div>
                <div class="empty-state-text">Anda belum memiliki pesanan. Mulai berbelanja sekarang!</div>
                <a href="{{ url('/kategori') }}" class="btn-primary">Lihat Produk</a>
            </div>
        @endforelse
    </main>
    
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
    
    <script>
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
</body>
</html>


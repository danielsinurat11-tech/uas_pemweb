<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang - Debora Craft</title>
    
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
        }
        
        .location-section {
            margin-top: 80px;
            padding: 4rem 5%;
            background: #ffffff;
        }
        
        .location-container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .location-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .location-title {
            font-family: 'Cotoris', serif;
            font-size: 3rem;
            font-weight: 700;
            color: #2d2d2d;
            margin-bottom: 1rem;
        }
        
        .location-description {
            font-size: 1.2rem;
            color: #5a5a5a;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .map-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .location-info-card {
            background: #f0f9f4;
            border-radius: 12px;
            padding: 2rem;
            height: fit-content;
        }
        
        .business-name {
            font-family: 'Cotoris', serif;
            font-size: 1.8rem;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 1rem;
        }
        
        .location-address {
            font-size: 1rem;
            color: #5a5a5a;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        
        .rating-section {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .rating-value {
            font-size: 1.2rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .stars {
            display: flex;
            gap: 0.2rem;
        }
        
        .star {
            width: 20px;
            height: 20px;
            color: #ffc107;
        }
        
        .reviews-count {
            font-size: 0.95rem;
            color: #5a5a5a;
            margin-left: 0.5rem;
        }
        
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .route-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1rem;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .route-btn:hover {
            background: #1976D2;
        }
        
        .view-map-link {
            color: #2196F3;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s;
        }
        
        .view-map-link:hover {
            color: #1976D2;
            text-decoration: underline;
        }
        
        .map-wrapper {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            height: 450px;
        }
        
        .map-wrapper iframe {
            width: 100%;
            height: 100%;
            border: 0;
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
        
        @media (max-width: 1024px) {
            .map-container {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
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
            
            .location-section {
                padding: 3rem 3%;
            }
            
            .location-title {
                font-size: 2rem;
            }
            
            .location-description {
                font-size: 1rem;
            }
            
            .map-wrapper {
                height: 350px;
            }
            
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
                <img src="{{ asset('img/logo.jpg') }}" alt="Debora Craft Logo" class="logo-icon">
                <a href="{{ url('/') }}" style="text-decoration: none;">
                    <span class="logo-text">Debora Craft</span>
                </a>
            </div>
            
            <nav>
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/kategori') }}">Kategori</a></li>
                    <li><a href="{{ url('/tentang') }}" class="active">Tentang</a></li>
                </ul>
            </nav>
            
            <div class="header-right">
                @auth
                    <a href="{{ url('/keranjang') }}">
                        <svg class="cart-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </a>
                    <a href="{{ route('status-pesanan') }}" class="shipping-icon-wrapper" title="Status Pesanan">
                        <svg class="shipping-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                    </a>
                    <div class="user-icon">{{ substr(auth()->user()->name, 0, 1) }}</div>
                @else
                    <a href="{{ route('login') }}" class="login-text">Login</a>
                @endauth
            </div>
        </div>
    </header>
    
    <!-- Location Section -->
    <section class="location-section">
        <div class="location-container">
            <div class="location-header">
                <h1 class="location-title">Lokasi Kami</h1>
                <p class="location-description">Kunjungi toko kami atau lihat lokasi di peta berikut.</p>
            </div>
            
            <div class="map-container">
                <!-- Location Info Card -->
                <div class="location-info-card">
                    <h2 class="business-name">Debora craft</h2>
                    <p class="location-address">
                        7P79+2Q3, Candi, Kec. Kumai, Kabupaten Kotawaringin Barat, Kalimantan Tengah 74181
                    </p>
                    
                    <div class="rating-section">
                        <span class="rating-value">4,0</span>
                        <div class="stars">
                            <svg class="star" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="star" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="star" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="star" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <svg class="star" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.364 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                        <span class="reviews-count">3 ulasan</span>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Debora+craft" target="_blank" class="route-btn">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"></path>
                            </svg>
                            Rute
                        </a>
                        <a href="https://www.google.com/maps/place/Debora+craft" target="_blank" class="view-map-link">Lihat peta lebih besar</a>
                    </div>
                </div>
                
                <!-- Map -->
                <div class="map-wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.2652938344927!2d111.71684477426!3d-2.7374895389328113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e08fb0201d20229%3A0x87cc526abde33f65!2sDebora%20craft!5e0!3m2!1sid!2sid!4v1764447645484!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    
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


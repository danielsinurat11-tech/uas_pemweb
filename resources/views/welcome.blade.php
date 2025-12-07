<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Debora Craft - Beautiful Flowers</title>

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
            
            .hero-section {
                margin-top: 80px;
                min-height: calc(100vh - 80px);
                background: linear-gradient(135deg, #fff5f7 0%, #ffeef0 50%, #ffe5e9 100%);
                position: relative;
                overflow: hidden;
            }
            
            .hero-background {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image: url('/img/background.png');
                background-size: cover;
                background-position: center;
                opacity: 0.3;
                z-index: 0;
            }
            
            .hero-background::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: radial-gradient(circle at 20% 30%, rgba(255, 182, 193, 0.2) 0%, transparent 50%),
                            radial-gradient(circle at 80% 70%, rgba(255, 192, 203, 0.15) 0%, transparent 50%);
                z-index: 1;
            }
            
            .hero-content {
                max-width: 1400px;
                margin: 0 auto;
                padding: 4rem 5%;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 4rem;
                align-items: center;
                position: relative;
                z-index: 1;
            }
            
            .hero-text {
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .hero-headline {
                font-family: 'Cotoris', serif;
                font-size: 3.5rem;
                font-weight: 700;
                line-height: 1.2;
            }
            
            .hero-headline-part1 {
                color: #2d2d2d;
            }
            
            .hero-headline-part2 {
                color: #e91e63;
            }
            
            .hero-description {
                font-size: 1.1rem;
                color: #5a5a5a;
                line-height: 1.7;
                max-width: 500px;
            }
            
            .hero-buttons {
                display: flex;
                gap: 1rem;
                margin-top: 1rem;
            }
            
            .btn-primary {
                padding: 1rem 2rem;
                background: linear-gradient(135deg, #ff6b9d 0%, #e91e63 100%);
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
            
            .btn-primary:hover {
                background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(233, 30, 99, 0.3);
            }
            
            .btn-secondary {
                padding: 1rem 2rem;
                background: white;
                color: #e91e63;
                border: 2px solid #e91e63;
                border-radius: 8px;
                font-size: 1rem;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s;
                text-decoration: none;
                display: inline-block;
            }
            
            .btn-secondary:hover {
                background: #fff5f7;
                transform: translateY(-2px);
            }
            
            .hero-image {
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            .bouquet-container {
                position: relative;
                max-width: 500px;
                width: 100%;
            }
            
            .bouquet-image {
                width: 100%;
                height: auto;
                border-radius: 16px;
                object-fit: cover;
            }
            
            .decorative-circle {
                position: absolute;
                border-radius: 50%;
                background: rgba(233, 30, 99, 0.1);
                pointer-events: none;
            }
            
            .decorative-circle-1 {
                width: 150px;
                height: 150px;
                top: -20px;
                right: -20px;
            }
            
            .decorative-circle-2 {
                width: 100px;
                height: 100px;
                bottom: -10px;
                right: 30px;
            }
            
            /* Products Collection Section */
            .products-collection-section {
                padding: 4rem 5%;
                background: #ffffff;
            }
            
            .collection-container {
                max-width: 1400px;
                margin: 0 auto;
            }
            
            .collection-title {
                font-family: 'Cotoris', serif;
                font-size: 2.5rem;
                font-weight: 600;
                color: #2d2d2d;
                text-align: center;
                margin-bottom: 3rem;
            }
            
            .products-grid-collection {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 2rem;
            }
            
            .product-card-collection {
                text-decoration: none;
                color: inherit;
                transition: transform 0.3s, box-shadow 0.3s;
            }
            
            .product-card-collection:hover {
                transform: translateY(-5px);
            }
            
            .product-image-collection-wrapper {
                position: relative;
                width: 100%;
                padding-top: 100%; /* 1:1 Aspect Ratio */
                background: #f9f9f9;
                border-radius: 8px;
                overflow: hidden;
                margin-bottom: 1rem;
            }
            
            .product-image-collection {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: filter 0.3s;
            }
            
            .product-image-collection-wrapper.out-of-stock .product-image-collection {
                filter: brightness(0.4);
            }
            
            .stock-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.6);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10;
                pointer-events: none;
            }
            
            .stock-overlay-text {
                color: white;
                font-size: 1rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 1px;
                text-align: center;
                padding: 0.5rem 1rem;
                background: rgba(0, 0, 0, 0.5);
                border-radius: 4px;
            }
            
            /* Modal/Popup Styles */
            .stock-modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 10000;
                align-items: center;
                justify-content: center;
            }
            
            .stock-modal.show {
                display: flex;
            }
            
            .stock-modal-content {
                background: white;
                border-radius: 12px;
                padding: 2rem;
                max-width: 400px;
                width: 90%;
                text-align: center;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
                animation: modalFadeIn 0.3s ease;
            }
            
            @keyframes modalFadeIn {
                from {
                    opacity: 0;
                    transform: scale(0.9);
                }
                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }
            
            .stock-modal-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
            }
            
            .stock-modal-title {
                font-size: 1.25rem;
                font-weight: 600;
                color: #2d2d2d;
                margin-bottom: 0.75rem;
            }
            
            .stock-modal-message {
                font-size: 1rem;
                color: #5a5a5a;
                margin-bottom: 1.5rem;
                line-height: 1.6;
            }
            
            .stock-modal-button {
                padding: 0.75rem 2rem;
                background: #e91e63;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 1rem;
                font-weight: 500;
                cursor: pointer;
                transition: background 0.3s;
            }
            
            .stock-modal-button:hover {
                background: #c2185b;
            }
            
            .product-tag {
                position: absolute;
                bottom: 12px;
                left: 50%;
                transform: translateX(-50%);
                padding: 0.4rem 1rem;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 600;
                color: #ffffff;
                background: #e91e63;
            }
            
            .product-tag-bestseller {
                background: #e91e63;
            }
            
            .product-tag-premium {
                background: #e91e63;
            }
            
            .product-tag-new {
                background: #e91e63;
            }
            
            .product-name-collection {
                font-size: 1.1rem;
                font-weight: 600;
                color: #2d2d2d;
                text-align: center;
                margin-top: 0.5rem;
            }
            
            .empty-collection {
                text-align: center;
                padding: 3rem;
                color: #5a5a5a;
            }
            
            @media (max-width: 1024px) {
                .products-grid-collection {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 1.5rem;
                }
            }
            
            @media (max-width: 768px) {
                .products-grid-collection {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 1rem;
                }
                
                .collection-title {
                    font-size: 2rem;
                    margin-bottom: 2rem;
                }
            }
            
            @media (max-width: 480px) {
                .products-grid-collection {
                    grid-template-columns: 1fr;
                }
            }
            
            /* Featured Collection Section */
            .featured-collection-section {
                padding: 4rem 5%;
                background: #ffffff;
            }
            
            .featured-container {
                max-width: 1400px;
                margin: 0 auto;
            }
            
            .featured-title {
                font-family: 'Cotoris', serif;
                font-size: 2.5rem;
                font-weight: 600;
                color: #2d2d2d;
                text-align: center;
                margin-bottom: 3rem;
            }
            
            .featured-grid {
                display: grid;
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .featured-grid-bottom {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
                margin-top: 2rem;
            }
            
            .featured-card {
                position: relative;
                border-radius: 16px;
                overflow: hidden;
                aspect-ratio: 1;
                cursor: pointer;
                transition: transform 0.3s, box-shadow 0.3s;
                text-decoration: none;
                display: block;
            }
            
            .featured-card-large-top {
                aspect-ratio: 2.5 / 1; /* Wider aspect ratio for top card */
            }
            
            .featured-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            }
            
            .featured-card-large {
                /* Same size as others */
            }
            
            .featured-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .featured-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(to top, rgba(233, 30, 99, 0.85) 0%, rgba(233, 30, 99, 0.5) 50%, transparent 100%);
                padding: 2rem;
                color: #ffffff;
            }
            
            .featured-content {
                max-width: 100%;
            }
            
            .featured-card-title {
                font-family: 'Cotoris', serif;
                font-size: 1.75rem;
                font-weight: 600;
                color: #ffffff;
                margin-bottom: 0.5rem;
            }
            
            .featured-card-subtitle {
                font-size: 1rem;
                color: rgba(255, 255, 255, 0.95);
                margin-bottom: 1rem;
            }
            
            .featured-btn {
                display: inline-block;
                padding: 0.75rem 2rem;
                background: #ffffff;
                color: #e91e63;
                border-radius: 25px;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.3s;
                margin-top: 0.5rem;
                cursor: pointer;
            }
            
            @media (max-width: 1024px) {
                .featured-grid-bottom {
                    grid-template-columns: 1fr;
                    gap: 1.5rem;
                }
                
                .featured-card-large-top {
                    aspect-ratio: 2 / 1;
                }
            }
            
            @media (max-width: 768px) {
                .featured-card-large-top {
                    aspect-ratio: 1.5 / 1;
                }
                
                .featured-title {
                    font-size: 2rem;
                    margin-bottom: 2rem;
                }
                
                .featured-overlay {
                    padding: 1.5rem;
                }
                
                .featured-card-title {
                    font-size: 1.5rem;
                }
                
                .featured-card-subtitle {
                    font-size: 0.9rem;
                }
            }
            
            @media (max-width: 1024px) {
                .hero-content {
                    grid-template-columns: 1fr;
                    gap: 3rem;
                }
                
                .hero-headline {
                    font-size: 2.5rem;
                }
                
                .nav-links {
                    gap: 1.5rem;
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
                
                .hero-content {
                    padding: 2rem 3%;
                }
                
                .hero-headline {
                    font-size: 2rem;
                }
                
                .hero-description {
                    font-size: 1rem;
                }
                
                .hero-buttons {
                    flex-direction: column;
                }
                
            .btn-primary,
            .btn-secondary {
                width: 100%;
                text-align: center;
            }
        }
        
        /* Footer Styles */
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
            margin-bottom: 2rem;
        }
        
        .footer-column h3 {
            font-family: 'Playfair Display', serif;
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
            text-decoration: none;
        }
        
        .social-icon:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            transform: translateY(-2px);
        }
        
        .social-icon svg {
            width: 20px;
            height: 20px;
            display: block;
            flex-shrink: 0;
            color: inherit;
        }
        
        .social-icon svg path {
            fill: currentColor;
        }
        
        .social-icon svg[fill="none"] path,
        .social-icon svg[fill="none"] rect,
        .social-icon svg[fill="none"] line,
        .social-icon svg[fill="none"] circle {
            fill: none;
            stroke: currentColor;
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
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }
        
        @media (max-width: 768px) {
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
                <span class="logo-text">Debora Craft</span>
            </div>
            
            <nav>
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}" class="active">Beranda</a></li>
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
                            try {
                                $cartCount = \App\Models\Cart::where('user_id', auth()->id())->first();
                                $totalItems = $cartCount ? $cartCount->items()->sum('quantity') : 0;
                            } catch (\Exception $e) {
                                $totalItems = 0;
                            }
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
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background"></div>
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-headline">
                    <span class="hero-headline-part1">Spread Love With </span>
                    <span class="hero-headline-part2">Beautiful Flowers</span>
                </h1>
                <p class="hero-description">
                    Express your deepest emotions through our handcrafted bouquets, perfect for every special moment and celebration.
                </p>
                <div class="hero-buttons">
                    <a href="{{ url('/kategori') }}" class="btn-primary">Explore Bouquet</a>
                    <a href="#products-collection" class="btn-secondary">See Collections</a>
                </div>
            </div>
            
            <div class="hero-image">
                <div class="bouquet-container">
                    <div class="decorative-circle decorative-circle-1"></div>
                    <div class="decorative-circle decorative-circle-2"></div>
                    <img src="{{ asset('img/Beautiful Flower Bouquet.png') }}" alt="Beautiful Flower Bouquet" class="bouquet-image">
                </div>
            </div>
        </div>
    </section>
    
    <!-- Products Collection Section -->
    <section id="products-collection" class="products-collection-section">
        <div class="collection-container">
            <h2 class="collection-title">Koleksi Debora Craft</h2>
            @php
                $products = \App\Models\Product::where('is_active', true)
                    ->where('stock', '>', 0)
                    ->orderBy('created_at', 'desc')
                    ->limit(8)
                    ->get();
            @endphp
            
            @if($products->count() > 0)
                <div class="products-grid-collection">
                    @foreach($products as $product)
                        <a href="{{ route('product.detail', $product->slug) }}" 
                           class="product-card-collection">
                            <div class="product-image-collection-wrapper">
                                <img src="{{ $product->image ? asset($product->image) : asset('img/placeholder.jpg') }}" 
                                     alt="{{ $product->name }}" 
                                     class="product-image-collection" 
                                     onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                                @php
                                    $productType = $product->type ?? 'standart';
                                    $totalSold = $product->total_sold ?? 0;
                                    $isNew = $product->created_at->diffInDays(now()) <= 30;
                                    $showTag = false;
                                    $tagText = '';
                                    $tagClass = '';
                                    
                                    // Priority: Premium/Exclusive > Best Seller > New
                                    if($productType == 'premium' || $productType == 'exclusive') {
                                        $showTag = true;
                                        $tagText = 'Premium';
                                        $tagClass = 'product-tag-premium';
                                    } elseif($totalSold >= 10) {
                                        $showTag = true;
                                        $tagText = 'Best Seller';
                                        $tagClass = 'product-tag-bestseller';
                                    } elseif($isNew) {
                                        $showTag = true;
                                        $tagText = 'New';
                                        $tagClass = 'product-tag-new';
                                    }
                                @endphp
                                @if($showTag)
                                    <span class="product-tag {{ $tagClass }}">{{ $tagText }}</span>
                                @endif
                            </div>
                            <h3 class="product-name-collection">{{ $product->name }}</h3>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="empty-collection">
                    <p>Koleksi produk akan segera hadir. Silakan kembali lagi nanti.</p>
                </div>
            @endif
        </div>
    </section>
    
    <!-- Featured Collection Section -->
    <section class="featured-collection-section">
        <div class="featured-container">
            <h2 class="featured-title">Koleksi Unggulan</h2>
            <div class="featured-grid">
                <!-- Wedding Collection - Full Width Top -->
                <a href="{{ url('/kategori') }}" class="featured-card featured-card-large-top">
                    <img src="{{ asset('img/wedding flower.png') }}" alt="Wedding Collection" class="featured-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                    <div class="featured-overlay">
                        <div class="featured-content">
                            <h3 class="featured-card-title">Wedding Collection</h3>
                            <p class="featured-card-subtitle">Perfect arrangements for your special day</p>
                            <span class="featured-btn">View Collection</span>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="featured-grid-bottom">
                <!-- Spring Collection -->
                <a href="{{ url('/kategori') }}" class="featured-card">
                    <img src="{{ asset('img/spring collection.png') }}" alt="Spring Collection" class="featured-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                    <div class="featured-overlay">
                        <div class="featured-content">
                            <h3 class="featured-card-title">Spring Collection</h3>
                            <p class="featured-card-subtitle">Fresh seasonal blooms</p>
                        </div>
                    </div>
                </a>
                
                <!-- Corporate Gifts -->
                <a href="{{ url('/kategori') }}" class="featured-card">
                    <img src="{{ asset('img/Corporate gift .png') }}" alt="Corporate Gifts" class="featured-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                    <div class="featured-overlay">
                        <div class="featured-content">
                            <h3 class="featured-card-title">Corporate Gifts</h3>
                            <p class="featured-card-subtitle">Elegant business arrangements</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    @php
        try {
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
        } catch (\Exception $e) {
            $col1Items = collect();
            $col2Items = collect();
            $col3Items = collect();
            $col4Items = collect();
            $col1Title = null;
            $col1Desc = null;
            $col2Title = null;
            $col3Title = null;
            $col4Title = null;
            $col4Socials = collect();
        }
    @endphp
    <footer class="footer">
        <div class="footer-content">
            <!-- Column 1 -->
            @if($col1Items->isNotEmpty())
            <div class="footer-column">
                @if($col1Title)
                    <h3>{{ $col1Title->title }}</h3>
                @endif
                @if($col1Desc)
                    <p>{{ $col1Desc->content }}</p>
                @endif
            </div>
            @endif
            
            <!-- Column 2 -->
            @if($col2Items->isNotEmpty())
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
            @endif
            
            <!-- Column 3 -->
            @if($col3Items->isNotEmpty())
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
            @endif
            
            <!-- Column 4 -->
            @if($col4Items->isNotEmpty())
            <div class="footer-column">
                @if($col4Title)
                    <h3>{{ $col4Title->title }}</h3>
                @endif
                <div class="social-icons">
                    @foreach($col4Socials as $social)
                        <a href="{{ $social->url ?: '#' }}" class="social-icon" aria-label="{{ ucfirst($social->icon) }}" target="_blank" rel="noopener noreferrer">
                            @if($social->icon == 'facebook')
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" fill="currentColor"></path>
                                </svg>
                            @elseif($social->icon == 'instagram')
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke="currentColor" stroke-width="2"></rect>
                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" stroke="currentColor" stroke-width="2" fill="none"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke="currentColor" stroke-width="2"></line>
                                </svg>
                            @elseif($social->icon == 'whatsapp')
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="currentColor"></path>
                                </svg>
                            @elseif($social->icon == 'email')
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke="currentColor"></path>
                                </svg>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <div class="footer-divider"></div>
        
        <div class="footer-copyright">
            <p>© 2024 Debora Craft. Hak cipta dilindungi.</p>
        </div>
    </footer>
    
    <!-- Stock Modal -->
    <div id="stockModal" class="stock-modal">
        <div class="stock-modal-content">
            <div class="stock-modal-icon">⚠️</div>
            <div class="stock-modal-title">Stok Habis</div>
            <div class="stock-modal-message" id="stockModalMessage">
                Mohon maaf stok produk telah habis
            </div>
            <button class="stock-modal-button" onclick="closeStockModal()">Mengerti</button>
        </div>
    </div>
    
    <script>
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
        
        // Handle out of stock product clicks
        document.addEventListener('DOMContentLoaded', function() {
            const outOfStockLinks = document.querySelectorAll('.out-of-stock-link');
            
            outOfStockLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productName = this.getAttribute('data-product-name');
                    showStockModal(productName);
                });
            });
        });
        
        function showStockModal(productName) {
            const modal = document.getElementById('stockModal');
            const message = document.getElementById('stockModalMessage');
            message.textContent = 'Mohon maaf stok ' + productName + ' telah habis';
            modal.classList.add('show');
        }
        
        function closeStockModal() {
            const modal = document.getElementById('stockModal');
            modal.classList.remove('show');
        }
        
        // Close modal when clicking outside
        document.getElementById('stockModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeStockModal();
            }
        });
    </script>
    </body>
</html>


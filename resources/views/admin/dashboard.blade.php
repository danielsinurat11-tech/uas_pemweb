<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - Debora Craft</title>
    
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
            background: #f5f5f5;
            color: #2d2d2d;
        }
        
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #ffffff;
            border-right: 1px solid #e0e0e0;
            padding: 2rem 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 0.75rem 1.5rem;
            color: #5a5a5a;
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        
        .sidebar-menu a:hover {
            background: #f5f5f5;
            color: #2d2d2d;
        }
        
        .sidebar-menu a.active {
            background: #2d2d2d;
            color: #ffffff;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 2rem;
        }
        
        /* Header */
        .dashboard-header {
            background: #ffffff;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-radius: 8px;
        }
        
        .header-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .header-logo img {
            width: 32px;
            height: 32px;
            object-fit: contain;
        }
        
        .header-logo-text {
            font-family: 'Cotoris', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .header-link {
            color: #2d2d2d;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s;
        }
        
        .header-link:hover {
            color: #e91e63;
        }
        
        /* Summary Section */
        .summary-section {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            font-family: 'Cotoris', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .section-controls {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .search-input {
            padding: 0.5rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
            width: 200px;
        }
        
        .filter-btn {
            padding: 0.5rem 1rem;
            background: #f5f5f5;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .filter-btn:hover {
            background: #e8e8e8;
        }
        
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }
        
        .summary-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
        }
        
        .card-title {
            font-size: 0.9rem;
            color: #5a5a5a;
            margin-bottom: 0.5rem;
        }
        
        .card-value {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        /* Sales Analytic Section */
        .sales-section {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        
        .sales-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .chart-placeholder {
            background: #f9f9f9;
            border: 1px dashed #e0e0e0;
            border-radius: 8px;
            padding: 4rem 2rem;
            text-align: center;
            color: #5a5a5a;
            font-size: 1rem;
        }
        
        .month-indicator {
            color: #5a5a5a;
            font-size: 0.9rem;
        }
        
        /* Sales Target Section */
        .target-section {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
        }
        
        .target-header {
            margin-bottom: 1.5rem;
        }
        
        .target-placeholder {
            background: #f9f9f9;
            border: 1px dashed #e0e0e0;
            border-radius: 8px;
            padding: 3rem 2rem;
            text-align: center;
            color: #5a5a5a;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        
        .daily-target {
            color: #5a5a5a;
            font-size: 0.95rem;
        }
        
        @media (max-width: 1024px) {
            .summary-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            
            .main-content {
                margin-left: 200px;
                padding: 1rem;
            }
            
            .summary-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="{{ url('/admin/produk') }}" class="active">Dashboard</a></li>
                <li><a href="{{ url('/admin/produk') }}">Produk</a></li>
                <li><a href="{{ url('/admin/pesanan') }}">Pesanan</a></li>
                <li><a href="{{ url('/admin/pembayaran') }}">Pembayaran</a></li>
                <li><a href="{{ url('/admin/stok-bahan') }}">Stok Bahan</a></li>
                <li><a href="{{ url('/admin/pelanggan') }}">Pelanggan</a></li>
                <li><a href="{{ url('/admin/pengiriman') }}">Pengiriman</a></li>
                <li><a href="{{ url('/admin/promo') }}">Promo</a></li>
                <li><a href="{{ url('/admin/laporan') }}">Laporan</a></li>
                <li><a href="{{ url('/admin/pengaturan') }}">Pengaturan</a></li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <div class="dashboard-header">
                <div class="header-logo">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Debora Craft Logo">
                    <span class="header-logo-text">Debora Craft</span>
                </div>
                <div class="header-right">
                    <a href="#" class="header-link">Admin</a>
                    <a href="{{ url('/logout') }}" class="header-link">Logout</a>
                </div>
            </div>
            
            <!-- Summary Section -->
            <div class="summary-section">
                <div class="section-header">
                    <h2 class="section-title">Ringkasan</h2>
                    <div class="section-controls">
                        <input type="text" class="search-input" placeholder="Cari">
                        <button class="filter-btn">30 Hari</button>
                    </div>
                </div>
                <div class="summary-cards">
                    <div class="summary-card">
                        <div class="card-title">Total Revenue</div>
                        <div class="card-value">Rp 0</div>
                    </div>
                    <div class="summary-card">
                        <div class="card-title">Total Order</div>
                        <div class="card-value">0</div>
                    </div>
                    <div class="summary-card">
                        <div class="card-title">Total Customer</div>
                        <div class="card-value">0</div>
                    </div>
                    <div class="summary-card">
                        <div class="card-title">Pending Delivery</div>
                        <div class="card-value">0</div>
                    </div>
                </div>
            </div>
            
            <!-- Sales Analytic Section -->
            <div class="sales-section">
                <div class="sales-header">
                    <h2 class="section-title">Sales Analytic</h2>
                    <span class="month-indicator">Jul</span>
                </div>
                <div class="chart-placeholder">
                    Grafik penjualan
                </div>
            </div>
            
            <!-- Sales Target Section -->
            <div class="target-section">
                <div class="target-header">
                    <h2 class="section-title">Sales Target</h2>
                </div>
                <div class="target-placeholder">
                    Target
                </div>
                <div class="daily-target">
                    Daily Target: 0
                </div>
            </div>
        </main>
    </div>
</body>
</html>


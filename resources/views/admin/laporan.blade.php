<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan - Debora Craft</title>
    
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
        
        /* Report Section */
        .report-section {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        
        .section-header {
            margin-bottom: 2rem;
        }
        
        .section-title {
            font-family: 'Cotoris', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .section-subtitle {
            color: #5a5a5a;
            font-size: 1rem;
        }
        
        .section-controls {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .filter-select {
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
            background: #ffffff;
            cursor: pointer;
        }
        
        .btn-export {
            padding: 0.75rem 1.5rem;
            background: #2d2d2d;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-export:hover {
            background: #1a1a1a;
        }
        
        /* Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #5a5a5a;
            margin-bottom: 0.5rem;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        /* Report Table */
        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        
        .report-table thead {
            background: #f9f9f9;
        }
        
        .report-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #2d2d2d;
            border-bottom: 2px solid #e0e0e0;
            font-size: 0.9rem;
        }
        
        .report-table td {
            padding: 1rem;
            border-bottom: 1px solid #e0e0e0;
            font-size: 0.9rem;
        }
        
        .report-table tbody tr:hover {
            background: #f9f9f9;
        }
        
        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
        }
        
        .product-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .product-name {
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-center {
            text-align: center;
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .badge-success {
            background: #d4edda;
            color: #155724;
        }
        
        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }
        
        .badge-info {
            background: #cfe2ff;
            color: #084298;
        }
        
        .period-tabs {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .period-tab {
            padding: 0.75rem 1.5rem;
            background: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            font-size: 0.95rem;
            color: #5a5a5a;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Cotoris', sans-serif;
        }
        
        .period-tab:hover {
            color: #2d2d2d;
        }
        
        .period-tab.active {
            color: #2d2d2d;
            border-bottom-color: #e91e63;
            font-weight: 600;
        }
        
        .summary-section {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 2rem;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .summary-row:last-child {
            border-bottom: none;
            font-weight: 600;
            font-size: 1.1rem;
            padding-top: 1rem;
            margin-top: 0.5rem;
            border-top: 2px solid #2d2d2d;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #5a5a5a;
        }
        
        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .empty-state-text {
            font-size: 1.1rem;
        }
        
        @media (max-width: 1024px) {
            .stats-cards {
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
            
            .section-controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .report-table {
                font-size: 0.85rem;
            }
            
            .report-table th,
            .report-table td {
                padding: 0.75rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="{{ url('/admin/produk') }}">Dashboard</a></li>
                <li><a href="{{ url('/admin/produk') }}">Produk</a></li>
                <li><a href="{{ url('/admin/pesanan') }}">Pesanan</a></li>
                <li><a href="{{ url('/admin/pembayaran') }}">Pembayaran</a></li>
                <li><a href="{{ url('/admin/stok-bahan') }}">Stok Bahan</a></li>
                <li><a href="{{ url('/admin/pelanggan') }}">Pelanggan</a></li>
                <li><a href="{{ url('/admin/pengiriman') }}">Pengiriman</a></li>
                <li><a href="{{ url('/admin/promo') }}">Promo</a></li>
                <li><a href="{{ url('/admin/laporan') }}" class="active">Laporan</a></li>
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
            
            <!-- Report Section -->
            <div class="report-section">
                <div class="section-header">
                    <h1 class="section-title">Laporan Penjualan</h1>
                    <p class="section-subtitle">Rekap produk terjual berdasarkan periode</p>
                </div>
                
                @php
                    $selectedPeriod = request()->get('period', 'today');
                    $selectedMonth = request()->get('month', date('Y-m'));
                    $selectedYear = request()->get('year', date('Y'));
                    
                    // Rekap Hari Ini
                    $todayStart = now()->startOfDay();
                    $todayEnd = now()->endOfDay();
                    $todayOrders = \App\Models\Order::whereBetween('created_at', [$todayStart, $todayEnd])
                        ->whereIn('status', ['new', 'processing', 'shipped', 'delivered'])
                        ->with('orderItems.product')
                        ->get();
                    
                    $todayTotalRevenue = $todayOrders->sum('total_amount');
                    $todayTotalOrders = $todayOrders->count();
                    $todayTotalItems = $todayOrders->sum(function($order) {
                        return $order->orderItems->sum('quantity');
                    });
                    $todayTotalProducts = $todayOrders->flatMap(function($order) {
                        return $order->orderItems;
                    })->unique('product_id')->count();
                    
                    // Rekap Per Bulan
                    $monthStart = \Carbon\Carbon::parse($selectedMonth)->startOfMonth();
                    $monthEnd = \Carbon\Carbon::parse($selectedMonth)->endOfMonth();
                    $monthOrders = \App\Models\Order::whereBetween('created_at', [$monthStart, $monthEnd])
                        ->whereIn('status', ['new', 'processing', 'shipped', 'delivered'])
                        ->with('orderItems.product')
                        ->get();
                    
                    $monthTotalRevenue = $monthOrders->sum('total_amount');
                    $monthTotalOrders = $monthOrders->count();
                    $monthTotalItems = $monthOrders->sum(function($order) {
                        return $order->orderItems->sum('quantity');
                    });
                    
                    // Rekap Per Tahun
                    $yearStart = \Carbon\Carbon::create($selectedYear, 1, 1)->startOfYear();
                    $yearEnd = \Carbon\Carbon::create($selectedYear, 12, 31)->endOfYear();
                    $yearOrders = \App\Models\Order::whereBetween('created_at', [$yearStart, $yearEnd])
                        ->whereIn('status', ['new', 'processing', 'shipped', 'delivered'])
                        ->with('orderItems.product')
                        ->get();
                    
                    $yearTotalRevenue = $yearOrders->sum('total_amount');
                    $yearTotalOrders = $yearOrders->count();
                    $yearTotalItems = $yearOrders->sum(function($order) {
                        return $order->orderItems->sum('quantity');
                    });
                    
                    // Produk Terjual Hari Ini
                    $todayProducts = [];
                    foreach ($todayOrders as $order) {
                        foreach ($order->orderItems as $item) {
                            $productId = $item->product_id;
                            if (!isset($todayProducts[$productId])) {
                                $todayProducts[$productId] = [
                                    'product' => $item->product,
                                    'quantity' => 0,
                                    'revenue' => 0,
                                ];
                            }
                            $todayProducts[$productId]['quantity'] += $item->quantity;
                            $todayProducts[$productId]['revenue'] += $item->subtotal;
                        }
                    }
                    usort($todayProducts, function($a, $b) {
                        return $b['quantity'] - $a['quantity'];
                    });
                    
                    // Produk Terjual Per Bulan
                    $monthProducts = [];
                    foreach ($monthOrders as $order) {
                        foreach ($order->orderItems as $item) {
                            $productId = $item->product_id;
                            if (!isset($monthProducts[$productId])) {
                                $monthProducts[$productId] = [
                                    'product' => $item->product,
                                    'quantity' => 0,
                                    'revenue' => 0,
                                ];
                            }
                            $monthProducts[$productId]['quantity'] += $item->quantity;
                            $monthProducts[$productId]['revenue'] += $item->subtotal;
                        }
                    }
                    usort($monthProducts, function($a, $b) {
                        return $b['quantity'] - $a['quantity'];
                    });
                    
                    // Produk Terjual Per Tahun
                    $yearProducts = [];
                    foreach ($yearOrders as $order) {
                        foreach ($order->orderItems as $item) {
                            $productId = $item->product_id;
                            if (!isset($yearProducts[$productId])) {
                                $yearProducts[$productId] = [
                                    'product' => $item->product,
                                    'quantity' => 0,
                                    'revenue' => 0,
                                ];
                            }
                            $yearProducts[$productId]['quantity'] += $item->quantity;
                            $yearProducts[$productId]['revenue'] += $item->subtotal;
                        }
                    }
                    usort($yearProducts, function($a, $b) {
                        return $b['quantity'] - $a['quantity'];
                    });
                @endphp
                
                <!-- Period Tabs -->
                <div class="period-tabs">
                    <button class="period-tab {{ $selectedPeriod == 'today' ? 'active' : '' }}" onclick="window.location.href='{{ url('/admin/laporan?period=today') }}'">
                        Hari Ini
                    </button>
                    <button class="period-tab {{ $selectedPeriod == 'month' ? 'active' : '' }}" onclick="window.location.href='{{ url('/admin/laporan?period=month&month=' . $selectedMonth) }}'">
                        Per Bulan
                    </button>
                    <button class="period-tab {{ $selectedPeriod == 'year' ? 'active' : '' }}" onclick="window.location.href='{{ url('/admin/laporan?period=year&year=' . $selectedYear) }}'">
                        Per Tahun
                    </button>
                </div>
                
                @if($selectedPeriod == 'today')
                    <!-- Today Stats -->
                    <div class="stats-cards">
                        <div class="stat-card">
                            <div class="stat-label">Total Pendapatan</div>
                            <div class="stat-value">Rp {{ number_format($todayTotalRevenue, 0, ',', '.') }}</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Total Pesanan</div>
                            <div class="stat-value">{{ $todayTotalOrders }}</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Total Item Terjual</div>
                            <div class="stat-value">{{ $todayTotalItems }}</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Jenis Produk Terjual</div>
                            <div class="stat-value">{{ $todayTotalProducts }}</div>
                        </div>
                    </div>
                    
                    <!-- Today Products Table -->
                    <h2 style="margin-top: 2rem; margin-bottom: 1rem; font-size: 1.5rem; font-weight: 600;">Produk Terjual Hari Ini</h2>
                    <table class="report-table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-right">Jumlah Terjual</th>
                                <th class="text-right">Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($todayProducts as $productData)
                                <tr>
                                    <td>
                                        <div class="product-info">
                                            <img src="{{ asset($productData['product']->image ?? 'img/placeholder.jpg') }}" alt="{{ $productData['product']->name }}" class="product-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                                            <div>
                                                <div class="product-name">{{ $productData['product']->name }}</div>
                                                <div style="font-size: 0.85rem; color: #5a5a5a;">SKU: {{ $productData['product']->sku }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $categoryName = match($productData['product']->category) {
                                                'bunga' => 'Bunga',
                                                'aksesoris' => 'Aksesoris',
                                                'gift_set' => 'Gift Set',
                                                default => $productData['product']->category,
                                            };
                                        @endphp
                                        <span class="badge badge-info">{{ $categoryName }}</span>
                                    </td>
                                    <td class="text-right">
                                        <strong>{{ $productData['quantity'] }}</strong> unit
                                    </td>
                                    <td class="text-right">
                                        <strong>Rp {{ number_format($productData['revenue'], 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty-state">
                                        <div class="empty-state-text">Tidak ada produk terjual hari ini</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <div class="summary-section">
                        <div class="summary-row">
                            <span>Total Produk Terjual:</span>
                            <strong>{{ count($todayProducts) }} jenis produk</strong>
                        </div>
                        <div class="summary-row">
                            <span>Total Unit Terjual:</span>
                            <strong>{{ $todayTotalItems }} unit</strong>
                        </div>
                        <div class="summary-row">
                            <span>Total Pendapatan:</span>
                            <strong>Rp {{ number_format($todayTotalRevenue, 0, ',', '.') }}</strong>
                        </div>
                    </div>
                    
                @elseif($selectedPeriod == 'month')
                    <!-- Month Stats -->
                    <div class="section-controls">
                        <input type="month" class="filter-select" id="monthFilter" value="{{ $selectedMonth }}" onchange="window.location.href='{{ url('/admin/laporan?period=month&month=') }}' + this.value">
                    </div>
                    
                    <div class="stats-cards">
                        <div class="stat-card">
                            <div class="stat-label">Total Pendapatan</div>
                            <div class="stat-value">Rp {{ number_format($monthTotalRevenue, 0, ',', '.') }}</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Total Pesanan</div>
                            <div class="stat-value">{{ $monthTotalOrders }}</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Total Item Terjual</div>
                            <div class="stat-value">{{ $monthTotalItems }}</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Jenis Produk Terjual</div>
                            <div class="stat-value">{{ count($monthProducts) }}</div>
                        </div>
                    </div>
                    
                    <!-- Month Products Table -->
                    <h2 style="margin-top: 2rem; margin-bottom: 1rem; font-size: 1.5rem; font-weight: 600;">Produk Terjual Bulan {{ \Carbon\Carbon::parse($selectedMonth)->format('F Y') }}</h2>
                    <table class="report-table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-right">Jumlah Terjual</th>
                                <th class="text-right">Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($monthProducts as $productData)
                                <tr>
                                    <td>
                                        <div class="product-info">
                                            <img src="{{ asset($productData['product']->image ?? 'img/placeholder.jpg') }}" alt="{{ $productData['product']->name }}" class="product-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                                            <div>
                                                <div class="product-name">{{ $productData['product']->name }}</div>
                                                <div style="font-size: 0.85rem; color: #5a5a5a;">SKU: {{ $productData['product']->sku }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $categoryName = match($productData['product']->category) {
                                                'bunga' => 'Bunga',
                                                'aksesoris' => 'Aksesoris',
                                                'gift_set' => 'Gift Set',
                                                default => $productData['product']->category,
                                            };
                                        @endphp
                                        <span class="badge badge-info">{{ $categoryName }}</span>
                                    </td>
                                    <td class="text-right">
                                        <strong>{{ $productData['quantity'] }}</strong> unit
                                    </td>
                                    <td class="text-right">
                                        <strong>Rp {{ number_format($productData['revenue'], 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty-state">
                                        <div class="empty-state-text">Tidak ada produk terjual pada bulan ini</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <div class="summary-section">
                        <div class="summary-row">
                            <span>Total Produk Terjual:</span>
                            <strong>{{ count($monthProducts) }} jenis produk</strong>
                        </div>
                        <div class="summary-row">
                            <span>Total Unit Terjual:</span>
                            <strong>{{ $monthTotalItems }} unit</strong>
                        </div>
                        <div class="summary-row">
                            <span>Total Pendapatan:</span>
                            <strong>Rp {{ number_format($monthTotalRevenue, 0, ',', '.') }}</strong>
                        </div>
                    </div>
                    
                @elseif($selectedPeriod == 'year')
                    <!-- Year Stats -->
                    <div class="section-controls">
                        <select class="filter-select" id="yearFilter" onchange="window.location.href='{{ url('/admin/laporan?period=year&year=') }}' + this.value">
                            @for($y = date('Y'); $y >= date('Y') - 5; $y--)
                                <option value="{{ $y }}" {{ $selectedYear == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                    
                    <div class="stats-cards">
                        <div class="stat-card">
                            <div class="stat-label">Total Pendapatan</div>
                            <div class="stat-value">Rp {{ number_format($yearTotalRevenue, 0, ',', '.') }}</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Total Pesanan</div>
                            <div class="stat-value">{{ $yearTotalOrders }}</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Total Item Terjual</div>
                            <div class="stat-value">{{ $yearTotalItems }}</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Jenis Produk Terjual</div>
                            <div class="stat-value">{{ count($yearProducts) }}</div>
                        </div>
                    </div>
                    
                    <!-- Year Products Table -->
                    <h2 style="margin-top: 2rem; margin-bottom: 1rem; font-size: 1.5rem; font-weight: 600;">Produk Terjual Tahun {{ $selectedYear }}</h2>
                    <table class="report-table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-right">Jumlah Terjual</th>
                                <th class="text-right">Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($yearProducts as $productData)
                                <tr>
                                    <td>
                                        <div class="product-info">
                                            <img src="{{ asset($productData['product']->image ?? 'img/placeholder.jpg') }}" alt="{{ $productData['product']->name }}" class="product-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                                            <div>
                                                <div class="product-name">{{ $productData['product']->name }}</div>
                                                <div style="font-size: 0.85rem; color: #5a5a5a;">SKU: {{ $productData['product']->sku }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $categoryName = match($productData['product']->category) {
                                                'bunga' => 'Bunga',
                                                'aksesoris' => 'Aksesoris',
                                                'gift_set' => 'Gift Set',
                                                default => $productData['product']->category,
                                            };
                                        @endphp
                                        <span class="badge badge-info">{{ $categoryName }}</span>
                                    </td>
                                    <td class="text-right">
                                        <strong>{{ $productData['quantity'] }}</strong> unit
                                    </td>
                                    <td class="text-right">
                                        <strong>Rp {{ number_format($productData['revenue'], 0, ',', '.') }}</strong>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty-state">
                                        <div class="empty-state-text">Tidak ada produk terjual pada tahun ini</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <div class="summary-section">
                        <div class="summary-row">
                            <span>Total Produk Terjual:</span>
                            <strong>{{ count($yearProducts) }} jenis produk</strong>
                        </div>
                        <div class="summary-row">
                            <span>Total Unit Terjual:</span>
                            <strong>{{ $yearTotalItems }} unit</strong>
                        </div>
                        <div class="summary-row">
                            <span>Total Pendapatan:</span>
                            <strong>Rp {{ number_format($yearTotalRevenue, 0, ',', '.') }}</strong>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>


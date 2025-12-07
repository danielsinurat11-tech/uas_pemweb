<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Produk - Debora Craft</title>
    
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
        
        /* Product Management Section */
        .product-section {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
        }
        
        .product-header {
            margin-bottom: 2rem;
        }
        
        .product-title {
            font-family: 'Cotoris', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .product-subtitle {
            color: #5a5a5a;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .product-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }
        
        .btn-manage {
            padding: 0.75rem 1.5rem;
            background: #2d2d2d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-manage:hover {
            background: #1a1a1a;
        }
        
        .btn-add {
            padding: 0.75rem 1.5rem;
            background: #2d2d2d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-add:hover {
            background: #1a1a1a;
        }
        
        /* Filter Section */
        .filter-section {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        
        .filter-row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            gap: 1rem;
            align-items: end;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
        }
        
        .filter-label {
            font-size: 0.9rem;
            color: #5a5a5a;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .filter-input,
        .filter-select {
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.95rem;
            width: 100%;
        }
        
        .filter-input:focus,
        .filter-select:focus {
            outline: none;
            border-color: #2d2d2d;
        }
        
        .btn-filter {
            padding: 0.75rem 1.5rem;
            background: #2d2d2d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }
        
        .btn-filter:hover {
            background: #1a1a1a;
        }
        
        /* Statistics Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
        }
        
        .stat-title {
            font-size: 0.9rem;
            color: #5a5a5a;
            margin-bottom: 0.5rem;
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .stat-value.green {
            color: #22c55e;
        }
        
        .stat-value.red {
            color: #ef4444;
        }
        
        .stat-value.orange {
            color: #f97316;
        }
        
        /* Product Table */
        .table-section {
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .table-title {
            font-family: 'Cotoris', serif;
            font-size: 1.3rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .product-table thead {
            background: #f9f9f9;
        }
        
        .product-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #2d2d2d;
            font-size: 0.9rem;
            text-transform: uppercase;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .product-table td {
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
            color: #2d2d2d;
        }
        
        .product-table tbody tr:hover {
            background: #f9f9f9;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-active {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-action {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-edit {
            background: #f3f4f6;
            color: #2d2d2d;
        }
        
        .btn-edit:hover {
            background: #e5e7eb;
        }
        
        .btn-delete {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .btn-delete:hover {
            background: #fecaca;
        }
        
        .action-buttons form {
            display: inline;
        }
        
        .empty-table {
            padding: 3rem;
            text-align: center;
            color: #5a5a5a;
        }
        
        @media (max-width: 1024px) {
            .filter-row {
                grid-template-columns: 1fr;
            }
            
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
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .product-table {
                font-size: 0.85rem;
            }
            
            .product-table th,
            .product-table td {
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
                <li><a href="{{ url('/admin/produk') }}" class="active">Produk</a></li>
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
                    <a href="{{ route('logout') }}" class="header-link">Logout</a>
                </div>
            </div>
            
            <!-- Product Management Section -->
            <div class="product-section">
                <div class="product-header">
                    <h1 class="product-title">Manajemen Produk</h1>
                    <p class="product-subtitle">Kelola produk bunga dan aksesoris toko Anda</p>
                    <div class="product-actions">
                        <a href="#" class="btn-manage">Kelola Kategori</a>
                        <a href="{{ route('admin.produk.tambah') }}" class="btn-add">+ Tambah Produk Baru</a>
                    </div>
                </div>
                
                @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                </div>
                @endif
                
                <!-- Filter Section -->
                <div class="filter-section">
                    <form method="GET" action="{{ route('admin.produk') }}" id="filterForm">
                        <div class="filter-row">
                            <div class="filter-group">
                                <label class="filter-label" for="search">Cari Produk</label>
                                <input type="text" id="search" name="search" class="filter-input" placeholder="Nama produk..." value="{{ request()->get('search') }}">
                            </div>
                            <div class="filter-group">
                                <label class="filter-label" for="category">Kategori</label>
                                <select id="category" name="category" class="filter-select" onchange="document.getElementById('filterForm').submit();">
                                    <option value="">Semua Kategori</option>
                                    <option value="bunga" {{ request()->get('category') == 'bunga' ? 'selected' : '' }}>Bunga</option>
                                    <option value="aksesoris" {{ request()->get('category') == 'aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                    <option value="gift_set" {{ request()->get('category') == 'gift_set' ? 'selected' : '' }}>Gift Set</option>
                                </select>
                            </div>
                            <div class="filter-group">
                                <label class="filter-label" for="status">Status</label>
                                <select id="status" name="status" class="filter-select" onchange="document.getElementById('filterForm').submit();">
                                    <option value="">Semua Status</option>
                                    <option value="1" {{ request()->get('status') == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ request()->get('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-filter">Filter</button>
                        </div>
                    </form>
                </div>
                
                <!-- Statistics Cards -->
                <div class="stats-cards">
                    @php
                        $totalProducts = \App\Models\Product::count();
                        $activeProducts = \App\Models\Product::where('is_active', true)->count();
                        $outOfStock = \App\Models\Product::where('stock', 0)->count();
                        $lowStock = \App\Models\Product::where('stock', '>', 0)->where('stock', '<=', 10)->count();
                    @endphp
                    <div class="stat-card">
                        <div class="stat-title">Total Produk</div>
                        <div class="stat-value">{{ $totalProducts }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Produk Aktif</div>
                        <div class="stat-value green">{{ $activeProducts }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Stok Habis</div>
                        <div class="stat-value red">{{ $outOfStock }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Stok Rendah</div>
                        <div class="stat-value orange">{{ $lowStock }}</div>
                    </div>
                </div>
                
                <!-- Product Table -->
                <div class="table-section">
                    <div class="table-header">
                        <h2 class="table-title">Daftar Produk</h2>
                    </div>
                    <table class="product-table">
                        <thead>
                            <tr>
                                <th>PRODUK</th>
                                <th>KATEGORI</th>
                                <th>HARGA</th>
                                <th>STOK</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $query = \App\Models\Product::query();
                                
                                // Filter by category
                                if (request()->has('category') && request()->get('category') != '') {
                                    $query->where('category', request()->get('category'));
                                }
                                
                                // Filter by status
                                if (request()->has('status') && request()->get('status') != '') {
                                    $query->where('is_active', request()->get('status'));
                                }
                                
                                // Filter by search
                                if (request()->has('search') && request()->get('search') != '') {
                                    $search = request()->get('search');
                                    $query->where('name', 'like', '%' . $search . '%');
                                }
                                
                                $products = $query->latest()->get();
                            @endphp
                            @forelse($products as $product)
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 1rem;">
                                            @if($product->image)
                                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px; border: 1px solid #e0e0e0;">
                                            @else
                                                <div style="width: 60px; height: 60px; background: #f3f4f6; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #9ca3af; font-size: 0.75rem;">No Image</div>
                                            @endif
                                            <div>
                                                <div style="font-weight: 500;">{{ $product->name }}</div>
                                                @if($product->description)
                                                    <div style="font-size: 0.85rem; color: #5a5a5a; margin-top: 0.25rem;">
                                                        {{ Str::limit($product->description, 50) }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($product->category == 'bunga')
                                            Bunga
                                        @elseif($product->category == 'aksesoris')
                                            Aksesoris
                                        @elseif($product->category == 'gift_set')
                                            Gift Set
                                        @else
                                            {{ $product->category }}
                                        @endif
                                    </td>
                                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        @if($product->is_active)
                                            <span class="status-badge status-active">Aktif</span>
                                        @else
                                            <span class="status-badge status-inactive">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.produk.edit', $product->id) }}" class="btn-action btn-edit">Edit</a>
                                            <form action="{{ route('admin.produk.hapus', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty-table" style="text-align: center; padding: 3rem; color: #5a5a5a;">
                                        Belum ada produk. Klik "Tambah Produk Baru" untuk menambahkan produk pertama.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stok Bahan - Debora Craft</title>
    
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
        
        /* Stock Section */
        .stock-section {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
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
        }
        
        .search-input {
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
            width: 300px;
        }
        
        .filter-select {
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
            background: #ffffff;
            cursor: pointer;
        }
        
        /* Category Tabs */
        .category-tabs {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .category-tab {
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
        
        .category-tab:hover {
            color: #2d2d2d;
        }
        
        .category-tab.active {
            color: #2d2d2d;
            border-bottom-color: #e91e63;
            font-weight: 600;
        }
        
        /* Stock Table */
        .stock-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .stock-table thead {
            background: #f9f9f9;
        }
        
        .stock-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #2d2d2d;
            border-bottom: 2px solid #e0e0e0;
            font-size: 0.9rem;
        }
        
        .stock-table td {
            padding: 1rem;
            border-bottom: 1px solid #e0e0e0;
            font-size: 0.9rem;
        }
        
        .stock-table tbody tr:hover {
            background: #f9f9f9;
        }
        
        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
        }
        
        .product-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .product-details {
            display: flex;
            flex-direction: column;
        }
        
        .product-name {
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 0.25rem;
        }
        
        .product-sku {
            font-size: 0.85rem;
            color: #5a5a5a;
        }
        
        .stock-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .stock-badge.high {
            background: #d4edda;
            color: #155724;
        }
        
        .stock-badge.medium {
            background: #fff3cd;
            color: #856404;
        }
        
        .stock-badge.low {
            background: #f8d7da;
            color: #721c24;
        }
        
        .stock-badge.out {
            background: #f5c6cb;
            color: #721c24;
        }
        
        .category-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            background: #e8e8e8;
            color: #2d2d2d;
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
            
            .search-input {
                width: 100%;
            }
            
            .stock-table {
                font-size: 0.85rem;
            }
            
            .stock-table th,
            .stock-table td {
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
                <li><a href="{{ url('/admin/stok-bahan') }}" class="active">Stok Bahan</a></li>
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
            
            <!-- Stock Section -->
            <div class="stock-section">
                <div class="section-header">
                    <h1 class="section-title">Stok Bahan</h1>
                    <p class="section-subtitle">Kelola stok bahan berdasarkan kategori produk</p>
                </div>
                
                <div class="section-controls">
                    <input type="text" class="search-input" id="searchInput" placeholder="Cari produk...">
                    <select class="filter-select" id="stockFilter">
                        <option value="all">Semua Stok</option>
                        <option value="high">Stok Tinggi (>50)</option>
                        <option value="medium">Stok Sedang (10-50)</option>
                        <option value="low">Stok Rendah (<10)</option>
                        <option value="out">Habis</option>
                    </select>
                </div>
                
                <!-- Category Tabs -->
                <div class="category-tabs">
                    <button class="category-tab active" data-category="all">Semua Kategori</button>
                    <button class="category-tab" data-category="bunga">Bunga</button>
                    <button class="category-tab" data-category="aksesoris">Aksesoris</button>
                    <button class="category-tab" data-category="gift_set">Gift Set</button>
                </div>
                
                <!-- Stock Table -->
                <table class="stock-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>SKU</th>
                            <th>Stok</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="stockTableBody">
                        @php
                            $products = \App\Models\Product::orderBy('category')->orderBy('name')->get();
                        @endphp
                        @forelse($products as $product)
                            @php
                                $stockStatus = 'high';
                                $stockClass = 'high';
                                if ($product->stock == 0) {
                                    $stockStatus = 'Habis';
                                    $stockClass = 'out';
                                } elseif ($product->stock < 10) {
                                    $stockStatus = 'Rendah';
                                    $stockClass = 'low';
                                } elseif ($product->stock <= 50) {
                                    $stockStatus = 'Sedang';
                                    $stockClass = 'medium';
                                } else {
                                    $stockStatus = 'Tinggi';
                                    $stockClass = 'high';
                                }
                                
                                $categoryName = match($product->category) {
                                    'bunga' => 'Bunga',
                                    'aksesoris' => 'Aksesoris',
                                    'gift_set' => 'Gift Set',
                                    default => $product->category,
                                };
                            @endphp
                            <tr data-category="{{ $product->category }}" data-stock="{{ $product->stock }}">
                                <td>
                                    <div class="product-info">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                                        <div class="product-details">
                                            <div class="product-name">{{ $product->name }}</div>
                                            <div class="product-sku">{{ $product->sku }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="category-badge">{{ $categoryName }}</span>
                                </td>
                                <td>{{ $product->sku }}</td>
                                <td>
                                    <strong>{{ $product->stock }}</strong>
                                </td>
                                <td>
                                    <span class="stock-badge {{ $stockClass }}">{{ $stockStatus }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    
                                    <div class="empty-state-text">Tidak ada produk ditemukan</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    
    <script>
        // Category Tab Filter
        document.querySelectorAll('.category-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                document.querySelectorAll('.category-tab').forEach(t => t.classList.remove('active'));
                // Add active class to clicked tab
                this.classList.add('active');
                
                const category = this.dataset.category;
                filterTable();
            });
        });
        
        // Search and Filter
        document.getElementById('searchInput').addEventListener('input', filterTable);
        document.getElementById('stockFilter').addEventListener('change', filterTable);
        
        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const stockFilter = document.getElementById('stockFilter').value;
            const activeCategory = document.querySelector('.category-tab.active').dataset.category;
            
            const rows = document.querySelectorAll('#stockTableBody tr');
            
            rows.forEach(row => {
                if (row.querySelector('.empty-state')) return;
                
                const productName = row.querySelector('.product-name')?.textContent.toLowerCase() || '';
                const productSku = row.querySelector('.product-sku')?.textContent.toLowerCase() || '';
                const category = row.dataset.category || '';
                const stock = parseInt(row.dataset.stock) || 0;
                
                // Category filter
                let categoryMatch = activeCategory === 'all' || category === activeCategory;
                
                // Search filter
                let searchMatch = productName.includes(searchTerm) || productSku.includes(searchTerm);
                
                // Stock filter
                let stockMatch = true;
                if (stockFilter === 'high') {
                    stockMatch = stock > 50;
                } else if (stockFilter === 'medium') {
                    stockMatch = stock >= 10 && stock <= 50;
                } else if (stockFilter === 'low') {
                    stockMatch = stock > 0 && stock < 10;
                } else if (stockFilter === 'out') {
                    stockMatch = stock === 0;
                }
                
                if (categoryMatch && searchMatch && stockMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>


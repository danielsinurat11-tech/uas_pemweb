<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Promo - Debora Craft</title>
    
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
        
        /* Promo Section */
        .promo-section {
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
        
        .promo-form {
            max-width: 800px;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .form-label .required {
            color: #ef4444;
        }
        
        .form-select,
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.95rem;
            font-family: 'Cotoris', sans-serif;
            transition: border-color 0.3s;
        }
        
        .form-select:focus,
        .form-input:focus {
            outline: none;
            border-color: #2d2d2d;
        }
        
        .products-list {
            margin-top: 1rem;
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 1rem;
        }
        
        .product-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .product-item:last-child {
            border-bottom: none;
        }
        
        .product-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .product-item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
        }
        
        .product-item-info {
            flex: 1;
        }
        
        .product-item-name {
            font-weight: 500;
            color: #2d2d2d;
            margin-bottom: 0.25rem;
        }
        
        .product-item-price {
            font-size: 0.9rem;
            color: #5a5a5a;
        }
        
        .product-item-discount {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .discount-input {
            width: 120px;
            padding: 0.5rem;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            font-size: 0.9rem;
        }
        
        .btn-submit {
            padding: 0.75rem 1.5rem;
            background: #2d2d2d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1.5rem;
        }
        
        .btn-submit:hover {
            background: #1a1a1a;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #5a5a5a;
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
                <li><a href="{{ url('/admin/promo') }}" class="active">Promo</a></li>
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
            
            <!-- Promo Section -->
            <div class="promo-section">
                <div class="section-header">
                    <h1 class="section-title">Manajemen Promo & Diskon</h1>
                    <p class="section-subtitle">Berikan promo dan diskon untuk produk pilihan Anda</p>
                </div>
                
                @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                </div>
                @endif
                
                <form class="promo-form" method="POST" action="{{ route('admin.promo.update') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label" for="category">
                            Pilih Kategori <span class="required">*</span>
                        </label>
                        <select id="category" name="category" class="form-select" required onchange="loadProducts()">
                            <option value="">Pilih Kategori</option>
                            <option value="bunga">Bunga</option>
                            <option value="aksesoris">Aksesoris</option>
                            <option value="gift_set">Gift Set</option>
                        </select>
                    </div>
                    
                    <div id="products-container" style="display: none;">
                        <div class="form-group">
                            <label class="form-label">Pilih Produk dan Set Diskon</label>
                            <div class="products-list" id="products-list">
                                <!-- Products will be loaded here -->
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-submit">Simpan Promo</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    
    <script>
        function loadProducts() {
            const category = document.getElementById('category').value;
            const container = document.getElementById('products-container');
            const productsList = document.getElementById('products-list');
            
            if (!category) {
                container.style.display = 'none';
                return;
            }
            
            // Fetch products from server
            fetch(`/admin/promo/products?category=${category}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        productsList.innerHTML = '<div class="empty-state">Tidak ada produk dalam kategori ini</div>';
                        container.style.display = 'block';
                        return;
                    }
                    
                    let html = '';
                    data.forEach(product => {
                        const discountPrice = product.discount_price || product.price;
                        const discount = product.discount_price ? Math.round(((product.price - product.discount_price) / product.price) * 100) : 0;
                        html += `
                            <div class="product-item">
                                <input type="checkbox" name="products[]" value="${product.id}" id="product-${product.id}" onchange="toggleDiscount(${product.id})">
                                <img src="${product.image ? '/' + product.image : '/img/placeholder.jpg'}" alt="${product.name}" class="product-item-image" onerror="this.src='/img/placeholder.jpg'">
                                <div class="product-item-info">
                                    <div class="product-item-name">${product.name}</div>
                                    <div class="product-item-price">
                                        Harga: Rp ${parseInt(product.price).toLocaleString('id-ID')}
                                        ${product.discount_price ? `<span style="color: #ef4444; margin-left: 0.5rem;">Diskon: Rp ${parseInt(product.discount_price).toLocaleString('id-ID')} (${discount}%)</span>` : ''}
                                    </div>
                                </div>
                                <div class="product-item-discount">
                                    <input type="number" name="discounts[${product.id}]" id="discount-${product.id}" class="discount-input" placeholder="Diskon %" min="0" max="100" step="1" disabled onchange="calculateDiscountPrice(${product.id}, ${product.price})">
                                </div>
                            </div>
                        `;
                    });
                    
                    productsList.innerHTML = html;
                    container.style.display = 'block';
                })
                .catch(error => {
                    console.error('Error:', error);
                    productsList.innerHTML = '<div class="empty-state">Error memuat produk</div>';
                });
        }
        
        function toggleDiscount(productId) {
            const checkbox = document.getElementById(`product-${productId}`);
            const discountInput = document.getElementById(`discount-${productId}`);
            discountInput.disabled = !checkbox.checked;
            if (!checkbox.checked) {
                discountInput.value = '';
            }
        }
        
        function calculateDiscountPrice(productId, originalPrice) {
            const discountInput = document.getElementById(`discount-${productId}`);
            const discount = parseFloat(discountInput.value) || 0;
            const discountPrice = originalPrice - (originalPrice * discount / 100);
            // You can display this if needed
        }
    </script>
</body>
</html>


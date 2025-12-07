<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Produk - Debora Craft</title>
    
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
        
        /* Form Section */
        .form-section {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
        }
        
        .form-header {
            margin-bottom: 2rem;
        }
        
        .form-title {
            font-family: 'Cotoris', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .form-subtitle {
            color: #5a5a5a;
            font-size: 1rem;
        }
        
        .product-form {
            max-width: 800px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        .form-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .form-label .required {
            color: #ef4444;
        }
        
        .form-input,
        .form-select,
        .form-textarea {
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.95rem;
            font-family: 'Cotoris', sans-serif;
            transition: border-color 0.3s;
        }
        
        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #2d2d2d;
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .form-checkbox {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .file-upload-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .file-upload {
            padding: 1rem;
            border: 2px dashed #e0e0e0;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-upload:hover {
            border-color: #2d2d2d;
            background: #f9f9f9;
        }
        
        .file-upload input[type="file"] {
            display: none;
        }
        
        .file-upload-label {
            color: #5a5a5a;
            font-size: 0.9rem;
            cursor: pointer;
        }
        
        .file-preview {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #5a5a5a;
        }
        
        .file-preview img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            margin-top: 0.5rem;
            border: 1px solid #e0e0e0;
        }
        
        .current-image {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #5a5a5a;
        }
        
        .current-image img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            margin-top: 0.5rem;
            border: 1px solid #e0e0e0;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e0e0e0;
        }
        
        .btn-cancel {
            padding: 0.75rem 1.5rem;
            background: #f5f5f5;
            color: #2d2d2d;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-cancel:hover {
            background: #e8e8e8;
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
        }
        
        .btn-submit:hover {
            background: #1a1a1a;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            
            .main-content {
                margin-left: 200px;
                padding: 1rem;
            }
            
            .form-row {
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
            
            <!-- Form Section -->
            <div class="form-section">
                <div class="form-header">
                    <h1 class="form-title">Edit Produk</h1>
                    <p class="form-subtitle">Ubah informasi produk di bawah ini</p>
                </div>
                
                <form class="product-form" method="POST" action="{{ route('admin.produk.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    @if ($errors->any())
                        <div style="background: #fee; color: #c33; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem;">
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <!-- Nama Produk -->
                    <div class="form-group full-width">
                        <label class="form-label" for="name">
                            Nama Produk <span class="required">*</span>
                        </label>
                        <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $product->name) }}" required>
                    </div>
                    
                    <!-- Kategori dan Harga -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="category">
                                Kategori <span class="required">*</span>
                            </label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="">Pilih Kategori</option>
                                <option value="bunga" {{ old('category', $product->category) == 'bunga' ? 'selected' : '' }}>Bunga</option>
                                <option value="aksesoris" {{ old('category', $product->category) == 'aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                <option value="gift_set" {{ old('category', $product->category) == 'gift_set' ? 'selected' : '' }}>Gift Set</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="price">
                                Harga <span class="required">*</span>
                            </label>
                            <input type="number" id="price" name="price" class="form-input" value="{{ old('price', $product->price) }}" min="0" step="0.01" required>
                        </div>
                    </div>
                    
                    <!-- Jumlah Produk dan Warna -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="stock">
                                Jumlah Produk (Stok) <span class="required">*</span>
                            </label>
                            <input type="number" id="stock" name="stock" class="form-input" value="{{ old('stock', $product->stock) }}" min="0" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="color">
                                Warna
                            </label>
                            <input type="text" id="color" name="color" class="form-input" value="{{ old('color', $product->color) }}" placeholder="Contoh: Merah, Pink, Putih">
                        </div>
                    </div>
                    
                    <!-- Kota dan Tipe -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="city">
                                Kota
                            </label>
                            <input type="text" id="city" name="city" class="form-input" value="{{ old('city', $product->city) }}" placeholder="Contoh: Kota Bandung">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="type">
                                Tipe <span class="required">*</span>
                            </label>
                            <select id="type" name="type" class="form-select" required>
                                <option value="standart" {{ old('type', $product->type ?? 'standart') == 'standart' ? 'selected' : '' }}>Standart</option>
                                <option value="premium" {{ old('type', $product->type ?? 'standart') == 'premium' ? 'selected' : '' }}>Premium</option>
                                <option value="exclusive" {{ old('type', $product->type ?? 'standart') == 'exclusive' ? 'selected' : '' }}>Exclusive</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Status Aktif -->
                    <div class="form-group full-width">
                        <label class="form-checkbox">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                            <span>Produk Aktif</span>
                        </label>
                    </div>
                    
                    <!-- Deskripsi -->
                    <div class="form-group full-width">
                        <label class="form-label" for="description">
                            Deskripsi Produk
                        </label>
                        <textarea id="description" name="description" class="form-textarea" rows="4">{{ old('description', $product->description) }}</textarea>
                    </div>
                    
                    <!-- Deskripsi Bahan -->
                    <div class="form-group full-width">
                        <label class="form-label" for="material_description">
                            Deskripsi Bahan
                        </label>
                        <textarea id="material_description" name="material_description" class="form-textarea" rows="4" placeholder="Jelaskan bahan-bahan yang digunakan dalam produk">{{ old('material_description', $product->material_description) }}</textarea>
                    </div>
                    
                    <!-- Upload Gambar -->
                    <div class="form-group full-width">
                        <label class="form-label">
                            Gambar Produk
                        </label>
                        <div class="file-upload-group">
                            <div class="file-upload">
                                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this, 'preview1')">
                                <label for="image" class="file-upload-label">
                                    Gambar Utama
                                </label>
                                @if($product->image)
                                    <div class="current-image">
                                        <div>Gambar saat ini:</div>
                                        <img src="{{ asset($product->image) }}" alt="Current Image">
                                    </div>
                                @endif
                                <div id="preview1" class="file-preview"></div>
                            </div>
                            
                            <div class="file-upload">
                                <input type="file" id="image_2" name="image_2" accept="image/*" onchange="previewImage(this, 'preview2')">
                                <label for="image_2" class="file-upload-label">
                                    Gambar Kedua
                                </label>
                                @if($product->image_2)
                                    <div class="current-image">
                                        <div>Gambar saat ini:</div>
                                        <img src="{{ asset($product->image_2) }}" alt="Current Image 2">
                                    </div>
                                @endif
                                <div id="preview2" class="file-preview"></div>
                            </div>
                            
                            <div class="file-upload">
                                <input type="file" id="image_3" name="image_3" accept="image/*" onchange="previewImage(this, 'preview3')">
                                <label for="image_3" class="file-upload-label">
                                    Gambar Ketiga
                                </label>
                                @if($product->image_3)
                                    <div class="current-image">
                                        <div>Gambar saat ini:</div>
                                        <img src="{{ asset($product->image_3) }}" alt="Current Image 3">
                                    </div>
                                @endif
                                <div id="preview3" class="file-preview"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="form-actions">
                        <a href="{{ route('admin.produk') }}" class="btn-cancel">Batal</a>
                        <button type="submit" class="btn-submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    
    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = '<div style="margin-top: 0.5rem; font-size: 0.85rem; color: #5a5a5a;">Gambar baru:</div><img src="' + e.target.result + '" style="max-width: 200px; max-height: 200px; border-radius: 8px; margin-top: 0.5rem; border: 1px solid #e0e0e0;">';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.innerHTML = '';
            }
        }
    </script>
</body>
</html>


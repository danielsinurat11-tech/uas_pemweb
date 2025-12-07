<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengaturan Footer - Debora Craft</title>
    
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
        
        /* Settings Section */
        .settings-section {
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
        
        .footer-columns {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-column-card {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }
        
        .column-title {
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }
        
        .footer-items {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .footer-item {
            background: white;
            padding: 1rem;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .footer-item-info {
            flex: 1;
        }
        
        .footer-item-title {
            font-weight: 500;
            color: #2d2d2d;
            margin-bottom: 0.25rem;
        }
        
        .footer-item-content {
            font-size: 0.85rem;
            color: #5a5a5a;
        }
        
        .footer-item-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-edit,
        .btn-delete {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
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
        
        .btn-add-item {
            padding: 0.75rem 1.5rem;
            background: #2d2d2d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
        }
        
        .btn-add-item:hover {
            background: #1a1a1a;
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #5a5a5a;
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }
        
        .modal.show {
            display: flex;
        }
        
        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .modal-title {
            font-family: 'Cotoris', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #5a5a5a;
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
        
        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.95rem;
            font-family: 'Cotoris', sans-serif;
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
        
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
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
        }
        
        @media (max-width: 1200px) {
            .footer-columns {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .footer-columns {
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
                <li><a href="{{ url('/admin/produk') }}">Produk</a></li>
                <li><a href="{{ url('/admin/pesanan') }}">Pesanan</a></li>
                <li><a href="{{ url('/admin/pembayaran') }}">Pembayaran</a></li>
                <li><a href="{{ url('/admin/stok-bahan') }}">Stok Bahan</a></li>
                <li><a href="{{ url('/admin/pelanggan') }}">Pelanggan</a></li>
                <li><a href="{{ url('/admin/pengiriman') }}">Pengiriman</a></li>
                <li><a href="{{ url('/admin/promo') }}">Promo</a></li>
                <li><a href="{{ url('/admin/laporan') }}">Laporan</a></li>
                <li><a href="{{ url('/admin/pengaturan') }}" class="active">Pengaturan</a></li>
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
            
            <!-- Settings Section -->
            <div class="settings-section">
                <div class="section-header">
                    <h1 class="section-title">Pengaturan Footer</h1>
                    <p class="section-subtitle">Kelola konten footer website Anda</p>
                </div>
                
                @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 6px; margin-bottom: 1.5rem; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                </div>
                @endif
                
                <div class="footer-columns">
                    <!-- Column 1: Debora Craft -->
                    <div class="footer-column-card">
                        <div class="column-title">Kolom 1: Debora Craft</div>
                        @php
                            $col1Items = \App\Models\FooterContent::where('column', 'column_1')
                                ->where('is_active', true)
                                ->orderBy('order')
                                ->get();
                        @endphp
                        <div class="footer-items">
                            @forelse($col1Items as $item)
                                <div class="footer-item">
                                    <div class="footer-item-info">
                                        @if($item->type == 'title')
                                            <div class="footer-item-title">{{ $item->title }}</div>
                                        @elseif($item->type == 'description')
                                            <div class="footer-item-content">{{ Str::limit($item->content, 50) }}</div>
                                        @endif
                                    </div>
                                    <div class="footer-item-actions">
                                        <button class="btn-edit" onclick="editFooterItem({{ $item->id }})">Edit</button>
                                        <form action="{{ route('admin.footer.delete', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus item ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state">Belum ada konten</div>
                            @endforelse
                        </div>
                        <button class="btn-add-item" onclick="openAddModal('column_1')">+ Tambah Item</button>
                    </div>
                    
                    <!-- Column 2: Produk -->
                    <div class="footer-column-card">
                        <div class="column-title">Kolom 2: Produk</div>
                        @php
                            $col2Items = \App\Models\FooterContent::where('column', 'column_2')
                                ->where('is_active', true)
                                ->orderBy('order')
                                ->get();
                        @endphp
                        <div class="footer-items">
                            @forelse($col2Items as $item)
                                <div class="footer-item">
                                    <div class="footer-item-info">
                                        @if($item->type == 'title')
                                            <div class="footer-item-title">{{ $item->title }}</div>
                                        @elseif($item->type == 'list_item')
                                            <div class="footer-item-content">{{ $item->content }}</div>
                                        @endif
                                    </div>
                                    <div class="footer-item-actions">
                                        <button class="btn-edit" onclick="editFooterItem({{ $item->id }})">Edit</button>
                                        <form action="{{ route('admin.footer.delete', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus item ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state">Belum ada konten</div>
                            @endforelse
                        </div>
                        <button class="btn-add-item" onclick="openAddModal('column_2')">+ Tambah Item</button>
                    </div>
                    
                    <!-- Column 3: Layanan -->
                    <div class="footer-column-card">
                        <div class="column-title">Kolom 3: Layanan</div>
                        @php
                            $col3Items = \App\Models\FooterContent::where('column', 'column_3')
                                ->where('is_active', true)
                                ->orderBy('order')
                                ->get();
                        @endphp
                        <div class="footer-items">
                            @forelse($col3Items as $item)
                                <div class="footer-item">
                                    <div class="footer-item-info">
                                        @if($item->type == 'title')
                                            <div class="footer-item-title">{{ $item->title }}</div>
                                        @elseif($item->type == 'list_item')
                                            <div class="footer-item-content">{{ $item->content }}</div>
                                        @endif
                                    </div>
                                    <div class="footer-item-actions">
                                        <button class="btn-edit" onclick="editFooterItem({{ $item->id }})">Edit</button>
                                        <form action="{{ route('admin.footer.delete', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus item ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state">Belum ada konten</div>
                            @endforelse
                        </div>
                        <button class="btn-add-item" onclick="openAddModal('column_3')">+ Tambah Item</button>
                    </div>
                    
                    <!-- Column 4: Hubungi Kami -->
                    <div class="footer-column-card">
                        <div class="column-title">Kolom 4: Hubungi Kami</div>
                        @php
                            $col4Items = \App\Models\FooterContent::where('column', 'column_4')
                                ->where('is_active', true)
                                ->orderBy('order')
                                ->get();
                        @endphp
                        <div class="footer-items">
                            @forelse($col4Items as $item)
                                <div class="footer-item">
                                    <div class="footer-item-info">
                                        @if($item->type == 'title')
                                            <div class="footer-item-title">{{ $item->title }}</div>
                                        @elseif($item->type == 'social_link')
                                            <div class="footer-item-title" style="text-transform: capitalize; margin-bottom: 0.25rem;">
                                                {{ $item->icon ? ucfirst($item->icon) : 'Social Link' }}
                                            </div>
                                            <div class="footer-item-content" style="font-size: 0.8rem; color: #5a5a5a; word-break: break-all;">
                                                {{ $item->url ?: 'Belum ada URL' }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="footer-item-actions">
                                        <button class="btn-edit" onclick="editFooterItem({{ $item->id }})">Edit</button>
                                        <form action="{{ route('admin.footer.delete', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Hapus item ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state">Belum ada konten</div>
                            @endforelse
                        </div>
                        <button class="btn-add-item" onclick="openAddModal('column_4')">+ Tambah Item</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <!-- Modal Add/Edit -->
    <div class="modal" id="footerModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle">Tambah Item Footer</h2>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <form id="footerForm" method="POST">
                @csrf
                <input type="hidden" name="column" id="formColumn">
                
                <div class="form-group">
                    <label class="form-label" for="type">Tipe <span style="color: #ef4444;">*</span></label>
                    <select name="type" id="formType" class="form-select" required onchange="toggleFormFields()">
                        <option value="">Pilih Tipe</option>
                        <option value="title">Judul</option>
                        <option value="description">Deskripsi</option>
                        <option value="list_item">Item List</option>
                        <option value="social_link">Social Link</option>
                    </select>
                </div>
                
                <div class="form-group" id="titleGroup">
                    <label class="form-label" for="title">Judul</label>
                    <input type="text" name="title" id="formTitle" class="form-input" placeholder="Masukkan judul">
                </div>
                
                <div class="form-group" id="contentGroup">
                    <label class="form-label" for="content">Konten</label>
                    <textarea name="content" id="formContent" class="form-textarea" placeholder="Masukkan konten"></textarea>
                </div>
                
                <div class="form-group" id="urlGroup" style="display: none;">
                    <label class="form-label" for="url">URL <span style="color: #ef4444;">*</span></label>
                    <input type="url" name="url" id="formUrl" class="form-input" placeholder="https://facebook.com/... atau https://instagram.com/...">
                    <small style="color: #5a5a5a; font-size: 0.85rem; margin-top: 0.25rem; display: block;">Masukkan URL lengkap (contoh: https://facebook.com/deboracraft)</small>
                </div>
                
                <div class="form-group" id="iconGroup" style="display: none;">
                    <label class="form-label" for="icon">Icon <span style="color: #ef4444;">*</span></label>
                    <select name="icon" id="formIcon" class="form-select" required>
                        <option value="">Pilih Icon</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="whatsapp">WhatsApp</option>
                        <option value="email">Email</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="order">Urutan</label>
                    <input type="number" name="order" id="formOrder" class="form-input" value="0" min="0">
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        let currentColumn = '';
        let editingId = null;
        
        function openAddModal(column) {
            currentColumn = column;
            editingId = null;
            document.getElementById('modalTitle').textContent = 'Tambah Item Footer';
            document.getElementById('footerForm').action = '{{ route("admin.footer.store") }}';
            document.getElementById('footerForm').method = 'POST';
            // Remove _method input if exists
            const methodInput = document.getElementById('formMethod');
            if (methodInput) methodInput.remove();
            // Ensure CSRF token exists
            ensureCsrfToken();
            document.getElementById('formColumn').value = column;
            document.getElementById('footerForm').reset();
            document.getElementById('formType').value = '';
            toggleFormFields();
            document.getElementById('footerModal').classList.add('show');
        }
        
        function ensureCsrfToken() {
            let csrfInput = document.querySelector('input[name="_token"]');
            if (!csrfInput) {
                csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                document.getElementById('footerForm').appendChild(csrfInput);
            }
        }
        
        function editFooterItem(id) {
            editingId = id;
            fetch(`/admin/footer/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modalTitle').textContent = 'Edit Item Footer';
                    document.getElementById('footerForm').action = `/admin/footer/${id}`;
                    document.getElementById('footerForm').method = 'POST';
                    // Ensure CSRF token exists
                    ensureCsrfToken();
                    // Add _method input for PUT
                    let methodInput = document.getElementById('formMethod');
                    if (!methodInput) {
                        methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        methodInput.id = 'formMethod';
                        methodInput.value = 'PUT';
                        document.getElementById('footerForm').appendChild(methodInput);
                    } else {
                        methodInput.value = 'PUT';
                    }
                    document.getElementById('formColumn').value = data.column;
                    document.getElementById('formType').value = data.type;
                    document.getElementById('formTitle').value = data.title || '';
                    document.getElementById('formContent').value = data.content || '';
                    document.getElementById('formUrl').value = data.url || '';
                    document.getElementById('formIcon').value = data.icon || '';
                    document.getElementById('formOrder').value = data.order || 0;
                    toggleFormFields();
                    document.getElementById('footerModal').classList.add('show');
                });
        }
        
        function closeModal() {
            document.getElementById('footerModal').classList.remove('show');
        }
        
        function toggleFormFields() {
            const type = document.getElementById('formType').value;
            const titleGroup = document.getElementById('titleGroup');
            const contentGroup = document.getElementById('contentGroup');
            const urlGroup = document.getElementById('urlGroup');
            const iconGroup = document.getElementById('iconGroup');
            const urlInput = document.getElementById('formUrl');
            const iconSelect = document.getElementById('formIcon');
            
            // Reset visibility
            titleGroup.style.display = 'block';
            contentGroup.style.display = 'block';
            urlGroup.style.display = 'none';
            iconGroup.style.display = 'none';
            if (urlInput) urlInput.required = false;
            if (iconSelect) iconSelect.required = false;
            
            if (type === 'title') {
                contentGroup.style.display = 'none';
                urlGroup.style.display = 'none';
                iconGroup.style.display = 'none';
            } else if (type === 'description') {
                titleGroup.style.display = 'none';
                urlGroup.style.display = 'none';
                iconGroup.style.display = 'none';
            } else if (type === 'list_item') {
                titleGroup.style.display = 'none';
                urlGroup.style.display = 'block';
                iconGroup.style.display = 'none';
            } else if (type === 'social_link') {
                titleGroup.style.display = 'none';
                contentGroup.style.display = 'none';
                urlGroup.style.display = 'block';
                iconGroup.style.display = 'block';
                if (urlInput) urlInput.required = true;
                if (iconSelect) iconSelect.required = true;
            }
        }
        
        // Close modal when clicking outside
        document.getElementById('footerModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>


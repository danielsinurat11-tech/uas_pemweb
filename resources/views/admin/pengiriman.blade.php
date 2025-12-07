<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengiriman - Debora Craft</title>
    
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
        
        /* Shipping Section */
        .shipping-section {
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
            flex-wrap: wrap;
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
        
        .btn-primary {
            padding: 0.75rem 1.5rem;
            background: #2d2d2d;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary:hover {
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
        
        /* Shipping Card */
        .shipping-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: box-shadow 0.3s;
        }
        
        .shipping-card:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .shipping-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .shipping-info {
            flex: 1;
        }
        
        .order-number {
            font-weight: 600;
            font-size: 1.1rem;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .shipping-details {
            font-size: 0.9rem;
            color: #5a5a5a;
            margin-top: 0.5rem;
        }
        
        .shipping-status {
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
        
        .status-badge.pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-badge.packed {
            background: #cfe2ff;
            color: #084298;
        }
        
        .status-badge.shipped {
            background: #d1e7dd;
            color: #0f5132;
        }
        
        .status-badge.in_transit {
            background: #d0ebff;
            color: #055160;
        }
        
        .status-badge.delivered {
            background: #d4edda;
            color: #155724;
        }
        
        .status-badge.failed {
            background: #f8d7da;
            color: #721c24;
        }
        
        .shipping-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-top: 1rem;
        }
        
        .shipping-address {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 6px;
        }
        
        .address-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2d2d2d;
        }
        
        .address-text {
            font-size: 0.9rem;
            color: #5a5a5a;
            line-height: 1.6;
        }
        
        .shipping-tracking {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 6px;
        }
        
        .tracking-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
        }
        
        .tracking-label {
            color: #5a5a5a;
        }
        
        .tracking-value {
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .shipping-actions {
            margin-top: 1rem;
            display: flex;
            gap: 0.5rem;
            justify-content: flex-end;
        }
        
        .btn-action {
            padding: 0.5rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            background: #ffffff;
            color: #2d2d2d;
            font-size: 0.85rem;
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
        
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }
        
        .modal-content {
            background: #ffffff;
            margin: 5% auto;
            padding: 2rem;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
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
        
        .close-modal {
            font-size: 1.5rem;
            cursor: pointer;
            color: #5a5a5a;
        }
        
        .close-modal:hover {
            color: #2d2d2d;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .form-input,
        .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
        }
        
        .form-textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
            resize: vertical;
            min-height: 100px;
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
            
            .shipping-content {
                grid-template-columns: 1fr;
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
            
            .search-input {
                width: 100%;
            }
            
            .stats-cards {
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
                <li><a href="{{ url('/admin/pengiriman') }}" class="active">Pengiriman</a></li>
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
            
            <!-- Shipping Section -->
            <div class="shipping-section">
                <div class="section-header">
                    <h1 class="section-title">Pengiriman</h1>
                    <p class="section-subtitle">Kelola pengiriman pesanan pelanggan</p>
                </div>
                
                @php
                    $orders = \App\Models\Order::whereIn('status', ['new', 'processing', 'shipped', 'delivered'])
                        ->where('payment_status', 'paid')
                        ->with(['user', 'shipping', 'orderItems.product'])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    
                    $totalShippings = \App\Models\Shipping::count();
                    $pendingShippings = \App\Models\Shipping::where('status', 'pending')->count();
                    $shippedShippings = \App\Models\Shipping::where('status', 'shipped')->orWhere('status', 'in_transit')->count();
                    $deliveredShippings = \App\Models\Shipping::where('status', 'delivered')->count();
                @endphp
                
                <!-- Stats Cards -->
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-label">Total Pengiriman</div>
                        <div class="stat-value">{{ $totalShippings }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Pending</div>
                        <div class="stat-value">{{ $pendingShippings }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Dalam Perjalanan</div>
                        <div class="stat-value">{{ $shippedShippings }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Terkirim</div>
                        <div class="stat-value">{{ $deliveredShippings }}</div>
                    </div>
                </div>
                
                <div class="section-controls">
                    <input type="text" class="search-input" id="searchInput" placeholder="Cari nomor pesanan atau tracking number...">
                    <select class="filter-select" id="statusFilter">
                        <option value="all">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="packed">Packed</option>
                        <option value="shipped">Shipped</option>
                        <option value="in_transit">In Transit</option>
                        <option value="delivered">Delivered</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
                
                <!-- Shipping List -->
                <div id="shippingList">
                    @forelse($orders as $order)
                        @php
                            $shipping = $order->shipping;
                            $statusLabels = [
                                'pending' => 'Pending',
                                'packed' => 'Packed',
                                'shipped' => 'Shipped',
                                'in_transit' => 'In Transit',
                                'delivered' => 'Delivered',
                                'failed' => 'Failed',
                            ];
                            $shippingStatus = $shipping ? $shipping->status : 'pending';
                        @endphp
                        <div class="shipping-card" data-order-number="{{ $order->order_number }}" data-tracking="{{ $shipping->tracking_number ?? '' }}" data-status="{{ $shippingStatus }}">
                            <div class="shipping-header">
                                <div class="shipping-info">
                                    <div class="order-number">#{{ $order->order_number }}</div>
                                    <div class="shipping-details">
                                        <strong>Pelanggan:</strong> {{ $order->user->name ?? 'N/A' }} | 
                                        <strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d M Y, H:i') }}
                                    </div>
                                </div>
                                <div class="shipping-status">
                                    @if($shipping)
                                        <span class="status-badge {{ $shipping->status }}">{{ $statusLabels[$shipping->status] ?? $shipping->status }}</span>
                                    @else
                                        <span class="status-badge pending">Belum Ada Pengiriman</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="shipping-content">
                                <div class="shipping-address">
                                    <div class="address-label">Alamat Pengiriman</div>
                                    <div class="address-text">
                                        <strong>{{ $order->shipping_name }}</strong><br>
                                        {{ $order->shipping_phone }}<br>
                                        {{ $order->shipping_address }}
                                    </div>
                                </div>
                                
                                <div class="shipping-tracking">
                                    @if($shipping)
                                        <div class="tracking-row">
                                            <span class="tracking-label">Kurir:</span>
                                            <span class="tracking-value">{{ $shipping->courier ?? '-' }}</span>
                                        </div>
                                        <div class="tracking-row">
                                            <span class="tracking-label">Tracking Number:</span>
                                            <span class="tracking-value">{{ $shipping->tracking_number ?? '-' }}</span>
                                        </div>
                                        <div class="tracking-row">
                                            <span class="tracking-label">Tanggal Pengiriman:</span>
                                            <span class="tracking-value">{{ $shipping->shipped_date ? $shipping->shipped_date->format('d M Y') : '-' }}</span>
                                        </div>
                                        <div class="tracking-row">
                                            <span class="tracking-label">Estimasi Sampai:</span>
                                            <span class="tracking-value">{{ $shipping->estimated_delivery_date ? $shipping->estimated_delivery_date->format('d M Y') : '-' }}</span>
                                        </div>
                                        @if($shipping->delivered_date)
                                        <div class="tracking-row">
                                            <span class="tracking-label">Tanggal Diterima:</span>
                                            <span class="tracking-value">{{ $shipping->delivered_date->format('d M Y') }}</span>
                                        </div>
                                        @endif
                                    @else
                                        <div class="tracking-row">
                                            <span class="tracking-label" style="color: #856404;">Belum ada informasi pengiriman</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="shipping-actions">
                                @if($shipping)
                                    <a href="#" class="btn-action primary" onclick="openEditModal({{ $order->id }}, {{ $shipping->id }}); return false;">Edit Pengiriman</a>
                                @else
                                    <a href="#" class="btn-action primary" onclick="openCreateModal({{ $order->id }}); return false;">Buat Pengiriman</a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <div class="empty-state-text">Tidak ada pesanan untuk dikirim</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
    
    <!-- Create/Edit Modal -->
    <div id="shippingModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle">Buat Pengiriman</h2>
                <span class="close-modal" onclick="closeModal()">&times;</span>
            </div>
            <form id="shippingForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="order_id" id="formOrderId">
                <input type="hidden" name="shipping_id" id="formShippingId">
                
                <div class="form-group">
                    <label class="form-label" for="courier">Kurir <span style="color: red;">*</span></label>
                    <select name="courier" id="formCourier" class="form-select" required>
                        <option value="">Pilih Kurir</option>
                        <option value="JNE">JNE</option>
                        <option value="J&T">J&T</option>
                        <option value="Pos Indonesia">Pos Indonesia</option>
                        <option value="SiCepat">SiCepat</option>
                        <option value="AnterAja">AnterAja</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="tracking_number">Tracking Number</label>
                    <input type="text" name="tracking_number" id="formTrackingNumber" class="form-input" placeholder="Masukkan nomor tracking">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="status">Status <span style="color: red;">*</span></label>
                    <select name="status" id="formStatus" class="form-select" required>
                        <option value="pending">Pending</option>
                        <option value="packed">Packed</option>
                        <option value="shipped">Shipped</option>
                        <option value="in_transit">In Transit</option>
                        <option value="delivered">Delivered</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="shipped_date">Tanggal Pengiriman</label>
                    <input type="date" name="shipped_date" id="formShippedDate" class="form-input">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="estimated_delivery_date">Estimasi Tanggal Sampai</label>
                    <input type="date" name="estimated_delivery_date" id="formEstimatedDate" class="form-input">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="delivered_date">Tanggal Diterima</label>
                    <input type="date" name="delivered_date" id="formDeliveredDate" class="form-input">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="notes">Catatan</label>
                    <textarea name="notes" id="formNotes" class="form-textarea" placeholder="Catatan tambahan..."></textarea>
                </div>
                
                <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
                    <button type="button" class="btn-action" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-action primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Search and Filter
        document.getElementById('searchInput').addEventListener('input', filterShippings);
        document.getElementById('statusFilter').addEventListener('change', filterShippings);
        
        function filterShippings() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            
            const shippingCards = document.querySelectorAll('.shipping-card');
            
            shippingCards.forEach(card => {
                const orderNumber = card.dataset.orderNumber?.toLowerCase() || '';
                const tracking = card.dataset.tracking?.toLowerCase() || '';
                const status = card.dataset.status || '';
                
                let searchMatch = orderNumber.includes(searchTerm) || tracking.includes(searchTerm);
                let statusMatch = statusFilter === 'all' || status === statusFilter;
                
                if (searchMatch && statusMatch) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Modal Functions
        function openCreateModal(orderId) {
            document.getElementById('modalTitle').textContent = 'Buat Pengiriman';
            document.getElementById('shippingForm').action = '{{ route("admin.pengiriman.store") }}';
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('formOrderId').value = orderId;
            document.getElementById('formShippingId').value = '';
            document.getElementById('formCourier').value = '';
            document.getElementById('formTrackingNumber').value = '';
            document.getElementById('formStatus').value = 'pending';
            document.getElementById('formShippedDate').value = '';
            document.getElementById('formEstimatedDate').value = '';
            document.getElementById('formDeliveredDate').value = '';
            document.getElementById('formNotes').value = '';
            document.getElementById('shippingModal').style.display = 'block';
        }
        
        function openEditModal(orderId, shippingId) {
            // Fetch shipping data
            fetch(`/admin/pengiriman/${shippingId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modalTitle').textContent = 'Edit Pengiriman';
                    document.getElementById('shippingForm').action = `{{ url('/admin/pengiriman') }}/${shippingId}`;
                    document.getElementById('formMethod').value = 'PUT';
                    document.getElementById('formOrderId').value = orderId;
                    document.getElementById('formShippingId').value = shippingId;
                    document.getElementById('formCourier').value = data.courier || '';
                    document.getElementById('formTrackingNumber').value = data.tracking_number || '';
                    document.getElementById('formStatus').value = data.status || 'pending';
                    document.getElementById('formShippedDate').value = data.shipped_date ? data.shipped_date.split(' ')[0] : '';
                    document.getElementById('formEstimatedDate').value = data.estimated_delivery_date ? data.estimated_delivery_date.split(' ')[0] : '';
                    document.getElementById('formDeliveredDate').value = data.delivered_date ? data.delivered_date.split(' ')[0] : '';
                    document.getElementById('formNotes').value = data.notes || '';
                    document.getElementById('shippingModal').style.display = 'block';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal memuat data pengiriman');
                });
        }
        
        function closeModal() {
            document.getElementById('shippingModal').style.display = 'none';
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('shippingModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>


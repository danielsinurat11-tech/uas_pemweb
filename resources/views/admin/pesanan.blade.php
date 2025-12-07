<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan - Debora Craft</title>
    
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
        
        /* Order Section */
        .order-section {
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
        
        /* Order Card */
        .order-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: box-shadow 0.3s;
        }
        
        .order-card:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .order-info {
            flex: 1;
        }
        
        .order-number {
            font-weight: 600;
            font-size: 1.1rem;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .order-date {
            font-size: 0.85rem;
            color: #5a5a5a;
        }
        
        .order-customer {
            font-size: 0.9rem;
            color: #5a5a5a;
            margin-top: 0.25rem;
        }
        
        .order-status {
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
        
        .status-badge.processing {
            background: #cfe2ff;
            color: #084298;
        }
        
        .status-badge.shipped {
            background: #d1e7dd;
            color: #0f5132;
        }
        
        .status-badge.delivered {
            background: #d4edda;
            color: #155724;
        }
        
        .status-badge.cancelled {
            background: #f8d7da;
            color: #721c24;
        }
        
        .order-details {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-top: 1rem;
        }
        
        .order-items {
            flex: 1;
        }
        
        .order-items-title {
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #2d2d2d;
        }
        
        .order-item {
            display: flex;
            gap: 1rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .order-item:last-child {
            border-bottom: none;
        }
        
        .item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
        }
        
        .item-details {
            flex: 1;
        }
        
        .item-name {
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 0.25rem;
        }
        
        .item-info {
            font-size: 0.85rem;
            color: #5a5a5a;
        }
        
        .item-price {
            font-weight: 600;
            color: #2d2d2d;
            text-align: right;
        }
        
        .order-summary {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 6px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        
        .summary-row.total {
            font-weight: 600;
            font-size: 1.1rem;
            padding-top: 0.5rem;
            border-top: 2px solid #e0e0e0;
            margin-top: 0.5rem;
        }
        
        .order-actions {
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
            
            .order-details {
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
            
            .order-header {
                flex-direction: column;
                gap: 1rem;
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
                <li><a href="{{ url('/admin/pesanan') }}" class="active">Pesanan</a></li>
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
            
            <!-- Order Section -->
            <div class="order-section">
                <div class="section-header">
                    <h1 class="section-title">Pesanan</h1>
                    <p class="section-subtitle">Kelola pesanan dari pelanggan</p>
                </div>
                
                @php
                    $orders = \App\Models\Order::with(['user', 'orderItems.product', 'shipping'])
                        ->where('payment_status', 'paid')
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $totalOrders = $orders->count();
                    $pendingOrders = $orders->where('status', 'new')->count();
                    $processingOrders = $orders->where('status', 'processing')->count();
                    $deliveredOrders = $orders->where('status', 'delivered')->count();
                @endphp
                
                <!-- Stats Cards -->
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-label">Total Pesanan</div>
                        <div class="stat-value">{{ $totalOrders }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Pending</div>
                        <div class="stat-value">{{ $pendingOrders }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Processing</div>
                        <div class="stat-value">{{ $processingOrders }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Delivered</div>
                        <div class="stat-value">{{ $deliveredOrders }}</div>
                    </div>
                </div>
                
                <div class="section-controls">
                    <input type="text" class="search-input" id="searchInput" placeholder="Cari nomor pesanan atau nama pelanggan...">
                    <select class="filter-select" id="statusFilter">
                        <option value="all">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                
                <!-- Orders List -->
                <div id="ordersList">
                    @forelse($orders as $order)
                        <div class="order-card" data-status="{{ $order->status }}" data-order-number="{{ $order->order_number }}" data-customer-name="{{ $order->user->name ?? '' }}">
                            <div class="order-header">
                                <div class="order-info">
                                    <div class="order-number">#{{ $order->order_number }}</div>
                                    <div class="order-date">{{ $order->created_at->format('d M Y, H:i') }}</div>
                                    <div class="order-customer">
                                        <strong>Pelanggan:</strong> {{ $order->user->name ?? 'N/A' }} ({{ $order->user->email ?? 'N/A' }})
                                    </div>
                                </div>
                                <div class="order-status">
                                    @php
                                        $statusLabels = [
                                            'new' => 'New',
                                            'pending' => 'Pending',
                                            'processing' => 'Processing',
                                            'shipped' => 'Shipped',
                                            'delivered' => 'Delivered',
                                            'cancelled' => 'Cancelled',
                                        ];
                                        $statusLabel = $statusLabels[$order->status] ?? $order->status;
                                    @endphp
                                    <span class="status-badge {{ $order->status }}">{{ $statusLabel }}</span>
                                </div>
                            </div>
                            
                            <div class="order-details">
                                <div class="order-items">
                                    <div class="order-items-title">Item Pesanan</div>
                                    @foreach($order->orderItems as $item)
                                        <div class="order-item">
                                            <img src="{{ asset($item->product->image ?? 'img/placeholder.jpg') }}" alt="{{ $item->product->name }}" class="item-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                                            <div class="item-details">
                                                <div class="item-name">{{ $item->product->name }}</div>
                                                <div class="item-info">Qty: {{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                                            </div>
                                            <div class="item-price">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="order-summary">
                                    <div class="summary-row">
                                        <span>Subtotal</span>
                                        <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="summary-row total">
                                        <span>Total</span>
                                        <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                    </div>
                                    
                                    <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
                                        <div style="font-size: 0.85rem; color: #5a5a5a; margin-bottom: 0.5rem;"><strong>Alamat Pengiriman:</strong></div>
                                        <div style="font-size: 0.85rem; color: #2d2d2d;">{{ $order->shipping_name }}</div>
                                        <div style="font-size: 0.85rem; color: #2d2d2d;">{{ $order->shipping_phone }}</div>
                                        <div style="font-size: 0.85rem; color: #2d2d2d; margin-top: 0.25rem;">{{ $order->shipping_address }}</div>
                                        @if($order->notes)
                                            <div style="font-size: 0.85rem; color: #5a5a5a; margin-top: 0.5rem; font-style: italic;">
                                                <strong>Catatan:</strong> {{ $order->notes }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="order-actions">
                                <form action="{{ route('admin.pesanan.update-status', $order->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="filter-select" onchange="this.form.submit()" style="width: auto; margin-right: 0.5rem;">
                                        <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>New</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <div class="empty-state-text">Tidak ada pesanan ditemukan</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
    
    <script>
        // Search and Filter functionality
        document.getElementById('searchInput').addEventListener('input', filterOrders);
        document.getElementById('statusFilter').addEventListener('change', filterOrders);
        
        function filterOrders() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            
            const orderCards = document.querySelectorAll('.order-card');
            
            orderCards.forEach(card => {
                const orderNumber = card.dataset.orderNumber?.toLowerCase() || '';
                const customerName = card.dataset.customerName?.toLowerCase() || '';
                const status = card.dataset.status || '';
                
                // Search filter
                let searchMatch = orderNumber.includes(searchTerm) || customerName.includes(searchTerm);
                
                // Status filter
                let statusMatch = statusFilter === 'all' || status === statusFilter;
                
                if (searchMatch && statusMatch) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Pembayaran - Debora Craft</title>
    
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
        
        /* Payment Section */
        .payment-section {
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
        
        /* Payment Card */
        .payment-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: box-shadow 0.3s;
        }
        
        .payment-card:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .payment-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .payment-info {
            flex: 1;
        }
        
        .order-number {
            font-weight: 600;
            font-size: 1.1rem;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .payment-details {
            font-size: 0.9rem;
            color: #5a5a5a;
        }
        
        .payment-status {
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
        
        .status-badge.paid {
            background: #d4edda;
            color: #155724;
        }
        
        .status-badge.failed {
            background: #f8d7da;
            color: #721c24;
        }
        
        .payment-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-top: 1rem;
        }
        
        .payment-details-section {
            flex: 1;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
        }
        
        .detail-label {
            color: #5a5a5a;
        }
        
        .detail-value {
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .proof-section {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 6px;
        }
        
        .proof-image {
            width: 100%;
            max-width: 300px;
            border-radius: 6px;
            margin-bottom: 1rem;
            cursor: pointer;
        }
        
        .payment-actions {
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
        
        .btn-action.success {
            background: #28a745;
            color: #ffffff;
            border-color: #28a745;
        }
        
        .btn-action.success:hover {
            background: #218838;
        }
        
        .btn-action.danger {
            background: #dc3545;
            color: #ffffff;
            border-color: #dc3545;
        }
        
        .btn-action.danger:hover {
            background: #c82333;
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
            
            .payment-content {
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
                <li><a href="{{ url('/admin/stok-bahan') }}">Stok Bahan</a></li>
                <li><a href="{{ url('/admin/pelanggan') }}">Pelanggan</a></li>
                <li><a href="{{ url('/admin/pengiriman') }}">Pengiriman</a></li>
                <li><a href="{{ url('/admin/pembayaran') }}" class="active">Pembayaran</a></li>
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
            
            <!-- Payment Section -->
            <div class="payment-section">
                <div class="section-header">
                    <h1 class="section-title">Verifikasi Pembayaran</h1>
                    <p class="section-subtitle">Verifikasi dan konfirmasi pembayaran dari pelanggan</p>
                </div>
                
                @php
                    $payments = \App\Models\Payment::with(['order.user', 'order.orderItems.product'])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    
                    $totalPayments = $payments->count();
                    $pendingPayments = $payments->where('status', 'pending')->count();
                    $processingPayments = $payments->where('status', 'processing')->count();
                    $paidPayments = $payments->where('status', 'paid')->count();
                @endphp
                
                <!-- Stats Cards -->
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-label">Total Pembayaran</div>
                        <div class="stat-value">{{ $totalPayments }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Pending</div>
                        <div class="stat-value">{{ $pendingPayments }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Processing</div>
                        <div class="stat-value">{{ $processingPayments }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Paid</div>
                        <div class="stat-value">{{ $paidPayments }}</div>
                    </div>
                </div>
                
                <div class="section-controls">
                    <input type="text" class="search-input" id="searchInput" placeholder="Cari nomor pesanan atau tracking...">
                    <select class="filter-select" id="statusFilter">
                        <option value="all">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="paid">Paid</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
                
                <!-- Payment List -->
                <div id="paymentList">
                    @forelse($payments as $payment)
                        @php
                            $statusLabels = [
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'paid' => 'Paid',
                                'failed' => 'Failed',
                                'expired' => 'Expired',
                                'cancelled' => 'Cancelled',
                            ];
                            $statusLabel = $statusLabels[$payment->status] ?? $payment->status;
                        @endphp
                        <div class="payment-card" data-order-number="{{ $payment->order->order_number }}" data-status="{{ $payment->status }}">
                            <div class="payment-header">
                                <div class="payment-info">
                                    <div class="order-number">Order #{{ $payment->order->order_number }}</div>
                                    <div class="payment-details">
                                        <strong>Pelanggan:</strong> {{ $payment->order->user->name ?? 'N/A' }} | 
                                        <strong>Metode:</strong> 
                                        @if($payment->payment_method == 'simulation')
                                            Simulasi Payment
                                        @elseif($payment->payment_method == 'whatsapp')
                                            WhatsApp
                                        @elseif($payment->payment_method == 'bank_transfer')
                                            Transfer Bank
                                        @else
                                            {{ ucfirst($payment->payment_method) }}
                                        @endif
                                         | 
                                        <strong>Tanggal:</strong> {{ $payment->created_at->format('d M Y, H:i') }}
                                    </div>
                                </div>
                                <div class="payment-status">
                                    <span class="status-badge {{ $payment->status }}">{{ $statusLabel }}</span>
                                </div>
                            </div>
                            
                            <div class="payment-content">
                                <div class="payment-details-section">
                                    <div class="detail-row">
                                        <span class="detail-label">Jumlah Pembayaran:</span>
                                        <span class="detail-value">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                                    </div>
                                    @if($payment->payment_method == 'whatsapp')
                                        <div class="detail-row">
                                            <span class="detail-label">Metode Pembayaran:</span>
                                            <span class="detail-value">Pembayaran via WhatsApp</span>
                                        </div>
                                        @if($payment->notes)
                                        <div class="detail-row">
                                            <span class="detail-label">Catatan:</span>
                                            <span class="detail-value" style="font-weight: normal;">{{ $payment->notes }}</span>
                                        </div>
                                        @endif
                                    @elseif($payment->payment_method == 'bank_transfer')
                                        <div class="detail-row">
                                            <span class="detail-label">Bank Pengirim:</span>
                                            <span class="detail-value">{{ $payment->bank_name ?? '-' }}</span>
                                        </div>
                                        @if($payment->account_number)
                                        <div class="detail-row">
                                            <span class="detail-label">No. Rekening:</span>
                                            <span class="detail-value">{{ $payment->account_number }}</span>
                                        </div>
                                        @endif
                                        @if($payment->account_name)
                                        <div class="detail-row">
                                            <span class="detail-label">Nama Pengirim:</span>
                                            <span class="detail-value">{{ $payment->account_name }}</span>
                                        </div>
                                        @endif
                                        @if($payment->transaction_id)
                                        <div class="detail-row">
                                            <span class="detail-label">Transaction ID:</span>
                                            <span class="detail-value">{{ $payment->transaction_id }}</span>
                                        </div>
                                        @endif
                                    @else
                                        <div class="detail-row">
                                            <span class="detail-label">Transaction ID:</span>
                                            <span class="detail-value">{{ $payment->transaction_id ?? '-' }}</span>
                                        </div>
                                    @endif
                                </div>
                                
                                @if($payment->payment_proof)
                                <div class="proof-section">
                                    <div style="font-weight: 600; margin-bottom: 0.5rem;">Bukti Transfer:</div>
                                    <img src="{{ asset($payment->payment_proof) }}" alt="Bukti Transfer" class="proof-image" onclick="window.open('{{ asset($payment->payment_proof) }}', '_blank')">
                                </div>
                                @endif
                            </div>
                            
                            @if($payment->status == 'pending' || $payment->status == 'processing')
                            <div class="payment-actions">
                                <form action="{{ route('admin.pembayaran.verify', $payment->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="paid">
                                    <button type="submit" class="btn-action success" onclick="return confirm('Konfirmasi pembayaran ini?')">✓ Konfirmasi Pembayaran</button>
                                </form>
                                <form action="{{ route('admin.pembayaran.verify', $payment->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="failed">
                                    <button type="submit" class="btn-action danger" onclick="return confirm('Tolak pembayaran ini?')">✗ Tolak Pembayaran</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    @empty
                        <div class="empty-state">
                            <div class="empty-state-text">Tidak ada pembayaran ditemukan</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
    
    <script>
        // Search and Filter
        document.getElementById('searchInput').addEventListener('input', filterPayments);
        document.getElementById('statusFilter').addEventListener('change', filterPayments);
        
        function filterPayments() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            
            const paymentCards = document.querySelectorAll('.payment-card');
            
            paymentCards.forEach(card => {
                const orderNumber = card.dataset.orderNumber?.toLowerCase() || '';
                const status = card.dataset.status || '';
                
                let searchMatch = orderNumber.includes(searchTerm);
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


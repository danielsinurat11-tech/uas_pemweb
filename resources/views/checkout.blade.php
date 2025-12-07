<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - Debora Craft</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
        
        .checkout-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }
        
        .checkout-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .checkout-title {
            font-family: 'Cotoris', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 2rem;
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
        
        .form-label .required {
            color: #e91e63;
        }
        
        .form-input,
        .form-textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
            font-family: 'Cotoris', sans-serif;
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .order-summary {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
        
        .summary-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2d2d2d;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .summary-item:last-child {
            border-bottom: none;
        }
        
        .item-info {
            display: flex;
            gap: 1rem;
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
            margin-bottom: 0.25rem;
        }
        
        .item-price {
            font-size: 0.9rem;
            color: #5a5a5a;
        }
        
        .item-total {
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }
        
        .summary-row.total {
            font-weight: 600;
            font-size: 1.2rem;
            padding-top: 0.75rem;
            border-top: 2px solid #2d2d2d;
            margin-top: 0.75rem;
        }
        
        .btn-checkout {
            width: 100%;
            padding: 1rem;
            background: #2d2d2d;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-checkout:hover {
            background: #1a1a1a;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        @media (max-width: 768px) {
            .checkout-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <div>
            <div class="checkout-card">
                <h1 class="checkout-title">Informasi Pengiriman</h1>
                
                @if(session('error'))
                    <div class="alert alert-error">{{ session('error') }}</div>
                @endif
                
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label" for="shipping_name">
                            Nama Penerima <span class="required">*</span>
                        </label>
                        <input type="text" name="shipping_name" id="shipping_name" class="form-input" value="{{ auth()->user()->name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="shipping_phone">
                            No. Telepon <span class="required">*</span>
                        </label>
                        <input type="text" name="shipping_phone" id="shipping_phone" class="form-input" placeholder="08xxxxxxxxxx" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="shipping_address">
                            Alamat Pengiriman <span class="required">*</span>
                        </label>
                        <textarea name="shipping_address" id="shipping_address" class="form-textarea" placeholder="Masukkan alamat lengkap pengiriman" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="notes">
                            Catatan (Opsional)
                        </label>
                        <textarea name="notes" id="notes" class="form-textarea" placeholder="Catatan untuk penjual..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn-checkout">Buat Pesanan</button>
                </form>
            </div>
        </div>
        
        <div>
            <div class="checkout-card">
                <h2 class="summary-title">Ringkasan Pesanan</h2>
                
                <div class="order-summary">
                    @foreach($cartItems as $item)
                        <div class="summary-item">
                            <div class="item-info">
                                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="item-image" onerror="this.src='{{ asset('img/placeholder.jpg') }}'">
                                <div class="item-details">
                                    <div class="item-name">{{ $item->product->name }}</div>
                                    <div class="item-price">Rp {{ number_format($item->price, 0, ',', '.') }} × {{ $item->quantity }}</div>
                                </div>
                            </div>
                            <div class="item-total">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                        </div>
                    @endforeach
                </div>
                
                <div class="order-summary">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


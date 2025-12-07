<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran - Debora Craft</title>
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
        
        .payment-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
        }
        
        .payment-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .payment-title {
            font-family: 'Cotoris', serif;
            font-size: 2rem;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 0.5rem;
        }
        
        .payment-subtitle {
            color: #5a5a5a;
            margin-bottom: 2rem;
        }
        
        .order-summary {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
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
            border-top: 2px solid #e0e0e0;
            margin-top: 0.75rem;
        }
        
        .payment-methods {
            margin-bottom: 2rem;
        }
        
        .method-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2d2d2d;
        }
        
        .method-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .method-option {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }
        
        .method-option:hover {
            border-color: #2d2d2d;
        }
        
        .method-option.active {
            border-color: #2d2d2d;
            background: #f9f9f9;
        }
        
        .method-option input[type="radio"] {
            display: none;
        }
        
        .method-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .method-name {
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .method-desc {
            font-size: 0.85rem;
            color: #5a5a5a;
            margin-top: 0.25rem;
        }
        
        .payment-form {
            display: none;
        }
        
        .payment-form.active {
            display: block;
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
        
        .form-file {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.9rem;
        }
        
        .btn-pay {
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
        
        .btn-pay:hover {
            background: #1a1a1a;
        }
        
        .btn-pay:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        
        .bank-info {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        
        .bank-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        
        .simulation-info {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .whatsapp-payment-info {
            text-align: center;
            padding: 2rem;
            background: #f9f9f9;
            border-radius: 12px;
            margin-bottom: 2rem;
        }
        
        .whatsapp-icon-wrapper {
            display: inline-block;
            width: 80px;
            height: 80px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
        }
        
        .whatsapp-icon-wrapper svg {
            width: 48px;
            height: 48px;
        }
        
        .whatsapp-instructions {
            text-align: left;
            margin: 2rem 0;
        }
        
        .instruction-step {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            align-items: flex-start;
        }
        
        .step-number {
            width: 32px;
            height: 32px;
            background: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            flex-shrink: 0;
        }
        
        .step-content {
            flex: 1;
        }
        
        .step-content strong {
            display: block;
            margin-bottom: 0.25rem;
            color: #2d2d2d;
        }
        
        .step-content p {
            color: #5a5a5a;
            font-size: 0.9rem;
            margin: 0;
        }
        
        .btn-whatsapp {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2rem;
            background: #25D366;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
        }
        
        .btn-whatsapp:hover {
            background: #20ba5a;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.4);
        }
        
        .btn-whatsapp svg {
            width: 24px;
            height: 24px;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        @php
            $order = \App\Models\Order::with(['orderItems.product', 'payment'])->findOrFail($orderId);
            $payment = $order->payment;
        @endphp
        
        <div class="payment-card">
            <h1 class="payment-title">Pembayaran</h1>
            <p class="payment-subtitle">Order #{{ $order->order_number }}</p>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif
            
            @if($payment && $payment->status == 'paid')
                <div class="alert alert-success">
                    <strong>Pembayaran Berhasil!</strong><br>
                    Status pembayaran Anda sudah dikonfirmasi. Pesanan Anda sedang diproses.
                </div>
            @else
                <!-- Order Summary -->
                <div class="order-summary">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total Pembayaran</span>
                        <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>
                
                <!-- WhatsApp Payment Method -->
                <div class="payment-methods">
                    <h3 class="method-title">Metode Pembayaran</h3>
                    @php
                        // Get WhatsApp URL from footer
                        $whatsappLink = \App\Models\FooterContent::where('column', 'column_4')
                            ->where('type', 'social_link')
                            ->where('icon', 'whatsapp')
                            ->where('is_active', true)
                            ->first();
                        $whatsappUrl = $whatsappLink ? $whatsappLink->url : 'https://wa.me/62895228591933';
                        // Extract phone number from URL
                        preg_match('/wa\.me\/(\d+)/', $whatsappUrl, $matches);
                        $whatsappNumber = $matches[1] ?? '0895338591933';
                        // Format message
                        $message = "Halo, saya ingin melakukan pembayaran untuk Order #" . $order->order_number . " sebesar Rp " . number_format($order->total_amount, 0, ',', '.');
                        $encodedMessage = urlencode($message);
                        $whatsappLinkWithMessage = "https://wa.me/" . $whatsappNumber . "?text=" . $encodedMessage;
                    @endphp
                    
                    <div class="whatsapp-payment-info">
                        <div class="whatsapp-icon-wrapper">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </div>
                        <h3 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem; color: #2d2d2d;">Pembayaran via WhatsApp</h3>
                        <p style="color: #5a5a5a; margin-bottom: 1.5rem; line-height: 1.6;">
                            Silakan hubungi kami melalui WhatsApp untuk melakukan pembayaran. Setelah Anda melakukan pembayaran, admin akan memverifikasi dan mengkonfirmasi pesanan Anda.
                        </p>
                        
                        <div class="whatsapp-instructions">
                            <div class="instruction-step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <strong>Klik tombol di bawah untuk membuka WhatsApp</strong>
                                    <p>Anda akan diarahkan ke chat WhatsApp dengan pesan yang sudah disiapkan</p>
                                </div>
                            </div>
                            <div class="instruction-step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <strong>Kirim bukti pembayaran</strong>
                                    <p>Kirim screenshot atau foto bukti transfer pembayaran Anda</p>
                                </div>
                            </div>
                            <div class="instruction-step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <strong>Tunggu konfirmasi admin</strong>
                                    <p>Admin akan memverifikasi pembayaran Anda dan mengupdate status pesanan</p>
                                </div>
                            </div>
                        </div>
                        
                        <div style="margin-top: 2rem; text-align: center;">
                            <a href="{{ $whatsappLinkWithMessage }}" target="_blank" class="btn-whatsapp">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 0.5rem;">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                Hubungi via WhatsApp
                            </a>
                        </div>
                        
                        <div style="margin-top: 1.5rem; padding: 1rem; background: #f0f9ff; border-left: 4px solid #0ea5e9; border-radius: 6px;">
                            <strong style="color: #0c4a6e;">📋 Informasi Pesanan:</strong>
                            <div style="margin-top: 0.5rem; color: #075985; font-size: 0.9rem;">
                                <div>Order Number: <strong>{{ $order->order_number }}</strong></div>
                                <div style="margin-top: 0.25rem;">Total Pembayaran: <strong>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong></div>
                            </div>
                            <p style="margin-top: 0.75rem; color: #075985; font-size: 0.85rem;">
                                Pastikan untuk menyertakan nomor order ini saat menghubungi WhatsApp.
                            </p>
                        </div>
                    </div>
                    
                    <form id="confirmForm" action="{{ route('payment.process', $order->id) }}" method="POST" style="margin-top: 2rem;">
                        @csrf
                        <input type="hidden" name="payment_method" value="whatsapp">
                        <div style="background: #fff3cd; border: 1px solid #ffc107; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
                            <strong>💡 Tips:</strong> Setelah Anda mengirim bukti pembayaran via WhatsApp, klik tombol di bawah untuk menandai bahwa Anda sudah melakukan pembayaran. Admin akan segera memverifikasi pembayaran Anda.
                        </div>
                        <button type="submit" class="btn-pay">
                            Saya Sudah Bayar via WhatsApp
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    
</body>
</html>


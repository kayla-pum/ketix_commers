<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f3f4f6; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #334EAC, #334EAC); color: white; padding: 20px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { padding: 30px; }
        .event-info { background: #f9fafb; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .ticket { border: 2px dashed #e5e7eb; padding: 20px; border-radius: 8px; margin-bottom: 20px; position: relative; }
        .ticket-code { font-size: 24px; font-weight: bold; color: #334EAC; text-align: center; margin: 10px 0; letter-spacing: 2px; }
        .footer { text-align: center; padding: 20px; color: #6b7280; font-size: 12px; }
        .table { width: 100%; margin-bottom: 20px; border-collapse: collapse; }
        .table th, .table td { padding: 10px; text-align: left; border-bottom: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>E-Tiket & Invoice</h1>
            <p>Terima kasih atas pesanan Anda!</p>
        </div>
        
        <div class="content">
            <div class="event-info">
                <h3>{{ $order->event->name }}</h3>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->event->date)->format('d F Y') }}</p>
                <p><strong>Lokasi:</strong> {{ $order->event->location }}</p>
            </div>
            
            <h3>Detail Pembayaran (Order #{{ $order->id }})</h3>
            <table class="table">
                <tr>
                    <th>Jumlah Tiket</th>
                    <td>{{ $order->quantity }} Tiket</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td><strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td style="color: green; font-weight: bold;">LUNAS</td>
                </tr>
            </table>

            <h3>E-Tiket Anda</h3>
            @foreach($tickets as $ticket)
            <div class="ticket">
                <p><strong>Nama:</strong> {{ $ticket->name }}</p>
                <p><strong>KTP:</strong> {{ $ticket->ktp }}</p>
                <p><strong>Tipe:</strong> General Admission</p>
                <div class="ticket-code">{{ $ticket->ticket_code }}</div>
                <p style="text-align: center; font-size: 12px; color: #6b7280;">Tunjukkan kode ini saat masuk ke acara.</p>
            </div>
            @endforeach
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Ketix. Temukan event terbaik untukmu!</p>
        </div>
    </div>
</body>
</html>

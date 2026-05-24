<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil - Ketix</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-['Inter'] flex items-center justify-center min-h-screen p-4">
    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 text-center max-w-lg w-full">
        <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-check text-4xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Pembayaran Berhasil!</h1>
        <p class="text-gray-600 mb-8">Terima kasih telah memesan tiket <strong>{{ $order->event->name }}</strong>. Invoice dan E-Tiket telah dikirimkan ke alamat email yang Anda daftarkan.</p>
        
        <div class="bg-gray-50 rounded-xl p-6 mb-8 text-left">
            <div class="flex justify-between mb-3 border-b pb-3">
                <span class="text-gray-500">Nomor Pesanan</span>
                <span class="font-bold text-gray-800">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
            </div>
            <div class="flex justify-between mb-3 border-b pb-3">
                <span class="text-gray-500">Jumlah Tiket</span>
                <span class="font-bold text-gray-800">{{ $order->quantity }} Tiket</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Total Pembayaran</span>
                <span class="font-bold text-purple-600 text-lg">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>
        </div>
        
        <div class="flex gap-4 flex-col sm:flex-row">
            <a href="{{ route('tiket-ku') }}" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-xl transition">
                Lihat Tiket-ku
            </a>
            <a href="{{ route('beranda') }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-xl transition">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>

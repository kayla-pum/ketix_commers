<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket-ku - Ketix</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-['Inter']">

    <!-- Navbar -->
    <div class="bg-white shadow-sm mb-8">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">

            <!-- Logo -->
            <a href="{{ route('beranda') }}"
               class="flex items-center gap-3 text-2xl  font-bold text-[#334EAC]">

                <div class="w-10 h-10 rounded-xl overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('assets/logo2.png') }}"
                         alt="Logo Ketix"
                         class="w-10 h-10 bg-[#334EAC] p-1">
                </div>

                <h1>Ketix</h1>
            </a>

            <!-- Menu -->
            <div class="flex gap-4 items-center">

                <a href="{{ route('beranda') }}"
                   class="text-gray-600 hover:text-[#334EAC] font-medium transition">
                    Beranda
                </a>

                <span class="text-gray-300">|</span>

                <span class="text-sm text-gray-600">
                    Halo, {{ Auth::user()->name }}
                </span>

            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-6xl mx-auto px-4 pb-12">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            Riwayat Pembelian Tiket
        </h1>

        @if($orders->count() > 0)

            <div class="grid gap-6">

                @foreach($orders as $order)

                <div class="bg-white rounded-2xl shadow-sm overflow-hidden flex flex-col md:flex-row">

                    <!-- Event Image -->
                    <div class="md:w-1/4 h-48 md:h-auto">

                        <img
                            src="{{ $order->event->image ? asset($order->event->image) : 'https://picsum.photos/seed/'.$order->event->id.'/400/300' }}"
                            class="w-full h-full object-cover"
                            alt="Event">

                    </div>

                    <!-- Order Details -->
                    <div class="p-6 md:w-3/4 flex flex-col justify-between">

                        <div>

                            <div class="flex justify-between items-start mb-2">

                                <div>

                                    <h2 class="text-xl font-bold text-gray-800">
                                        {{ $order->event->name }}
                                    </h2>

                                    <p class="text-gray-500 text-sm">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ \Carbon\Carbon::parse($order->event->date)->format('d F Y') }}
                                    </p>

                                </div>

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase">
                                    Lunas
                                </span>

                            </div>

                            <!-- Detail -->
                            <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4 text-sm border-t border-b py-4">

                                <div>
                                    <span class="block text-gray-500 mb-1">
                                        Order ID
                                    </span>

                                    <span class="font-semibold">
                                        #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>

                                <div>
                                    <span class="block text-gray-500 mb-1">
                                        Tanggal Pesan
                                    </span>

                                    <span class="font-semibold">
                                        {{ $order->created_at->format('d M Y') }}
                                    </span>
                                </div>

                                <div>
                                    <span class="block text-gray-500 mb-1">
                                        Jumlah
                                    </span>

                                    <span class="font-semibold">
                                        {{ $order->quantity }} Tiket
                                    </span>
                                </div>

                                <div>
                                    <span class="block text-gray-500 mb-1">
                                        Total Bayar
                                    </span>

                                    <span class="font-semibold text-[#334EAC]">
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </span>
                                </div>

                            </div>

                        </div>

                        <!-- Ticket List -->
                        <div class="mt-4">

                            <h4 class="font-semibold text-gray-700 mb-3 text-sm">
                                Daftar E-Tiket:
                            </h4>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                                @foreach($order->tickets as $ticket)

                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-3 flex justify-between items-center">

                                    <div>

                                        <p class="font-medium text-gray-800 text-sm">
                                            {{ $ticket->name }}
                                        </p>

                                        <p class="text-xs text-gray-500">
                                            KTP: {{ $ticket->ktp }}
                                        </p>

                                    </div>

                                    <!-- Ticket Code -->
                                    <div class="bg-white border border-[#334EAC] px-3 py-1 rounded-lg text-xs font-mono font-bold text-[#334EAC]">
                                        {{ $ticket->ticket_code }}
                                    </div>

                                </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        @else

            <!-- Empty State -->
            <div class="bg-white rounded-2xl shadow-sm p-12 text-center">

                <div class="w-24 h-24 bg-[#EEF2FF] rounded-full flex items-center justify-center mx-auto mb-4">

                    <i class="fas fa-ticket-alt text-4xl text-[#334EAC]"></i>

                </div>

                <h3 class="text-xl font-bold text-gray-700 mb-2">
                    Belum ada tiket
                </h3>

                <p class="text-gray-500 mb-6">
                    Anda belum pernah membeli tiket event apapun.
                </p>

                <a href="{{ route('jelajah') }}"
                   class="inline-block bg-[#334EAC] hover:bg-[#22357A] text-white font-semibold py-3 px-8 rounded-xl transition">

                    Cari Event Sekarang

                </a>

            </div>

        @endif

    </div>

</body>
</html>
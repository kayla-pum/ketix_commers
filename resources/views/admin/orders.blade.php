<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan - Ketix Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-['Inter']">
    <div class="flex h-screen">
        <div class="w-64 bg-[#334EAC] text-white">
            <div class="p-5">
                <div class="flex items-center gap-3 mb-8">
                    <i class="fas fa-ticket-alt text-2xl"></i>
                    <span class="text-xl font-bold">Ketix Admin</span>
                </div>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-[#334EAC] transition">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.orders') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#334EAC]">
                        <i class="fas fa-receipt"></i>
                        <span>Penjualan</span>
                    </a>
                    <a href="{{ route('admin.events.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-[#334EAC] transition">
                        <i class="fas fa-plus-circle"></i>
                        <span>Tambah Event</span>
                    </a>
                    <a href="{{ route('beranda') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-[#334EAC] transition">
                        <i class="fas fa-globe"></i>
                        <span>Lihat Website</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-8">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-600 transition w-full">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </div>
        <div class="flex-1 overflow-auto">
            <div class="bg-white shadow-sm px-6 py-4">
                <h1 class="text-2xl font-bold text-gray-800">Penjualan / Orders</h1>
                <p class="text-gray-500">Kelola dan pantau semua penjualan tiket</p>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Pendapatan</p>
                                <p class="text-3xl font-bold text-blue-600">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</p>
                            </div>
                            <i class="fas fa-money-bill text-4xl text-blue-200"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Penjualan</p>
                                <p class="text-3xl font-bold text-green-600">{{ $orders->total() }}</p>
                            </div>
                            <i class="fas fa-shopping-cart text-4xl text-green-200"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Rata-rata Pembelian</p>
                                <p class="text-3xl font-bold text-[#334EAC]">Rp {{ $orders->total() > 0 ? number_format($totalRevenue / $orders->total(), 0, ',', '.') : '0' }}</p>
                            </div>
                            <i class="fas fa-chart-line text-4xl text-[#9db3eb]"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b">
                        <h2 class="text-lg font-bold">Daftar Pemesanan</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Pembeli</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Event</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah Tiket</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Metode Pembayaran</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 font-medium text-[#334EAC]">#{{ $order->id }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium">{{ $order->user->name ?? 'N/A' }}</div>
                                        <div class="text-sm text-gray-500">{{ $order->user->email ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4">{{ $order->event->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-600 rounded-full font-medium">
                                            {{ $order->quantity }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-bold text-green-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                            {{ $order->payment_method == 'BCA' ? 'bg-blue-100 text-blue-800' : 'bg-orange-100 text-orange-800' }}">
                                            <i class="fas fa-university mr-2"></i>
                                            {{ $order->payment_method ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-2"></i>
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                        <i class="fas fa-inbox text-4xl mb-4 opacity-50"></i>
                                        <p class="mt-2">Belum ada pemesanan</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-6">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

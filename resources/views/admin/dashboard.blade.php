<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ketix</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-['Inter']">
    <div class="flex h-screen">
        <div class="w-64 bg-gradient-to-b from-purple-800 to-indigo-900 text-white">
            <div class="p-5">
                <div class="flex items-center gap-3 mb-8">
                    <i class="fas fa-ticket-alt text-2xl"></i>
                    <span class="text-xl font-bold">Ketix Admin</span>
                </div>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-purple-700">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.orders') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-700 transition">
                        <i class="fas fa-receipt"></i>
                        <span>Penjualan</span>
                    </a>
                    <a href="{{ route('admin.events.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-700 transition">
                        <i class="fas fa-plus-circle"></i>
                        <span>Tambah Event</span>
                    </a>
                    <a href="{{ route('beranda') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-700 transition">
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
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
                <p class="text-gray-500">Selamat datang, {{ auth()->user()->name }}!</p>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Event</p>
                                <p class="text-3xl font-bold text-purple-600">{{ $totalEvents }}</p>
                            </div>
                            <i class="fas fa-calendar text-4xl text-purple-200"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Event Aktif</p>
                                <p class="text-3xl font-bold text-green-600">{{ $events->count() }}</p>
                            </div>
                            <i class="fas fa-check-circle text-4xl text-green-200"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Pendapatan</p>
                                <p class="text-3xl font-bold text-blue-600">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</p>
                            </div>
                            <i class="fas fa-money-bill text-4xl text-blue-200"></i>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Penjualan</p>
                                <p class="text-3xl font-bold text-orange-600">{{ $totalOrders ?? 0 }}</p>
                            </div>
                            <i class="fas fa-shopping-cart text-4xl text-orange-200"></i>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
                @endif
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b">
                        <h2 class="text-lg font-bold">Daftar Event</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Event</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @foreach($events as $event)
                                <tr>
                                    <td class="px-6 py-4">{{ $event->id }}</td>
                                    <td class="px-6 py-4">
                                        @if($event->image)
                                        <img src="{{ asset($event->image) }}" class="w-12 h-12 rounded object-cover">
                                        @else
                                        <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium">{{ $event->name }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4">Rp {{ number_format($event->price, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">{{ $event->location }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Yakin hapus event ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-6">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

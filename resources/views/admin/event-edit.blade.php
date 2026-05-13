<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-['Inter']">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-purple-800 to-indigo-900 text-white">
            <div class="p-5">
                <div class="flex items-center gap-3 mb-8">
                    <i class="fas fa-ticket-alt text-2xl"></i>
                    <span class="text-xl font-bold">Ketix Admin</span>
                </div>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-700 transition">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.events.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-700 transition">
                        <i class="fas fa-plus-circle"></i>
                        <span>Tambah Event</span>
                    </a>
                    <a href="{{ route('beranda') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-purple-700 transition">
                        <i class="fas fa-globe"></i>
                        <span>Lihat Website</span>
                    </a>
                </nav>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <div class="bg-white shadow-sm px-6 py-4">
                <h1 class="text-2xl font-bold text-gray-800">Edit Event</h1>
            </div>
            
            <div class="p-6">
                <div class="bg-white rounded-xl shadow-sm p-6 max-w-2xl">
                    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Nama Event</label>
                            <input type="text" name="name" value="{{ $event->name }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Tanggal</label>
                                <input type="date" name="date" value="{{ $event->date }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Harga (Rp)</label>
                                <input type="number" name="price" value="{{ $event->price }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Lokasi</label>
                            <input type="text" name="location" value="{{ $event->location }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Kategori</label>
                            <select name="category" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                                <option value="Festival" {{ $event->category == 'Festival' ? 'selected' : '' }}>Festival</option>
                                <option value="Konser" {{ $event->category == 'Konser' ? 'selected' : '' }}>Konser</option>
                                <option value="Komedi" {{ $event->category == 'Komedi' ? 'selected' : '' }}>Komedi</option>
                                <option value="Pameran" {{ $event->category == 'Pameran' ? 'selected' : '' }}>Pameran</option>
                                <option value="Workshop" {{ $event->category == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                            </select>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Gambar Event</label>
                            @if($event->image)
                            <div class="mb-2">
                                <img src="{{ asset($event->image) }}" class="w-32 h-32 object-cover rounded">
                            </div>
                            @endif
                            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                            <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar</p>
                        </div>
                        
                        <div class="flex gap-3">
                            <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">
                                Update Event
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
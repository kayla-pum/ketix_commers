<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ketix - Platform Tiket Event</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f3f4f6;
            color: #1f2937;
        }
        
        /* Card hover effects */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #FFD166, #FF6B6B, #4ECDC4);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        /* Container desktop */
        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Header */
        .header {
            background: white;
            border-radius: 20px;
            padding: 20px 30px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #8b5cf6, #6d28d9);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-icon i {
            color: white;
            font-size: 20px;
        }
        
        .logo h1 {
            font-size: 28px;
            background: linear-gradient(135deg, #8b5cf6, #6d28d9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Navigasi */
        .nav {
            display: flex;
            gap: 30px;
            background: #f9fafb;
            padding: 8px 20px;
            border-radius: 50px;
        }
        
        .nav a {
            text-decoration: none;
            color: #6b7280;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 30px;
            transition: all 0.3s;
        }
        
        .nav a.active {
            background: linear-gradient(135deg, #8b5cf6, #6d28d9);
            color: white;
        }
        
        .nav a:hover:not(.active) {
            background: #e5e7eb;
            color: #4b5563;
        }
        
        /* Banner Promo */
        .banner {
            background: linear-gradient(135deg, #8b5cf6, #6d28d9);
            border-radius: 24px;
            padding: 40px;
            margin-bottom: 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .banner h3 {
            font-size: 28px;
            margin-top: 8px;
        }
        
        .banner i {
            font-size: 64px;
            opacity: 0.8;
        }
        
        /* Section Header */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .section-header h2 {
            font-size: 24px;
            font-weight: 700;
        }
        
        .section-header a {
            color: #8b5cf6;
            text-decoration: none;
            font-weight: 600;
        }
        
        /* Grid Event */
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }
        
        /* Card Event */
        .event-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }
        
        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -12px rgba(0,0,0,0.15);
        }
        
        .event-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .event-content {
            padding: 20px;
        }
        
        .event-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
        }
        
        .event-header h3 {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
        }
        
        .category {
            background: #f3e8ff;
            color: #7c3aed;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .event-info {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }
        
        .event-info i {
            width: 16px;
            color: #8b5cf6;
        }
        
        .event-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
        }
        
        .price {
            font-size: 20px;
            font-weight: 700;
            color: #7c3aed;
        }
        
        .btn-beli {
            background: linear-gradient(135deg, #8b5cf6, #6d28d9);
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .btn-beli:hover {
            transform: scale(0.98);
        }
        
        /* Horizontal Scroll untuk Populer */
        .scroll-container {
            overflow-x: auto;
            display: flex;
            gap: 20px;
            padding-bottom: 10px;
        }
        
        .scroll-container::-webkit-scrollbar {
            height: 6px;
        }
        
        .scroll-container::-webkit-scrollbar-track {
            background: #e5e7eb;
            border-radius: 10px;
        }
        
        .scroll-container::-webkit-scrollbar-thumb {
            background: #c4b5fd;
            border-radius: 10px;
        }
        
        .popular-card {
            min-width: 220px;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        .popular-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }
        
        .popular-card .content {
            padding: 12px;
        }
        
        .popular-card h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }
        
        .popular-card .popular-price {
            color: #7c3aed;
            font-weight: 700;
            font-size: 14px;
            margin-top: 8px;
        }
        
        /* Event dari database (Laris Manis) */
        .event-db-section {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            border-radius: 24px;
            padding: 40px;
            margin: 40px 0;
            color: white;
        }
        
        /* Footer */
        .footer {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-top: 40px;
            text-align: center;
            color: #6b7280;
        }
        
        @media (max-width: 768px) {
            .container-custom {
                padding: 16px;
            }
            
            .header {
                flex-direction: column;
                gap: 16px;
            }
            
            .event-grid {
                grid-template-columns: 1fr;
            }
            
            .banner {
                flex-direction: column;
                text-align: center;
                gap: 16px;
            }
            
            .banner i {
                font-size: 48px;
            }
            
            .event-db-section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container-custom">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h1>Ketix</h1>
            </div>
            <div class="nav">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('jelajah') }}" class="{{ request()->routeIs('jelajah') ? 'active' : '' }}">Jelajah</a>
                <a href="#">Tiket-ku</a>
            </div>
            <div>
                <i class="fas fa-search" style="color: #9ca3af; font-size: 20px; cursor: pointer;"></i>
            </div>
        </div>
        
        <!-- Banner Promo -->
        <div class="banner">
            <div>
                <p>✨ Flash Sale</p>
                <h3>Diskon 20%</h3>
                <p>Kode: KETIX20</p>
            </div>
            <i class="fas fa-tags"></i>
        </div>
        
        <!-- Rekomendasi Section -->
        <div class="section-header">
            <h2>🔥 Rekomendasi</h2>
            <a href="#">Lihat semua <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <!-- Grid Event (Static) -->
        <div class="event-grid">
            <!-- Card 1: Peanuts Fest -->
            <div class="event-card">
                <img src="https://picsum.photos/id/104/400/300" alt="Peanuts Fest" class="event-image">
                <div class="event-content">
                    <div class="event-header">
                        <h3>Peanuts Fest</h3>
                        <span class="category">Festival</span>
                    </div>
                    <div class="event-info">
                        <i class="far fa-calendar-alt"></i>
                        <span>25 April 2029</span>
                    </div>
                    <div class="event-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jakarta Convention Center</span>
                    </div>
                    <div class="event-footer">
                        <span class="price">Rp 320.000</span>
                        <button class="btn-beli"><i class="fas fa-ticket-alt"></i> Beli</button>
                    </div>
                </div>
            </div>
            
            <!-- Card 2: Jazz Night -->
            <div class="event-card">
                <img src="https://picsum.photos/id/107/400/300" alt="Jazz Night" class="event-image">
                <div class="event-content">
                    <div class="event-header">
                        <h3>Jazz Night Vibes</h3>
                        <span class="category">Konser</span>
                    </div>
                    <div class="event-info">
                        <i class="far fa-calendar-alt"></i>
                        <span>10 Mei 2029</span>
                    </div>
                    <div class="event-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Taman Ismail Marzuki</span>
                    </div>
                    <div class="event-footer">
                        <span class="price">Rp 450.000</span>
                        <button class="btn-beli"><i class="fas fa-ticket-alt"></i> Beli</button>
                    </div>
                </div>
            </div>
            
            <!-- Card 3: Comedy Show -->
            <div class="event-card">
                <img src="https://picsum.photos/id/20/400/300" alt="Comedy Show" class="event-image">
                <div class="event-content">
                    <div class="event-header">
                        <h3>Comedy Showdown</h3>
                        <span class="category">Komedi</span>
                    </div>
                    <div class="event-info">
                        <i class="far fa-calendar-alt"></i>
                        <span>3 Juni 2029</span>
                    </div>
                    <div class="event-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Teater Jakarta</span>
                    </div>
                    <div class="event-footer">
                        <span class="price">Rp 200.000</span>
                        <button class="btn-beli"><i class="fas fa-ticket-alt"></i> Beli</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- SECTION LARIS MANIS (Dari Database) -->
        <div class="event-db-section">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-6xl font-black mb-4">
                    LARIS <span class="gradient-text">MANIS</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-300">
                    Kumpulan event-event laris manis di Ketix yang mungkin kamu sukai
                </p>
            </div>

            <!-- Events Grid dari Database -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($events as $event)
                <div class="card-hover bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/20">
                    <!-- Event Image -->
                    @if($event->image_url)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover hover:scale-110 transition duration-500">
                    </div>
                    @else
                    <div class="h-48 bg-gradient-to-br from-amber-500/30 to-pink-500/30 flex items-center justify-center">
                        <span class="text-5xl">🎪</span>
                    </div>
                    @endif

                    <div class="p-5">
                        <!-- Title -->
                        <h3 class="text-xl font-bold mb-2">{{ $event->title }}</h3>
                        
                        <!-- Subtitle -->
                        @if($event->subtitle)
                        <p class="text-amber-400 font-semibold mb-3 text-sm">{{ $event->subtitle }}</p>
                        @endif
                        
                        <!-- Performers -->
                        @if($event->performers)
                        <div class="mb-4">
                            <div class="flex flex-wrap gap-2">
                                @foreach(json_decode($event->performers) ?? [] as $performer)
                                <span class="text-xs bg-white/20 px-2 py-1 rounded-full">{{ $performer }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Date & Location -->
                        <div class="space-y-2 text-gray-300 text-sm mb-4">
                            <div class="flex items-center gap-2">
                                <i class="far fa-calendar-alt"></i>
                                <span>{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $event->location }}</span>
                            </div>
                        </div>

                        <!-- Status Badge -->
                        @if($event->status == 'upcoming')
                        <div class="inline-block px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">
                            <i class="fas fa-clock"></i> Upcoming
                        </div>
                        @elseif($event->status == 'ongoing')
                        <div class="inline-block px-3 py-1 bg-orange-500/20 text-orange-400 rounded-full text-xs font-semibold">
                            <i class="fas fa-play"></i> Ongoing
                        </div>
                        @else
                        <div class="inline-block px-3 py-1 bg-gray-500/20 text-gray-400 rounded-full text-xs font-semibold">
                            <i class="fas fa-check-circle"></i> Completed
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <i class="fas fa-calendar-times text-5xl text-gray-400 mb-4"></i>
                    <p class="text-gray-400">Belum ada event tersedia</p>
                    <p class="text-gray-500 text-sm">Silahkan tambahkan event melalui database</p>
                </div>
                @endforelse
            </div>
        </div>
        
        <!-- Populer Section -->
        <div class="section-header">
            <h2>⭐ Populer Minggu Ini</h2>
            <a href="#">Lihat semua <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="scroll-container">
            <div class="popular-card">
                <img src="https://picsum.photos/id/29/300/200" alt="Music Fest">
                <div class="content">
                    <h4>Music Fest 2029</h4>
                    <p style="font-size: 12px; color: #6b7280;">12 Mei 2029</p>
                    <div class="popular-price">Rp 180.000</div>
                </div>
            </div>
            <div class="popular-card">
                <img src="https://picsum.photos/id/91/300/200" alt="Art Exhibition">
                <div class="content">
                    <h4>Art Exhibition</h4>
                    <p style="font-size: 12px; color: #6b7280;">20 Mei 2029</p>
                    <div class="popular-price">Rp 95.000</div>
                </div>
            </div>
            <div class="popular-card">
                <img src="https://picsum.photos/id/169/300/200" alt="Food Festival">
                <div class="content">
                    <h4>Food Festival</h4>
                    <p style="font-size: 12px; color: #6b7280;">5 Juni 2029</p>
                    <div class="popular-price">Rp 75.000</div>
                </div>
            </div>
            <div class="popular-card">
                <img src="https://picsum.photos/id/96/300/200" alt="Tech Summit">
                <div class="content">
                    <h4>Tech Summit 2029</h4>
                    <p style="font-size: 12px; color: #6b7280;">15 Juni 2029</p>
                    <div class="popular-price">Rp 350.000</div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2029 Ketix. Temukan event terbaik untukmu!</p>
        </div>
    </div>
    
    <script>
        // Event card click handler
        document.querySelectorAll('.event-card').forEach(card => {
            card.addEventListener('click', function(e) {
                if(e.target.closest('.btn-beli')) return;
                const eventName = this.querySelector('h3')?.innerText || 'Event';
                alert(`Detail event: ${eventName}`);
            });
        });
        
        // Tombol beli handler
        document.querySelectorAll('.btn-beli').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                alert('✨ Tiket ditambahkan! ✨');
            });
        });
        
        // Navbar active
        document.querySelectorAll('.nav a').forEach(link => {
            if(link.getAttribute('href') !== '#') {
                link.addEventListener('click', function(e) {
                    if(this.getAttribute('href') === '#') {
                        e.preventDefault();
                        alert('Fitur sedang dalam pengembangan');
                    }
                });
            }
        });
    </script>
</body>
</html>
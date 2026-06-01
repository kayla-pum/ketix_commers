<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ketix - Platform Tiket Event</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
        
        
        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        
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
            background: linear-gradient(135deg, #334EAC, #334EAC);
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
            background: linear-gradient(135deg, #334EAC, #334EAC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }
        
        
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
            background: linear-gradient(135deg, #334EAC, #334EAC);
            color: white;
        }
        
        .nav a:hover:not(.active) {
            background: #e5e7eb;
            color: #4b5563;
        }
        
        .banner {
            background: linear-gradient(135deg, #334EAC, #334EAC);
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
            color: #334EAC;
            text-decoration: none;
            font-weight: 600;
        }
        
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }
        
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
            color: #334EAC;
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
            color: #334EAC;
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
            color: #334EAC;
        }
        
        .btn-beli {
            background: linear-gradient(135deg, #334EAC, #334EAC);
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
            background: #96a4d7;
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
            color: #334EAC;
            font-weight: 700;
            font-size: 14px;
            margin-top: 8px;
            margin-bottom: 12px;
        }
        
        .popular-card .btn-beli-popular {
            background: linear-gradient(135deg, #334EAC, #334EAC);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            display: inline-block;
            text-decoration: none;
            width: 100%;
            text-align: center;
            font-size: 13px;
        }
        
        .popular-card .btn-beli-popular:hover {
            transform: scale(0.98);
            box-shadow: 0 4px 12px rgba(51, 78, 172, 0.3);
        }
        
        .popular-card .btn-beli-popular:active {
            transform: scale(0.95);
        }
        
        .event-db-section {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            border-radius: 24px;
            padding: 40px;
            margin: 40px 0;
            color: white;
        }
        
        /* Premium Footer Styles */
        .footer-premium {
            background: #334EAC;
            border-radius: 24px;
            padding: 60px 50px 30px 50px;
            margin-top: 50px;
            color: white;
            box-shadow: 0 10px 30px rgba(51, 78, 172, 0.15);
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 40px;
            margin-bottom: 25px;
        }
        
        .footer-left {
            flex: 1;
            min-width: 280px;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .footer-logo img {
            width: 56px;
            height: 56px;
            object-fit: contain;
            border-radius: 0;
            background: transparent;
            display: block;
        }
        
        .footer-logo h2 {
            font-size: 32px;
            font-weight: 800;
            color: white;
            letter-spacing: -0.5px;
        }
        
        .footer-tagline {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }
        
        .footer-right {
            display: flex;
            gap: 60px;
            flex-wrap: wrap;
        }
        
        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.2s ease, transform 0.2s ease;
            display: inline-block;
        }
        
        .footer-links a:hover {
            color: white;
            transform: translateX(4px);
        }
        
        .footer-bottom {
            text-align: center;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
        }

        /* Kategori Event Section Styles */
        .category-container {
            margin-bottom: 40px;
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }
        
        .category-title {
            font-size: 22px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 24px;
            position: relative;
            display: inline-block;
        }

        .category-title::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 40px;
            height: 4px;
            background: #334EAC;
            border-radius: 2px;
        }
        
        .category-list {
            display: flex;
            justify-content: space-between;
            overflow-x: auto;
            padding: 10px 5px 15px 5px;
            scrollbar-width: none; /* Hide scrollbar Firefox */
            -ms-overflow-style: none; /* Hide scrollbar IE */
        }
        
        @media (max-width: 992px) {
            .category-list {
                justify-content: flex-start;
                gap: 24px;
            }
        }
        
        .category-list::-webkit-scrollbar {
            display: none; /* Hide scrollbar Chrome/Safari */
        }
        
        .category-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            flex-shrink: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            user-select: none;
        }
        
        .category-item:hover {
            transform: translateY(-6px);
        }
        
        .category-circle {
            width: 74px;
            height: 74px;
            background: #f8fafc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.04);
            border: 2px solid transparent;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .category-item:hover .category-circle {
            background: white;
            box-shadow: 0 10px 20px rgba(51, 78, 172, 0.12);
            border-color: rgba(51, 78, 172, 0.1);
        }
        
        .category-circle i {
            font-size: 26px;
            color: #334EAC;
            transition: all 0.3s ease;
        }
        
        .category-label {
            font-size: 14px;
            font-weight: 600;
            color: #4b5563;
            transition: all 0.3s ease;
        }
        
        /* Active State */
        .category-item.active .category-circle {
            background: #334EAC;
            box-shadow: 0 10px 20px rgba(51, 78, 172, 0.3);
            border-color: #334EAC;
        }
        
        .category-item.active .category-circle i {
            color: white;
            transform: scale(1.1);
        }
        
        .category-item.active .category-label {
            color: #334EAC;
            font-weight: 700;
        }
        
        /* Smooth Fade In Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        
        @media (max-width: 768px) {
            .container-custom {
                padding: 16px;
            }
            
            .header {
                flex-direction: column;
                gap: 20px;
                padding: 20px;
                border-radius: 16px;
                text-align: center;
            }
            
            .nav {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 12px;
                padding: 8px 16px;
            }
            
            .nav a {
                padding: 6px 12px;
                font-size: 14px;
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
            
            .category-container {
                padding: 20px 16px;
                border-radius: 20px;
                margin-bottom: 30px;
            }
            
            .category-list {
                gap: 20px;
            }
            
            .category-circle {
                width: 66px;
                height: 66px;
            }
            
            .category-circle i {
                font-size: 22px;
            }
            
            .category-label {
                font-size: 13px;
            }
        }
        
        @media (max-width: 480px) {
            .logo h1 {
                font-size: 24px;
            }
            .nav {
                gap: 6px;
            }
            .nav a {
                padding: 6px 10px;
                font-size: 13px;
            }
            .category-circle {
                width: 58px;
                height: 58px;
            }
            .category-circle i {
                font-size: 20px;
            }
            .category-label {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container-custom">
        
        <div class="header">
            <div class="logo">
                <div class="logo-icon">
                    <img src="{{ asset('assets/logo2.png') }}" alt= "Logo Ketix" 
                    style="widht: 75%; height: 75%; object-fit: cover; border-radius: 12px;">
                </div>
                <h1>Ketix</h1>
            </div>
            <div class="nav">
                <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('jelajah') }}" class="{{ request()->routeIs('jelajah') ? 'active' : '' }}">Jelajah</a>
                @auth
                    <a href="{{ route('tiket-ku') }}">Tiket-ku</a>
                @else
                    <a href="{{ route('login') }}">Tiket-ku</a>
                @endauth
            </div>
            
            <div class="flex gap-4 items-center">
                <!-- Search Icon -->
                <i class="fas fa-search" style="color: #9ca3af; font-size: 20px; cursor: pointer;"></i>
                
                @auth
                    @if(Auth::user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-purple-600">Admin</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600">Logout</button>
                    </form>
                @endauth
            </div>
        </div>

        <div class="section-header">
            <h2>🔥 Rekomendasi</h2>
            <a href="#">Lihat semua <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="event-grid">
            @forelse($recommendedEvents as $event)
            <div class="event-card" data-category="{{ $event->category }}">
                <img src="{{ $event->image ? asset($event->image) : 'https://picsum.photos/seed/'.$event->id.'/400/300' }}" alt="{{ $event->name }}" class="event-image">
                <div class="event-content">
                    <div class="event-header">
                        <h3>{{ $event->name }}</h3>
                        <span class="category">{{ $event->category ?? 'Event' }}</span>
                    </div>
                    <div class="event-info">
                        <i class="far fa-calendar-alt"></i>
                        <span>{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</span>
                    </div>
                    <div class="event-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $event->location }}</span>
                    </div>
                    <div class="event-footer">
                        <span class="price">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                        <a href="{{ route('checkout', $event->id) }}" class="btn-beli inline-block text-center text-sm"><i class="fas fa-ticket-alt"></i> Beli</a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px 0; color: #6b7280;">
                <i class="fas fa-calendar-times" style="font-size: 48px; margin-bottom: 16px; color: #d1d5db;"></i>
                <p>Belum ada event rekomendasi saat ini.</p>
            </div>
            @endforelse
            
            <!-- Empty state for recommended events filter -->
            <div id="recommended-empty" style="display: none; grid-column: 1 / -1; text-align: center; padding: 40px 0; color: #6b7280;">
                <i class="fas fa-calendar-times" style="font-size: 48px; margin-bottom: 16px; color: #d1d5db;"></i>
                <p>Belum ada event rekomendasi di kategori ini.</p>
            </div>
        </div>

        <!-- Kategori Event Section -->
        <div class="category-container">
            <h2 class="category-title">Kategori Event</h2>
            <div class="category-list">
                <div class="category-item active" data-filter="semua">
                    <div class="category-circle">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <span class="category-label">Semua</span>
                </div>
                <div class="category-item" data-filter="Festival">
                    <div class="category-circle">
                        <i class="fa-solid fa-tent"></i>
                    </div>
                    <span class="category-label">Festival</span>
                </div>
                <div class="category-item" data-filter="Konser">
                    <div class="category-circle">
                        <i class="fa-solid fa-guitar"></i>
                    </div>
                    <span class="category-label">Konser</span>
                </div>
                <div class="category-item" data-filter="Komedi">
                    <div class="category-circle">
                        <i class="fa-solid fa-face-laugh-beam"></i>
                    </div>
                    <span class="category-label">Komedi</span>
                </div>
                <div class="category-item" data-filter="Pameran">
                    <div class="category-circle">
                        <i class="fa-solid fa-palette"></i>
                    </div>
                    <span class="category-label">Pameran</span>
                </div>
                <div class="category-item" data-filter="Workshop">
                    <div class="category-circle">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <span class="category-label">Workshop</span>
                </div>
                <div class="category-item" data-filter="Olahraga">
                    <div class="category-circle">
                        <i class="fa-solid fa-volleyball"></i>
                    </div>
                    <span class="category-label">Olahraga</span>
                </div>
            </div>
        </div>
        
        <div class="section-header">
            <h2>⭐ Populer Minggu Ini</h2>
            <a href="#">Lihat semua <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="scroll-container">
            @forelse($popularEvents as $event)
            <div class="popular-card" data-category="{{ $event->category }}">
                <img src="{{ $event->image ? asset($event->image) : 'https://picsum.photos/seed/pop'.$event->id.'/300/200' }}" alt="{{ $event->name }}">
                <div class="content">
                    <h4>{{ $event->name }}</h4>
                    <p style="font-size: 12px; color: #6b7280;">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
                    <div class="popular-price">Rp {{ number_format($event->price, 0, ',', '.') }}</div>
                    <a href="{{ route('checkout', $event->id) }}" class="btn-beli-popular"><i class="fas fa-ticket-alt" style="margin-right: 4px;"></i> Beli</a>
                </div>
            </div>
            @empty
            <div style="padding: 20px; color: #6b7280; font-size: 14px;">
                Belum ada event populer saat ini.
            </div>
            @endforelse
            
            <!-- Empty state for popular events filter -->
            <div id="popular-empty" style="display: none; padding: 30px; color: #6b7280; font-size: 14px; text-align: center; width: 100%;">
                <i class="fas fa-calendar-times" style="font-size: 32px; margin-bottom: 12px; color: #d1d5db;"></i>
                <p>Belum ada event populer di kategori ini saat ini.</p>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer-premium">
            <div class="footer-content">
                <div class="footer-left">
                    <div class="footer-logo">
                        <img src="{{ asset('assets/logo2.png') }}" alt="Logo Ketix">
                        <h2>Ketix</h2>
                    </div>
                    <p class="footer-tagline">Your Professional Ticketing Partner</p>
                </div>
                <div class="footer-right">
                    <div class="footer-links">
                        <a href="#">Tentang Kami</a>
                        <a href="#">Our Journey</a>
                        <a href="#">Hubungi Kami</a>
                        <a href="#">Biaya</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Ketix. All rights reserved.</p>
            </div>
        </div>
    </div>
    
    <script>
        // Check if user is authenticated
        const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
        const loginUrl = '{{ route("login") }}';
    
        document.querySelectorAll('.event-card').forEach(card => {
            card.addEventListener('click', function(e) {
                if(e.target.closest('.btn-beli')) return;
                const eventName = this.querySelector('h3')?.innerText || 'Event';
                alert(`Detail event: ${eventName}`);
            });
        });
        
        // Handle click on buy buttons
        document.querySelectorAll('.btn-beli, .btn-beli-popular').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const checkoutUrl = this.getAttribute('href');
                
                if(!isAuthenticated) {
                    // User is not authenticated
                    const confirmLogin = confirm('Anda harus login untuk membeli tiket. Apakah Anda ingin login sekarang?');
                    if(confirmLogin) {
                        window.location.href = loginUrl;
                    }
                } else {
                    // User is authenticated, proceed to checkout
                    window.location.href = checkoutUrl;
                }
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

        // Category Filter Logic (Homepage redirects to Jelajah)
        document.querySelectorAll('.category-item').forEach(item => {
            item.addEventListener('click', function() {
                const selectedCategory = this.getAttribute('data-filter');
                window.location.href = '{{ route("jelajah") }}?category=' + encodeURIComponent(selectedCategory);
            });
        });
    </script>
</body>
</html>
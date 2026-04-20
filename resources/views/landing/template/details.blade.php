<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $template['name'] }} - Details | DarkandBright</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:400,600,700,800" rel="stylesheet" />
    <style>
        :root {
            --primary: #002147;
            --accent: #3b82f6;
            --text-main: #0f172a;
            --text-light: #64748b;
            --bg-body: #ffffff;
            --bg-alt: #f8fafc;
            --border: #e2e8f0;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Outfit', sans-serif; color: var(--text-main); line-height: 1.6; background-color: var(--bg-body); }
        
        /* NAVBAR SIMULASI */
        .nav-simple { padding: 1.25rem 7%; border-bottom: 1px solid var(--border); background: white; position: sticky; top: 0; z-index: 100; }
        .nav-left { display: flex; align-items: center; gap: 2rem; }
        
        .btn-back { 
            display: flex; 
            align-items: center; 
            gap: 0.5rem; 
            text-decoration: none; 
            color: var(--text-light); 
            font-weight: 700; 
            font-size: 0.95rem; 
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            border: 1px solid var(--border);
        }
        .btn-back:hover { color: var(--primary); background: var(--bg-alt); border-color: var(--primary); }
        .btn-back svg { transition: transform 0.3s; }
        .btn-back:hover svg { transform: translateX(-3px); }

        .logo { font-weight: 800; font-size: 1.5rem; text-decoration: none; color: var(--primary); }
        .logo span { color: var(--accent); }

        .main-container { max-width: 1300px; margin: 2rem auto; padding: 0 5%; display: grid; grid-template-columns: 1fr 380px; gap: 4rem; }

        /* LEFT COLUMN */
        .breadcrumb { font-size: 0.9rem; color: var(--text-light); margin-bottom: 1.5rem; }
        h1 { font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem; letter-spacing: -1px; }
        
        .seller-info { display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem; }
        .seller-avatar { width: 40px; height: 40px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; }
        .seller-name { font-weight: 700; color: var(--text-main); }
        .rating-stars { color: #f59e0b; font-weight: 700; }
        .orders-count { color: var(--text-light); border-left: 1px solid var(--border); padding-left: 1rem; }

        .media-gallery { width: 100%; border-radius: 20px; overflow: hidden; margin-bottom: 3rem; background: var(--bg-alt); border: 1px solid var(--border); }
        .media-gallery img { width: 100%; height: auto; display: block; object-fit: contain; }

        .section-header { font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem; padding-top: 1rem; }
        .description-text { font-size: 1.1rem; color: var(--text-light); margin-bottom: 3rem; white-space: pre-line; }

        /* FEATURES CHECKLIST */
        .features-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-bottom: 3rem; background: var(--bg-alt); padding: 2rem; border-radius: 20px; }
        .feature-item { display: flex; align-items: center; gap: 0.75rem; font-weight: 600; color: var(--primary); }
        .feature-item svg { color: #22c55e; width: 20px; height: 20px; }

        /* REVIEWS */
        .review-card { padding: 2rem 0; border-top: 1px solid var(--border); }
        .review-user { display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; }
        .review-avatar { width: 32px; height: 32px; background: #e2e8f0; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: 700; }
        .review-name { font-weight: 700; }
        .review-text { color: var(--text-light); }

        /* RIGHT COLUMN (SIDEBAR) */
        .sidebar { position: sticky; top: 2rem; }
        .pricing-card { border: 1px solid var(--border); border-radius: 12px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); }
        
        .tabs { display: flex; background: var(--bg-alt); border-bottom: 1px solid var(--border); }
        .tab { flex: 1; padding: 1.25rem; text-align: center; cursor: pointer; font-weight: 700; color: var(--text-light); border-bottom: 2px solid transparent; transition: all 0.3s; }
        .tab.active { color: var(--accent); border-bottom-color: var(--accent); background: white; }

        .package-content { padding: 2rem; }
        .package-price { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
        .price { font-size: 1.75rem; font-weight: 800; color: var(--primary); }
        .package-desc { font-size: 0.95rem; color: var(--text-light); margin-bottom: 1.5rem; }
        
        .delivery-info { display: flex; align-items: center; gap: 1rem; font-weight: 700; margin-bottom: 2rem; font-size: 0.9rem; }
        
        .inclusions-list { list-style: none; margin-bottom: 2rem; }
        .inclusion { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; font-size: 0.95rem; color: var(--text-main); font-weight: 500; }
        .inclusion svg { width: 14px; height: 14px; color: var(--text-light); }

        .btn-order { width: 100%; padding: 1.1rem; background: var(--primary); color: white; border: none; border-radius: 8px; font-weight: 800; font-size: 1rem; cursor: pointer; transition: all 0.3s; margin-bottom: 1rem; }
        .btn-order:hover { background: var(--accent); }
        .btn-contact { width: 100%; padding: 0.9rem; background: transparent; color: var(--primary); border: 2px solid var(--border); border-radius: 8px; font-weight: 700; cursor: pointer; }
        .btn-demo { width: 100%; padding: 0.9rem; background: #3b82f6; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; margin-bottom: 1rem; text-align: center; text-decoration: none; display: block; transition: all 0.3s; }
        .btn-demo:hover { background: #2563eb; }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .main-container { grid-template-columns: 1fr; }
            .sidebar { position: static; margin-top: 3rem; }
        }
    </style>
</head>
<body>

    <nav class="nav-simple">
        <div class="nav-left">
            <a href="{{ route('home') }}" class="btn-back">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Kembali
            </a>
            <a href="{{ route('home') }}" class="logo">Dark<span>andBright</span></a>
        </div>
    </nav>

    <div class="main-container">
        <!-- LEFT: CONTENT -->
        <div class="content">
            <div class="breadcrumb">{{ $template['category'] }}</div>
            <h1>{{ $template['name'] }}</h1>
            
            <div class="seller-info">
                <div class="seller-avatar">DB</div>
                <div>
                    <span class="seller-name">DarkandBright</span>
                    <span class="rating-stars">★ {{ $template['rating'] }}</span>
                    <span class="orders-count">({{ $template['reviews_count'] }} Pesanan Selesai)</span>
                </div>
            </div>

            <div class="media-gallery">
                <img src="{{ $template['image'] }}" alt="{{ $template['name'] }}">
            </div>

            <h2 class="section-header">Tentang Desain Ini</h2>
            <div class="description-text">{{ $template['description'] }}</div>

            <h2 class="section-header">Apa yang Anda Dapatkan?</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    Mobile Responsive
                </div>
                <div class="feature-item">
                    <svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    WhatsApp Integration
                </div>
                <div class="feature-item">
                    <svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    High-End Design
                </div>
                <div class="feature-item">
                    <svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    SEO Optimized
                </div>
            </div>

            <h2 class="section-header">Testimoni Pelanggan</h2>
            <div class="reviews-list">
                @foreach($template['reviews'] as $review)
                <div class="review-card">
                    <div class="review-user">
                        <div class="review-avatar">{{ $review['avatar'] }}</div>
                        <div class="review-name">{{ $review['user'] }}</div>
                        <div class="rating-stars">{{ str_repeat('★', $review['stars']) }}</div>
                    </div>
                    <p class="review-text">"{{ $review['comment'] }}"</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- RIGHT: SIDEBAR -->
        <div class="sidebar">
            <div class="pricing-card">
                <div class="tabs">
                    <div class="tab active" data-package="basic">Basic</div>
                    <div class="tab" data-package="standard">Standard</div>
                    <div class="tab" data-package="premium">Premium</div>
                </div>

                @foreach($template['packages'] as $key => $pkg)
                <div class="package-content" id="pkg-{{ $key }}" style="{{ $loop->first ? '' : 'display:none;' }}">
                    <div class="package-price">
                        <span style="font-weight: 700; color: var(--text-light)">Total Harga</span>
                        <span class="price">Rp {{ $pkg['price'] }}</span>
                    </div>
                    <p class="package-desc">Paket Lengkap Digital {{ ucfirst($key) }} untuk bisnis Anda.</p>
                    
                    <div class="delivery-info">
                        <span>🕒 {{ $pkg['delivery'] }} Pengerjaan</span>
                        <span>🔄 Unlimited Revision</span>
                    </div>

                    <ul class="inclusions-list">
                        @foreach($pkg['features'] as $feature)
                        <li class="inclusion">
                            <svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('template.demo', $template['id']) }}" target="_blank" class="btn-demo">
                        🎨 LIHAT DEMO LIVE
                    </a>
                    <a href="https://wa.me/6285859044929?text=Halo%20DarkandBright,%20saya%20tertarik%20untuk%20memesan%20template%20{{ urlencode($template['name']) }}%20paket%20{{ ucfirst($key) }}.%20Mohon%20infonya." target="_blank" class="btn-order" style="text-align: center; text-decoration: none; display: block;">
                        PESAN SEKARANG (WHATSAPP)
                    </a>
                    <button class="btn-contact">Hubungi Penjual</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Deactivate all
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.package-content').forEach(c => c.style.display = 'none');
                
                // Activate clicked
                tab.classList.add('active');
                const pkgId = 'pkg-' + tab.getAttribute('data-package');
                document.getElementById(pkgId).style.display = 'block';
            });
        });
    </script>
</body>
</html>

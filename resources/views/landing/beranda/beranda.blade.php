<!-- HERO SECTION - ULTRA COMPACT -->
<header id="beranda" class="hero-section">
    <div class="hero-container">
        <div class="hero-content">
            <h1 class="hero-title">{{ $hero->title ?? 'Jasa Desain Website' }} <span>{{ $hero->title_highlight ?? 'Murah & Mewah' }}</span></h1>
            
            <div class="hero-article">
                <p>
                    {!! $hero->description ?? '<strong>Khusus buat UMKM:</strong> Tingkatkan orderan WA Anda dengan website profesional siap pakai. Sekali bayar, langsung online, hasil pasti memuaskan!' !!}
                </p>
            </div>

            <div class="hero-actions">
                <a href="{{ $hero->button_link ?? '#' }}" class="btn-primary-custom" target="_blank">{{ $hero->button_text ?? 'Pesan Sekarang' }}</a>
                <a href="{{ $hero->secondary_button_link ?? '#template' }}" class="btn-outline-custom">{{ $hero->secondary_button_text ?? 'Lihat Desain' }}</a>
            </div>
        </div>
        
        <div class="hero-visual">
            <img src="{{ Str::startsWith($hero->image ?? '', 'http') ? ($hero->image ?? '') : asset($hero->image ?? 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=300') }}" alt="Design Service" class="hero-img-small" />
        </div>
    </div>
</header>

<style>
    .hero-section {
        padding: 3rem 7% 2.5rem 7%; /* Ultra compact padding */
        background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        display: flex;
        align-items: center;
        border-bottom: 1px solid #f1f5f9;
    }

    .hero-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1400px;
        margin: 0 auto;
        gap: 2rem;
        width: 100%;
    }

    .hero-content {
        flex: 1;
        max-width: 700px;
        text-align: left;
    }

    .hero-title {
        font-size: 2.5rem; /* Compact size */
        color: #0f172a;
        line-height: 1.2;
        margin-bottom: 1rem;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .hero-title span {
        color: #002147;
    }

    .hero-article {
        margin-bottom: 1.5rem;
    }

    .hero-article p {
        font-size: 1.05rem;
        color: #475569;
        line-height: 1.5;
        margin-bottom: 0;
    }

    .hero-article p strong {
        color: #002147;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
    }

    .btn-primary-custom {
        background-color: #002147;
        color: #fff;
        text-decoration: none;
        padding: 0.85rem 1.75rem;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        display: inline-block;
        box-shadow: 0 4px 10px rgba(0, 33, 71, 0.15);
    }

    .btn-primary-custom:hover {
        background-color: #0c3461;
        transform: translateY(-2px);
    }

    .btn-outline-custom {
        background-color: white;
        color: #002147;
        text-decoration: none;
        border: 1px solid #e2e8f0;
        padding: 0.85rem 1.75rem;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .btn-outline-custom:hover {
        background-color: #f8fafc;
        border-color: #002147;
    }

    .hero-visual {
        display: block;
    }

    .hero-img-small {
        width: 220px; /* Very compact image */
        height: 140px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
        transition: transform 0.3s ease;
    }

    .hero-img-small:hover {
        transform: scale(1.05);
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .hero-container { flex-direction: column-reverse; text-align: center; gap: 1.5rem; }
        .hero-content { text-align: center; }
        .hero-actions { justify-content: center; }
        .hero-visual { display: flex; justify-content: center; }
        .hero-title { font-size: 2rem; }
        .hero-section { padding: 2rem 5%; }
        .hero-img-small { width: 180px; height: 120px; }
    }
</style>

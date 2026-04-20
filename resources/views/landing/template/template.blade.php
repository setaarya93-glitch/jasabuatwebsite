<!-- TEMPLATE SHOWCASE SECTION -->
<section id="template" class="template-section">
    <div class="section-container">
        <div class="section-heading">
            <h2 class="section-title">Pilih <span>Template Website</span> Anda</h2>
            <p class="section-subtitle">Tersedia beragam pilihan desain elegan yang siap tayang untuk mendongkrak jualan UMKM Anda.</p>
        </div>

        <div class="template-scroll-wrapper">
            <div class="template-grid">
                @foreach($templatesDB as $tmpl)
                <div class="card-template">
                    <div class="template-image-box">
                        <a href="{{ route('template.details', $tmpl->id) }}">
                            <img src="{{ Str::startsWith($tmpl->image, 'http') ? $tmpl->image : asset($tmpl->image) }}" alt="{{ $tmpl->name }}" />
                        </a>
                        @if($loop->first)
                        <div class="template-badge">Terlaris</div>
                        @elseif($loop->iteration == 3 || $loop->iteration == 5)
                        <div class="template-badge badge-new">Baru</div>
                        @endif
                    </div>
                    <div class="template-info">
                        <h3>{{ $tmpl->name }}</h3>
                        <p class="template-price">Rp {{ $tmpl->packages['basic']['price'] ?? '150.000' }}</p>
                        <div class="template-actions">
                            <a href="{{ route('template.details', $tmpl->id) }}" class="btn-template-primary">Pesan Sekarang</a>
                            <button class="btn-template-outline">Demo</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="scroll-hint">
            <span>← Geser untuk pilihan lainnya →</span>
        </div>
    </div>
</section>

<style>
    .template-section {
        padding: 8rem 0;
        background-color: #f8fafc;
        border-top: 1px solid #f1f5f9;
        border-bottom: 1px solid #f1f5f9;
    }

    .section-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 7%;
    }

    .section-title {
        font-size: 3rem;
        color: #0f172a;
        margin-bottom: 1.5rem;
        font-weight: 800;
        letter-spacing: -1px;
        text-align: center;
    }

    .section-title span {
        color: #002147;
    }

    .section-subtitle {
        color: #64748b;
        font-size: 1.15rem;
        margin-bottom: 5rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
        text-align: center;
    }

    .template-scroll-wrapper {
        margin: 0 -7%;
        padding: 0 7% 3rem 7%;
        overflow-x: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
        cursor: grab;
    }

    .template-scroll-wrapper::-webkit-scrollbar {
        display: none;
    }

    .template-grid {
        display: flex;
        gap: 3rem;
        scroll-snap-type: x mandatory;
    }

    .card-template {
        background: #ffffff;
        border-radius: 32px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid #f1f5f9;
        flex: 0 0 400px;
        scroll-snap-align: center;
        overflow: hidden;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
    }

    .card-template:hover {
        transform: translateY(-12px);
        box-shadow: 0 30px 60px -15px rgba(0, 33, 71, 0.15);
        border-color: #002147;
    }

    .template-image-box {
        position: relative;
        height: 250px;
        background-color: #f1f5f9;
        overflow: hidden;
    }

    .template-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .card-template:hover .template-image-box img {
        transform: scale(1.1);
    }

    .template-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: #ef4444;
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 800;
        z-index: 10;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .badge-new {
        background-color: #3b82f6;
    }

    .template-info {
        padding: 2.5rem;
    }

    .template-info h3 {
        color: #0f172a;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        font-weight: 800;
    }

    .template-price {
        color: #002147;
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 2rem;
        display: block;
    }

    .template-actions {
        display: flex;
        gap: 1rem;
    }

    .btn-template-primary {
        flex: 1.5;
        background-color: #002147;
        color: #fff;
        border: none;
        padding: 0.85rem;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-template-primary:hover {
        background-color: #0c3461;
        transform: translateY(-2px);
    }

    .btn-template-outline {
        flex: 1;
        background-color: transparent;
        color: #002147;
        border: 2px solid #e2e8f0;
        padding: 0.85rem;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-template-outline:hover {
        border-color: #002147;
        background-color: #f8fafc;
    }

    .scroll-hint {
        text-align: center;
        color: #94a3b8;
        font-weight: 600;
        font-size: 0.9rem;
        margin-top: 1rem;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    @media (max-width: 900px) {
        .card-template { flex: 0 0 320px; }
        .template-image-box { height: 200px; }
        .template-info { padding: 1.5rem; }
        .template-price { font-size: 1.5rem; }
        .section-title { font-size: 2.25rem; }
    }
</style>

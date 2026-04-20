<!-- KATEGORI SECTION -->
<section id="kategori" class="categories-section">
    <div class="section-container">
        <div class="section-heading">
            <h2 class="section-title">Solusi untuk Berbagai <span>Bidang Usaha</span></h2>
        </div>

        <div class="category-scroll-wrapper">
            <div class="category-grid">
                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&q=80&w=150"
                            alt="Kuliner" />
                    </div>
                    <h3>Kuliner & Warung</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1534723452862-4c874018d66d?auto=format&fit=crop&q=80&w=150"
                            alt="Toko Kelontong" />
                    </div>
                    <h3>Toko Kelontong</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&q=80&w=150"
                            alt="Fashion" />
                    </div>
                    <h3>Fashion & Retail</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&q=80&w=150"
                            alt="Jasa" />
                    </div>
                    <h3>Jasa & Servis</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=150"
                            alt="Properti" />
                    </div>
                    <h3>Properti & Kos</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&q=80&w=150"
                            alt="Rental" />
                    </div>
                    <h3>Rental & Otomotif</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1545173168-9f1947eebb7f?auto=format&fit=crop&q=80&w=150"
                            alt="Laundry" />
                    </div>
                    <h3>Laundry & Dry Clean</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&q=80&w=150"
                            alt="Barbershop" />
                    </div>
                    <h3>Barbershop & Pangkas</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1541480605637-296291a24d9f?auto=format&fit=crop&q=80&w=150"
                            alt="Pet Shop" />
                    </div>
                    <h3>Pet Shop & Klinik</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1533227268408-a5eb4bc7a934?auto=format&fit=crop&q=80&w=150"
                            alt="Sembako" />
                    </div>
                    <h3>Agen & Sembako</h3>
                </div>

                <div class="card-category">
                    <div class="category-icon-bg">
                        <img src="https://images.unsplash.com/photo-1453614512568-c4024d13c247?auto=format&fit=crop&q=80&w=150"
                            alt="Cafe" />
                    </div>
                    <h3>Cafe & Kedai Kopi</h3>
                </div>
            </div>
        </div>

        <div class="scroll-hint">
            <span>← Geser untuk pilihan lainnya →</span>
        </div>
    </div>
</section>

<style>
    .categories-section {
        padding: 5rem 0;
        text-align: center;
        background-color: #ffffff;
    }

    .section-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 7%;
    }

    .section-title {
        font-size: 2.75rem;
        color: #0f172a;
        margin-bottom: 1.25rem;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .section-title span {
        color: #002147;
    }

    .section-subtitle {
        color: #64748b;
        font-size: 1.1rem;
        margin-bottom: 4rem;
        max-width: 650px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.5;
    }

    .category-scroll-wrapper {
        margin: 0 -7%;
        padding: 0 7% 2rem 7%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .category-scroll-wrapper::-webkit-scrollbar {
        display: none;
    }

    .category-grid {
        display: flex;
        gap: 1.5rem;
        width: max-content;
        /* Ensure items don't wrap */
        padding-bottom: 1rem;
    }

    .card-category {
        background: #f8fafc;
        padding: 1.25rem 0.75rem;
        border-radius: 18px;
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
        flex: 0 0 130px;
        /* Fixed width to prevent shrinking */
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.6rem;
    }

    .card-category:hover {
        background: #ffffff;
        border-color: #3b82f6;
        transform: translateY(-5px);
        box-shadow: 0 12px 20px -10px rgba(59, 130, 246, 0.15);
    }

    .category-icon-bg {
        width: 52px;
        height: 52px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        border: 2px solid #f1f5f9;
        transition: transform 0.3s ease;
    }

    .card-category:hover .category-icon-bg {
        transform: scale(1.1);
        border-color: #3b82f6;
    }

    .category-icon-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-category h3 {
        color: #002147;
        font-size: 0.85rem;
        margin-bottom: 0;
        font-weight: 700;
        line-height: 1.2;
    }

    .scroll-hint {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 1.5rem;
        color: #94a3b8;
        font-weight: 600;
        font-size: 0.85rem;
        opacity: 0.8;
    }

    @media (max-width: 900px) {
        .categories-section {
            padding: 4rem 0;
        }

        .section-title {
            font-size: 1.85rem;
        }

        .section-container {
            padding: 0 5%;
        }

        .card-category {
            flex: 0 0 110px;
            padding: 1rem 0.5rem;
        }

        .category-icon-bg {
            width: 48px;
            height: 48px;
        }
    }
</style>
</style>
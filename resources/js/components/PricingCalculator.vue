<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import { Check, Calculator, Store, Palette, Smartphone, Globe, Shield, Headphones, Wrench, Sparkles, ChevronRight } from 'lucide-vue-next';

// Tipe bisnis (untuk konteks/rekomendasi)
const businessTypes = [
    { id: 'kuliner', name: 'Kuliner & F&B', icon: Store },
    { id: 'fashion', name: 'Fashion & Retail', icon: Palette },
    { id: 'jasa', name: 'Jasa & Profesional', icon: Headphones },
    { id: 'properti', name: 'Properti & Travel', icon: Globe },
    { id: 'lainnya', name: 'Bisnis Lainnya', icon: Sparkles },
];

const selectedBusinessType = ref('kuliner');

// Fitur dari API
interface Feature {
    id: number;
    name: string;
    slug: string;
    description: string;
    price: number;
    is_recommended: boolean;
}

const contentFeatures = ref<Feature[]>([]);
const supportServices = ref<Feature[]>([]);
const loading = ref(true);
const error = ref('');

// Fetch data dari API
const fetchFeatures = async () => {
    try {
        const response = await fetch('/api/calculator-features');
        if (!response.ok) throw new Error('Failed to fetch');
        const data = await response.json();
        contentFeatures.value = data.contentFeatures || [];
        supportServices.value = data.supportServices || [];
    } catch (err) {
        error.value = 'Gagal memuat data fitur';
        console.error(err);
    } finally {
        loading.value = false;
    }
};

onMounted(fetchFeatures);

const selectedFeatures = ref<Set<number>>(new Set());

const toggleFeature = (id: number) => {
    if (selectedFeatures.value.has(id)) {
        selectedFeatures.value.delete(id);
    } else {
        selectedFeatures.value.add(id);
    }
};

// Total harga
const totalPrice = computed(() => {
    let total = 0;

    // Hitung fitur konten
    contentFeatures.value.forEach(feature => {
        if (selectedFeatures.value.has(feature.id)) {
            total += feature.price;
        }
    });

    // Hitung layanan dukungan
    supportServices.value.forEach(service => {
        if (selectedFeatures.value.has(service.id)) {
            total += service.price;
        }
    });

    return total;
});

// Ringkasan pesanan
const selectedItems = computed(() => {
    const items: { name: string; price: number }[] = [];

    contentFeatures.value.forEach(feature => {
        if (selectedFeatures.value.has(feature.id)) {
            items.push({ name: feature.name, price: feature.price });
        }
    });

    supportServices.value.forEach(service => {
        if (selectedFeatures.value.has(service.id)) {
            items.push({ name: service.name, price: service.price });
        }
    });

    return items;
});

// Generate pesan WhatsApp
const whatsappMessage = computed(() => {
    const businessName = businessTypes.find(b => b.id === selectedBusinessType.value)?.name || 'Bisnis';

    let message = `Halo Zetaz Digital! 👋\n\n`;
    message += `Saya tertarik membuat website untuk bisnis saya.\n\n`;
    message += `*Jenis Bisnis:* ${businessName}\n`;
    message += `*Fitur yang dipilih:*\n`;

    if (selectedItems.value.length === 0) {
        message += `- (Belum memilih fitur)\n`;
    } else {
        selectedItems.value.forEach(item => {
            message += `- ${item.name}\n`;
        });
    }

    message += `\n*Estimasi Total:* Rp ${formatPrice(totalPrice.value)}\n\n`;
    message += `Mohon informasi lebih lanjut. Terima kasih! 🙏`;

    return encodeURIComponent(message);
});

const formatPrice = (price: number) => {
    return price.toLocaleString('id-ID');
};

const openWhatsApp = () => {
    const phone = '6285859044929';
    const url = `https://wa.me/${phone}?text=${whatsappMessage.value}`;
    window.open(url, '_blank');
};
</script>

<template>
    <section id="kalkulator" class="calculator-section">
        <div class="calculator-container">
            <div class="calculator-header">
                <div class="header-icon">
                    <Calculator class="icon" />
                </div>
                <h2 class="section-title">Rakit Paket <span>Website Anda</span></h2>
                <p class="section-subtitle">
                    Pilih fitur sesuai kebutuhan bisnis Anda. Tidak ada biaya tersembunyi, transparan sepenuhnya!
                </p>
            </div>

            <div class="calculator-grid">
                <!-- Left: Pilihan Fitur -->
                <div class="calculator-left">
                    <!-- Pilihan Jenis Bisnis -->
                    <div class="selection-group">
                        <h3 class="group-title">1. Pilih Jenis Bisnis (Konteks)</h3>
                        <div class="business-types">
                            <button
                                v-for="type in businessTypes"
                                :key="type.id"
                                @click="selectedBusinessType = type.id"
                                :class="['business-btn', { active: selectedBusinessType === type.id }]"
                            >
                                <component :is="type.icon" class="btn-icon" />
                                <span>{{ type.name }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- Loading State -->
                    <div v-if="loading" class="selection-group">
                        <h3 class="group-title">Memuat Data...</h3>
                        <div class="text-center py-8 text-gray-500">
                            <Calculator class="w-8 h-8 mx-auto animate-pulse mb-2" />
                            <p>Memuat fitur kalkulator...</p>
                        </div>
                    </div>

                    <!-- Error State -->
                    <div v-else-if="error" class="selection-group">
                        <h3 class="group-title">Error</h3>
                        <div class="text-center py-8 text-red-500">
                            <p>{{ error }}</p>
                            <button @click="fetchFeatures" class="mt-2 text-blue-600 hover:underline">Coba Lagi</button>
                        </div>
                    </div>

                    <!-- Fitur Tambahan -->
                    <div v-else class="selection-group">
                        <h3 class="group-title">2. Fitur Website</h3>
                        <div class="features-grid">
                            <label
                                v-for="feature in contentFeatures"
                                :key="feature.id"
                                :class="['feature-card', { selected: selectedFeatures.has(feature.id) }]"
                            >
                                <input
                                    type="checkbox"
                                    :checked="selectedFeatures.has(feature.id)"
                                    @change="toggleFeature(feature.id)"
                                    class="hidden"
                                />
                                <div class="feature-content">
                                    <div class="feature-header">
                                        <div class="checkbox-indicator">
                                            <Check v-if="selectedFeatures.has(feature.id)" class="check-icon" />
                                        </div>
                                        <span class="feature-name">{{ feature.name }}</span>
                                    </div>
                                    <p class="feature-description">{{ feature.description }}</p>
                                    <span class="feature-price">Rp {{ formatPrice(feature.price) }}</span>
                                </div>
                            </label>
                            <div v-if="contentFeatures.length === 0" class="text-center py-4 text-gray-500">
                                Belum ada fitur website tersedia
                            </div>
                        </div>
                    </div>

                    <!-- Layanan Dukungan -->
                    <div v-if="!loading && !error" class="selection-group">
                        <h3 class="group-title">3. Layanan Dukungan</h3>
                        <div class="features-grid">
                            <label
                                v-for="service in supportServices"
                                :key="service.id"
                                :class="['feature-card', { selected: selectedFeatures.has(service.id), recommended: service.is_recommended }]"
                            >
                                <input
                                    type="checkbox"
                                    :checked="selectedFeatures.has(service.id) || service.is_recommended"
                                    @change="toggleFeature(service.id)"
                                    class="hidden"
                                    :disabled="service.is_recommended"
                                />
                                <div class="feature-content">
                                    <div class="feature-header">
                                        <div class="checkbox-indicator">
                                            <Check v-if="selectedFeatures.has(service.id) || service.is_recommended" class="check-icon" />
                                        </div>
                                        <span class="feature-name">{{ service.name }}</span>
                                        <span v-if="service.is_recommended" class="badge-gratis">GRATIS</span>
                                    </div>
                                    <p class="feature-description">{{ service.description }}</p>
                                    <span class="feature-price">
                                        {{ service.price === 0 ? 'GRATIS' : `Rp ${formatPrice(service.price)}` }}
                                    </span>
                                </div>
                            </label>
                            <div v-if="supportServices.length === 0" class="text-center py-4 text-gray-500">
                                Belum ada layanan dukungan tersedia
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Ringkasan -->
                <div class="calculator-right">
                    <div class="summary-card">
                        <h3 class="summary-title">Ringkasan Pesanan</h3>

                        <div class="summary-content">
                            <div v-if="selectedItems.length === 0" class="empty-state">
                                <p>Belum ada fitur yang dipilih</p>
                                <span class="empty-hint">Silakan pilih fitur di sebelah kiri</span>
                            </div>

                            <div v-else class="summary-list">
                                <div v-for="(item, index) in selectedItems" :key="index" class="summary-item">
                                    <span class="item-name">{{ item.name }}</span>
                                    <span class="item-price">Rp {{ formatPrice(item.price) }}</span>
                                </div>
                            </div>

                            <div class="summary-divider"></div>

                            <div class="summary-total">
                                <span class="total-label">Total Estimasi</span>
                                <span class="total-price">Rp {{ formatPrice(totalPrice) }}</span>
                            </div>
                        </div>

                        <button @click="openWhatsApp" class="order-btn">
                            <span>Pesan Sekarang</span>
                            <ChevronRight class="btn-arrow" />
                        </button>

                        <p class="summary-note">
                            Klik tombol di atas untuk chat WhatsApp dengan detail pesanan yang sudah terisi otomatis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.calculator-section {
    padding: 6rem 7%;
    background: linear-gradient(135deg, #f8fafc 0%, #ffffff 50%, #f1f5f9 100%);
    border-top: 1px solid #e2e8f0;
}

.calculator-container {
    max-width: 1400px;
    margin: 0 auto;
}

.calculator-header {
    text-align: center;
    margin-bottom: 4rem;
}

.header-icon {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    box-shadow: 0 10px 30px rgba(0, 33, 71, 0.2);
}

.header-icon .icon {
    width: 32px;
    height: 32px;
    color: white;
}

.section-title {
    font-size: 2.75rem;
    color: #0f172a;
    margin-bottom: 1rem;
    font-weight: 800;
    letter-spacing: -1px;
}

.section-title span {
    color: #002147;
}

.section-subtitle {
    color: #64748b;
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.calculator-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 3rem;
}

/* Left Side */
.calculator-left {
    display: flex;
    flex-direction: column;
    gap: 2.5rem;
}

.selection-group {
    background: white;
    border-radius: 20px;
    padding: 1.75rem;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}

.group-title {
    font-size: 1.1rem;
    color: #0f172a;
    font-weight: 700;
    margin-bottom: 1.25rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Business Types */
.business-types {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.business-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    background: white;
    color: #475569;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.2s ease;
}

.business-btn:hover {
    border-color: #cbd5e1;
    background: #f8fafc;
}

.business-btn.active {
    border-color: #002147;
    background: #002147;
    color: white;
}

.btn-icon {
    width: 18px;
    height: 18px;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1rem;
}

.feature-card {
    position: relative;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.25rem;
    cursor: pointer;
    transition: all 0.2s ease;
    background: white;
}

.feature-card:hover {
    border-color: #cbd5e1;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.feature-card.selected {
    border-color: #002147;
    background: #f8fafc;
    box-shadow: 0 4px 12px rgba(0, 33, 71, 0.1);
}

.feature-card.recommended {
    border-color: #10b981;
    background: #ecfdf5;
}

.feature-content {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.feature-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.25rem;
}

.checkbox-indicator {
    width: 22px;
    height: 22px;
    border: 2px solid #cbd5e1;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.2s ease;
}

.feature-card.selected .checkbox-indicator {
    background: #002147;
    border-color: #002147;
}

.feature-card.recommended .checkbox-indicator {
    background: #10b981;
    border-color: #10b981;
}

.check-icon {
    width: 14px;
    height: 14px;
    color: white;
}

.feature-name {
    font-weight: 700;
    color: #0f172a;
    font-size: 0.95rem;
}

.badge-gratis {
    background: #10b981;
    color: white;
    font-size: 0.65rem;
    font-weight: 800;
    padding: 0.2rem 0.5rem;
    border-radius: 4px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.feature-description {
    font-size: 0.85rem;
    color: #64748b;
    line-height: 1.4;
    margin-left: 2rem;
}

.feature-price {
    font-weight: 800;
    color: #002147;
    font-size: 1rem;
    margin-left: 2rem;
}

.hidden {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}

/* Right Side: Summary */
.calculator-right {
    position: sticky;
    top: 2rem;
    height: fit-content;
}

.summary-card {
    background: white;
    border-radius: 20px;
    padding: 1.75rem;
    border: 1px solid #e2e8f0;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}

.summary-title {
    font-size: 1.25rem;
    color: #0f172a;
    font-weight: 800;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #f1f5f9;
}

.summary-content {
    margin-bottom: 1.5rem;
}

.empty-state {
    text-align: center;
    padding: 2rem 0;
    color: #94a3b8;
}

.empty-state p {
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.empty-hint {
    font-size: 0.85rem;
}

.summary-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.9rem;
    padding: 0.5rem 0;
}

.item-name {
    color: #475569;
    flex: 1;
}

.item-price {
    color: #0f172a;
    font-weight: 700;
    font-family: monospace;
}

.summary-divider {
    height: 2px;
    background: linear-gradient(90deg, #e2e8f0 0%, #cbd5e1 50%, #e2e8f0 100%);
    margin: 1rem 0;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.total-label {
    font-size: 1rem;
    font-weight: 700;
    color: #0f172a;
}

.total-price {
    font-size: 1.5rem;
    font-weight: 800;
    color: #002147;
}

.order-btn {
    width: 100%;
    background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
    color: white;
    border: none;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 4px 14px rgba(0, 33, 71, 0.3);
}

.order-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 33, 71, 0.4);
}

.btn-arrow {
    width: 20px;
    height: 20px;
    transition: transform 0.2s ease;
}

.order-btn:hover .btn-arrow {
    transform: translateX(4px);
}

.summary-note {
    font-size: 0.8rem;
    color: #94a3b8;
    text-align: center;
    line-height: 1.5;
}

/* Responsive */
@media (max-width: 1024px) {
    .calculator-grid {
        grid-template-columns: 1fr;
    }

    .calculator-right {
        position: relative;
        top: 0;
        order: -1;
    }

    .summary-card {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
}

@media (max-width: 768px) {
    .calculator-section {
        padding: 4rem 5%;
    }

    .section-title {
        font-size: 2rem;
    }

    .features-grid {
        grid-template-columns: 1fr;
    }

    .business-types {
        justify-content: center;
    }

    .business-btn {
        font-size: 0.85rem;
        padding: 0.6rem 1rem;
    }
}
</style>

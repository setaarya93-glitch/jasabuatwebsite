<script setup lang="ts">
import { MessageCircle, Calculator, FileText, Rocket } from 'lucide-vue-next';

const steps = [
    {
        number: '01',
        icon: Calculator,
        title: 'Rakit Paket Anda',
        description: 'Gunakan kalkulator di atas untuk memilih fitur website sesuai kebutuhan dan budget bisnis Anda.',
        highlight: 'Gratis konsultasi',
    },
    {
        number: '02',
        icon: MessageCircle,
        title: 'Chat WhatsApp',
        description: 'Klik "Pesan Sekarang" untuk langsung terhubung ke WhatsApp kami dengan detail pesanan otomatis terisi.',
        highlight: 'Respon cepat',
    },
    {
        number: '03',
        icon: FileText,
        title: 'Konfirmasi & DP',
        description: 'Kami akan konfirmasi pesanan Anda. Bayar DP 50% untuk memulai pengerjaan website.',
        highlight: 'DP 50%',
    },
    {
        number: '04',
        icon: Rocket,
        title: 'Website Online',
        description: 'Website Anda selesai dalam 3-7 hari. Pelunasan saat website sudah live dan Anda puas.',
        highlight: 'Revisi 3x gratis',
    },
];
</script>

<template>
    <section id="langkah" class="steps-section">
        <div class="steps-container">
            <div class="steps-header">
                <span class="section-badge">Proses Mudah</span>
                <h2 class="section-title">Cara Pesan Website <span>UMKM Anda</span></h2>
                <p class="section-subtitle">
                    Hanya 4 langkah sederhana untuk memiliki website profesional. Tanpa ribet, tanpa teknis, kami bantu sepenuhnya!
                </p>
            </div>

            <div class="steps-grid">
                <div v-for="(step, index) in steps" :key="step.number" class="step-card">
                    <div class="step-connector" v-if="index < steps.length - 1">
                        <div class="connector-line"></div>
                        <div class="connector-arrow">→</div>
                    </div>

                    <div class="step-number">{{ step.number }}</div>

                    <div class="step-icon-wrapper">
                        <component :is="step.icon" class="step-icon" />
                    </div>

                    <h3 class="step-title">{{ step.title }}</h3>
                    <p class="step-description">{{ step.description }}</p>

                    <span class="step-highlight">{{ step.highlight }}</span>
                </div>
            </div>

            <div class="steps-cta">
                <div class="cta-box">
                    <div class="cta-content">
                        <h3>Masih bingung memilih fitur?</h3>
                        <p>Konsultasi gratis via WhatsApp. Kami bantu rekomendasikan paket terbaik untuk bisnis Anda.</p>
                    </div>
                    <a href="https://wa.me/6285859044929?text=Halo%20Zetaz%20Digital,%20saya%20butuh%20bantuan%20memilih%20paket%20website" target="_blank" class="cta-btn">
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.steps-section {
    padding: 6rem 7%;
    background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
    border-top: 1px solid #e2e8f0;
}

.steps-container {
    max-width: 1400px;
    margin: 0 auto;
}

.steps-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-badge {
    display: inline-block;
    background: #ecfdf5;
    color: #059669;
    font-size: 0.85rem;
    font-weight: 700;
    padding: 0.5rem 1rem;
    border-radius: 50px;
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
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

.steps-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    position: relative;
}

.step-card {
    background: white;
    border-radius: 20px;
    padding: 2rem 1.5rem;
    text-align: center;
    border: 1px solid #e2e8f0;
    position: relative;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}

.step-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -10px rgba(0, 33, 71, 0.15);
    border-color: #002147;
}

.step-connector {
    position: absolute;
    top: 50%;
    right: -2rem;
    transform: translateY(-50%);
    display: flex;
    align-items: center;
    gap: 0.25rem;
    z-index: 1;
}

.connector-line {
    width: 1.5rem;
    height: 2px;
    background: #cbd5e1;
}

.connector-arrow {
    color: #cbd5e1;
    font-weight: 700;
    font-size: 1.25rem;
}

.step-number {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
    color: white;
    font-size: 0.75rem;
    font-weight: 800;
    padding: 0.35rem 0.75rem;
    border-radius: 20px;
    letter-spacing: 1px;
}

.step-icon-wrapper {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.25rem;
    transition: all 0.3s ease;
}

.step-card:hover .step-icon-wrapper {
    background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
}

.step-icon {
    width: 28px;
    height: 28px;
    color: #002147;
    transition: all 0.3s ease;
}

.step-card:hover .step-icon {
    color: white;
}

.step-title {
    font-size: 1.15rem;
    color: #0f172a;
    font-weight: 800;
    margin-bottom: 0.75rem;
}

.step-description {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.5;
    margin-bottom: 1rem;
}

.step-highlight {
    display: inline-block;
    background: #dbeafe;
    color: #1e40af;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 0.35rem 0.75rem;
    border-radius: 20px;
}

/* CTA Box */
.steps-cta {
    margin-top: 4rem;
}

.cta-box {
    background: linear-gradient(135deg, #002147 0%, #0c3461 100%);
    border-radius: 20px;
    padding: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
    box-shadow: 0 20px 40px -10px rgba(0, 33, 71, 0.3);
}

.cta-content h3 {
    color: white;
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
}

.cta-content p {
    color: #94a3b8;
    font-size: 1rem;
    max-width: 500px;
}

.cta-btn {
    background: white;
    color: #002147;
    text-decoration: none;
    padding: 1rem 2rem;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    transition: all 0.3s ease;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2);
}

.cta-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

/* Responsive */
@media (max-width: 1024px) {
    .steps-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 2.5rem;
    }

    .step-connector {
        display: none;
    }

    .cta-box {
        flex-direction: column;
        text-align: center;
    }

    .cta-content p {
        max-width: 100%;
    }
}

@media (max-width: 640px) {
    .steps-section {
        padding: 4rem 5%;
    }

    .section-title {
        font-size: 2rem;
    }

    .steps-grid {
        grid-template-columns: 1fr;
    }

    .step-card {
        padding: 1.75rem;
    }

    .cta-box {
        padding: 1.75rem;
    }

    .cta-content h3 {
        font-size: 1.25rem;
    }

    .cta-btn {
        width: 100%;
    }
}
</style>

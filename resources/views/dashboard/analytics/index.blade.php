@extends('dashboard.layouts.app')

@section('header', 'Prospek Target Pasar')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Rekomendasi Prospek Klien UMKM 2025-2026</h2>
        <p class="text-gray-500 mt-2">Menampilkan Analisis: <span class="font-bold text-blue-600">{{ $batch_name }}</span></p>
    </div>
    <div class="flex gap-3">
        <a href="{{ route('dashboard.analytics.history') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 flex items-center text-sm font-semibold">
            <i data-lucide="history" class="w-4 h-4 mr-2"></i> Lihat Riwayat
        </a>
        <form action="{{ route('dashboard.analytics.refresh') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center text-sm font-semibold shadow-sm">
                <i data-lucide="refresh-cw" class="w-4 h-4 mr-2"></i> Perbarui Analisis Minggu Ini
            </button>
        </form>
    </div>
</div>

<div class="space-y-6">
    @foreach ($trends as $trend)
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all hover:shadow-md">
        <div class="md:flex justify-between items-start">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600 border border-gray-200">
                        {{ $trend->category }}
                    </span>
                    <span class="text-green-600 font-bold text-sm bg-green-50 px-2 py-1 rounded">
                        <i data-lucide="trending-up" class="inline w-3 h-3 mr-1"></i> Pertumbuhan {{ $trend->growth_percentage }}
                    </span>
                </div>
                
                <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $trend->trend_name }}</h3>
                <p class="text-gray-600 text-sm mb-4 leading-relaxed max-w-3xl">
                    {{ $trend->description }}
                </p>

                <div class="bg-slate-50 p-3 rounded-lg border border-slate-100 inline-block mb-4 md:mb-0">
                    <p class="text-xs font-semibold text-slate-500 mb-1">Fitur Web Yang Mereka Butuhkan:</p>
                    <p class="text-sm text-slate-700 font-medium">
                        <i data-lucide="check-circle" class="inline w-4 h-4 text-blue-500 mr-1"></i> {{ $trend->website_features }}
                    </p>
                </div>
            </div>

            <!-- Scoring Bar -->
            <div class="md:w-64 mt-4 md:mt-0 md:ml-6 bg-slate-50 p-4 rounded-xl border border-slate-100 flex flex-col justify-center items-center text-center">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Peluang Penjualan Web</span>
                
                <!-- Display text logic -->
                @php
                    $colorClass = 'text-green-500';
                    $barColor = 'bg-green-500';
                    if($trend->score_value >= 90) { $colorClass = 'text-blue-600'; $barColor = 'bg-blue-600'; }
                    elseif($trend->score_value >= 70) { $colorClass = 'text-emerald-500'; $barColor = 'bg-emerald-500'; }
                    else { $colorClass = 'text-yellow-600'; $barColor = 'bg-yellow-500'; }
                @endphp

                <span class="text-xl font-extrabold {{ $colorClass }} mb-3 drop-shadow-sm">
                    {{ $trend->website_need_score }}
                </span>
                
                <div class="w-full bg-slate-200 rounded-full h-2.5 mb-1 overflow-hidden">
                    <div class="{{ $barColor }} h-2.5 rounded-full" style="width: {{ $trend->score_value }}%"></div>
                </div>
                <span class="text-xs text-slate-400 font-medium mt-1">Sistem Prediksi Akurasi {{ $trend->score_value }}%</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

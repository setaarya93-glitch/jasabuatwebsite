@extends('dashboard.layouts.app')

@section('header', 'Overview Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Stat 1 -->
    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex items-center">
        <div class="p-3 bg-blue-50 rounded-lg mr-4 text-blue-600">
            <i data-lucide="layout-template" class="w-8 h-8"></i>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Total Template</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $stats['total_templates'] }}</h3>
        </div>
    </div>

    <!-- Stat 2 -->
    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex items-center">
        <div class="p-3 bg-indigo-50 rounded-lg mr-4 text-indigo-600">
            <i data-lucide="rocket" class="w-8 h-8"></i>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Prospek Tinggi</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $stats['high_prospects'] }} UMKM</h3>
        </div>
    </div>

    <!-- Stat 3 -->
    <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm flex items-center">
        <div class="p-3 bg-{{ $stats['hero_exists'] ? 'green' : 'red' }}-50 rounded-lg mr-4 text-{{ $stats['hero_exists'] ? 'green' : 'red' }}-600">
            <i data-lucide="check-circle" class="w-8 h-8"></i>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Status Beranda</p>
            <h3 class="text-2xl font-bold text-slate-800">{{ $stats['hero_exists'] ? 'Aktif' : 'Belum Diatur' }}</h3>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-slate-900 text-white rounded-2xl p-8 relative overflow-hidden shadow-xl">
        <div class="relative z-10">
            <h3 class="text-2xl font-bold mb-4">Selamat Datang, {{ auth()->user()->name }}!</h3>
            <p class="text-slate-400 mb-6 leading-relaxed">
                Kelola konten website Zetaz Digital Anda dari sini. Gunakan menu analitik untuk memantau tren UMKM dan tawarkan jasa Anda pada target yang tepat.
            </p>
            <div class="flex gap-4">
                <a href="{{ route('dashboard.analytics.index') }}" class="px-5 py-2.5 bg-blue-500 hover:bg-blue-600 rounded-lg font-bold text-sm transition-colors flex items-center">
                    <i data-lucide="pie-chart" class="w-4 h-4 mr-2"></i> Buka Analitik
                </a>
                <a href="/" target="_blank" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 rounded-lg font-bold text-sm transition-colors flex items-center border border-slate-700">
                    <i data-lucide="external-link" class="w-4 h-4 mr-2"></i> Lihat Landing Page
                </a>
            </div>
        </div>
        <i data-lucide="zap" class="absolute -bottom-10 -right-10 w-48 h-48 text-slate-800 opacity-50 transform rotate-12"></i>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
        <h3 class="text-lg font-bold text-slate-800 mb-6 flex items-center">
            <i data-lucide="clock" class="w-5 h-5 mr-2 text-blue-500"></i> Pintasan Cepat
        </h3>
        <div class="space-y-4">
            <a href="{{ route('dashboard.template.create') }}" class="group flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50 transition-all">
                <div class="flex items-center">
                    <div class="p-2 bg-gray-100 group-hover:bg-white rounded-lg mr-4 text-gray-500 group-hover:text-blue-600 transition-colors">
                        <i data-lucide="plus-circle" class="w-5 h-5"></i>
                    </div>
                    <span class="font-bold text-slate-700">Tambah Template Baru</span>
                </div>
                <i data-lucide="chevron-right" class="w-5 h-5 text-gray-300 group-hover:text-blue-400"></i>
            </a>
            
            <a href="{{ route('dashboard.beranda.index') }}" class="group flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:border-blue-200 hover:bg-blue-50 transition-all">
                <div class="flex items-center">
                    <div class="p-2 bg-gray-100 group-hover:bg-white rounded-lg mr-4 text-gray-500 group-hover:text-blue-600 transition-colors">
                        <i data-lucide="edit" class="w-5 h-5"></i>
                    </div>
                    <span class="font-bold text-slate-700">Ubah Teks Hero Utama</span>
                </div>
                <i data-lucide="chevron-right" class="w-5 h-5 text-gray-300 group-hover:text-blue-400"></i>
            </a>
        </div>
    </div>
</div>
@endsection

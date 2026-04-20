@extends('dashboard.layouts.app')

@section('header', 'Riwayat Analisis Pasar')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Arsip Prediksi Mingguan</h2>
        <p class="text-gray-500 mt-2">Daftar rekaman prediksi yang pernah Anda buat untuk melihat perbandingan tren.</p>
    </div>
    <a href="{{ route('dashboard.analytics.index') }}" class="px-4 py-2 border border-blue-200 text-blue-600 rounded-lg hover:bg-blue-50 flex items-center text-sm font-semibold">
        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Kembali ke Terbaru
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-bottom border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Batch / Pekan Analisis</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal Dibuat</th>
                    <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($batches as $batch)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="p-2 bg-blue-50 text-blue-600 rounded-lg mr-3">
                                <i data-lucide="archive" class="w-4 h-4"></i>
                            </div>
                            <span class="font-bold text-slate-700">{{ $batch->batch_name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($batch->created_at)->translatedFormat('d F Y, H:i') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('dashboard.analytics.show', ['batch' => $batch->batch_name]) }}" class="inline-flex items-center px-3 py-1.5 bg-slate-800 text-white text-xs font-bold rounded-lg hover:bg-slate-700 transition">
                            <i data-lucide="eye" class="w-3.5 h-3.5 mr-1.5"></i> Lihat Data
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center text-gray-400">
                        <i data-lucide="folder-x" class="w-12 h-12 mx-auto mb-4 opacity-20"></i>
                        <p>Belum ada riwayat analisis yang tersimpan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

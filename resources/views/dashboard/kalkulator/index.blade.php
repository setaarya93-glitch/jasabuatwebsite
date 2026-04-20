@extends('dashboard.layouts.app')

@section('header', 'Kelola Kalkulator')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
        <div class="flex items-center">
            <div class="p-3 bg-blue-50 rounded-lg mr-3 text-blue-600">
                <i data-lucide="calculator" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Fitur</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $stats['total'] }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
        <div class="flex items-center">
            <div class="p-3 bg-purple-50 rounded-lg mr-3 text-purple-600">
                <i data-lucide="layout" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Fitur Website</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $stats['features'] }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
        <div class="flex items-center">
            <div class="p-3 bg-orange-50 rounded-lg mr-3 text-orange-600">
                <i data-lucide="headphones" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Layanan Dukungan</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $stats['services'] }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
        <div class="flex items-center">
            <div class="p-3 bg-green-50 rounded-lg mr-3 text-green-600">
                <i data-lucide="check-circle" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Fitur Aktif</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $stats['active'] }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Alert Messages -->
@if(session('success'))
<div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
    <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
    {{ session('success') }}
</div>
@endif

<!-- Features Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Daftar Fitur Kalkulator</h3>
        <a href="{{ route('dashboard.calculator-features.create') }}" class="btn-yellow px-4 py-2 rounded-lg shadow flex items-center text-sm">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm border-b">
                    <th class="px-6 py-4 font-medium">Nama Fitur</th>
                    <th class="px-6 py-4 font-medium">Kategori</th>
                    <th class="px-6 py-4 font-medium">Harga</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Urutan</th>
                    <th class="px-6 py-4 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($features as $feature)
                <tr class="hover:bg-gray-50 transition-colors {{ !$feature->is_active ? 'opacity-60' : '' }}">
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">{{ $feature->name }}</div>
                        <div class="text-xs text-gray-500">{{ $feature->slug }}</div>
                        @if($feature->description)
                        <div class="text-xs text-gray-400 mt-1 max-w-[250px] truncate">{{ $feature->description }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($feature->category === 'feature')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Fitur Website
                        </span>
                        @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                            Layanan Dukungan
                        </span>
                        @endif
                        @if($feature->is_recommended)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 ml-1">
                            Rekomendasi
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-semibold text-slate-800">Rp {{ number_format($feature->price, 0, ',', '.') }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($feature->is_active)
                        <span class="inline-flex items-center text-green-600 text-sm">
                            <i data-lucide="check-circle" class="w-4 h-4 mr-1"></i> Aktif
                        </span>
                        @else
                        <span class="inline-flex items-center text-red-600 text-sm">
                            <i data-lucide="x-circle" class="w-4 h-4 mr-1"></i> Nonaktif
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $feature->sort_order }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('dashboard.calculator-features.edit', $feature->id) }}" class="inline-block px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded text-sm font-medium transition">
                            <i data-lucide="pencil" class="w-3 h-3 inline mr-1"></i> Edit
                        </a>
                        <form action="{{ route('dashboard.calculator-features.destroy', $feature->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus fitur ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-50 text-red-600 hover:bg-red-100 rounded text-sm font-medium transition">
                                <i data-lucide="trash-2" class="w-3 h-3 inline mr-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <i data-lucide="calculator" class="w-12 h-12 mx-auto mb-3 opacity-30"></i>
                        <p class="font-medium">Belum ada fitur kalkulator.</p>
                        <p class="text-sm mt-1">Klik "Tambah Baru" untuk membuat fitur pertama.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

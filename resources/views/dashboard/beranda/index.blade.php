@extends('dashboard.layouts.app')

@section('header', 'Edit Beranda (Hero Section)')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <form action="{{ route('dashboard.beranda.update') }}" method="POST">
        @csrf
        
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Judul Utama</label>
                <input type="text" name="title" value="{{ old('title', $hero->title ?? '') }}" class="w-full px-4 py-2 border @error('title') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="Contoh: Jasa Desain Website">
                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Teks Sorotan (Highlight)</label>
                <input type="text" name="title_highlight" value="{{ old('title_highlight', $hero->title_highlight ?? '') }}" class="w-full px-4 py-2 border @error('title_highlight') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="Contoh: Murah & Mewah">
                @error('title_highlight') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Singkat</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="Deskripsi layanan...">{{ old('description', $hero->description ?? '') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Teks Tombol Utama</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $hero->button_text ?? '') }}" class="w-full px-4 py-2 border @error('button_text') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="Contoh: Pesan Sekarang">
                    @error('button_text') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Link Tombol Utama</label>
                    <input type="text" name="button_link" value="{{ old('button_link', $hero->button_link ?? '') }}" class="w-full px-4 py-2 border @error('button_link') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="https://wa.me/...">
                    @error('button_link') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Teks Tombol Sekunder</label>
                    <input type="text" name="secondary_button_text" value="{{ old('secondary_button_text', $hero->secondary_button_text ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 outline-none transition" placeholder="Contoh: Lihat Desain">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Link Tombol Sekunder</label>
                    <input type="text" name="secondary_button_link" value="{{ old('secondary_button_link', $hero->secondary_button_link ?? '') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 outline-none transition" placeholder="#template">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">URL Gambar Hero</label>
                <input type="text" name="image" value="{{ old('image', $hero->image ?? '') }}" class="w-full px-4 py-2 border @error('image') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition" placeholder="https://...">
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                @if(isset($hero) && $hero->image)
                    <div class="mt-4">
                        <p class="text-xs text-gray-500 mb-2">Preview Gambar Saat Ini:</p>
                        <img src="{{ $hero->image }}" class="h-32 rounded-lg object-cover border" alt="Preview Hero">
                    </div>
                @endif
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="btn-yellow px-6 py-2 rounded-lg shadow flex items-center">
                    <i data-lucide="save" class="w-5 h-5 mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

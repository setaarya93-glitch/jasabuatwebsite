@extends('dashboard.layouts.app')

@section('header', 'Edit Template: ' . $template->name)

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <form action="{{ route('dashboard.template.update', $template->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Template</label>
                    <input type="text" name="name" value="{{ old('name', $template->name) }}" required class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', $template->category) }}" required class="w-full px-4 py-2 border @error('category') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
                    @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
                <input type="text" name="image" value="{{ old('image', $template->image) }}" required class="w-full px-4 py-2 border @error('image') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <input type="text" name="rating" value="{{ old('rating', $template->rating) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Review</label>
                    <input type="number" name="reviews_count" value="{{ old('reviews_count', $template->reviews_count) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="4" required class="w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">{{ old('description', $template->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h4 class="text-lg font-bold text-gray-800 mb-4">Informasi Paket Penjualan</h4>
                
                @php
                    $pkgs = is_array($template->packages) ? $template->packages : json_decode($template->packages, true);
                    $revs = is_array($template->reviews) ? $template->reviews : json_decode($template->reviews, true);
                    
                    // Helpers
                    $getPkg = function($type, $key) use ($pkgs) {
                        if($key == 'features') {
                            $feats = $pkgs[$type][$key] ?? [];
                            return is_array($feats) ? implode(', ', $feats) : $feats;
                        }
                        return $pkgs[$type][$key] ?? '';
                    };

                    $getRev = function($index, $key) use ($revs) {
                        return $revs[$index][$key] ?? '';
                    };
                @endphp

                <!-- Basic Package -->
                <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-100">
                    <p class="font-bold text-blue-600 mb-3">Paket Basic</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Harga (Cth: 150.000)</label>
                            <input type="text" name="packages[basic][price]" value="{{ old('packages.basic.price', $getPkg('basic', 'price')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Durasi Pengerjaan (Cth: 1 Hari)</label>
                            <input type="text" name="packages[basic][delivery]" value="{{ old('packages.basic.delivery', $getPkg('basic', 'delivery')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Fitur (Pisahkan dengan koma)</label>
                        <input type="text" name="packages[basic][features]" value="{{ old('packages.basic.features', $getPkg('basic', 'features')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                    </div>
                </div>

                <!-- Standard Package -->
                <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-100">
                    <p class="font-bold text-blue-600 mb-3">Paket Standard</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Harga</label>
                            <input type="text" name="packages[standard][price]" value="{{ old('packages.standard.price', $getPkg('standard', 'price')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Durasi</label>
                            <input type="text" name="packages[standard][delivery]" value="{{ old('packages.standard.delivery', $getPkg('standard', 'delivery')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Fitur (Pisahkan dengan koma)</label>
                        <input type="text" name="packages[standard][features]" value="{{ old('packages.standard.features', $getPkg('standard', 'features')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                    </div>
                </div>

                <!-- Premium Package -->
                <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-100">
                    <p class="font-bold text-blue-600 mb-3">Paket Premium</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Harga</label>
                            <input type="text" name="packages[premium][price]" value="{{ old('packages.premium.price', $getPkg('premium', 'price')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Durasi</label>
                            <input type="text" name="packages[premium][delivery]" value="{{ old('packages.premium.delivery', $getPkg('premium', 'delivery')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Fitur (Pisahkan dengan koma)</label>
                        <input type="text" name="packages[premium][features]" value="{{ old('packages.premium.features', $getPkg('premium', 'features')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h4 class="text-lg font-bold text-gray-800 mb-4">Testimoni Klien</h4>
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-2">
                        <div class="md:col-span-1">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Nama</label>
                            <input type="text" name="reviews[0][user]" value="{{ old('reviews.0.user', $getRev(0, 'user')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm" placeholder="Ahmad">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Inisial Avatar</label>
                            <input type="text" name="reviews[0][avatar]" value="{{ old('reviews.0.avatar', $getRev(0, 'avatar')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm" placeholder="AH">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Bintang (1-5)</label>
                            <input type="number" name="reviews[0][stars]" value="{{ old('reviews.0.stars', $getRev(0, 'stars')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Komentar</label>
                        <input type="text" name="reviews[0][comment]" value="{{ old('reviews.0.comment', $getRev(0, 'comment')) }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                    </div>
                </div>
            </div>

            <div class="pt-4 flex justify-between">
                <a href="{{ route('dashboard.template.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</a>
                <button type="submit" class="btn-yellow px-6 py-2 rounded-lg shadow flex items-center">
                    <i data-lucide="save" class="w-5 h-5 mr-2"></i> Update Template
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

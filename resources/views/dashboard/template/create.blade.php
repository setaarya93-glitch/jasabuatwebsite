@extends('dashboard.layouts.app')

@section('header', 'Tambah Template Baru')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
    <form action="{{ route('dashboard.template.store') }}" method="POST">
        @csrf
        
        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Template</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none" placeholder="Contoh: Kuliner Prima">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <input type="text" name="category" value="{{ old('category') }}" required class="w-full px-4 py-2 border @error('category') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none" placeholder="Web Design > F&B">
                    @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image URL</label>
                <input type="text" name="image" value="{{ old('image') }}" required class="w-full px-4 py-2 border @error('image') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none" placeholder="/images/template_food.png">
                @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating (Contoh: 5.0)</label>
                    <input type="text" name="rating" value="5.0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Review</label>
                    <input type="number" name="reviews_count" value="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Lengkap</label>
                <textarea name="description" rows="4" required class="w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h4 class="text-lg font-bold text-gray-800 mb-4">Informasi Paket Penjualan</h4>
                
                <!-- Basic Package -->
                <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-100">
                    <p class="font-bold text-blue-600 mb-3">Paket Basic</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Harga (Cth: 150.000)</label>
                            <input type="text" name="packages[basic][price]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Durasi Pengerjaan (Cth: 1 Hari)</label>
                            <input type="text" name="packages[basic][delivery]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Fitur (Pisahkan dengan koma)</label>
                        <input type="text" name="packages[basic][features]" placeholder="Katalog Simple, Integrasi WA, Hosting..." class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                    </div>
                </div>

                <!-- Standard Package -->
                <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-100">
                    <p class="font-bold text-blue-600 mb-3">Paket Standard</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Harga</label>
                            <input type="text" name="packages[standard][price]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Durasi</label>
                            <input type="text" name="packages[standard][delivery]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Fitur (Pisahkan dengan koma)</label>
                        <input type="text" name="packages[standard][features]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                    </div>
                </div>

                <!-- Premium Package -->
                <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-100">
                    <p class="font-bold text-blue-600 mb-3">Paket Premium</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Harga</label>
                            <input type="text" name="packages[premium][price]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Durasi</label>
                            <input type="text" name="packages[premium][delivery]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Fitur (Pisahkan dengan koma)</label>
                        <input type="text" name="packages[premium][features]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h4 class="text-lg font-bold text-gray-800 mb-4">Testimoni Klien (Opsional)</h4>
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 mb-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-2">
                        <div class="md:col-span-1">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Nama</label>
                            <input type="text" name="reviews[0][user]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm" placeholder="Ahmad">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Inisial Avatar</label>
                            <input type="text" name="reviews[0][avatar]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm" placeholder="AH">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-xs font-medium text-gray-600 mb-1">Bintang (1-5)</label>
                            <input type="number" name="reviews[0][stars]" value="5" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Komentar</label>
                        <input type="text" name="reviews[0][comment]" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 outline-none text-sm" placeholder="Websitenya keren!">
                    </div>
                </div>
            </div>

            <div class="pt-4 flex justify-between">
                <a href="{{ route('dashboard.template.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</a>
                <button type="submit" class="btn-yellow px-6 py-2 rounded-lg shadow flex items-center">
                    <i data-lucide="save" class="w-5 h-5 mr-2"></i> Simpan Template
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@extends('dashboard.layouts.app')

@section('header', 'Edit Fitur Kalkulator')

@section('content')
<div class="max-w-2xl">
    <!-- Alert Errors -->
    @if($errors->any())
    <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Form Edit Fitur</h3>
                <p class="text-sm text-gray-500 mt-1">Mengedit: <span class="font-medium text-gray-700">{{ $calculatorFeature->name }}</span></p>
            </div>
        </div>

        <form action="{{ route('dashboard.calculator-features.update', $calculatorFeature->id) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Fitur <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $calculatorFeature->name) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Slug <span class="text-red-500">*</span></label>
                    <input type="text" name="slug" value="{{ old('slug', $calculatorFeature->slug) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="text-xs text-gray-500 mt-1">Identifier unik, gunakan huruf kecil dan tanda hubung.</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $calculatorFeature->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" value="{{ old('price', $calculatorFeature->price) }}" min="0" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="text-xs text-gray-500 mt-1">Gunakan 0 untuk fitur gratis.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <select name="category" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="feature" {{ old('category', $calculatorFeature->category) == 'feature' ? 'selected' : '' }}>Fitur Website</option>
                        <option value="service" {{ old('category', $calculatorFeature->category) == 'service' ? 'selected' : '' }}>Layanan Dukungan</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Urutan</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $calculatorFeature->sort_order) }}" min="0"
                    class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="text-xs text-gray-500 mt-1">Semakin kecil angka, semakin atas posisinya di kalkulator.</p>
            </div>

            <div class="flex flex-wrap gap-6">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="is_recommended" value="1" {{ old('is_recommended', $calculatorFeature->is_recommended) ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="text-sm text-gray-700">Tandai sebagai rekomendasi</span>
                </label>

                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $calculatorFeature->is_active) ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="text-sm text-gray-700">Aktif</span>
                </label>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t">
                <button type="submit" class="btn-yellow px-5 py-2 rounded-lg font-medium flex items-center">
                    <i data-lucide="save" class="w-4 h-4 mr-2"></i> Update Fitur
                </button>
                <a href="{{ route('dashboard.calculator-features.index') }}" class="px-5 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

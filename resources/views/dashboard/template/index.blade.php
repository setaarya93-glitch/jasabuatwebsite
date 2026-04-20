@extends('dashboard.layouts.app')

@section('header', 'Kelola Template')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-800">Daftar Template</h3>
        <a href="{{ route('dashboard.template.create') }}" class="btn-yellow px-4 py-2 rounded-lg shadow flex items-center text-sm">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 text-sm border-b">
                    <th class="px-6 py-4 font-medium">Gambar</th>
                    <th class="px-6 py-4 font-medium">Nama Template</th>
                    <th class="px-6 py-4 font-medium">Kategori</th>
                    <th class="px-6 py-4 font-medium">Rating</th>
                    <th class="px-6 py-4 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($templates as $template)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <img src="{{ Str::startsWith($template->image, 'http') ? $template->image : asset($template->image) }}" class="w-16 h-12 object-cover rounded shadow-sm" alt="img">
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $template->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $template->category }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            ⭐ {{ $template->rating }} ({{ $template->reviews_count }} rev)
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('dashboard.template.edit', $template->id) }}" class="inline-block px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded text-sm font-medium transition">Edit</a>
                        <form action="{{ route('dashboard.template.destroy', $template->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus template ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-50 text-red-600 hover:bg-red-100 rounded text-sm font-medium transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada template.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

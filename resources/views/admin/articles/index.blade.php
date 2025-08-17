@extends('admin.layouts.app')

@section('title', 'Manajemen Artikel')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Daftar Artikel</h1>
        <a href="{{ route('artikel.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            + Tambah Artikel
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-800 border border-green-600 text-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-gray-800 shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Posisi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Tanggal Publish</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-300 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700 text-gray-200">
                @forelse ($articles as $article)
                    <tr class="hover:bg-gray-700">
                        <td class="px-6 py-4">{{ $article->title }}</td>
                        <td class="px-6 py-4">{{ $article->category->name ?? '-' }}</td>
                        <td class="px-6 py-4 capitalize">{{ $article->status }}</td>
                        <td class="px-6 py-4 capitalize">{{ $article->position }}</td>
                        <td class="px-6 py-4">
                            {{ $article->published_at ? $article->published_at->locale('id')->translatedFormat('d F Y') : '-' }}
                        </td>

                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('artikel.show', $article->id) }}"
                                class="text-blue-400 hover:underline">Preview</a>
                            <a href="{{ route('artikel.edit', $article->id) }}"
                                class="text-yellow-400 hover:underline">Edit</a>
                            <form action="{{ route('artikel.destroy', $article->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada artikel</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <div class="mt-2">
        {{ $articles->links() }}
    </div>
@endsection

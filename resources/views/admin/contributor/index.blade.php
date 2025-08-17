@extends('admin.layouts.app')

@section('title', 'Kelola Artikel Kontributor')

@section('content')
<div class="bg-gray-900 text-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6 flex items-center space-x-2">
        <i class="fas fa-users-cog text-blue-500"></i>
        <span>Kelola Artikel Kontributor</span>
    </h1>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4 shadow">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-600 text-white px-4 py-2 rounded mb-4 shadow">
            {{ session('error') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="overflow-x-auto bg-gray-800 rounded-lg shadow">
        <table class="min-w-full text-sm text-gray-300">
            <thead class="bg-gray-700 text-gray-200">
                <tr>
                    <th class="px-4 py-3 text-left">Judul</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Kontributor</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Posisi</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                <tr class="border-t border-gray-700 hover:bg-gray-700/50 transition">
                    {{-- Judul --}}
                    <td class="px-4 py-3 font-medium">{{ $article->title }}</td>

                    {{-- Kategori --}}
                    <td class="px-4 py-3">{{ $article->category->name ?? '-' }}</td>

                    {{-- Kontributor --}}
                    <td class="px-4 py-3">{{ $article->contributor->name ?? '-' }}</td>

                    {{-- Email --}}
                    <td class="px-4 py-3">{{ $article->contributor->email ?? '-' }}</td>

                    {{-- Dropdown Posisi --}}
                    <td class="px-4 py-3">
                        <form action="{{ route('admin.kontributor.updatePosition', $article->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="position" class="bg-gray-700 text-white rounded px-2 py-1 text-sm"
                                    onchange="this.form.submit()">
                                <option value="none" {{ $article->position == 'none' ? 'selected' : '' }}>None</option>
                                <option value="sidebar" {{ $article->position == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                                <option value="trending" {{ $article->position == 'trending' ? 'selected' : '' }}>Trending</option>
                                <option value="carousel" {{ $article->position == 'carousel' ? 'selected' : '' }}>Carousel</option>
                            </select>
                        </form>
                    </td>

                    {{-- Dropdown Status --}}
                    <td class="px-4 py-3">
                        <form action="{{ route('admin.kontributor.updateStatus', $article->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="bg-gray-700 text-white rounded px-2 py-1 text-sm"
                                    onchange="this.form.submit()">
                                <option value="pending" {{ $article->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="rejected" {{ $article->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </form>
                    </td>

                    {{-- Tombol Aksi --}}
                    <td class="px-4 py-3">
                        <div class="flex flex-wrap gap-2 justify-center">
                            <a href="{{ route('admin.kontributor.show', $article->id) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded transition">
                               Preview
                            </a>
                            <a href="{{ route('admin.kontributor.edit', $article->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded transition">
                               Edit
                            </a>
                            <form action="{{ route('admin.kontributor.destroy', $article->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-700 hover:bg-red-800 text-white px-3 py-1 rounded transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-400">Belum ada artikel kontributor.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection

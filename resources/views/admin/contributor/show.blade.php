@extends('admin.layouts.app')

@section('title', 'Preview Artikel Kontributor')

@section('content')
<div class="flex">
    {{-- Main Content --}}
    <div class="flex-1 min-h-screen bg-gray-900 text-gray-100 p-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">

            {{-- Thumbnail --}}
            @if ($article->thumbnail)
                <img src="{{ asset('storage/' . $article->thumbnail) }}" 
                     alt="Thumbnail Artikel"
                     class="w-full max-h-96 object-cover rounded shadow mb-6">
            @endif

            {{-- Judul --}}
            <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>

            {{-- Info Artikel & Kontributor --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-400 mb-6">

                {{-- Info Artikel --}}
                <div>
                    <p><strong>Kategori:</strong> 
                        <span class="text-blue-400">{{ $article->category->name ?? '-' }}</span>
                    </p>
                    <p><strong>Status:</strong>
                        <span class="font-semibold 
                            {{ $article->status === 'published' 
                                ? 'text-green-400' 
                                : ($article->status === 'rejected' 
                                    ? 'text-red-400' 
                                    : 'text-yellow-400') }}">
                            {{ ucfirst($article->status) }}
                        </span>
                    </p>
                    <p><strong>Tanggal Terbit:</strong> 
                        {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : '-' }}
                    </p>
                </div>

                {{-- Info Kontributor --}}
                <div>
                    <p class="flex items-center gap-2">
                        <i class="fas fa-user text-yellow-400"></i>
                        <strong>{{ $article->contributor->name ?? 'Tidak diketahui' }}</strong>
                    </p>
                    <p class="flex items-center gap-2">
                        <i class="fas fa-envelope text-blue-400"></i>
                        {{ $article->contributor->email ?? '-' }}
                    </p>
                    @if($article->contributor->phone)
                        <p class="flex items-center gap-2">
                            <i class="fas fa-phone text-green-400"></i>
                            {{ $article->contributor->phone }}
                        </p>
                    @endif
                    @if($article->contributor->instagram)
                        <p class="flex items-center gap-2">
                            <i class="fab fa-instagram text-pink-400"></i>
                            {{ $article->contributor->instagram }}
                        </p>
                    @endif
                    @if($article->contributor->attribution)
                        <p class="flex items-center gap-2">
                            <i class="fas fa-pen-nib text-purple-400"></i>
                            {{ $article->contributor->attribution }}
                        </p>
                    @endif
                </div>
            </div>

            <hr class="my-6 border-gray-700">

            {{-- Konten Artikel --}}
            <div class="prose prose-invert max-w-none text-gray-200 leading-relaxed">
                {!! nl2br(e($article->content)) !!}
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('admin.kontributor.index') }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                   <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>

                <a href="{{ route('admin.kontributor.edit', $article->id) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded">
                   <i class="fas fa-edit mr-1"></i> Edit
                </a>

                <form action="{{ route('admin.kontributor.destroy', $article->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded">
                        <i class="fas fa-trash mr-1"></i> Hapus
                    </button>
                </form>

                @if($article->status === 'pending')
                    <form action="{{ route('admin.kontributor.approve', $article->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            <i class="fas fa-check mr-1"></i> Approve
                        </button>
                    </form>
                    <form action="{{ route('admin.kontributor.reject', $article->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                            <i class="fas fa-times mr-1"></i> Reject
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

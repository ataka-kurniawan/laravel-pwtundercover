@extends('layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')
<div class="bg-black text-white py-12 px-4 md:px-8 min-h-screen">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Hasil Pencarian</h1>

        @if ($articles->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($articles as $article)
                    <a href="{{ route('home.artikel.show', $article->id) }}" class="bg-gray-800 p-4 rounded hover:bg-gray-700">
                        @if ($article->thumbnail)
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" class="h-40 w-full object-cover rounded mb-2">
                        @endif
                        <h2 class="text-lg font-semibold">{{ $article->title }}</h2>
                        <p class="text-sm text-gray-400 mt-1">{{ $article->published_at->format('d M Y') }}</p>
                        <p class="text-xs text-gray-500">Kategori: {{ $article->category->name ?? '-' }}</p>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $articles->links() }}
            </div>
        @else
            <p class="text-gray-400">Tidak ada artikel yang cocok dengan pencarian Anda.</p>
        @endif
    </div>
</div>
@endsection

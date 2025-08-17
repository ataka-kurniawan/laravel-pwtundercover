@extends('layouts.app')

@section('title', 'Profil Penulis')

@section('content')
<div class="bg-black text-white py-12 px-4 md:px-8 min-h-screen">
    <div class="max-w-6xl mx-auto">
        {{-- Profil Penulis --}}
        <div class="flex flex-col md:flex-row items-center md:items-start mb-10 gap-6">
            <div class="w-32 h-32 rounded-full bg-gray-700 flex items-center justify-center text-5xl">
                <i class="fas fa-user text-white"></i>
            </div>
            <div>
                <h1 class="text-4xl font-extrabold mb-2">{{ $name }}</h1>
                <p class="text-gray-400">Penulis Aktif | {{ $articles->count() }} Artikel Dipublikasikan</p>
            </div>
        </div>

        {{-- Daftar Artikel --}}
        <div>
            <h2 class="text-2xl font-bold mb-4 border-b border-gray-700 pb-2">
                Artikel Terbaru
            </h2>

            @if ($articles->count())
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($articles as $article)
                        <a href="{{ route('home.artikel.show', $article->id) }}" class="group bg-gray-900 hover:bg-gray-800 rounded-lg overflow-hidden shadow-md transition-all">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">

                            <div class="p-4">
                                <h3 class="text-white text-lg font-semibold group-hover:text-gray-300">
                                    {{ $article->title }}
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    Dipublikasikan: {{ $article->published_at->format('d M Y') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-gray-400 italic mt-4">
                    Penulis ini belum memiliki artikel yang dipublikasikan.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

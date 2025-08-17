{{-- resources/views/index.blade.php --}}
@extends('layouts.app')
@section('title','PWT Undercover | Portal Berita Purwokerto Terbaru & Terpercaya')
    

@section('content')
    {{-- Carousel + Sidebar --}}
    <section class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Carousel -->
        <div class="md:col-span-2 relative">
            <div class="overflow-hidden relative">
                @foreach ($carousel as $i => $item)
                    <div class="carousel-slide {{ $i > 0 ? 'hidden' : '' }} relative">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                            class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="absolute top-4  -mt-10  bg-black px-3 py-1 text-xs font-semibold uppercase">
                                {{ $item->category->name ?? 'Umum' }}
                            </span>
                            <a href="{{ route('home.artikel.show', $item->id) }}">
                                <h2 class="text-2xl font-bold mt-2 hover:text-gray-400">{{ $item->title }}</h2>
                            </a>
                            <p class="text-xs text-gray-400 mt-1">
                                Oleh {{ $item->user->name ?? ($item->contributor->name ?? 'Redaksi') }} •
                                {{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : '-' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls -->
            <button id="prev"
                class="absolute top-1/2 left-3 -translate-y-1/2 bg-black/50 p-2 rounded-full hover:bg-black">
                &#10094;
            </button>
            <button id="next"
                class="absolute top-1/2 right-3 -translate-y-1/2 bg-black/50 p-2 rounded-full hover:bg-black">
                &#10095;
            </button>
        </div>

        <!-- Sidebar -->
        <div class="space-y-4">
            @foreach ($sidebar as $article)
                <div class="flex space-x-4">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                        class="w-24 h-20 object-cover rounded">
                    <div>
                        <h3 class="text-sm font-semibold hover:text-gray-400 cursor-pointer">
                            <a href="{{ route('home.artikel.show', $article->id) }}">
                                {{ $article->title }}
                            </a>
                        </h3>
                        <span class="text-xs text-gray-400">
                            {{ $article->created_at->translatedFormat('j F Y') }}
                        </span>
                    </div>
                </div>
            @endforeach
            <div class="mt-4 flex justify-center lg:justify-start">
                {{ $sidebar->links('vendor.pagination.custom-tailwind') }}
            </div>

        </div>
    </section>

    {{-- Trending --}}
    {{-- Banner Utama --}}
   {{-- Banner Utama --}}
@if ($mainBanner)
    <div class="w-full my-6">
        @if ($mainBanner->link)
            <a href="{{ $mainBanner->link }}" target="_blank">
                <img src="{{ asset('storage/' . $mainBanner->banner) }}" 
                     alt="{{ $mainBanner->title }}" 
                     class="w-full max-h-[350px] object-cover mx-auto rounded">
            </a>
        @else
            <img src="{{ asset('storage/' . $mainBanner->banner) }}" 
                 alt="{{ $mainBanner->title }}" 
                 class="w-full max-h-[150px] object-cover mx-auto rounded">
        @endif
    </div>
@endif


    <section class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Trending</h2>

        <div id="trending-list" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-5">
            @foreach ($trending as $index => $item)
                <a href="{{ route('home.artikel.show', $item->id) }}"
                    class="trending-item {{ $index >= 6 ? 'hidden' : '' }} block bg-gray-800 rounded-lg overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">

                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                        class="w-full h-36 object-cover">

                    <div class="p-3">
                        <h3 class="font-semibold text-sm line-clamp-2 hover:text-blue-400 transition">
                            {{ $item->title }}
                        </h3>
                        <p class="text-[11px] text-gray-400 mt-2">
                            Oleh {{ $item->user->name ?? ($item->contributor->name ?? 'Redaksi') }} •
                            {{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : '-' }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

    </section>

    <section class="bg-black text-white w-full py-10">
        <div class="max-w-7xl mx-auto px-4 space-y-12" id="none-container">

            @foreach ($noneCollection as $item)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center article-item">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                            class="w-full h-80 object-cover rounded-md">
                        <span class="absolute top-4 left-4 bg-black px-3 py-1 text-xs font-semibold uppercase">
                            {{ $item->category->name ?? 'Umum' }}
                        </span>
                    </div>
                    <div>
                        <h2 class="text-2xl md:text-3xl font-bold leading-tight hover:text-gray-300 transition">
                            <a href="{{ route('home.artikel.show', $item->id) }}">{{ $item->title }}</a>
                        </h2>
                        <p class="text-gray-400 text-sm mt-2">
                            {{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : '-' }}
                        </p>
                        <p class="mt-4 text-gray-300">
                            {{ Str::limit(strip_tags($item->content), 120, '…') }}
                        </p>
                        <a href="{{ route('home.artikel.show', $item->id) }}"
                            class="inline-block mt-6 px-6 py-2 text-black bg-white hover:bg-white hover:text-black transition">
                            BACA SELENGKAPNYA
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="text-center mt-8">
            <button id="view-more-btn"
                class="px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-200 transition">
                View More
            </button>
        </div>
    </section>
@endsection

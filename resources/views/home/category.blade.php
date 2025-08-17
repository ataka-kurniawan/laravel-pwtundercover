@extends('layouts.app')
@section('title', $category->name . ' Purwokerto Terbaru | PWT Undercover')
@section('meta_description', 'Berita ' . $category->name . ' terbaru di Purwokerto & Banyumas.')
@section('meta_keywords', $category->name . ', berita Purwokerto, berita Banyumas')

@push('meta')
    <meta property="og:title" content="Berita {{ $category->name }} | PWT Undercover">
    <meta property="og:description" content="Kumpulan berita {{ $category->name }} terbaru di Purwokerto.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endpush

@section('content')
    <section class="bg-black text-white w-full py-10">
        <div class="max-w-7xl mx-auto px-4 space-y-12" id="none-container">

            <!-- Judul Kategori -->
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-extrabold uppercase tracking-wide relative inline-block pb-2">
                    KATEGORI: {{ strtoupper($category->name) }}
                    <span class="absolute left-0 bottom-0 w-full h-0.5 bg-gray-500"></span>
                </h1>
                <p class="mt-4 text-gray-400 text-lg">
                    Temukan artikel terbaik di kategori <span class="text-white font-semibold">{{ $category->name }}</span>
                </p>
            </div>

            @foreach ($articles as $item)
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
                            class="inline-block mt-6 px-6 py-2 text-black bg-white hover:bg-gray-200 transition">
                            BACA SELENGKAPNYA
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center px-4">
            {{ $articles->links('vendor.pagination.custom-tailwind') }}

        </div>
    </section>
@endsection

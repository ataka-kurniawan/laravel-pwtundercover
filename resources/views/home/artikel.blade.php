@extends('layouts.app')
@section('title', $article->title . ' | PWT Undercover')
@section('meta_description', Str::limit(strip_tags($article->content), 160))
@section('meta_keywords', $article->category->name . ', berita Purwokerto, ' . $article->title)

@push('meta')
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($article->content), 160) }}">
    <meta property="og:image" content="{{ $article->thumbnail }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $article->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($article->content), 160) }}">
    <meta name="twitter:image" content="{{ $article->thumbnail }}">
@endpush

@section('content')
    <div class="bg-black text-white py-12 px-4 md:px-8 min-h-screen">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- KONTEN UTAMA --}}
            <div class="lg:col-span-2">

                {{-- HEADER ARTIKEL --}}
                <div class="mb-8">
                    {{-- Thumbnail --}}
                    @if ($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                            class="w-full h-72 object-cover rounded-xl shadow-lg" alt="{{ $article->title }}">
                    @endif

                    {{-- Judul --}}
                    <h1 class="text-4xl font-extrabold mt-6 leading-tight">
                        {{ $article->title }}
                    </h1>
                    <br>
                    <p><i class="fa fa-eye"></i> {{ $article->views }} kali dibaca</p>

                    {{-- Meta --}}
                    <div class="flex flex-wrap items-center text-sm text-gray-400 mt-4 space-x-4">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-user-circle"></i>
                            @if ($article->user)
                                <a href="{{ route('penulis.show', $article->user->id) }}"
                                    class="hover:underline font-medium">
                                    {{ $article->user->name }}
                                    <span class="ml-1 text-xs bg-gray-700 text-white px-2 py-0.5 rounded">Admin</span>
                                </a>
                            @elseif ($article->contributor)
                                <a href="{{ route('penulis.show', $article->contributor->id) }}"
                                    class="hover:underline font-medium">
                                    {{ $article->contributor->name }}
                                    <span class="ml-1 text-xs bg-gray-700 text-white px-2 py-0.5 rounded">Kontributor</span>
                                </a>
                            @else
                                {{-- Redaksi jika admin/kontributor sudah dihapus --}}
                                <span class="font-medium">
                                    Redaksi
                                    <span class="ml-1 text-xs bg-gray-700 text-white px-2 py-0.5 rounded">Internal</span>
                                </span>
                            @endif
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-calendar-alt"></i>
                            {{ $article->published_at?->format('d M Y') }}
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-tag"></i>
                            <span class="text-gray-300">{{ $article->category->name ?? 'Uncategorized' }}</span>
                        </div>
                    </div>
                </div>

                {{-- KONTEN --}}
                <article class="prose prose-invert max-w-none text-white leading-relaxed">
                    {!! $article->content !!}
                </article>
            </div>

            {{-- Banner di atas sidebar --}}
            @if ($articleBanner)
                <div class="mb-6">
                    @if ($articleBanner->link)
                        <a href="{{ $articleBanner->link }}" target="_blank">
                            <img src="{{ asset('storage/' . $articleBanner->banner) }}" alt="{{ $articleBanner->title }}"
                                class="w-full object-cover rounded">
                        </a>
                    @else
                        <img src="{{ asset('storage/' . $articleBanner->banner) }}" alt="{{ $articleBanner->title }}"
                            class="w-full object-cover rounded">
                    @endif
                </div>
            @endif


            {{-- SIDEBAR / ARTIKEL TERKAIT --}}
            <aside class="space-y-6">
                <h2 class="text-xl font-bold border-b border-gray-700 pb-2">Artikel Terkait</h2>

                @forelse ($relatedArticles as $related)
                    <a href="{{ route('home.artikel.show', $related->id) }}"
                        class="block bg-gray-800 hover:bg-gray-700 p-4 rounded-lg transition duration-200 shadow-sm">
                        <img src="{{ asset('storage/' . $related->thumbnail) }}"
                            class="h-32 w-full object-cover rounded mb-3">
                        <h3 class="font-semibold text-white text-lg leading-snug">
                            {{ Str::limit($related->title, 60) }}
                        </h3>
                        <span class="text-sm text-gray-400 block mt-1">
                            {{ $related->published_at->format('d M Y') }}
                        </span>
                    </a>
                @empty
                    <p class="text-gray-400">Tidak ada artikel terkait.</p>
                @endforelse
            </aside>

        </div>
    </div>
@endsection

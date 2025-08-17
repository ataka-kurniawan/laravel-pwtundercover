@extends('admin.layouts.app')

@section('title', 'Detail Artikel')

@section('content')
    <div class="flex">
        {{-- Main Content --}}
        <div class="flex-1 min-h-screen bg-gray-900 text-gray-100 p-8">
            {{-- Article Detail --}}
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">

                {{-- Thumbnail --}}
                @if ($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail Artikel"
                        class="w-full max-h-96 object-cover rounded shadow">
                @endif


                <h1 class="text-3xl font-bold mb-4 text-white">{{ $article->title }}</h1>

                <div class="space-y-2 text-sm text-gray-400">
                    <p><strong>Kategori:</strong> <span class="text-blue-400">{{ $article->category->name }}</span></p>
                    <p><strong>Penulis:</strong> {{ $article->user->name ?? ($article->contributor->name ?? 'Redaksi') }}</p>

                    <p><strong>Status:</strong>
                        <span
                            class="font-semibold 
                        {{ $article->status === 'published'
                            ? 'text-green-400'
                            : ($article->status === 'rejected'
                                ? 'text-red-400'
                                : 'text-yellow-400') }}">
                            {{ ucfirst($article->status) }}
                        </span>
                    </p>
                    <p><strong>Tanggal Terbit:</strong>
                         {{ $article->published_at ? $article->published_at->locale('id')->translatedFormat('d F Y') : '-' }}
                    </p>
                </div>

                <hr class="my-6 border-gray-700">

                <div class="prose prose-invert max-w-none text-gray-200">
                    {!! $article->content !!}
                </div>

                {{-- Action Buttons --}}
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('artikel.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                        Kembali
                    </a>

                    @if ($article->status === 'pending')
                        <form action="{{ route('artikel.publish', $article->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                Terbitkan
                            </button>
                        </form>

                        <form action="{{ route('artikel.reject', $article->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                                Tolak
                            </button>
                        </form>
                    @elseif ($article->status === 'published' || $article->status === 'rejected')
                        <form action="{{ route('artikel.draft', $article->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">
                                Kembalikan ke Draft
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

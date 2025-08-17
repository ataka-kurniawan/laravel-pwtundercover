@extends('admin.layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<div class="max-w-4xl mx-auto bg-gray-900 text-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Artikel</h1>

    <form action="{{ route('artikel.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-4">
            <label class="block font-medium mb-1 text-gray-200">Judul</label>
            <input type="text" name="title" class="w-full bg-gray-800 text-white border border-gray-700 px-3 py-2 rounded" value="{{ old('title', $article->title) }}" required>
        </div>

        {{-- Konten --}}
        <div class="mb-4">
            <label class="block font-medium mb-1 text-gray-200">Konten</label>
            <textarea name="content" rows="8" class="w-full bg-gray-800 text-white border border-gray-700 px-3 py-2 rounded" required>{{ old('content', $article->content) }}</textarea>
        </div>

        {{-- Kategori --}}
        <div class="mb-4">
            <label class="block font-medium mb-1 text-gray-200">Kategori</label>
            <select name="category_id" class="w-full bg-gray-800 text-white border border-gray-700 px-3 py-2 rounded" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div class="mb-4">
            <label class="block font-medium mb-1 text-gray-200">Status</label>
            <select name="status" class="w-full bg-gray-800 text-white border border-gray-700 px-3 py-2 rounded" required>
                <option value="pending" {{ $article->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published</option>
                <option value="rejected" {{ $article->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        {{-- Position --}}
        <div class="mb-4">
            <label class="block font-medium mb-1 text-gray-200">Posisi Artikel</label>
            <select name="position" class="w-full bg-gray-800 text-white border border-gray-700 px-3 py-2 rounded">
                <option value="none" {{ $article->position == 'none' ? 'selected' : '' }}>None</option>
                <option value="header" {{ $article->position == 'header' ? 'selected' : '' }}>Header</option>
                <option value="headline" {{ $article->position == 'headline' ? 'selected' : '' }}>Headline</option>
                <option value="sidebar" {{ $article->position == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                <option value="trending" {{ $article->position == 'trending' ? 'selected' : '' }}>Trending</option>
                <option value="carousel" {{ $article->position == 'carousel' ? 'selected' : '' }}>Carousel</option>
            </select>
        </div>

        {{-- Tampilkan Thumbnail Lama --}}
        @if ($article->thumbnail)
            <div class="mb-4">
                <label class="block font-medium mb-1 text-gray-200">Thumbnail Saat Ini</label>
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail" class="w-64 mb-2 rounded border border-gray-600">
            </div>
        @endif

        {{-- Upload Thumbnail Baru --}}
        <div class="mb-4">
            <label class="block font-medium mb-1 text-gray-200">Upload Thumbnail Baru</label>
            <input type="file" name="thumbnail" class="w-full bg-gray-800 text-white border border-gray-700 px-3 py-2 rounded">
            <small class="text-gray-400">Biarkan kosong jika tidak ingin mengganti thumbnail</small>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Update Artikel
            </button>
        </div>
    </form>
</div>
@endsection

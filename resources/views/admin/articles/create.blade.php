@extends('admin.layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
    <div class="max-w-4xl mx-auto bg-gray-900 text-white p-6 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6">Tambah Artikel</h2>

        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-1">Judul Artikel</label>
                <input type="text" name="title"
                    class="w-full bg-gray-800 text-white border border-gray-700 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">
                    Thumbnail <span class="text-sm text-gray-400">(jpg, png, max 2MB)</span>
                </label>
                <input type="file" name="thumbnail"
                    class="w-full text-white bg-gray-800 border border-gray-700 p-2 rounded">
                <p class="text-gray-500 text-sm mt-1">* Format: JPG/PNG, Maksimal 2MB</p>
                @error('thumbnail')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-4">
                <label class="block font-medium mb-1">Kategori</label>
                <select name="category_id" class="w-full bg-gray-800 text-white border border-gray-700 p-2 rounded"
                    required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Posisi</label>
                <select name="position" class="w-full bg-gray-800 text-white border border-gray-700 p-2 rounded">
                    <option value="none">None</option>
                    <option value="sidebar">Sidebar</option>
                    <option value="trending">Trending</option>
                    <option value="carousel">Carousel</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Status</label>
                <select name="status" class="w-full bg-gray-800 text-white border border-gray-700 p-2 rounded">
                    <option value="pending">Pending</option>
                    <option value="published">Published</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Konten</label>
                <textarea id="article_content" name="content" rows="8"
                    class="w-full bg-gray-800 text-white border border-gray-700 p-2 rounded"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-all">
                Simpan Artikel
            </button>
        </form>
    </div>

    {{-- TinyMCE --}}


@endsection

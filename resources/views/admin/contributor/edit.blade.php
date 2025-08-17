@extends('admin.layouts.app')

@section('title', 'Edit Artikel Kontributor')

@section('content')
<div class="bg-gray-900 text-gray-100 min-h-screen p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Artikel</h1>
    <form action="{{ route('admin.kontributor.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title', $article->title) }}"
                class="w-full p-2 bg-gray-800 border border-gray-700 rounded">
        </div>

        <div>
            <label class="block mb-1">Konten</label>
            <textarea name="content" rows="6" class="w-full p-2 bg-gray-800 border border-gray-700 rounded">{{ old('content', $article->content) }}</textarea>
        </div>

        <div>
            <label class="block mb-1">Kategori</label>
            <select name="category_id" class="w-full p-2 bg-gray-800 border border-gray-700 rounded">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected($article->category_id == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Posisi</label>
            <select name="position" class="w-full p-2 bg-gray-800 border border-gray-700 rounded">
                @foreach(['none','header','headline','sidebar','trending','carousel'] as $pos)
                    <option value="{{ $pos }}" @selected($article->position == $pos)>{{ ucfirst($pos) }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Thumbnail</label>
            @if($article->thumbnail)
                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="mb-2 w-40 rounded">
            @endif
            <input type="file" name="thumbnail" class="w-full p-2 bg-gray-800 border border-gray-700 rounded">
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.kontributor.index') }}" class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection

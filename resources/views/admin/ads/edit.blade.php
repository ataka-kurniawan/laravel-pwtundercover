@extends('admin.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-gray-900 shadow-md rounded-lg p-6 mt-8 text-white">
        <h1 class="text-2xl font-bold mb-6">Edit Iklan</h1>
        @if (session('error'))
            <div class="bg-red-600 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif


        <form action="{{ route('ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul Iklan --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Judul Iklan</label>
                <input type="text" name="title" value="{{ old('title', $ad->title) }}"
                    class="mt-1 block w-full rounded bg-gray-800 border border-gray-700 p-2 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('title')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Link Iklan --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Link Iklan</label>
                <input type="url" name="link" value="{{ old('link', $ad->link) }}"
                    class="mt-1 block w-full rounded bg-gray-800 border border-gray-700 p-2 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('link')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Posisi Iklan --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Posisi</label>
                <select name="position"
                    class="mt-1 block w-full rounded bg-gray-800 border border-gray-700 p-2 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="main" {{ old('position', $ad->position) == 'main' ? 'selected' : '' }}>Banner Utama
                    </option>
                    <option value="article" {{ old('position', $ad->position) == 'article' ? 'selected' : '' }}>Banner
                        Artikel</option>
                </select>
                @error('position')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Banner --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Banner</label>
                @if ($ad->banner)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $ad->banner) }}" alt="Iklan" class="w-40 rounded shadow">
                    </div>
                @endif
                <input type="file" name="banner"
                    class="block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                @error('banner')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal Mulai --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ old('start_date', $ad->start_date->format('Y-m-d')) }}"
                    class="mt-1 block w-full rounded bg-gray-800 border border-gray-700 p-2 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('start_date')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal Berakhir --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Tanggal Berakhir</label>
                <input type="date" name="end_date" value="{{ old('end_date', $ad->end_date->format('Y-m-d')) }}"
                    class="mt-1 block w-full rounded bg-gray-800 border border-gray-700 p-2 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                @error('end_date')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <label class="block text-sm font-medium">Status</label>
                <select name="is_active"
                    class="mt-1 block w-full rounded bg-gray-800 border border-gray-700 p-2 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="1" {{ old('is_active', $ad->is_active) ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active', $ad->is_active) == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('is_active')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end space-x-3">
                <a href="{{ route('ads.index') }}"
                    class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
@endsection

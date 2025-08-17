@extends('admin.layouts.app')

@section('title', 'Tambah Iklan')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Iklan</h1>


@if(session('error'))
<div class="bg-red-500 p-2 mb-3 rounded">{{ session('error') }}</div>
@endif

<form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label>Judul</label>
        <input type="text" name="title" class="w-full p-2 rounded bg-gray-800" required>
    </div>
    <div>
        <label>Banner</label>
        <input type="file" name="banner" class="w-full p-2 rounded bg-gray-800" accept="image/*" required>
    </div>
    <div>
        <label>Link</label>
        <input type="url" name="link" class="w-full p-2 rounded bg-gray-800">
    </div>
    <div>
        <label>Posisi</label>
        <select name="position" class="w-full p-2 rounded bg-gray-800" required>
            <option value="main">Banner Utama</option>
            <option value="article">Banner Artikel</option>
        </select>
    </div>
    <div>
        <label>Tanggal Mulai</label>
        <input type="date" name="start_date" class="w-full p-2 rounded bg-gray-800" required>
    </div>
    <div>
        <label>Tanggal Berakhir</label>
        <input type="date" name="end_date" class="w-full p-2 rounded bg-gray-800" required>
    </div>
    <button type="submit" class="bg-blue-500 px-4 py-2 rounded">Simpan</button>
</form>
@endsection

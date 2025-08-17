@extends('admin.layouts.app')

@section('title', 'Kelola Iklan')


@section('content')
    <div class="mb-4 flex justify-between">
        <h1 class="text-2xl font-bold">Kelola Iklan</h1>
        <a href="{{ route('ads.create') }}" class="bg-blue-500 px-4 py-2 rounded text-white">Tambah Iklan</a>
    </div>

    @if (session('success'))
        <div class="bg-green-500 p-2 mb-4">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="bg-red-500 p-2 mb-4">{{ session('error') }}</div>
    @endif

    <table class="w-full border border-gray-700">
        <thead class="bg-gray-800">
            <tr>
                <th class="p-2">Judul</th>
                <th>Posisi</th>
                <th>Banner</th>
                <th>Periode</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
                <tr class="border-b border-gray-700">
                    <td class="p-2">{{ $ad->title }}</td>
                    <td>
                        @if ($ad->position === 'main')
                            Banner Utama
                        @elseif($ad->position === 'article')
                            Banner Artikel
                        @endif
                    </td>

                    <td><img src="{{ asset('storage/' . $ad->banner) }}" alt="Banner" class="h-12"></td>
                    <td>{{ $ad->start_date->format('d-m-Y') }} - {{ $ad->end_date->format('d-m-Y') }}</td>
                    <td>{{ $ad->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                    <td class="space-x-2">
                        <a href="{{ route('ads.edit', $ad) }}" class="text-blue-400 hover:text-blue-600">Edit</a>
                        <form action="{{ route('ads.destroy', $ad) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-400 cursor-pointer hover:text-red-600" onclick="return confirm('Hapus iklan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

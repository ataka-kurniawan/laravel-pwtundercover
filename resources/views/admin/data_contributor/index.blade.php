@extends('admin.layouts.app')

@section('title', 'Data Kontributor')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Data Kontributor</h1>
    <form method="GET" action="{{ route('admin.contributors.index') }}" class="mb-4 flex w-full">
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari berdasarkan email..."
            class="px-4 py-2 rounded bg-gray-700 text-white focus:outline-none">
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
            Cari
        </button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 text-white rounded">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Instagram</th>
                    <th class="px-6 py-3 text-left">No. WhatsApp</th>
                    <th class="px-6 py-3 text-left">Jumlah Artikel Dipublish</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contributors as $contributor)
                    <tr class="border-t border-gray-700">
                        <td class="px-6 py-4">{{ $contributor->name }}</td>
                        <td class="px-6 py-4">{{ $contributor->email }}</td>
                        <td class="px-6 py-4">{{ $contributor->instagram }}</td>
                        <td class="px-6 py-4">{{ $contributor->phone }}</td>
                        <td class="px-6 py-4">{{ $contributor->articles_count }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-400">Tidak ada kontributor.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

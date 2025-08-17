@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="min-h-screen flex flex-col space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-white">Tambah Kategori</h1>
            <a href="{{ route('kategori.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded">
                ← Kembali
            </a>
        </div>

        <div class="bg-gray-800 shadow-md rounded p-6 w-full">
            <form action="{{ route('kategori.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-1 gap-6">
                @csrf

                <div class="col-span-1">
                    <label for="nama" class="block text-sm font-medium text-gray-300 mb-1">Nama Kategori</label>
                    <input type="text" id="nama" name="name"
                        class="w-full bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Teknologi" required>
                </div>


                <div class="col-span-full flex justify-end mt-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

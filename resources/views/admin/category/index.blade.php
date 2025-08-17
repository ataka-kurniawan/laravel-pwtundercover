@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Daftar Kategori</h1>
        <a href="{{ route('kategori.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Kategori
        </a>
    </div>

    <div class="bg-gray-800 shadow-md rounded p-4">
        <table class="w-full text-sm text-left">
            <thead>
                <tr class="border-b border-gray-700 text-gray-300">
                    <th class="px-4 py-2 font-semibold">No</th>
                    <th class="px-4 py-2 font-semibold">Nama Kategori</th>
                    <th class="px-4 py-2 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr class="border-b border-gray-700 hover:bg-gray-700">
                        <td class="px-4 py-2 text-gray-100">{{$index+1}}</td>
                        <td class="px-4 py-2 text-white">{{$category->name}}</td>
                        <td class="px-4 py-2">
                            <a href="{{route('kategori.edit',$category->id)}}" class="text-blue-400 hover:underline mr-2">Edit</a>
                            <form action="{{route('kategori.destroy',$category->id)}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button class="text-red-400 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach


                <!-- Tambah dummy baris lain jika perlu -->
            </tbody>
        </table>
    </div>
@endsection

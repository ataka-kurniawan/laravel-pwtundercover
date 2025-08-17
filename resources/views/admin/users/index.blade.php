@extends('admin.layouts.app')

@section('title', 'Kelola Admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Kelola Admin</h1>
        <a href="{{route('kelola-admin.create')}}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Admin
        </a>
    </div>
    
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-800 border border-green-600 text-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif


    <div class="bg-gray-800 shadow-md rounded p-4">
        <table class="w-full text-sm text-left">
            <thead>
                <tr class="border-b border-gray-700 text-gray-300">
                    <th class="px-4 py-2 font-semibold">No</th>
                    <th class="px-4 py-2 font-semibold">Nama </th>
                    <th class="px-4 py-2 font-semibold">email</th>
                    <th class="px-4 py-2 font-semibold">Aksi</th>
                </tr>
            </thead>

            @foreach ($admins as $index => $admin)
                <tr class="border-b border-gray-700 hover:bg-gray-700">
                    <td class="px-4 py-2 text-gray-100">{{$index+1}}</td>
                    <td class="px-4 py-2 text-white">{{$admin->name}}</td>
                    <td class="px-4 py-2 text-white">{{$admin->email}}</td>
                    <td class="px-4 py-2">
                        <a href="{{route('kelola-admin.edit',$admin->id)}}" class="text-blue-400 hover:underline mr-2">Edit</a>
                        <form action="{{route('kelola-admin.destroy',$admin->id)}}" method="POST">
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

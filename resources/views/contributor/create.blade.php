@extends('layouts.app')

@section('content')
    <section class="w-full bg-black py-10">
        <div class="max-w-5xl mx-auto px-4">
            <div class="border-b border-gray-800 pb-4 mb-8">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold">Kirim Artikel</h1>
                    {{-- Link Ketentuan Penulisan --}}
                    <a href="{{ route('ketentuan-tulisan') }}"
                        class="inline-block bg-white hover:bg-gray-300 text-black font-medium px-5 py-2 rounded-md transition">
                        <i class="fa-solid fa-file-lines text-sm mr-2"></i>Ketentuan Tulisan
                    </a>
                </div>
            </div>


            @if (session('success'))
                <div class="bg-green-700 text-white p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contributor.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Judul Artikel --}}
                <div>
                    <label class="block mb-2 font-semibold">Judul Artikel</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Isi Artikel --}}
                <div>
                    <label class="block mb-2 font-semibold">Isi Artikel</label>
                    <textarea id="article_content" name="content" rows="8"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Thumbnail --}}
                <div>
                    <label class="block mb-2 font-semibold">Thumbnail</label>
                    <input type="file" name="thumbnail"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-2">
                    <p class="text-gray-500 text-sm mt-1">* Format: JPG/PNG, Maksimal 2MB</p>
                    @error('thumbnail')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block mb-2 font-semibold">Kategori</label>
                    <select name="category_id"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="border-gray-800">

                <h2 class="text-xl font-semibold mt-8 mb-4">Data Kontributor</h2>

                {{-- Nama Penulis --}}
                <div>
                    <label class="block mb-2 font-semibold">Nama Penulis</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block mb-2 font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No HP --}}
                <div>
                    <label class="block mb-2 font-semibold">No. Handphone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('phone')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Lahir --}}
                <div>
                    <label class="block mb-2 font-semibold">Tanggal Lahir</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('birth_date')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Domisili --}}
                <div>
                    <label class="block mb-2 font-semibold">Domisili Penulis</label>
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('address')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Atribusi --}}
                <div>
                    <label class="block mb-2 font-semibold">Atribusi Penulis</label>
                    <input type="text" name="attribution" value="{{ old('attribution') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('attribution')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Instagram --}}
                <div>
                    <label class="block mb-2 font-semibold">Akun Instagram</label>
                    <input type="text" name="instagram" value="{{ old('instagram') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('instagram')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 italic">
                    <span>Sebelum mengirimkan tulisan, pastikan kamu sudah membaca ketentuan pengiriman tulisan PWT
                        Undercover yang ada <a href="{{ route('ketentuan-tulisan') }}"
                            class="font-bold hover:text-gray-500">di sini</a></span>
                </div>

                {{-- Tombol Submit --}}
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-white text-black hover:bg-gray-300 font-semibold py-3 rounded-full transition cursor-pointer">
                        Kirim Artikel
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

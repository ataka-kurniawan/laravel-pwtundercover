<aside class="w-64 bg-gray-900 shadow-lg h-screen sticky top-0">
    <div class="p-4 border-b border-gray-800">
        <h1 class="text-white text-xl font-bold tracking-wide">
            <i class="fas fa-newspaper mr-2"></i> Admin Panel
        </h1>
    </div>

    <nav class="flex flex-col p-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition">
            <i class="fas fa-home w-5 text-gray-400"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('kategori.index') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition">
            <i class="fas fa-list w-5 text-gray-400"></i>
            <span>Kategori</span>
        </a>

        <a href="{{ route('artikel.index') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition">
            <i class="fas fa-file-alt w-5 text-gray-400"></i>
            <span>Artikel</span>
        </a>

        <a href="{{ route('kelola-admin.index') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition">
            <i class="fas fa-user-shield w-5 text-gray-400"></i>
            <span>Kelola Admin</span>
        </a>

        <a href="{{route('ads.index')}}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition">
            <i class="fas fa-ad w-5 text-gray-400"></i>
            <span>Iklan</span>
        </a>

        <a href="{{ route('admin.kontributor.index') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition">
            <i class="fas fa-users-cog text-gray-400"></i>
            <span>Artikel Kontributor</span>
        </a>

        <a href="{{route('admin.contributors.index')}}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition">
            <i class="fa-solid fa-users"></i>
            <span>Data Kontributor</span>
        </a>
    </nav>
</aside>

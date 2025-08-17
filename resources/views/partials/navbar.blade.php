<header class="w-full">
    <!-- Top Bar -->
    <div class="bg-black border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-wrap justify-between items-center gap-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}"><img src="{{ asset('/images/images.png') }}" alt="Logo"
                        class="h-10"></a>
                <a href="{{ route('home') }}"> <span class="text-lg text-white tracking-widest font-bold">PWT
                        UNDERCOVER</span></a>
            </div>

            <!-- Right -->
            <div class="flex items-center space-x-4">
                <!-- Kirim Artikel -->
                <a href="{{ route('contributor.create') }}"
                    class="hidden sm:flex bg-white text-black font-semibold px-4 py-2 rounded-full hover:bg-gray-200 transition items-center space-x-2">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>KIRIM ARTIKEL</span>
                </a>

                <a href="{{ route('pasang-iklan') }}"
                    class="hidden sm:flex bg-white text-black font-semibold px-4 py-2 rounded-full hover:bg-gray-200 transition items-center space-x-2">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span>PASANG IKLAN</span>
                </a>

                <!-- Social Icons -->
                <div class="hidden sm:flex space-x-5">
                    <a href="https://youtube.com/@pwt.undercover?si=pvGRjEBDSgmvoZtI" class="social-icon"><i
                            class="fab fa-youtube"></i></a>
                    <a href="https://www.instagram.com/pwt.undercover?igsh=M2g5MDk2ZzNyZGJ4&utm_source=qr"
                        class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@pwt.undercover?_t=ZS-8yfQQQOCyRj&_r=1" class="social-icon"><i
                            class="fab fa-tiktok"></i></a>
                </div>

                <!-- Burger Menu -->
                <button id="menu-btn" class="sm:hidden text-white text-2xl focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-black border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <ul id="menu" class="hidden sm:flex space-x-6 font-semibold">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('home', ['category' => $category->id]) }}" class="hover:text-gray-400">
                            {{ strtoupper($category->name) }}
                        </a>
                    </li>
                @endforeach

                <li>
                    <a href="{{ route('about-us') }}" class="hover:text-gray-400">
                        TENTANG KAMI
                    </a>
                </li>

            </ul>
            <!-- Search -->
            <form action="{{ route('home.search') }}" method="GET" class="hidden sm:block relative w-full max-w-xs">
                <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                <input type="text" name="q" placeholder="Cari artikel..."
                    class="bg-gray-900 text-white rounded-full pl-10 pr-4 py-2 text-sm border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full transition" />
            </form>

        </div>

        <!-- Mobile Menu -->
        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden sm:hidden bg-black/95 backdrop-blur-md px-4 pb-6 space-y-4 border-t border-gray-800">

            <!-- Menu Kategori -->
            <nav class="flex flex-col space-y-3 text-lg font-semibold">
                @foreach ($categories as $category)
                    <a href="{{ route('home', ['category' => $category->id]) }}"
                        class="mobile-link flex items-center gap-3 hover:text-blue-400 transition">
                        {{ strtoupper($category->name) }}
                    </a>
                @endforeach

                <!-- Tentang Kami -->
                <a href="{{ route('about-us') }}"
                    class="mobile-link flex items-center gap-3 hover:text-blue-400 transition">
                    TENTANG KAMI
                </a>
            </nav>

            <!-- Tombol Aksi -->
            <div class="flex flex-col gap-3 mt-4">
                <a href="{{ route('contributor.create') }}"
                    class="bg-white text-black font-semibold px-4 py-2 rounded-full text-center hover:bg-gray-200 transition">
                    <i class="fa-solid fa-pen-to-square"></i> KIRIM ARTIKEL
                </a>

                <a href="{{ route('pasang-iklan') }}"
                    class="bg-white text-black font-semibold px-4 py-2 rounded-full text-center hover:bg-gray-200 transition">
                    <i class="fa-solid fa-bullhorn"></i> PASANG IKLAN
                </a>
            </div>
        </div>

    </nav>
</header>

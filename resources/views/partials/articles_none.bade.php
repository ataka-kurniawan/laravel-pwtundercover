<section class="bg-black text-white w-full py-10">
    <div class="max-w-7xl mx-auto px-4 space-y-12" id="none-container">

        @foreach ($noneCollection as $item)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center article-item">
                <div class="relative">
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                        class="w-full h-80 object-cover rounded-md">
                    <span class="absolute top-4 left-4 bg-black px-3 py-1 text-xs font-semibold uppercase">
                        {{ $item->category->name ?? 'Umum' }}
                    </span>
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold leading-tight hover:text-gray-300 transition">
                        <a href="{{ route('artikel.show', $item->id) }}">{{ $item->title }}</a>
                    </h2>
                    <p class="text-gray-400 text-sm mt-2">
                        {{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : '-' }}
                    </p>
                    <p class="mt-4 text-gray-300">
                        {{ Str::limit(strip_tags($item->content), 120, '…') }}
                    </p>
                    <a href="{{ route('artikel.show', $item->id) }}"
                        class="inline-block mt-6 px-6 py-2 text-black bg-white hover:bg-white hover:text-black transition">
                        READ MORE
                    </a>
                </div>
            </div>
        @endforeach

    </div>

    <div class="text-center mt-8">
        <button id="view-more-btn"
            class="px-6 py-2 bg-white text-black font-semibold rounded hover:bg-gray-200 transition">
            View More
        </button>
    </div>
</section>
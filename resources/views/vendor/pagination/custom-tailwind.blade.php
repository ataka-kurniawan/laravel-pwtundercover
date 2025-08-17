@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 text-sm bg-gray-700 text-gray-400 rounded cursor-not-allowed">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" 
               class="px-3 py-1 text-sm bg-gray-800 text-white rounded hover:bg-gray-700">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-3 py-1 text-sm bg-gray-700 text-gray-400 rounded">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1 text-sm bg-white text-black rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" 
                           class="px-3 py-1 text-sm bg-gray-800 text-white rounded hover:bg-gray-700">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" 
               class="px-3 py-1 text-sm bg-gray-800 text-white rounded hover:bg-gray-700">&raquo;</a>
        @else
            <span class="px-3 py-1 text-sm bg-gray-700 text-gray-400 rounded cursor-not-allowed">&raquo;</span>
        @endif
    </nav>
@endif

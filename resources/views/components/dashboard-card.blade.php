@props(['title', 'value', 'icon' => '', 'subtitle' => null])

<div class="bg-gray-800 rounded-xl p-5 shadow-md hover:shadow-lg transition-all">
    <div class="flex items-center justify-between mb-2">
        <span class="text-sm text-gray-400">{{ $title }}</span>
        <i class="{{ $icon }} text-xl text-gray-400"></i>
    </div>
    <div class="text-3xl font-bold text-white">{{ $value }}</div>
    @if ($subtitle)
        <div class="text-xs text-gray-500 mt-2">{{ $subtitle }}</div>
    @endif
</div>

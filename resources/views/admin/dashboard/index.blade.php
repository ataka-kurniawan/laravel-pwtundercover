@extends('admin.layouts.app')

@section('title', 'DASHBOARD')

@section('content')
<div class="p-6 space-y-8 bg-gray-900 text-white min-h-screen">

    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold tracking-wide">
            <i class="fas fa-chart-line mr-2"></i>Dashboard Admin
        </h1>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <x-dashboard-card title="Total Kontributor" value="{{ $totalContributors }}" icon="fas fa-user-friends" />
        <x-dashboard-card title="Total Artikel" value="{{ $totalArticles }}" icon="fas fa-newspaper" />
        <x-dashboard-card title="Artikel Terbit" value="{{ $publishedArticles }}" icon="fas fa-check-circle" />
        <x-dashboard-card title="Artikel Draft" value="{{ $draftArticles }}" icon="fas fa-edit" />

        <x-dashboard-card title="Total Kunjungan" value="{{ number_format($totalViews) }}" icon="fas fa-eye" />
        <x-dashboard-card title="Kunjungan Bulan Ini" value="{{ number_format($totalViewsThisMonth) }}" icon="fas fa-calendar-check" />
        <x-dashboard-card title="Artikel Hari Ini" value="{{ $articlesToday }}" icon="fas fa-calendar-day"
            subtitle="Tanggal: {{ \Carbon\Carbon::today()->translatedFormat('d F Y') }}" />
        <x-dashboard-card title="Artikel Bulan Ini" value="{{ $articlesThisMonth }}" icon="fas fa-calendar-alt"
            subtitle="Bulan: {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}" />
    </div>

    <!-- Artikel Terbaru -->
    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">
            <i class="fas fa-clock mr-2"></i>Artikel Terbaru
        </h2>
        <ul class="space-y-3">
            @foreach ($latestArticles as $article)
                <li class="bg-gray-800 hover:bg-gray-700 transition-all p-4 rounded-xl shadow-md">
                    <a href="{{ route('artikel.edit', $article->id) }}" class="text-lg font-semibold hover:underline">
                        <i class="fas fa-pen-alt mr-1"></i>{{ $article->title }}
                    </a>
                    <div class="text-sm text-gray-400">
                        <i class="fas fa-user mr-1"></i>By {{ $article->contributor->name ?? 'Admin' }}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</div>
@endsection

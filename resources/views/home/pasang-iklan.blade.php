@extends('layouts.app')
@section('title', 'Pasang Iklan di PWT Undercover | Portal Berita Purwokerto')
@section('meta_description', 'Pasang iklan di PWT Undercover, portal berita Purwokerto dengan jangkauan luas.')
@section('meta_keywords', 'pasang iklan Purwokerto, iklan media Banyumas, media partner Purwokerto')

@push('meta')
    <meta property="og:title" content="Pasang Iklan di PWT Undercover">
    <meta property="og:description" content="Promosikan bisnis Anda melalui iklan di portal berita PWT Undercover.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endpush



@section('content')
    <div class="max-w-4xl mx-auto px-4 py-12 text-white">
     <h1 class="text-4xl font-bold mb-6 border-b border-gray-700 pb-2">Pasang Iklan</h1>
        <p class="text-lg mb-6">Pasang Iklan di Platform Lokal yang Didengar</p>

        <p class="mb-4">
            Ingin bisnismu dikenal warga Banyumas dan sekitarnya? <strong>PWT Undercover</strong> menyediakan ruang promosi
            yang efektif dan terukur, baik di website maupun di media sosial kami.
        </p>

        <h2 class="text-xl font-semibold mt-8 mb-2">a. Iklan di Website</h2>
        <p class="mb-4">
            Jangkau ribuan pembaca loyal yang setiap hari mengakses artikel-artikel kritis, mendalam, dan tak biasa. Kami
            menyediakan space iklan berupa:
        </p>
        <ul class="list-disc list-inside mb-6 space-y-2">
            <li>Banner di bagian atas dan bawah artikel</li>
            <li>Iklan sidebar</li>
            <li>Sponsored content (artikel berbayar dengan penanda khusus)</li>
            <li>Liputan usaha lokal (berformat feature ringan)</li>
        </ul>

        <h2 class="text-xl font-semibold mt-8 mb-2">b. Iklan di Instagram</h2>
        <p class="mb-4">
            Dengan ribuan pengikut aktif yang peduli pada isu lokal dan konten autentik, akun Instagram kami
            <strong>(@pwtundercover)</strong> jadi tempat ideal untuk promosi:
        </p>
        <ul class="list-disc list-inside mb-6 space-y-2">
            <li>Postingan feed & story</li>
            <li>Reels promosi</li>
            <li>Kolaborasi konten khusus (co-branding)</li>
        </ul>

        <p class="mb-4">
            Kami percaya bahwa promosi terbaik adalah yang terasa dekat dan relevan dengan pembacanya. Karena itu, setiap
            bentuk iklan akan kami sesuaikan agar tetap selaras dengan gaya dan etos <strong>PWT Undercover</strong>.
        </p>



    </div>

    <section class="w-full bg-gray-900 text-white py-16 px-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-2">Ingin Pasang Iklan?</h2>
                <p class="text-gray-300 text-lg">Hubungi kami hari ini dan dapatkan penawaran terbaik di platform lokal
                    terpercaya.</p>
            </div>
            <div>
                <a href="https://wa.me/6285875101725" target="_blank"
                    class="inline-flex items-center gap-3 bg-white text-black font-semibold px-6 py-3 rounded-xl hover:bg-gray-200 transition">
                    <i class="fab fa-whatsapp text-xl text-green-500"></i>
                    WhatsApp Kami
                </a>
            </div>
        </div>
    </section>

@endsection

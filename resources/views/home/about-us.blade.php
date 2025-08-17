@extends('layouts.app')
@section('title', 'Tentang Kami | PWT Undercover')
@section('meta_description', 'Tentang PWT Undercover, portal berita Purwokerto terbaru dan terpercaya.')
@section('meta_keywords', 'tentang kami, portal berita Purwokerto, media Banyumas')

@push('meta')
    <meta property="og:title" content="Tentang Kami | PWT Undercover">
    <meta property="og:description" content="Kenali lebih jauh tentang PWT Undercover, media berita Purwokerto.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
@endpush


@section('content')
<section class="w-full px-6 md:px-10 lg:px-24 py-16 text-white">
    <div class="max-w-5xl mx-auto">

        <h1 class="text-4xl font-bold mb-6 border-b border-gray-700 pb-2">Tentang Kami</h1>

        <h2 class="text-2xl font-semibold mb-2">PWT Undercover</h2>
        <p class="text-gray-400 italic mb-6">Suara dari Akar Rumput Banyumas Raya</p>

        <div class="space-y-5 text-gray-200 leading-relaxed">
            <p>
                <strong>PWT Undercover</strong> lahir dari keresahan — mengapa begitu banyak hal penting di daerah kita yang luput dari sorotan?
                Di balik gemerlap proyek-proyek, janji-janji politik, dan kampanye-kampanye para pejabat publik,
                ada realita yang harus dibongkar.
            </p>

            <p>
                Kami adalah <span class="underline">platform alternatif</span> yang fokus pada <strong>liputan mendalam</strong> dan <strong>opini kritis</strong>
                seputar kehidupan di Banyumas Raya. Artikel kami ditulis oleh para aktivis, penulis lokal, dan kontributor dari berbagai latar belakang.
            </p>

            <p>
                Kami percaya, <strong>opini lokal</strong> bukan sekadar pelengkap. Ia adalah <em>denyut nadi demokrasi</em> di daerah, terkhusus di Banyumas Raya.
            </p>
        </div>

        <div class="mt-12">
            <h3 class="text-xl font-semibold mb-4">Kunjungi kami juga di:</h3>
            <ul class="space-y-4">
                <li class="flex items-center space-x-3">
                    <i class="fab fa-instagram text-white text-lg w-5"></i>
                    <a href="https://www.instagram.com/pwt.undercover?igsh=M2g5MDk2ZzNyZGJ4&utm_source=qr"
                       class="hover:underline text-white" target="_blank">
                        @pwt.undercover
                    </a>
                </li>
                <li class="flex items-center space-x-3">
                    <i class="fab fa-tiktok text-white text-lg w-5"></i>
                    <a href="https://www.tiktok.com/@pwt.undercover?_t=ZS-8yfQQQOCyRj&_r=1"
                       class="hover:underline text-white" target="_blank">
                        @pwt.undercover
                    </a>
                </li>
                <li class="flex items-center space-x-3">
                    <i class="fab fa-youtube text-white text-lg w-5"></i>
                    <a href="https://youtube.com/@pwt.undercover?si=pvGRjEBDSgmvoZtI"
                       class="hover:underline text-white" target="_blank">
                        PWT Undercover
                    </a>
                </li>
            </ul>
        </div>

    </div>
</section>
@endsection

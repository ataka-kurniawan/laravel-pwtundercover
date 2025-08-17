@extends('layouts.app')

@section('content')
<section class="w-full px-6 md:px-10 lg:px-24 py-16 text-white">
    <div class="max-w-5xl mx-auto">

        <h1 class="text-4xl font-bold mb-6 border-b border-gray-700 pb-2">Ketentuan Tulisan</h1>

        <h2 class="text-2xl font-semibold mb-2">Punya Cerita? Punya Data? <a href="{{route('contributor.create')}}"class="underline">Tulis Disini</a></h2>
        
        <p class="text-gray-400 italic mb-8">PWT Undercover membuka ruang bagi siapa pun yang ingin menulis, mengkritik, atau sekadar bersuara.</p>

        <div class="space-y-4 text-gray-200 leading-relaxed mb-10">
            <p>Kamu bisa mengirim:</p>
            <ul class="list-disc list-inside pl-4">
                <li>Artikel opini</li>
                <li>Liputan khas</li>
                <li>Catatan investigatif</li>
                <li>Cerita rakyat dan mistis lokal</li>
                <li>Esai budaya atau lingkungan</li>
            </ul>
        </div>

        <h3 class="text-xl font-semibold mb-4">Syarat dan Ketentuan:</h3>
        <ul class="list-decimal list-inside text-gray-200 space-y-3 pl-4 leading-relaxed">
            <li>Semua tulisan yang masuk tetap menjadi hak milik penulis</li>
            <li>Panjang artikel minimal 500 kata</li>
            <li>Ditulis dalam bahasa Indonesia formal, non-formal, maupun semi-formal, bebas dari SARA & ujaran kebencian</li>
            <li>Tulisan harus orisinil dan belum pernah dipublikasikan di media atau platform lain</li>
            <li>Tidak diperbolehkan hasil plagiarisme atau tulisan berbasis AI tanpa pengeditan manusia</li>
            <li>Sertakan judul yang menarik dan subjudul</li>
            <li>Jika menyertakan foto atau ilustrasi, wajib mencantumkan sumber atau menyatakan bahwa itu milik sendiri</li>
            <li>Redaktur PWT Undercover berhak menyunting tulisan dan menentukan apakah tulisan layak ditayangkan atau tidak</li>
            <li>Tulisan yang lolos kurasi akan dihubungi maksimal dalam 14 hari kalender</li>
            <li>Setelah tulisan dipublikasikan di PWT Undercover, penulis boleh mengirimkannya ke platform/media lain minimal 7 hari setelah tanggal tayang, dengan mencantumkan keterangan: <em>"Tulisan ini pernah dimuat di PWT Undercover"</em></li>
            <li>Setiap tulisan yang dimuat akan mendapatkan 1 poin</li>
            <li>Jika kamu telah mengumpulkan 10 poin, kamu dapat mengajukan klaim kompensasi senilai Rp 100.000 (dipotong pajak 2,5%)</li>
            <li>Maksimal klaim per penulis adalah 20 tulisan per bulan (setara Rp 200.000)</li>
            <li>
                Untuk melakukan klaim, kirimkan email ke: 
                <a href="mailto:halo.pwtundercover@gmail.com" class="underline text-white">halo.pwtundercover@gmail.com</a><br>
                dengan subjek: <strong>KLAIM POIN TULISAN_Nama Pengirim_Jumlah Poin</strong><br>
                <span class="text-sm italic">Contoh: KLAIM POIN TULISAN_Mas Aditya_10 Poin</span>
            </li>
            <li>
                Isi email klaim harus mencantumkan:
                <ul class="list-disc list-inside ml-6 mt-2 space-y-1 text-sm">
                    <li>Link artikel terakhir yang dimuat</li>
                    <li>Alamat email yang digunakan saat mengirim tulisan</li>
                    <li>Jumlah poin yang diklaim</li>
                    <li>Foto KTP</li>
                    <li>Foto NPWP (jika ada)</li>
                    <li>No WA dan nomor rekening (nama bank, KCP, dan nama pemilik rekening)</li>
                    <li>Boleh menggunakan rekening orang lain jika tidak memiliki rekening pribadi</li>
                </ul>
            </li>
            <li>Klaim hanya bisa dilakukan dari alamat email yang sama</li>
            <li>Pencairan dana akan diproses minimal 4 minggu sejak klaim diterima</li>
        </ul>
    </div>
</section>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- Meta SEO dasar --}}
    <meta name="description" content="@yield('meta_description', 'Portal berita Purwokerto terbaru, terkini, dan terpercaya.')">
    <meta name="keywords" content="@yield('meta_keywords', 'berita Purwokerto, berita Banyumas, portal berita Purwokerto')">
    <meta name="author" content="PWT Undercover">
    <meta name="robots" content="index, follow">
    

    {{-- Open Graph --}}
    @stack('meta') {{-- biar bisa di-push dari artikel/kategori --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">
    <style>
        html,
        body {
            overflow-x: hidden;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
     <script src="https://cdn.tiny.cloud/1/2labnbb5mpooqtdl08hkdu7kgb1rmdpmdi6vbq6aolie030f/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>
</head>

<body class="bg-black text-white">

    @include('partials.navbar')

    <main data-aos="fade-up"  data-aos-duration="2000">
        @yield('content')
    </main>

    @include('partials.footer')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    tinymce.init({
        selector: '#article_content',
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media',
            'searchreplace', 'table', 'visualblocks', 'wordcount',
            'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker',
            'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate',
            'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags',
            'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        uploadcare_public_key: 'c69b465f677c09229f19',

        // Tambahan penting untuk mobile
        mobile: {
            theme: 'silver', // paksa tampilan desktop di mobile
            toolbar: 'undo redo | bold italic underline | bullist numlist | link'
        }
    });
});
</script>

</body>

</html>

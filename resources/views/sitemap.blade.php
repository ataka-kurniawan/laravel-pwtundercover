{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- Semua kategori --}}
    @foreach ($categories as $category)
        <url>
            <loc>{{ url('/category/' . $category->slug) }}</loc>
            <lastmod>{{ $category->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
    @endforeach

    {{-- Semua artikel --}}
    @foreach ($articles as $article)
        <url>
            <loc>{{ url('/article/' . $article->slug) }}</loc>
            <lastmod>{{ $article->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
    @endforeach

</urlset>

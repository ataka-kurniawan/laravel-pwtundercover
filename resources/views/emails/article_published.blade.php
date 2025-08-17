<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Artikel Dipublikasikan</title>
</head>
<body>
    <h2>Halo {{ $article->contributor->name }},</h2>
    <p>Artikel Anda dengan judul <strong>{{ $article->title }}</strong> telah berhasil dipublikasikan.</p>
    <p>Anda bisa membacanya di link berikut:</p>
    <p><a href="{{ url('/articles/'.$article->slug) }}">{{ url('/articles/'.$article->slug) }}</a></p>
    <p>Terima kasih sudah berkontribusi!</p>
</body>
</html>

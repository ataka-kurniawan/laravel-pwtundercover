<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Ad;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->query('category');

        // =========================
        // HALAMAN KATEGORI
        // =========================
        if ($categoryId) {
            $category = Category::findOrFail($categoryId);

            $articles = Article::with('category', 'user')
                ->where('status', 'published')
                ->where('category_id', $categoryId)
                ->orderBy('published_at', 'desc')
                ->paginate(10)
                ->appends(['category' => $categoryId]);

            return view('home.category', [
                'categories' => $categories, // untuk navbar
                'category' => $category,
                'articles' => $articles
            ]);
        }

        // =========================
        // HALAMAN HOME
        // =========================
        $articles = Article::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();

        $header = $articles->where('position', 'header');
        $headline = $articles->where('position', 'headline')->first();

        // Trending
        $trendingAll = Article::where('status', 'published')
            ->where('position', 'trending')
            ->latest()
            ->get();

        $trending = $trendingAll->take(6);
        $extraTrending = $trendingAll->skip(6);

        if ($extraTrending->count() > 0) {
            Article::whereIn('id', $extraTrending->pluck('id'))
                ->update(['position' => 'none']);
        }

        // Carousel
        $carouselAll = Article::with('category')
            ->where('status', 'published')
            ->where('position', 'carousel')
            ->latest()
            ->get();

        $carousel = $carouselAll->take(5);
        $extraCarousel = $carouselAll->skip(5);

        if ($extraCarousel->count() > 0) {
            Article::whereIn('id', $extraCarousel->pluck('id'))
                ->update(['position' => 'none']);
        }

        // Sidebar
        $sidebar = Article::where('status', 'published')
            ->where('position', 'sidebar')
            ->latest()
            ->paginate(4, ['*'], 'sidebar_page');

        // None Collection
        $noneCollection = Article::with('category', 'user')
            ->where('status', 'published')
            ->where('position', 'none')
            ->orderBy('published_at', 'desc')
            ->get()
            ->merge($extraTrending)
            ->merge($extraCarousel)
            ->sortByDesc('published_at')
            ->values();

        $today = Carbon::today();

        $mainBanner = Ad::where('position', 'main')
            ->where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->latest()
            ->first();

        return view('home.index', compact(
            'header',
            'headline',
            'trending',
            'carousel',
            'sidebar',
            'categories',
            'noneCollection',
            'mainBanner'
        ));
    }

    public function aboutUs()
    {
        $categories = Category::all();
        return view('home.about-us', compact('categories'));
    }

    public function ketentuanTulisan()
    {
        $categories = Category::all();

        return view('home.ketentuan-tulisan', compact('categories'));

    }

    public function pasangIklan()
    {
        $categories = Category::all();
        return view('home.pasang-iklan', compact('categories'));

    }

    public function show($id)
    {
        $categories = Category::all();
        $article = Article::with(['category', 'user', 'contributor'])
            ->where('status', 'published')
            ->findOrFail($id);

        $article->increment('views');


        // Ambil 3 artikel serupa berdasarkan kategori (kecuali diri sendiri)
        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();

            
         $today = now();

    $articleBanner = Ad::where('position', 'article')
        ->where('start_date', '<=', $today)
        ->where('end_date', '>=', $today)
        ->latest()
        ->first();

        return view('home.artikel', compact('article', 'relatedArticles', 'categories','articleBanner'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $query = $request->input('q'); // GANTI 'query' ke 'q' sesuai URL

        $articles = Article::with('category', 'user', 'contributor')
            ->where('status', 'published')
            ->when($query, function ($qbuilder) use ($query) {
                $qbuilder->where('title', 'like', "%{$query}%");
            })
            ->orderBy('published_at', 'desc')
            ->paginate(10)
            ->appends($request->only('q')); // juga ganti di sini agar pagination tetap simpan q

        return view('home.search-results', compact('articles', 'categories', 'query'));
    }






}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contributor;
use App\Models\Article;



class DashboardController extends Controller
{
    public function index()
    {
        $totalContributors = Contributor::count();
        $totalArticles = Article::count();
        $articlesToday = Article::whereDate('created_at', today())->count();
        $articlesThisMonth = Article::whereMonth('created_at', now()->month)->count();
        $latestArticles = Article::latest()->take(5)->get();
        $publishedArticles = Article::where('status', 'published')->count();
        $draftArticles = Article::where('status', 'pending')->count();
        $totalViews = Article::sum('views');
        $totalViewsThisMonth = Article::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('views');


        return view('admin.dashboard.index', compact(
            'totalContributors',
            'totalArticles',
            'publishedArticles',
            'draftArticles',
            'articlesToday',
            'articlesThisMonth',
            'latestArticles',
            'totalViews',
            'totalViewsThisMonth'
        ));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $articles   = Article::all();

        return response()
            ->view('sitemap', compact('categories', 'articles'))
            ->header('Content-Type', 'application/xml');
    }
}

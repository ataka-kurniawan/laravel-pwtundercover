<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contributor;
use App\Models\Article;

class AuthorController extends Controller
{
   public function show($id)
{
    $categories =Category::all();
    // Cek apakah penulis adalah user atau contributor
    $user = User::find($id);
    $contributor = Contributor::find($id);

    if ($user) {
        $articles = $user->articles()->where('status', 'published')->latest('published_at')->get();
        $name = $user->name;
    } elseif ($contributor) {
        $articles = $contributor->articles()->where('status', 'published')->latest('published_at')->get();
        $name = $contributor->name;
    } else {
        abort(404);
    }

    return view('authors.show', compact('name', 'articles','categories'));
}


}

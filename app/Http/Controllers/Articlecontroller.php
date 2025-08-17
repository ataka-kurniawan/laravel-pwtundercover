<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use Carbon\Carbon;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Mail;
use App\Mail\ArticlePublishedMail;
use Illuminate\Http\Request;

class Articlecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category')->orderBy('created_at', 'desc')->paginate(10); // u;
        return view('admin.articles.index', compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:pending,published,rejected',
            'position' => 'nullable|in:none,header,headline,sidebar,trending,carousel',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',

        ]);
        $thumbnail = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }
        $validated['user_id'] = auth()->id();

        if ($thumbnail) {
            $validated['thumbnail'] = $thumbnail;
        }
        Article::create($validated);

        return redirect()->route('artikel.index')->with('success', 'artikel telah dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with(['category', 'user', 'contributor'])->findOrFail($id);

        return view('admin.articles.show', compact('article'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $article = Article::with('category')->findOrFail($id);
        return view('admin.articles.edit', compact('article', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:pending,published,rejected',
            'position' => 'nullable|in:none,header,headline,sidebar,trending,carousel',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Handle thumbnail update
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($article->thumbnail && \Storage::disk('public')->exists($article->thumbnail)) {
                \Storage::disk('public')->delete($article->thumbnail);
            }

            // Simpan thumbnail baru
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Set waktu publish jika status published
        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        } elseif ($validated['status'] === 'pending') {
            $validated['published_at'] = null;
        }

        $article->update($validated);
        

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('artikel.index')->with('success', 'artikel berhasil dihapus');
    }

    public function publish($id)
    {
        $article = Article::findOrFail($id);
        $article->status = 'published';
        $article->published_at = now();
        $article->save();
        if ($article->user && $article->user->email) {
            Mail::to($article->user->email)->send(new ArticlePublishedMail($article));
        }


        return redirect()->route('artikel.index', $id)->with('success', 'Artikel berhasil diterbitkan.');
    }

    public function reject($id)
    {
        $article = Article::findOrFail($id);
        $article->status = 'rejected';
        $article->save();

        return redirect()->route('artikel.show', $id)->with('success', 'Artikel berhasil ditolak.');
    }

    public function draft($id)
    {
        $article = Article::findOrFail($id);
        $article->status = 'pending';
        $article->published_at = null;
        $article->save();

        return redirect()->route('artikel.show', $id)->with('success', 'Artikel dikembalikan ke draft.');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('article_images', 'public');
            return response()->json(['location' => asset('storage/' . $path)]);
        }
        return response()->json(['error' => 'No file uploaded'], 422);
    }


}

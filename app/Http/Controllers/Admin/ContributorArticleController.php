<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Contributor;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ArticlePublishedMail;
use Carbon\Carbon;

class ContributorArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['contributor', 'category'])
            ->whereNotNull('contributor_id')
            ->latest()
            ->paginate(10);

        return view('admin.contributor.index', compact('articles'));
    }

    public function approve($id)
    {
        $article = Article::findOrFail($id);
        $article->update([
            'status' => 'published',
            'published_at' => Carbon::now(),
        ]);

        // Kirim email ke kontributor
        if ($article->user && $article->user->email) {
            Mail::to($article->user->email)->send(new ArticlePublishedMail($article));
        }

        return back()->with('success', 'Artikel berhasil diterbitkan.');
    }

    public function reject($id)
    {
        $article = Article::findOrFail($id);
        $article->update(['status' => 'rejected']);

        return back()->with('success', 'Artikel ditolak.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return back()->with('success', 'Artikel berhasil dihapus.');
    }

    public function show($id)
    {
        $article = Article::with(['contributor', 'category'])->findOrFail($id);
        return view('admin.contributor.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::with(['contributor', 'category'])->findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('admin.contributor.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'position' => 'required|in:none,header,headline,sidebar,trending,carousel',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $article = Article::findOrFail($id);

        // Simpan thumbnail baru kalau ada
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            unset($validated['thumbnail']); // biar nggak null-in data lama
        }

        $article->update($validated);

        return redirect()->route('admin.kontributor.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function updatePosition(Request $request, $id)
    {
        $request->validate([
            'position' => 'required|in:none,header,headline,sidebar,trending,carousel',
        ]);

        $article = Article::findOrFail($id);
        $article->update(['position' => $request->position]);

        return back()->with('success', 'Posisi artikel berhasil diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,published,rejected',
        ]);

        $article = Article::findOrFail($id);

        $data = ['status' => $request->status];

        // Jika dipublish, isi tanggal terbit
        if ($request->status === 'published' && !$article->published_at) {
            $data['published_at'] = Carbon::now();
        }

        $article->update($data);

        if ($request->status === 'published') {
            if ($article->contributor && $article->contributor->email) {
                Mail::to($article->contributor->email)->send(new ArticlePublishedMail($article));
            }
        }

        return back()->with('success', 'Status artikel berhasil diperbarui.');
    }



}

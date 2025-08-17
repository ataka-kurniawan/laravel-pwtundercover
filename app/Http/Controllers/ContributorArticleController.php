<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contributor;
use Illuminate\Http\Request;

class ContributorArticleController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contributor.create',compact('categories'));
    }
    
    public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'content'     => 'required|string',
        'thumbnail'   => 'nullable|image|max:2048',
        'category_id' => 'required|exists:categories,id',

        // Data kontributor
        'name'        => 'required|string|max:255',
        'email'       => 'required|email',
        'phone'       => 'nullable|string|max:20',
        'birth_date'  => 'nullable|date',
        'address'     => 'nullable|string|max:255',
        'attribution' => 'nullable|string|max:255',
        'instagram'   => 'nullable|string|max:255',
    ]);

    // Simpan atau update data kontributor berdasarkan email
    $contributor = Contributor::updateOrCreate(
        ['email' => $validated['email']], // kunci unik
        [
            'name'        => $validated['name'],
            'phone'       => $validated['phone'] ?? null,
            'birth_date'  => $validated['birth_date'] ?? null,
            'address'     => $validated['address'] ?? null,
            'attribution' => $validated['attribution'] ?? null,
            'instagram'   => $validated['instagram'] ?? null,
        ]
    );

    // Simpan thumbnail jika ada
    $thumbnailPath = null;
    if ($request->hasFile('thumbnail')) {
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
    }

    // Simpan artikel
    Article::create([
        'contributor_id' => $contributor->id,
        'category_id'    => $validated['category_id'],
        'title'          => $validated['title'],
        'content'        => $validated['content'],
        'thumbnail'      => $thumbnailPath,
        'status'         => 'pending', // default menunggu approve admin
        'position'       => 'none',    // default tidak masuk slot khusus
    ]);

    return redirect()
        ->back()
        ->with('success', 'Artikel berhasil dikirim dan menunggu persetujuan admin.');
}


}

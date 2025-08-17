<?php

namespace App\Http\Controllers;
use App\Models\Contributor;
use Illuminate\Http\Request;

class DataContributorController extends Controller
{
   public function index(Request $request)
{
    $search = $request->input('search');

    $contributors = Contributor::withCount(['articles' => function ($query) {
        $query->where('status', 'published');
    }])
    ->when($search, function ($query) use ($search) {
        $query->where('email', 'like', '%' . $search . '%');
    })
    ->get();

    return view('admin.data_contributor.index', compact('contributors', 'search'));
}


}

<?php
namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::orderBy('start_date', 'desc')->get();
        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'banner' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
            'position' => 'required|in:main,article',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Cek bentrok
        $overlap = Ad::where('position', $request->position)
            ->where(function ($q) use ($request) {
                $q->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orWhere(function ($q2) use ($request) {
                        $q2->where('start_date', '<=', $request->start_date)
                            ->where('end_date', '>=', $request->end_date);
                    });
            })
            ->exists();

        if ($overlap) {
            return back()
                ->withInput()
                ->with('error', 'Posisi ini sudah terpakai di periode tersebut.');
        }


        $path = $request->file('banner')->store('ads', 'public');

        Ad::create([
            'title' => $request->title,
            'banner' => $path,
            'link' => $request->link,
            'position' => $request->position,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('ads.index')->with('success', 'Iklan berhasil ditambahkan.');
    }

    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'title' => 'required',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
            'position' => 'required|in:main,article',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Cek bentrok kecuali iklan ini sendiri
        $overlap = Ad::where('position', $request->position)
            ->where('id', '!=', $ad->id)
            ->where(function ($q) use ($request) {
                $q->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orWhere(function ($q2) use ($request) {
                        $q2->where('start_date', '<=', $request->start_date)
                            ->where('end_date', '>=', $request->end_date);
                    });
            })
            ->exists();

        if ($overlap) {
            return back()
                ->withInput()
                ->with('error', 'Posisi ini sudah terpakai di periode tersebut.');
        }


        $data = $request->only(['title', 'link', 'position', 'start_date', 'end_date']);

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('ads', 'public');
        }

        $ad->update($data);

        return redirect()->route('ads.index')->with('success', 'Iklan berhasil diperbarui.');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'Iklan berhasil dihapus.');
    }
}


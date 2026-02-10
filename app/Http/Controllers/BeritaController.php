<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'status' => 'required'
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' => $request->isi,
            'gambar' => $gambar,
            'status' => $request->status,
            'created_by' => Auth::id()
        ]);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil disimpan');
    }

    public function show($slug)
{
    $berita = Berita::where('slug', $slug)
        ->where('status', 'publish')
        ->firstOrFail();

    return view('landing.berita-show', compact('berita'));
}
}

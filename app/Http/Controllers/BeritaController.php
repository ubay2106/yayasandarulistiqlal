<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'status' => 'required',
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
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil disimpan');
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->where('status', 'publish')->firstOrFail();

        return view('page.berita-show', compact('berita'));
    }
    public function list()
{
    $berita = Berita::where('status', 'publish')
        ->latest()
        ->paginate(9);

    return view('page.berita-list', compact('berita'));
}

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'status' => 'required|in:publish,draft',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // hapus gambar lama
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => $request->status,
            'slug' => Str::slug($request->judul), // optional
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus');
    }
}

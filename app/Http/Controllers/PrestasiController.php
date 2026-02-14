<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::latest()->get();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'nullable|date',
            'status' => 'required|in:publish,draft',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('prestasi', 'public');
        }

        Prestasi::create($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'nullable|date',
            'status' => 'required|in:publish,draft',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar) {
                Storage::disk('public')->delete($prestasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diupdate');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->gambar) {
            Storage::disk('public')->delete($prestasi->gambar);
        }

        $prestasi->delete();

        return back()->with('success', 'Prestasi dihapus');
    }
    public function show(Prestasi $prestasi)
    {
        return view('page.prestasi-show', compact('prestasi'));
    }
    public function list()
    {
        $prestasi = Prestasi::where('status', 'publish')->latest()->paginate(9); // bebas: 6, 9, 12

        return view('page.prestasi', compact('prestasi'));
    }
}

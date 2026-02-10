<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::with('user', 'waliKelas')->get();
        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.guru.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nip' => 'required|unique:guru,nip',
                'nama_guru' => 'required|string|max:100',
                'tanggal_lahir' => 'nullable|date',

                'foto_cropped' => 'required|string',

                'username' => 'required|unique:users,username',
                'password' => 'required|min:6',
                'jabatan' => 'nullable|string|max:100',
                'wali_kelas_id' => ['nullable', Rule::requiredIf(Str::lower(trim($request->jabatan)) === 'wali kelas')],
            ],
            [
                'nip.unique' => 'NIP sudah terdaftar',
                'username.unique' => 'Username sudah digunakan',
                'wali_kelas_id.required' => 'Wali kelas wajib dipilih jika jabatan Wali Kelas',
            ],
        );

        $base64 = preg_replace('#^data:image/\w+;base64,#i', '', $request->foto_cropped);
        $image = base64_decode($base64);

        $fotoPath = 'guru/' . uniqid() . '.jpg';
        Storage::disk('public')->put($fotoPath, $image);

        $jabatan = Str::lower(trim($request->jabatan));

        if ($jabatan === 'wali kelas' && $request->wali_kelas_id) {
            $sudahAda = Guru::where('wali_kelas_id', $request->wali_kelas_id)
                ->whereRaw('LOWER(jabatan) = ?', ['wali kelas'])
                ->exists();

            if ($sudahAda) {
                return back()
                    ->withErrors(['wali_kelas_id' => 'Kelas ini sudah memiliki wali kelas'])
                    ->withInput();
            }
        }

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        Guru::create([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto' => $fotoPath, // 🔥 INI SEKARANG BENAR
            'user_id' => $user->id,
            'jabatan' => $request->jabatan,
            'wali_kelas_id' => $jabatan === 'wali kelas' ? $request->wali_kelas_id : null,
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit(Guru $guru)
    {
        $kelas = Kelas::all();
        return view('admin.guru.edit', compact('guru', 'kelas'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate(
            [
                'nip' => ['required', Rule::unique('guru', 'nip')->ignore($guru->id)],
                'nama_guru' => 'required|string|max:100',
                'tanggal_lahir' => 'nullable|date',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

                'jabatan' => 'nullable|string|max:100',
                'wali_kelas_id' => ['nullable', Rule::requiredIf(Str::lower(trim($request->jabatan)) === 'wali kelas')],
            ],
            [
                'wali_kelas_id.required' => 'Wali kelas wajib dipilih jika jabatan Wali Kelas',
                'foto.image' => 'File harus berupa gambar',
                'foto.max' => 'Ukuran foto maksimal 2MB',
            ],
        );

        if ($request->foto_cropped) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $base64 = preg_replace('#^data:image/\w+;base64,#i', '', $request->foto_cropped);
            $image = base64_decode($base64);

            $fotoPath = 'guru/' . uniqid() . '.jpg';
            Storage::disk('public')->put($fotoPath, $image);

            $guru->foto = $fotoPath;
        }

        $jabatan = Str::lower(trim($request->jabatan));

        if ($jabatan === 'wali kelas' && $request->wali_kelas_id) {
            $sudahAda = Guru::where('wali_kelas_id', $request->wali_kelas_id)
                ->whereRaw('LOWER(jabatan) = ?', ['wali kelas'])
                ->where('id', '!=', $guru->id)
                ->exists();

            if ($sudahAda) {
                return back()
                    ->withErrors(['wali_kelas_id' => 'Kelas ini sudah memiliki wali kelas'])
                    ->withInput();
            }
        }

        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $guru->foto = $request->file('foto')->store('guru', 'public');
        }

        $guru->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jabatan' => $request->jabatan,
            'wali_kelas_id' => $jabatan === 'wali kelas' ? $request->wali_kelas_id : null,
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        try {
            Guru::findOrFail($id)->delete();
            return back()->with('success', 'Guru berhasil dihapus');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return back()->withErrors([
                    'delete' => 'Guru tidak bisa dihapus karena masih mengajar atau menjadi wali kelas',
                ]);
            }

            return back()->withErrors([
                'delete' => 'Terjadi kesalahan saat menghapus data',
            ]);
        }
    }

    public function show(Guru $guru)
    {
        $guru->load(['waliKelas', 'pengajar.mapel', 'pengajar.kelas']);
        return view('page.guru-show', compact('guru'));
    }
}

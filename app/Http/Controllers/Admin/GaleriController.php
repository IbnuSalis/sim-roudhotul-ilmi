<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::orderBy('urutan')->orderBy('created_at', 'desc')->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:200',
            'gambar'   => 'required|image|max:4096',
            'kategori' => 'nullable|string|max:100',
            'deskripsi'=> 'nullable|string',
            'urutan'   => 'nullable|integer|min:0',
        ]);

        $data = $request->only('judul', 'kategori', 'deskripsi', 'urutan');
        $data['gambar'] = $request->file('gambar')->store('galeri', 'public');

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul'    => 'required|string|max:200',
            'gambar'   => 'nullable|image|max:4096',
            'kategori' => 'nullable|string|max:100',
            'deskripsi'=> 'nullable|string',
            'urutan'   => 'nullable|integer|min:0',
        ]);

        $data = $request->only('judul', 'kategori', 'deskripsi', 'urutan');

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar) Storage::disk('public')->delete($galeri->gambar);
            $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar) Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }
}
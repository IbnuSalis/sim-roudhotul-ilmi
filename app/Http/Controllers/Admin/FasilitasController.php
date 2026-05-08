<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Http\Requests\Admin\FasilitasRequest;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::orderBy('urutan')->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(FasilitasRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        }
        Fasilitas::create($validated);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(FasilitasRequest $request, Fasilitas $fasilitas)
    {
        $validated = $request->validated();
        if ($request->hasFile('gambar')) {
            if ($fasilitas->gambar) Storage::disk('public')->delete($fasilitas->gambar);
            $validated['gambar'] = $request->file('gambar')->store('fasilitas', 'public');
        } else {
            unset($validated['gambar']);
        }
        $fasilitas->update($validated);
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        if ($fasilitas->gambar) Storage::disk('public')->delete($fasilitas->gambar);
        $fasilitas->delete();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}

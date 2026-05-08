<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Http\Requests\Admin\GuruRequest;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('urutan')->orderBy('nama')->get();
        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(GuruRequest $request)
    {
        $validated = $request->validated();
        $validated['aktif'] = $request->boolean('aktif', true);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($validated);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(GuruRequest $request, Guru $guru)
    {
        $validated = $request->validated();
        $validated['aktif'] = $request->boolean('aktif', true);

        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        } else {
            unset($validated['foto']);
        }

        $guru->update($validated);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }
        $guru->delete();
        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BerandaSetting;
use App\Http\Requests\Admin\BerandaRequest;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    public function edit()
    {
        $beranda = BerandaSetting::getInstance();
        return view('admin.beranda.edit', compact('beranda'));
    }

    public function update(BerandaRequest $request)
    {
        $beranda  = BerandaSetting::getInstance();
        $validated = $request->validated();

        foreach (['foto_kepala', 'hero_slide_1', 'hero_slide_2', 'hero_slide_3'] as $field) {
            if ($request->hasFile($field)) {
                if ($beranda->$field) {
                    Storage::disk('public')->delete($beranda->$field);
                }
                $validated[$field] = $request->file($field)->store('beranda', 'public');
            } else {
                unset($validated[$field]);
            }
        }

        $beranda->update($validated);

        return redirect()->route('admin.beranda.edit')
            ->with('success', 'Data beranda berhasil diperbarui.');
    }
}

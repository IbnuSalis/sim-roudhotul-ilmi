<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Http\Requests\Admin\ProgramRequest;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index() {
        $programs = Program::orderBy('kategori')->orderBy('urutan')->get();
        return view('admin.program.index', compact('programs'));
    }
    public function create() { return view('admin.program.create'); }
    public function store(ProgramRequest $request) {
        $validated = $request->validated();
        if ($request->hasFile('foto')) $validated['foto'] = $request->file('foto')->store('program', 'public');
        Program::create($validated);
        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan.');
    }
    public function edit(Program $program) { return view('admin.program.edit', compact('program')); }
    public function update(ProgramRequest $request, Program $program) {
        $validated = $request->validated();
        if ($request->hasFile('foto')) {
            if ($program->foto) Storage::disk('public')->delete($program->foto);
            $validated['foto'] = $request->file('foto')->store('program', 'public');
        } else { unset($validated['foto']); }
        $program->update($validated);
        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diperbarui.');
    }
    public function destroy(Program $program) {
        if ($program->foto) Storage::disk('public')->delete($program->foto);
        $program->delete();
        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus.');
    }
}

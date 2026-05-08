<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Http\Requests\Admin\AgendaRequest;

class AgendaController extends Controller
{
    public function index() {
        $agendas = Agenda::orderBy('tanggal', 'desc')->get();
        return view('admin.agenda.index', compact('agendas'));
    }
    public function create() { return view('admin.agenda.create'); }
    public function store(AgendaRequest $request) {
        Agenda::create($request->validated());
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
    }
    public function edit(Agenda $agenda) { return view('admin.agenda.edit', compact('agenda')); }
    public function update(AgendaRequest $request, Agenda $agenda) {
        $agenda->update($request->validated());
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diperbarui.');
    }
    public function destroy(Agenda $agenda) {
        $agenda->delete();
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus.');
    }
}

<?php
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'judul'     => 'required|string|max:300',
            'deskripsi' => 'nullable|string',
            'tanggal'   => 'required|date',
            'lokasi'    => 'nullable|string|max:300',
            'status'    => 'required|in:akan_datang,selesai',
        ];
    }
}

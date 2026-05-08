<?php
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'judul'     => 'required|string|max:200',
            'kategori'  => 'required|in:kbtk,tahfid,tpa',
            'foto'      => 'nullable|image|max:4096',
            'deskripsi' => 'nullable|string',
            'detail'    => 'nullable|string',
            'urutan'    => 'nullable|integer|min:0',
        ];
    }
}

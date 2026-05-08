<?php
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class FasilitasRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'nama'      => 'required|string|max:200',
            'gambar'    => 'nullable|image|max:4096',
            'deskripsi' => 'nullable|string',
            'ikon'      => 'nullable|string|max:100',
            'urutan'    => 'nullable|integer|min:0',
        ];
    }
}

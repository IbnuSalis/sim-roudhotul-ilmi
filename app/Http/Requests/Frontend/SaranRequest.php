<?php
namespace App\Http\Requests\Frontend;
use Illuminate\Foundation\Http\FormRequest;

class SaranRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'nama'    => 'required|string|max:200',
            'email'   => 'nullable|email|max:200',
            'telepon' => 'nullable|string|max:20',
            'subjek'  => 'nullable|string|max:200',
            'pesan'   => 'required|string|min:10',
        ];
    }
    public function messages(): array
    {
        return [
            'nama.required'  => 'Nama wajib diisi.',
            'pesan.required' => 'Pesan wajib diisi.',
            'pesan.min'      => 'Pesan minimal 10 karakter.',
        ];
    }
}

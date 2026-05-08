<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama'        => 'required|string|max:200',
            'jabatan'     => 'required|string|max:200',
            'pendidikan'  => 'nullable|string|max:200',
            'foto'        => 'nullable|image|max:2048',
            'posisi_foto' => 'nullable|string|max:50',
            'deskripsi'   => 'nullable|string',
            'urutan'      => 'nullable|integer|min:0',
            'aktif'       => 'nullable|boolean',
        ];
    }
}
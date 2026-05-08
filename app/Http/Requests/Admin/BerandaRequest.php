<?php
// app/Http/Requests/Admin/BerandaRequest.php
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class BerandaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama_kepala'   => 'required|string|max:200',
            'jabatan_kepala'=> 'required|string|max:200',
            'quote_kepala'  => 'required|string',
            'sambutan'      => 'nullable|string',
            'jumlah_guru'   => 'required|integer|min:0',
            'jumlah_siswa'  => 'required|integer|min:0',
            'jumlah_rombel' => 'required|integer|min:0',
            'label_guru'    => 'required|string|max:100',
            'label_siswa'   => 'required|string|max:100',
            'label_rombel'  => 'required|string|max:100',
            'foto_kepala'   => 'nullable|image|max:2048',
            'hero_slide_1'  => 'nullable|image|max:4096',
            'hero_slide_2'  => 'nullable|image|max:4096',
            'hero_slide_3'  => 'nullable|image|max:4096',
        ];
    }

    public function messages(): array
    {
        return [
            'foto_kepala.image' => 'File harus berupa gambar.',
            'foto_kepala.max'   => 'Ukuran foto maksimal 2MB.',
        ];
    }
}

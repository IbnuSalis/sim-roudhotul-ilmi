<?php
namespace App\Http\Requests\Frontend;
use Illuminate\Foundation\Http\FormRequest;

class SpmbRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama_lengkap'   => 'required|string|max:200',
            'nama_panggilan' => 'required|string|max:100',
            'jenis_kelamin'  => 'required|in:L,P',
            'tempat_lahir'   => 'required|string|max:100',
            'tanggal_lahir'  => 'required|date',
            'agama'          => 'required|string|max:50',
            'anak_ke'        => 'nullable|integer|min:1',
            'jumlah_saudara' => 'nullable|integer|min:0',
            'asal_sekolah'   => 'nullable|string|max:200',
            'nama_ayah'      => 'required|string|max:200',
            'nama_ibu'       => 'required|string|max:200',
            'pekerjaan_ayah' => 'nullable|string|max:100',
            'pekerjaan_ibu'  => 'nullable|string|max:100',
            'telepon'        => 'required|string|max:20',
            'email'          => 'nullable|email|max:200',
            'alamat'         => 'required|string',
            'program'        => 'required|in:kbtk,tahfid,tpa',
            'foto_anak'      => 'nullable|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_lengkap.required'  => 'Nama lengkap wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'nama_ayah.required'     => 'Nama ayah wajib diisi.',
            'nama_ibu.required'      => 'Nama ibu wajib diisi.',
            'telepon.required'       => 'Nomor telepon wajib diisi.',
            'alamat.required'        => 'Alamat wajib diisi.',
            'program.required'       => 'Program yang dipilih wajib diisi.',
        ];
    }
}

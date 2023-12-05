<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_perusahaan' => 'required|string',
            'penanggung_jawab' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telpn' => 'required|numeric|min:10',
            'npwp' => 'required|numeric', //cek di db apa ada npwp yang dimasukan
            'tipe_partner' => 'required|string',
            'logo_partner' => 'required|image|file|mimes:jpeg,png,jpg',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_perusahaan.required' => 'Nama Perusahaan Harus Diisi',
            'penanggung_jawab.required' => 'Penanggung Jawab Harus Diisi',
            'alamat.required' => 'Alamat Harus Di Isi',
            'nomor_telpn.required' => 'Nomor Telephone Harus Di Isi',
            'nomor_telpn.min' => 'Nomor Telephone minimal 10 angka',
            'nomor_telpn.max' => 'Nomor Telephone max 16 angka',
            'npwp.required' => 'NPWP Harus Di Isi',
            'tipe_partner.required' => 'Tipe Mitra Harus Di Pilih',
            'logo_partner.required' => 'Upload Logo!',
            'logo_partner.image' => 'Logo Harus Image!',
            'logo_partner.mimes' => 'Logo Harus Bertipe JPEG, JPG, PNG!',
        ];
    }
}

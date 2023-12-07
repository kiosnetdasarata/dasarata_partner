<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'nik' => 'required|numeric',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telpn' => 'required|numeric|min:10',
            'area_cover' => 'required|string',
            'customer_id' => 'required',
            'nama_paket' => 'required|string',
            'amount' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nik.required' => 'NIK Harus Diisi',
            'nama.required' => 'Nama Harus Diisi',
            'alamat.required' => 'Nama Harus Di Isi',
            'nomor_telpn.required' => 'Nomor Telephone Harus Di Isi',
            'nomor_telpn.min' => 'Nomor Telephone minimal 10 angka',
            'nomor_telpn.max' => 'Nomor Telephone max 16 angka',
            'area_cover.required' => 'Area Cover Harus Di Isi',
            'customer_id.required' => 'Customer ID Harus Di Isi',
            'nama_paket.required' => 'Nama Paket Harus Di Isi',
            'amount.required' => 'Amount Harus Di Isi',
        ];
    }
}

<?php

namespace App\Services\Admins;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Interfaces\Admin\PartnerInterface;

Class PartnerService
{
    public function __construct(protected PartnerInterface $partnerInterface)
    {}

    public function getAll()
    {
        return $this->partnerInterface->getAll();
    }

    public function find($id)
    {
        return $this->partnerInterface->find($id);
    }

    public function store($request)
    {
        // id mitra 10 digit :
        // 1. awal 9 menunjukan mitra
        // 2. tahun dan tanggal
        // 3. 5 terakhir mitra ke berapa

        $now = Carbon::now()->format('Ym');
        $countPartner = $this->partnerInterface->count()+1;
        $nomor = str_pad($countPartner, 4, '0', STR_PAD_LEFT);
        $partnerId = '9'.$now.$nomor;

        $mergeData = [
            'id' => Uuid::uuid4()->getHex(),
            'slug' => Str::slug($request['nama_perusahaan']),
            'mitra_id' => $partnerId,
            'tanggal_terdaftar' => Carbon::now()->format('Y-m-d'),
            'is_active' => 1,
        ];

        $request['nama_perusahaan'] = Str::title($request['nama_perusahaan']);
        $request['penanggung_jawab'] = Str::title($request['penanggung_jawab']);

        $colReq = collect($request);
        $data = $colReq->merge($mergeData);

        $this->partnerInterface->store($data->all());

        // dd($data);

    }

    public function update($request, $id)
    {

    }
}

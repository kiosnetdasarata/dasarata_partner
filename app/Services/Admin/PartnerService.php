<?php

namespace App\Services\Admin;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
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

        DB::transaction(function () use ($request) {
            $now = Carbon::now()->format('Y');
            $countPartner = $this->partnerInterface->count()+1;
            $nomor = str_pad($countPartner, 3, '0', STR_PAD_LEFT);
            $partnerId = '8'.$now.$nomor;

            $mergeData = [
                'id' => Uuid::uuid4()->getHex(),
                'partner_id' => $partnerId,
                'tanggal_terdaftar' => Carbon::now()->format('Y-m-d'),
                'is_active' => 1,
            ];

            $request['nama_perusahaan'] = Str::title($request['nama_perusahaan']);
            $request['penanggung_jawab'] = Str::title($request['penanggung_jawab']);

            $colReq = collect($request);
            $data = $colReq->merge($mergeData);

            $partner = $this->partnerInterface->store($data->all());

            $user = [
                'id' => Uuid::uuid4()->getHex(),
                'partner_id' => $partner->partner_id,
                'username' => $partner->partner_id,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'is_active' => 1,
                'role' => 'mitra'
            ];

            $this->partnerInterface->storeUser($user);
        });
    }

    public function update($request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $colData = collect($request);
            $filtered = $colData->except('_token', '_method', 'password', 'confirm_password');
            if(!isset($request['password'])){

                return $this->partnerInterface->update($filtered->all(), $id);
            }

            if($request['password'] === $request['confirm_password']){
                $pass = [
                    'password' => $request['password'],
                ];

                $this->partnerInterface->update($filtered->all(), $id);
                return $this->partnerInterface->updateUser($pass, $id);
            }
            return throw new \Exception('The password not same!');

        });

    }
}

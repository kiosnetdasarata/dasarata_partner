<?php

namespace App\Services\Admin;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Helpers\UploadImageHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Admin\PartnerInterface;

Class PartnerService
{
    protected static ?string $password;

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
            $partnerId = '9'.$now.$nomor;

            if (substr($request['nomor_telpn'], 0, 2) === '08') {
                // Jika iya, ubah menjadi '628'
                $phoneNumber = '62' . substr($request['nomor_telpn'], 1);
            }else{
                $phoneNumber = $request['nomor_telpn'];
            }

            $request['nomor_telpn'] = $phoneNumber;
            $request['nama_perusahaan'] = Str::title($request['nama_perusahaan']);
            $request['penanggung_jawab'] = Str::title($request['penanggung_jawab']);

            $bucketName = config('app.bucket');
            $slug = Str::slug($request['nama_perusahaan'], '_');

            $filenametostore = uniqid().'_'.$slug.'.'.$request['logo_partner']->getClientOriginalExtension();
            $googleCloudStoragePath = 'logo-mitra/' . $filenametostore;

            $photoPath = UploadImageHelper::uploadPhoto($request['logo_partner'], $googleCloudStoragePath);

            if ($photoPath === 404){
                return throw new \Exception('Google Bucket Error');
            }elseif($photoPath === 401){
                return throw new \Exception('Access Danied');
            }

            $colReq = collect($request)->except('logo_partner');
            $mergeData = [
                'id' => Uuid::uuid4()->getHex(),
                'partner_id' => $partnerId,
                'logo_partner' => 'https://storage.googleapis.com/'.$bucketName.'/'.'logo-mitra/'.$filenametostore,
                'tanggal_terdaftar' => Carbon::now()->format('Y-m-d'),
                'is_active' => 1,
            ];
            $data = $colReq->merge($mergeData);

            $partner = $this->partnerInterface->store($data->all());

            $user = [
                'id' => Uuid::uuid4()->getHex(),
                'partner_id' => $partner->partner_id,
                'username' => $partner->partner_id,
                'password' => static::$password ??= Hash::make('password'),
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
                    'password' => static::$password ??= Hash::make($request['password']),
                ];

                $this->partnerInterface->update($filtered->all(), $id);
                return $this->partnerInterface->updateUser($pass, $id);
            }
            return throw new \Exception('The password not same!');

        });

    }
}

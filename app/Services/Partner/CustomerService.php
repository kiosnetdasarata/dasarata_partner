<?php

namespace App\Services\Partner;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Partners\CustomerInterface;

Class CustomerService
{
    public function __construct(protected CustomerInterface $customerInterface)
    {

    }

    public function getUnpaid()
    {
        return $this->customerInterface->getUnpaid();
    }

    public function getCustomers()
    {
        return $this->customerInterface->getActive();
    }

    public function find($id)
    {
        return $this->customerInterface->find($id);
    }

    public function create($request)
    {;

        DB::transaction(function () use ($request) {
            $countPartner = $this->customerInterface->countAllCustomers()+1;
            $nomor = str_pad($countPartner, 9, '0', STR_PAD_LEFT);
            $virtualAccount = '9'.$nomor;

            $countCusPartner = $this->customerInterface->countAllCustomers()+1;
            $nomor = str_pad($countCusPartner, 5, '0', STR_PAD_LEFT);
            $cusId = '9'.$nomor;

            if (substr($request['nomor_telpn'], 0, 2) === '08') {
                // Jika iya, ubah menjadi '628'
                $phoneNumber = '62' . substr($request['nomor_telpn'], 1);
            }else{
                $phoneNumber = $request['nomor_telpn'];
            }

            $colData = collect($request)->except('nomor_telpn');
            $filtered = $colData->except(['nama_paket', 'amount']);
            $dataMerge = [
                'id' => Uuid::uuid4()->getHex(),
                'partner_id' => auth()->user()->partner_id,
                'nomor_telpn' => $phoneNumber,
                'partner_customer_id' => $cusId,
                'tanggal_daftar' => Carbon::now()->format('Y-m-d'),
            ];

            $data = $filtered->merge($dataMerge );
            $customerId = $this->customerInterface->store($data->all());

            $addBill = collect([
                'id' => Uuid::uuid4()->getHex(),
                'virtual_account' => $virtualAccount,
                'customer_id' => $customerId->partner_customer_id,
                'nama_paket' => $request['nama_paket'],
                'amount' => $request['amount'],
            ]);

            $va = [
                'va' => $virtualAccount,
                'customer_personal_id' => $customerId->partner_customer_id,
                'aplikasi' => 2
            ];

            $this->customerInterface->virtualAccount($va);
            $this->customerInterface->storeBill($addBill->all());
        });

    }

    public function update($request, $id)
    {
        $colData = collect($request);
        $filtered = $colData->except(['_token', '_method', 'nama_paket', 'amount']);

        $bill = [
            'nama_paket' => $request['nama_paket'],
            'amount' => $request['amount'],
        ];

        $this->customerInterface->update($filtered->all(), $id);
        $this->customerInterface->updateBill($bill, $id);
    }

    public function findCustomerById($id)
    {
        return $this->customerInterface->find($id);
    }

    public function regis($request, $id)
    {

        $checkId = collect($this->customerInterface->checkId($request['customer_id']))->isEmpty();

        if($checkId == true ){

            $data['customer_id'] = $request['customer_id'];

            $this->customerInterface->update($data, $id);

        }

        return throw new \Exception('Customer ID Sudah Ada');

    }

    public function isolir($request, $id)
    {

        $data = collect([
            'date_isolir' => Carbon::now()->format('Y-m-d'),
        ]);

        if($request['status'] == 'isolir'){
            $data->put('status_customer', 'isolir');
            return $this->customerInterface->update($data->all(), $id);
        }else{
            $data->put('status_customer', 'aktif');
            return $this->customerInterface->update($data->all(), $id);
        }

        return throw new \Exception('Error updating');

    }

    //dashboard
    public function countUnpaid()
    {
        return $this->customerInterface->countUnpaid();
    }
    public function countPaidToday()
    {
        return $this->customerInterface->countPaidToday();
    }
    public function countCustomerActive()
    {
        return $this->customerInterface->countCustomerActive();
    }
    public function countCustomerIsolir()
    {
        return $this->customerInterface->countCustomerIsolir();
    }
    public function chart()
    {
        return $this->customerInterface->chart();
    }
}

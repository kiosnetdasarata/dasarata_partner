<?php

namespace App\Services\Partners;

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

    public function getCustomer()
    {
        return $this->customerInterface->getAll();
    }
    public function create($request)
    {

        DB::transaction(function () use ($request) {

            $colData = collect($request);
            $filtered = $colData->except(['nama_paket', 'amount']);
            $dataMerge = [
                'id' => Uuid::uuid4()->getHex(),
                'slug' => Str::slug($request['nama']),
                'partner_id' => 1,
                'tanggal_daftar' => Carbon::now()->format('Y-m-d'),
            ];

            $data = $filtered->merge($dataMerge );
            $customerId = $this->customerInterface->store($data->all());

            $addBill = collect([
                'id' => Uuid::uuid4()->getHex(),
                'virtual_account' => 12345678,
                'customer_id' => $customerId->id,
                'nama_paket' => $request['nama_paket'],
                'amount' => $request['amount'],
            ]);

            $this->customerInterface->storeBill($addBill->all());
        });

    }

    public function findCustomerById($id)
    {
        return $this->customerInterface->find($id);
    }
}

<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\VaCustomer;
use App\Models\PaymentBill;
use Illuminate\Support\Str;
use App\Models\PartnerCustomer;
use Ramsey\Uuid\Nonstandard\Uuid;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerPartnerImportExcel implements WithHeadingRow, ToCollection
{
    public function collection(Collection $rows)
    {

        DB::transaction(function () use ($rows) {
            foreach ($rows as $row) {
                $countPartner = PartnerCustomer::count() + 1;
                $nomor = str_pad($countPartner, 9, '0', STR_PAD_LEFT);
                $virtualAccount = '9' . $nomor;

                $countCusPartner = PartnerCustomer::count() + 1;
                $nomor = str_pad($countCusPartner, 5, '0', STR_PAD_LEFT);
                $cusId = '9' . $nomor;

                if (substr($row['nomor_telpn'], 0, 2) === '08') {
                    // Jika iya, ubah menjadi '628'
                    $phoneNumber = '62' . substr($row['nomor_telpn'], 1);
                } else {
                    $phoneNumber = $row['nomor_telpn'];
                }

                $colData = collect($row)->except('nomor_telpn');
                $filtered = $colData->except(['nama_paket', 'amount']);
                $dataMerge = [
                    'id' => Uuid::uuid4()->getHex(),
                    'partner_id' => auth()->user()->partner_id,
                    'nomor_telpn' => $phoneNumber,
                    'partner_customer_id' => $cusId,
                    'tanggal_daftar' => Carbon::now()->format('Y-m-d'),
                ];

                $data = $filtered->merge($dataMerge);
                $customerId = PartnerCustomer::create($data->all());
                $addBill = collect([
                    'id' => Uuid::uuid4()->getHex(),
                    'virtual_account' => $virtualAccount,
                    'customer_id' => $customerId->partner_customer_id,
                    'nama_paket' => $row['nama_paket'],
                    'amount' => $row['amount'],
                ]);

                $va = [
                    'va' => $virtualAccount,
                    'customer_personal_id' => $customerId->partner_customer_id,
                    'aplikasi' => 2
                ];

                PaymentBill::create($addBill->all());
            }
        });
    }


    public function headingRow(): int
    {
        return 1;
    }
}

<?php

namespace App\Services\Partner;

use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PartnerCustomerExportExcel;
use App\Interfaces\Partners\PaymentInterface;

Class PaymentService
{
    public function __construct(protected PaymentInterface $paymentInterface)
    {}

    public function getToday()
    {
        return $this->paymentInterface->getToday();
    }

    public function getHistories()
    {
        return $this->paymentInterface->getHistories();
    }

    public function createInvoices()
    {
        $now = Carbon::now()->format('d/m/y');
        $countHistory = $this->paymentInterface->countHistories();
        $nomor = str_pad($countHistory, 4, '0', STR_PAD_LEFT);

        $noInvoice = 'GLC/INV-'.$nomor.'-'.$now;

        return $noInvoice;
    }

    public function find($id)
    {
        return $this->paymentInterface->find($id);
    }

    public function historyPaidCustomer($va)
    {
        return $this->paymentInterface->getHistoryCustomer($va);
    }

    public function getThisMonth()
    {
       return $this->paymentInterface->getThisMonth();
    }

    public function exportPaidThisMonth()
    {
        $data = $this->paymentInterface->getThisMonth();
        $date =  $now = Carbon::now()->format('F-Y');

        return Excel::download(new PartnerCustomerExportExcel($data), 'payment-'.$date.'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function exportHistoryPaid($request)
    {
        $startDate = $request['start_date'];
        $endDate = $request['end_date'];
        $data = $this->paymentInterface->getPaidRangeDate($startDate, $endDate);

        return Excel::download(new PartnerCustomerExportExcel($data), 'payment-'.$startDate.'-'.$endDate.'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}

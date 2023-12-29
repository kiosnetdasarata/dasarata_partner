<?php

namespace App\Services\Partner;

use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PartnerCustomerExportExcel;
use App\Interfaces\Admin\PartnerInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Interfaces\Partners\PaymentInterface;

class PaymentService
{
    public function __construct(protected PaymentInterface $paymentInterface, protected PartnerInterface $partnerInterface)
    {
    }

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

        $noInvoice = 'GLC/INV-' . $nomor . '-' . $now;

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

    public function printInvoice($id)
    {
        $partner = $this->partnerInterface->findByPartnerId(auth()->user()->partner_id);
        $now = Carbon::now()->locale('id_ID')->isoFormat('LL');
        $payment = $this->paymentInterface->find($id);

        $pdf = Pdf::loadView('partners.paid-histories.invoice', [
            'payment' => $payment,
            'date' => $now,
            'partner' => $partner,
        ])->setPaper([0, 0, 419.528, 595.276]);
        return $pdf->stream();
    }

    public function exportPaidThisMonth()
    {
        $data = $this->paymentInterface->getThisMonth();
        $date =  Carbon::now()->format('F-Y');

        return Excel::download(new PartnerCustomerExportExcel($data), 'payment-' . $date . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function exportHistoryPaid($request)
    {
        $startDate = $request['start_date'];
        $endDate = $request['end_date'];
        $data = $this->paymentInterface->getPaidRangeDate($startDate, $endDate);

        return Excel::download(new PartnerCustomerExportExcel($data), 'payment-' . $startDate . '-' . $endDate . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}

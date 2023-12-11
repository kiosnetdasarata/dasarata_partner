<?php

namespace App\Services\Partner;

use App\Interfaces\Partners\PaymentInterface;
use Carbon\Carbon;

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
}

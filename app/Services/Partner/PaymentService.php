<?php

namespace App\Services\Partner;

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
}

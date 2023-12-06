<?php

namespace App\Services\Partners;

use App\Interfaces\Partners\PaymentInterface;

Class PaymentService
{
    public function __construct(protected PaymentInterface $paymentInterface)
    {}

    public function getToday()
    {
        return $this->paymentInterface->getToday();
    }
}

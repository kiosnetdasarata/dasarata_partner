<?php

namespace App\Repositories\Partners;

use App\Interfaces\Partners\CustomerInterface;
use App\Models\PartnerCustomer;
use App\Models\PaymentBill;

Class CustomerRepository implements CustomerInterface
{

    function __construct(private PartnerCustomer $partnerCustomer,
                        private PaymentBill $paymentBill)
    {

    }

    function getAll()
    {
        return $this->partnerCustomer->get();
    }

    function store($request)
    {
        return $this->partnerCustomer->create($request);
    }

    function storeBill($request)
    {
        return $this->paymentBill->create($request);
    }

    function find($id)
    {
        return $this->partnerCustomer->with('paymentBill')->find($id);
    }
}

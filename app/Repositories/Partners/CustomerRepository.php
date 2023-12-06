<?php

namespace App\Repositories\Partners;

use App\Interfaces\Partners\CustomerInterface;
use App\Models\PartnerCustomer;
use App\Models\PaymentBill;

Class CustomerRepository implements CustomerInterface
{

    function __construct(protected PartnerCustomer $partnerCustomer,
                        protected PaymentBill $paymentBill)
    {

    }

    function getUnpaid()
    {
        return $this->partnerCustomer->where('status_customer', '=', 'unpaid')->orWhere('customer_id', '=', null)->get();
    }

    function getActive()
    {
        return $this->partnerCustomer->where('status_customer', '!=', 'unpaid')->get();
    }

    function store($request)
    {
        return $this->partnerCustomer->create($request);
    }

    function update($request, $id)
    {
        return $this->partnerCustomer->where('id', $id)->update($request);
    }

    function storeBill($request)
    {
        return $this->paymentBill->create($request);
    }

    function find($id)
    {
        return $this->partnerCustomer->with('paymentBill')->find($id);
    }

    function checkId($id)
    {
        //nanti tambah mitra id
        return $this->partnerCustomer->where('customer_id', $id)->first();
    }
}

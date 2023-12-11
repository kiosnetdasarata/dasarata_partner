<?php

namespace App\Repositories\Partners;

use App\Interfaces\Partners\PaymentInterface;
use App\Models\HistoryPathnerPaid;
use Carbon\Carbon;

Class PaymentRepository implements PaymentInterface
{

    function __construct(protected HistoryPathnerPaid $historyPathnerPaid)
    {
    }

    function getToday()
    {
        $now = Carbon::now();
        return $this->historyPathnerPaid->where('partner_id', auth()->user()->partner_id)->whereDate('payment_date', '=', $now)->filter(request(['search']))->paginate(10);
    }

    function getHistories()
    {
        return $this->historyPathnerPaid->where('partner_id', auth()->user()->partner_id)->latest()->filter(request(['search']))->paginate(10);
    }

    function countHistories()
    {
        return $this->historyPathnerPaid->where('partner_id', auth()->user()->partner_id)->count();
    }

    function find($id)
    {
        return $this->historyPathnerPaid->find($id);
    }

    function getHistoryCustomer($va)
    {
        return $this->historyPathnerPaid->where('va', $va)->latest()->paginate(20);
    }

}

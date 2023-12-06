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
        return $this->historyPathnerPaid->whereDate('payment_date', '=', $now)->filter(request(['search']))->paginate(10);
    }

    function getHistories()
    {
        return $this->historyPathnerPaid->latest()->filter(request(['search']))->paginate(10);
    }

}

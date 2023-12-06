<?php

namespace App\Http\Controllers\partners;

use App\Http\Controllers\Controller;
use App\Services\Partners\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct(private PaymentService $paymentService)
    {

    }

    public function index()
    {

        $todays = $this->paymentService->getToday();

        return view('partners.paid-histories.index', compact('todays'));
    }

    public function historyPaid()
    {
        return view('partners.paid-histories.histories-paid');
    }

    public function show($id)
    {

    }
}

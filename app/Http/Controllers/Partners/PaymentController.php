<?php

namespace App\Http\Controllers\partners;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Services\Partner\PaymentService;

class PaymentController extends Controller
{

    public function __construct(protected PaymentService $paymentService)
    {
    }

    public function index()
    {

        // $pdf = Pdf::loadView('partners.paid-histories.invoice');
        // return $pdf->stream();
        // return view('partners.paid-histories.invoice');
        // return $pdf->download();

        $todays = $this->paymentService->getToday();

        return view('partners.paid-histories.index', compact('todays'));
    }

    public function historyPaid()
    {

        $histories = $this->paymentService->getHistories();

        return view('partners.paid-histories.histories-paid', compact('histories'));
    }

    public function show($id)
    {

    }
}

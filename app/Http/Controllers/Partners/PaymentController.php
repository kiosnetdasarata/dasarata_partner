<?php

namespace App\Http\Controllers\partners;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Services\Partner\PaymentService;
use App\Services\Partner\CustomerService;

class PaymentController extends Controller
{

    public function __construct(protected PaymentService $paymentService,
                                protected CustomerService $customerService)
    {
    }

    public function index()
    {

        $todays = $this->paymentService->getToday();

        return view('partners.paid-histories.index', compact('todays'));
    }

    public function paidThisMonth()
    {

        $histories = $this->paymentService->getThisMonth();

        return view('partners.paid-histories.paid-this-month', compact('histories'));
    }

    public function exportPaidThisMonth()
    {
        return $this->paymentService->exportPaidThisMonth();
    }

    public function historyPaid()
    {

        $histories = $this->paymentService->getHistories();

        return view('partners.paid-histories.histories-paid', compact('histories'));
    }

    public function exportHistoryPaid(Request $request)
    {
        return $this->paymentService->exportHistoryPaid($request);
    }

    public function show($id)
    {

    }

    function printInvoice($id)
    {

        $now = Carbon::now()->locale('id_ID')->isoFormat('LL');
        $payment = $this->paymentService->find($id);

        $pdf = Pdf::loadView('partners.paid-histories.invoice', [
            'payment' => $payment,
            'date' => $now,
        ])->setPaper([0, 0, 419.528, 595.276]);
        return $pdf->stream();
    }
}

<?php

namespace App\Http\Controllers\partners;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
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

    public function historyPaid()
    {

        $histories = $this->paymentService->getHistories();

        return view('partners.paid-histories.histories-paid', compact('histories'));
    }

    public function show($id)
    {

    }

    function printInvoice($id)
    {

        // $customer = $this->customerService->findCustomerById($id);
        // $nomor = $this->paymentService->createInvoices();
        $now = Carbon::now()->locale('id_ID')->isoFormat('LL');
        $payment = $this->paymentService->find($id);

        $pdf = Pdf::loadView('partners.paid-histories.invoice', [
            // 'customer' => $customer,
            'payment' => $payment,
            'date' => $now,
            // 'nomor' => $nomor
        ]);
        return $pdf->stream();
        // return view('partners.paid-histories.invoice');
        // return $pdf->download();
    }
}

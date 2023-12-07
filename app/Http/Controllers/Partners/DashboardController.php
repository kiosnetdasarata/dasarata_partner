<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use App\Services\Partner\CustomerService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(protected CustomerService $customerService)
    {}

    public function index()
    {
        $unpaid = $this->customerService->countUnpaid();
        $paidToday = $this->customerService->countPaidToday();
        $active = $this->customerService->countCustomerActive();
        $isolir = $this->customerService->countCustomerIsolir();
        $chart = $this->customerService->chart();

        return view('partners.index', [
            'unpaid' => $unpaid,
            'paidToday' => $paidToday,
            'active' => $active,
            'isolir' => $isolir,
            'chart' => $chart
        ]);
    }
}

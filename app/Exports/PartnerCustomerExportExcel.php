<?php

namespace App\Exports;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PartnerCustomerExportExcel extends Controller implements FromView
{
    public function __construct(private $data)
    {
        
    }
    public function view(): View
    {
        $data = $this->data;
        return view('partners.paid-histories.export-excel', compact('data'));
    }

}

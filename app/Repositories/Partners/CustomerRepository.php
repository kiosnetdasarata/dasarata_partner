<?php

namespace App\Repositories\Partners;

use Carbon\Carbon;
use App\Models\PaymentBill;
use App\Models\PartnerCustomer;
use App\Models\HistoryPathnerPaid;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Partners\CustomerInterface;
use App\Models\VaCustomer;

Class CustomerRepository implements CustomerInterface
{

    function __construct(protected PartnerCustomer $partnerCustomer,
                        protected PaymentBill $paymentBill,
                        protected HistoryPathnerPaid $historyPathnerPaid,
                        protected VaCustomer $vaCustomer)
    {

    }

    function getUnpaid()
    {
        return $this->partnerCustomer->where([['status_customer', '=', 'unpaid'], ['partner_id', auth()->user()->partner_id]])->filter(request(['search']))->paginate(20);
    }

    function getActive()
    {
        return $this->partnerCustomer->where([['status_customer', '!=', 'unpaid'], ['partner_id', auth()->user()->partner_id]])->filter(request(['search']))->paginate(20);
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

    function updateBill($request, $id)
    {
        return $this->paymentBill->where('customer_id', $id)->update($request);
    }

    function find($id)
    {
        return $this->partnerCustomer->with('paymentBill')->find($id);
    }

    function findCustomer($id)
    {
        return $this->partnerCustomer->find($id);
    }

    function checkId($id)
    {
        //nanti tambah mitra id
        return $this->partnerCustomer->where([['customer_id', $id], ['partner_id', auth()->user()->partner_id]])->first();
    }

    function virtualAccount($request)
    {
        return $this->vaCustomer->create($request);
    }

    function countAllCustomers()
    {
        return $this->partnerCustomer->count();
    }
    
    function getUnpaidForPrint()
    {
        return $this->partnerCustomer->where([['status_customer', '=', 'unpaid'], ['partner_id', auth()->user()->partner_id]])->orderBy('tanggal_daftar')->get();   
    }

    //dashboard
    function countUnpaid()
    {
        return $this->partnerCustomer->where([['status_customer', '=', 'unpaid'], ['partner_id', auth()->user()->partner_id]])->count();
    }

    function countPaidToday()
    {
        $now = Carbon::now();
        return $this->historyPathnerPaid->where('partner_id', auth()->user()->partner_id)->whereDate('payment_date', '=', $now)->count();
    }

    function countCustomerActive()
    {
        return $this->partnerCustomer->where([['status_customer', '=', 'aktif'], ['partner_id', auth()->user()->partner_id]])->count();
    }

    function countCustomerIsolir()
    {
        return $this->partnerCustomer->where([['status_customer', '=', 'isolir'], ['partner_id', auth()->user()->partner_id]])->count();
    }

    function chart()
    {
        return $this->partnerCustomer->select(
            DB::raw('DATE_FORMAT(tanggal_daftar, "%M %Y") as bulan'),
                    DB::raw('SUM(CASE WHEN status_customer = "aktif berlangganan" THEN 1 ELSE 0 END) as aktif_count'),
                    // DB::raw('SUM(CASE WHEN subscribe_status = "isolir" THEN 1 ELSE 0 END) as isolir_count')
                )
                ->where('partner_id', auth()->user()->partner_id)
                ->groupBy(DB::raw('DATE_FORMAT(tanggal_daftar, "%M %Y")'))
                ->get();
    }

}

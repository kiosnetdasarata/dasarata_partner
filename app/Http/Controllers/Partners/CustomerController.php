<?php

namespace App\Http\Controllers\Partners;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PartnerCustomer;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\ImportCsvRequest;
use App\Services\Partner\CustomerService;
use App\Services\Partner\PaymentService;

class CustomerController extends Controller
{

    public function __construct(protected CustomerService $customerService,
                                protected PaymentService $paymentService)
    {}

    //unpaid
    public function index()
    {

        $customers = $this->customerService->getUnpaid();
        // $this->authorize('viewAny', $customers);

        return view('partners.customers.index', compact('customers'));
    }
    
    public function invoiceBatch(Request $request)
    {
        return $this->customerService->invoiceBatch($request);
    }
    //aktif
    public function dataCustomers()
    {
        $customers = $this->customerService->getCustomers();

        return view('partners.customers.data-customers', compact('customers'));
    }

    public function store(CustomerRequest $request): RedirectResponse
    {

        try{

            $this->customerService->create($request->validated());

            return redirect()->back()->with('success', 'Customer created successfully');

        }catch(\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);

        }
    }

    public function update(Request $request, $id) : RedirectResponse
    {

        $customer = $this->customerService->findCustomerById($id);

        $this->authorize('update', $customer);

        try{

            $this->customerService->update($request->all(), $id);

            // return redirect('/partners/customers')->with('success', 'Customer successfully updated.');
            return redirect()->back()->with('success', 'Customer successfully updated.');

        }catch(\Exception $e){

            return redirect()->back()->with('error', 'Customer failed to update.');
            // return redirect('/partners/customers')->withErrors(['error', $e->getMessage()]);

        }
    }

    public function regisCustomer(Request $request, $id)
    {
        try{

            $this->customerService->regis($request->all(), $id);

            return redirect('/partners/customers')->with('success', 'Customer successfully registered.');

        }catch(\Exception $e){

            return redirect('/partners/customers')->with('success', 'Customer has not been registered.');

        }
    }

    public function isolir(Request $request, $id)
    {
        try{

            $this->customerService->isolir($request->all(), $id);

            return redirect()->back()->with('success', 'Customer has been updated.');

        }catch(\Exception $e){

            return redirect()->back()->with(['error', $e->getMessage()]);

        }
    }

    public function show($id)
    {
        $customer = $this->customerService->findCustomerById($id);

        $this->authorize('view', $customer);

        return view('partners.customers.show', compact('customer'));
    }

    public function historyPaid($va)
    {

        $histories = $this->paymentService->historyPaidCustomer($va);

        return view('partners.customers.history-paid', compact('histories'));
    }

    public function invoice(Request $request, $id)
    {
        // $invoice = Carbon::createFromFormat('Y-m-d', $request['tgl_pemasangan'])->locale('id_ID')->isoFormat('LL');
       return $this->customerService->invoice($request, $id);
    }

    public function importDataCustomers(ImportCsvRequest $request)
    {
        try {
            $this->customerService->importDataCustomers($request);

            return redirect()->route('partners.customers.dataCustomers')->with('success', 'Data import success!');
        } catch (\Throwable $e) {
            if ($e->getCode() == 'HY000') {
                // Handle the HY000 error condition here
                return redirect()->route('partners.customers.dataCustomers')->with('error', 'Mohon periksa lagi data yang akan dimasukkan !');
            }
            return redirect()->route('partners.customers.dataCustomers')->with('error', $e->getMessage());
        }
        
    }
}

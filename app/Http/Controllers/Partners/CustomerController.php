<?php

namespace App\Http\Controllers\Partners;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\PartnerCustomer;
use App\Services\Partner\CustomerService;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{

    public function __construct(protected CustomerService $customerService)
    {
        // $this->authorizeResource(PartnerCustomer::class, 'partnerCustomer');
    }

    //unpaid
    public function index()
    {

        $customers = $this->customerService->getUnpaid();
        // $this->authorize('viewAny', $customers);

        return view('partners.customers.index', compact('customers'));
    }

    //aktif
    public function dataCustomers()
    {
        $customers = $this->customerService->getCustomers();

        return view('partners.customers.data-customers', compact('customers'));
    }

    public function store(CustomerRequest $request): RedirectResponse
    {

        if ($request->user()->cannot('create', $this->customerService->create($request->validated()))) {
            abort(403);
        }

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

            return redirect('/partners/customers')->with('success', 'Customer successfully updated.');

        }catch(\Exception $e){

            return redirect('/partners/customers')->with('error', 'Customer failed to update.');
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
}

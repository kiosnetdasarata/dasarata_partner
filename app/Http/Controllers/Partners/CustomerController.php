<?php

namespace App\Http\Controllers\Partners;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Services\Partners\CustomerService;

class CustomerController extends Controller
{

    public function __construct(protected CustomerService $customerService)
    {

    }

    //unpaid
    public function index()
    {

        $customers = $this->customerService->getUnpaid();

        return view('partners.customers.index', compact('customers'));
    }

    //aktif
    public function dataCustomers()
    {
        $customers = $this->customerService->getCustomers();

        return view('partners.customers.data-customers', compact('customers'));
    }

    public function store(CustomerRequest $request)
    {
        try{

            $this->customerService->create($request->validated());

            return redirect()->back()->with('success', 'Customer created successfully');

        }catch(\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);

        }
    }

    public function update(Request $request, $id)
    {
        try{

            $this->customerService->update($request->all(), $id);

            return redirect('/partners/customers')->with('success', 'Customer successfully registered.');

        }catch(\Exception $e){

            return redirect('/partners/customers')->with('success', 'Customer has not been registered.');

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

        return view('partners.customers.show', compact('customer'));
    }
}

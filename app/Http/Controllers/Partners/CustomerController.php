<?php

namespace App\Http\Controllers\Partners;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Services\Partners\CustomerService;

class CustomerController extends Controller
{

    public function __construct(private CustomerService $customerService)
    {

    }

    public function index()
    {

        $customers = $this->customerService->getCustomer();

        return view('partners.customers.index', compact('customers'));
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

    public function edit($id)
    {
        $customer = $this->customerService->findCustomerById($id);
    }

    public function update()
    {

    }

    public function show($id)
    {
        $customer = $this->customerService->findCustomerById($id);

        return view('partners.customers.show', compact('customer'));
    }
}

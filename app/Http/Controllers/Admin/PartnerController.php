<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Services\Admins\PartnerService;

class PartnerController extends Controller
{

    public function __construct(private PartnerService $partnerService)
    {

    }

    public function index()
    {

        $partners = $this->partnerService->getAll();

        return view('admin.partners.index', compact('partners'));
    }

    public function store(PartnerRequest $request)
    {
        try{

            $this->partnerService->store($request);

            return redirect()->back()->with('success', 'Partner has been successfully');

        }catch(\Exception $e){

            // return redirect()->back()->with('error', 'Partner has not been successfully');
            return redirect()->back()->with(['error' => $e->getMessage()] );

        }
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function show($id)
    {
        $partner = $this->partnerService->find($id);

        return view('admin.partners.show', compact('partner'));
    }


}

<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use App\Services\Admin\PartnerService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct(protected PartnerService $partnerService)
    {

    }

    public function index()
    {
        return view('partners.profile.index');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        try{

            $this->partnerService->update($request->all(), $id);

            return redirect()->back()->with('success', 'Profile updated successfully');

        }catch(\Exception $e){

            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}

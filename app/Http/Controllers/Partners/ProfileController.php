<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('partners.profile.index');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }
}

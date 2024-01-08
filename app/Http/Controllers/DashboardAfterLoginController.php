<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAfterLoginController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard.index');
        } elseif (auth()->check() && auth()->user()->role === 'mitra' && auth()->user()->is_active === 1) {
            return redirect()->route('partners.dashboard.index');
        }
    
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     public function index(){
        $checkouts = Checkout::with('Camp')->orderBy('id', 'DESC')->get();
        // dd($checkouts);
        // exit();
        return view('admin.dashboard', compact('checkouts'));
    }
}

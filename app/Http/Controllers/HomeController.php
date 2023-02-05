<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard(){
        $checkouts = Checkout::with('Camp')->whereUserId(Auth::id())->orderBy('id', 'DESC')->get();
        // dd($checkouts);
        // exit();
        return view('users.dashboard', compact('checkouts'));
    }
}
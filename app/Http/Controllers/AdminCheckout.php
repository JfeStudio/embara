<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheckout extends Controller
{
    public function update(Request $request, Checkout $checkout){
        // dd($checkout);
        $checkout->is_paid = true;
        $checkout->save();
        return back()->with('success', "Oke Title Camp Dengan ID {$checkout->id} update has been successfully!");
    }
}

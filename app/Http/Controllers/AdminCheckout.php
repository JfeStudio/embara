<?php

namespace App\Http\Controllers;

use App\Mail\Checkout\Paid;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminCheckout extends Controller
{
    public function update(Request $request, Checkout $checkout){
        // dd($checkout);
        $checkout->is_paid = true;
        $checkout->save();

        // send email ro user
        Mail::to($checkout->User->email)->send(new Paid($checkout));
        return back()->with('success', "Oke Title Camp Dengan ID {$checkout->id} update has been successfully!");
    }
}

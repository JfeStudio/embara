<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard(){
        switch (Auth::user()->is_admin) {
            case true:
                return to_route('admin.dashboard');
                break;
                default:
                return to_route('users.dashboard');
                break;
        }
    }
}

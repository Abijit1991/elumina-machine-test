<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        return view('customer.home', compact('customer'));
    }
}

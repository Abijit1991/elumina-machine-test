<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $customersCount = Customer::get(['status_id']);
        $customersReviewCount = $customersCount->where('status_id', 1)->count();
        $customersCount = $customersCount->count();


        return view('admin.home', compact('customersCount', 'customersReviewCount'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function reviewCustomerProfiles()
    {
        $customers = Customer::where('status_id', 1)->get();

        return view('admin.review_customer_profiles', compact('customers'));
    }

    public function updateCustomerProfileStatus($custId, $statusId)
    {
        $customer = Customer::find($custId);

        if ($customer) {
            $allowedStatusId = [2, 4];

            if (in_array($statusId, $allowedStatusId)) {
                $customer->update([
                    'status_id' => $statusId
                ]);

                if ($statusId = 2)
                    $customer->user->update(['userrole_id' => 2]);
                else
                    $customer->user->update(['userrole_id' => 3]);
            }
        }

        return redirect()->route('admin.review.customer.profile');
    }

    public function customerProfiles()
    {
        $customers = Customer::get();

        return view('admin.customer_profiles', compact('customers'));
    }
}

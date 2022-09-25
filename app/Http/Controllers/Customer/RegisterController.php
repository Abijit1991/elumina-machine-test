<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRegistrationFormRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function registrationForm()
    {
        return view('customer.registration_form');
    }

    public function createCustomer(CustomerRegistrationFormRequest $request)
    {
        $request->validated();

        $user = User::firstOrCreate([
            'userrole_id' => 3,
            'email' => $request->email_address,
            'name' => $request->first_name . $request->last_name,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            $customer = Customer::firstOrCreate([
                'user_id' => $user->id,
                'first_name' => strtoupper($request->first_name),
                'last_name' => strtoupper($request->last_name),
                'email_address' => $request->email_address,
                'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
                'password' => $request->password
            ]);

            if ($customer) {
                return redirect()->route('customer.display.message', ['custId' => $customer->id]);
            }
        }

        return redirect()->route('customer.registration.form');
    }

    public function displayMessage($custId)
    {
        $customer = Customer::find($custId);

        if ($customer) {
            return view('/customer.display_message', compact('customer'));
        }

        return redirect()->route('customer.registration.form');
    }
}

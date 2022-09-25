<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Customer;

class CustomerRegistrationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'bail | alpha',
            'last_name' => 'alpha',
            'email_address' => ['email', function ($attribute, $value, $fail) {
                if (Customer::where('email_address', $value)->count() != 0) {
                    $fail('The entered E-Mail Address is already exists');
                }
            }],
            'password' => 'confirmed | min:8'
        ];
    }
}

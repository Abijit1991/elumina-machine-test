<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginFormRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function authenticateUserLogin(UserLoginFormRequest $request)
    {
        $request->validated();
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NonUserController extends Controller
{


    public function login(Request $request)
    {
        $redirect = $request->input('redirect');
        return view('user.non-user.login',['redirect'=>$redirect]);
    }

}

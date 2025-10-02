<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NonUserController extends Controller
{


    public function login(Request $request)
    {
        $redirect = $request->input('redirect');
        return view('user.non-user.login',['redirect'=>$redirect]);
    }

    public function checkout()
    {

        $cart = session()->get('cart', []);
        $userShipping = DB::table('shipping_charges')->where('roles', 'users')->where('places', 'Dhaka')->first();
        $userShippingOutside = DB::table('shipping_charges')->where('roles', 'users')->where('places', 'Outside Dhaka')->first();
        return view('user.non-user.checkout',[
            'charge'=>$userShipping,
            'outside'=>$userShippingOutside,
            'cart'=>$cart]);
    }

}

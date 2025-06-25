<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer_Info;
use App\Models\DepoInfo;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepoController extends Controller
{
    public function login()
    {
        return view('user.depo.login');
    }

    public function upload_depo_data(Request $request)
    {
        $img = $request->file('profile_picture');
        if($img) {
            $originalname = $img->getClientOriginalName();
            $path = $img->storeAs('public/depo/user_pic', $originalname);
            $path = str_replace('public/', '', $path);
            $path2 = $img->storeAs('depo/user_pic', $originalname, 'shared');

            DepoInfo::where('id',$request->input('id'))->update([
                'pic' => $path
            ]);
        }

        DepoInfo::where('id',$request->input('id'))->update([
            'owner_name'=>$request->input('ownername'),
            'address'=>$request->input('address'),
            'city'=>$request->input('city'),
            'mobile'=>$request->input('phone')
        ]);


            User::where('id', $request->input('id'))->update([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);

        return redirect()->back();
    }

}

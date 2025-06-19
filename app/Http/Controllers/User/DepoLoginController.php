<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DepoInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNotification;

class DepoLoginController extends Controller
{
    public function regis(Request $request)
    {
        $check = User::where('email',$request->input('email'))->where('roles','depo')->first();
        if ($check) {

            return redirect()->back()->with('error', 'Email Already register');
        }
        else{
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'roles'=>'depo'
        ]);


        DepoInfo::create([
            'id'=> $user->id,
            'mobile'=>$request->input('mobile'),
            'action'=>'Inactive',
        ]);

        return redirect()->route('verify',['id'=>$user->id])->with('success','Registration Successful');
        }
    }

    public function loggin(Request $request)
    {
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)){
            $user = Auth::user();

            $depo = DepoInfo::where('id',$user->id)->first();

            if ($depo && $depo->action == 'Active') {
                return redirect()->route('home');
            }
            else{
                return redirect()->back()->with('error','Account is not activate.');
            }

        }
        else{
            return redirect()->back()->with('error','Invalid Credentials');
        }
    }

    public function verify()
    {
        $user = \request('id');
        return view('user.depo.step-verify',['id'=>$user]);
    }

    public function owner_info(Request $request)
    {

        $user = $request->input('id');
        $nidfront = $request->file('nidfront');
        $nidback = $request->file('nidback');



        if ($nidfront && $nidback) {
            // Save front NID image
            $originalname = time() . '_front.' . $nidfront->getClientOriginalExtension();
            $path = 'depo/nid/' . $originalname;
            $nidfront->move(public_path('depo/nid'), $originalname);

            // Save back NID image
            $originalname2 = time() . '_back.' . $nidback->getClientOriginalExtension();
            $path2 = 'depo/nid/' . $originalname2;
            $nidback->move(public_path('depo/nid'), $originalname2);

            // Update DB
            DepoInfo::where('id', $request->input('id'))->update([
                'owner_name' => $request->input('owner_name'),
                'trade_lic'  => $request->input('lic'),
                'address'    => $request->input('address'),
                'city'       => $request->input('city'),
                'nid_front'  => $path,
                'nid_back'   => $path2,
            ]);
        }


        $adminEmails = DB::table('admins')->pluck('email')->toArray();
        foreach ($adminEmails as $email) {
            Mail::to($email)->send(new AdminNotification($user));
        }
        Mail::to("rubayetislam16@gmail.com")->send(new AdminNotification($user));
        return redirect()->route('email-success');
    }
}

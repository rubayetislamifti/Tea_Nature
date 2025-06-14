<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function display_admin()
    {
        $user = \request('id');

//        dd($user);
        $admin = Admin::all();

        if ($user = "rubayetislam16@gmail.com"){
            return view('admin.Admins.admins',['id'=>$user,'admin'=>$admin]);
        }
        else
            $admins = Admin::where('id',$user)->first();

//        dd($admin);
        return view('admin.Admins.admins',['id'=>$user,'admin'=>$admin,'admins'=>$admins]);
    }

    public function create_admin(Request $request)
    {
        try {
            // Validate input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|string|min:6',
                'mobile' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $name = $request->input('name');
            $pic = $request->file('image');

            $imageName = $name . '_' . time() . '.' . $pic->getClientOriginalExtension();


            $pic->move(public_path('admins'), $imageName);


            Admin::create([
                'name' => $name,
                'email' => $request->input('email'),
                'password' => $request->input('password'), // Consider hashing with Hash::make()
                'image' => $imageName,
                'address' => $request->input('address'),
                'phone' => $request->input('mobile'),
            ]);

            return redirect()->back()->with('success', 'Admin created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function update_admin(Request $request)
    {
        $id = $request->input('prod_id');
        $image = Admin::findOrFail($id);
        $name = $request->input('name');


        if ($request->hasFile('image')) {
            if (file_exists(public_path('admins/' . $image->image))) {
                unlink(public_path('admins/' . $image->image));
            }

            $pic = $request->file('image');
            $imageName = $name . '_' . time() . '.' . $pic->getClientOriginalExtension();


            $pic->move(public_path('admins'), $imageName);

            Admin::where('id', $id)->update([
                'image' => $imageName,
            ]);

            return redirect()->back();
        }
        Admin::where('id', $id)->update([
            'name'=>$name,
            'email'=>$request->input('description'),
            'address'=>$request->input('address'),
            'phone'=>$request->input('price'),
            'password'=>$request->input('stock'),
        ]);
        return redirect()->back();
    }

    public function display_permission()
    {
        $user = \request('id');

        $ads = Admin::all();
        $admin = Admin::select('admins.*', 'permissions.permission_name','permissions.id as permission_id')
            ->leftJoin('permissions', 'admins.permission', '=', 'permissions.id')
            ->get();
        $admins = Admin::where('id',$user)->first();

        $permission = permission::all();

        return view('Admins.permissions',['id'=>$user,'admin'=>$admin,'permission'=>$permission,'ads'=>$ads,'admins'=>$admins]);
    }

    public function create_permission(Request $request)
    {
        permission::create([
            'permission_name' => $request->input('name'),
        ]);

        return redirect()->back();
    }

    public function assign_permission(Request $request)
    {
        Admin::where('id', $request->input('prod_id'))->update([
            'permission' => $request->input('per'),
        ]);

        return redirect()->back();
    }

    public function delete_permission(Request $request){

        permission::where('id', $request->input('per_id'))->delete();

        Admin::where('permission',$request->input('per_id'))->update([
            'permission' => null,
        ]);

        return redirect()->back();
    }

    public function remove_permission(Request $request)
    {
        Admin::where('id',$request->input('per_id'))->update([
            'permission' => null,
        ]);

        return redirect()->back();
    }

    public function update_permission_name(Request $request)
    {
        permission::where('id',$request->input('prod_id'))->update([
            'permission_name' => $request->input('name'),
        ]);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminProfile;
use App\Models\PostModel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $adminprofile = AdminProfile::where('admin_id',$user)->first();

        $postAll = PostModel::join('admins','admins.id','=','post_models.user_id')
            ->select('post_models.*','admins.*','post_models.id as posts')->inRandomOrder()->get();

        return view('general.profile',['id'=>$user,'admin'=>$admin,
            'adminprofile'=>$adminprofile,'postAll'=>$postAll]);
    }

    public function profile_control(Request $request)
    {
        $id = $request->input('id');
        $image = Admin::findOrFail($id);
        $name = $request->input('name');



        if ($request->hasFile('propic')) {
            $propic = $request->file('propic');
            $propicName = $image->name. time() . '.' . $propic->getClientOriginalExtension();

            $propic->move(public_path('admins'), $propicName);

            $image->update([
                'image' => $propicName,
            ]);
        }
        $check = AdminProfile::where('admin_id',$id)->first();

        if ($request->hasFile('cover')) {
            $folderPath = public_path('admins/' . $image->name);

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $cover = $request->file('cover');
            $coverName = $image->name . '_cover_' . time() . '.' . $cover->getClientOriginalExtension();

            $cover->move($folderPath, $coverName);
        }
            if ($check) {
                if ($request->hasFile('cover')) {
                    $check->update([
                        'cover_pic' => $coverName,
                        'about' => $request->input('about'),
                        'facebook' => $request->input('facebook'),
                        'twitter' => $request->input('twitter'),
                        'instagram' => $request->input('insta'),
                        'linkedin' => $request->input('link')
                    ]);
                }
                else{
                    $check->update([
                        'about' => $request->input('about'),
                        'facebook' => $request->input('facebook'),
                        'twitter' => $request->input('twitter'),
                        'instagram' => $request->input('insta'),
                        'linkedin' => $request->input('link')
                    ]);
                }

            } else {
                AdminProfile::create([
                    'admin_id' => $id,
                    'cover_pic' => $coverName,
                    'about' =>$request->input('about'),
                    'facebook' =>$request->input('facebook'),
                    'twitter' =>$request->input('twitter'),
                    'instagram' =>$request->input('insta'),
                    'linkedin' =>$request->input('link')
                ]);
            }

        return redirect()->back();
    }

    public function post_upload(Request $request)
    {
        $id = $request->input('admin');
        $admin = AdminProfile::find($id);
        if ($request->hasFile('pic')) {
            $adminfolderPath = public_path('admins/' . $admin->name);
            $folderPath = $adminfolderPath . '/post';

            if (!file_exists($adminfolderPath)) {
                mkdir($adminfolderPath, 0777, true);
            }
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $cover = $request->file('pic');
            $coverName = $admin->name . '_post_' . time() . '.' . $cover->getClientOriginalExtension();

            $cover->move($folderPath, $coverName);
        }

        PostModel::create([
            'user_id'=>$id,
            'description'=>$request->input('description'),
            'pictuers' => $coverName,
        ]);

        return redirect()->back();

    }

    public function likes(Request $request)
    {
        $id = $request->input('id');

       $like = PostModel::where('id',$id)->increment('likes');

        return redirect()->back();
    }
}

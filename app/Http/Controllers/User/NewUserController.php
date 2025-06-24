<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer_Info;
use App\Models\DepoInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewUserController extends Controller
{
    public function login(Request $request)
    {
        $redirect = $request->input('redirect');
        return view('user.non-user.login',['redirect'=>$redirect]);
    }

    public function index()
    {
        $category = DB::table('categories')->where('status','Active')->inRandomOrder()->take(3)->get();
        $product = DB::table('products')->inRandomOrder()->take(3)->get();
        $text = DB::table('marqueetexts')->first();
        $contact = DB::table('contacts')->first();
        $slider = DB::table('slider_imgs')->inRandomOrder()->take(3)->get();
        $producttext = DB::table('product_pages')->first();
        $storetext = DB::table('store_pages')->first();
        return view('user.non-user.welcome',[
            'category'=>$category,'product'=>$product,'text'=>$text,'contact'=>$contact,'slider'=>$slider,
            'prodText'=>$producttext,'stText'=>$storetext]);
    }

    public function product()
    {
        $category = DB::table('categories')->where('status','Active')->get();
        $text = DB::table('marqueetexts')->first();
        $contact = DB::table('contacts')->first();
        $producttext = DB::table('product_pages')->first();
        return view('user.non-user.product',['category'=>$category,'text'=>$text,'contact'=>$contact,'prodText'=>$producttext]);
    }

    public function store()
    {
        $product = DB::table('products')->get();
        $text = DB::table('marqueetexts')->first();
        $contact = DB::table('contacts')->first();
        $storetext = DB::table('store_pages')->first();
        return view('user.non-user.store',['product'=>$product,'text'=>$text,'contact'=>$contact,'stText'=>$storetext]);
    }

    public function contact()
    {
        $text = DB::table('marqueetexts')->first();
        $contact = DB::table('contacts')->first();
        return view('user.non-user.contact',['text'=>$text,'contact'=>$contact]);
    }

    public function testimonial()
    {
        $text = DB::table('marqueetexts')->first();
        $testimonials = DB::table('testimonials')->get();
        $contact = DB::table('contacts')->first();
        return view('user.non-user.testimonial',['text'=>$text,'testimonials'=>$testimonials,'contact'=>$contact]);
    }

    public function blog()
    {
        $id = \request('id');
        $blogs = DB::table('blogs')->where('id',$id)->first();
        $text = DB::table('marqueetexts')->first();
        $contact = DB::table('contacts')->first();
        return view('user.non-user.blog',['text'=>$text,'blogs'=>$blogs,'contact'=>$contact]);
    }

    public function blogList()
    {
        $text = DB::table('marqueetexts')->first();
        $blogs = DB::table('blogs')->get();
        $contact = DB::table('contacts')->first();
        return view('user.non-user.blog-list',['text'=>$text,'blogs'=>$blogs,'contact'=>$contact]);
    }

    public function about(){
        $text = DB::table('marqueetexts')->first();
        $about = DB::table('abouts')->first();
        $contact = DB::table('contacts')->first();
        return view('user.non-user.about',['text'=>$text,'about'=>$about,'contact'=>$contact]);
    }

    public function feature()
    {
        $text = DB::table('marqueetexts')->first();
        return view('user.non-user.feature',['text'=>$text]);
    }

    public function page()
    {
        return view('non-user.404');
    }

    public function single_product()
    {
        $text = DB::table('marqueetexts')->first();
        $prod = \request('id');
        $products = DB::table('products')->where('id',$prod)->first();
        $contact = DB::table('contacts')->first();
        return view('user.non-user.single-product',['products'=>$products,'text'=>$text,'contact'=>$contact]);
    }

    public function my_profile()
    {
        return view('user.user.my-profile');
    }

    public function account_settings()
    {
        return view('user.user.account-settings');
    }

    public function upload_user_data(Request $request)
    {
        if (Auth::user()->roles == 'users') {
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email',
                'phone' => 'sometimes|nullable|string|max:20',
                'address' => 'sometimes|nullable|string|max:255',
                'city' => 'sometimes|nullable|string|max:100',
                'profile_picture' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif',
            ]);


            $imageName = null;

            if ($request->hasFile('profile_picture')) {
                $img = $request->file('profile_picture');
                $imageName = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('user_pic'), $imageName);

                // Update image path in Customer_Info
                Customer_Info::where('id', Auth::user()->id)->update([
                    'image' => $imageName
                ]);
            }


            Customer_Info::where('id', Auth::user()->id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'distric' => $request->input('city'),
            ]);

            User::where('id', Auth::user()->id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        }
        else{
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'owner_name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email',
                'phone' => 'sometimes|nullable|string|max:20',
                'address' => 'sometimes|nullable|string|max:255',
                'city' => 'sometimes|nullable|string|max:100',
                'profile_picture' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif',
            ]);


            $imageName = null;

            if ($request->hasFile('profile_picture')) {
                $img = $request->file('profile_picture');
                $imageName = time() . '_' . $img->getClientOriginalName();
                $img->move(public_path('depo_pic'), $imageName);

                // Update image path in Customer_Info
                DepoInfo::where('id', Auth::user()->id)->update([
                    'pic' => $imageName
                ]);
            }


            DepoInfo::where('id', Auth::user()->id)->update([
                'owner_name' => $request->input('name'),
                'mobile' => $request->input('phone'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
            ]);

            User::where('id', Auth::user()->id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        }

        return redirect()->back()->with('success', 'User data updated successfully.');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Mail\StatusMail;
use App\Models\About;
use App\Models\Admin;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Contact;
use App\Models\marqueetext;
use App\Models\Privacy;
use App\Models\ProductPage;
use App\Models\Products;
use App\Models\ShippingCharges;
use App\Models\SliderImg;
use App\Models\StorePage;
use App\Models\Testimonial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;


class DashboardController extends Controller
{
    public function add_category()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

//        dd($admin);
        $category = Category::get();

        return view('admin.Category.addCategory',['id'=>$user,'admin'=>$admin,'category'=>$category]);
    }

    public function insert_category(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'age_select' => 'required'
        ]);

        try {
            if ($request->hasFile('image')) {
                $pic = $request->file('image');

                if ($pic->isValid()) {
                    $imageName = time() . '_' . $pic->getClientOriginalName();

                    $pic->move(public_path('category'), $imageName);

                    $imagePath = 'category/' . $imageName;

                    Category::create([
                        'name' => $request->input('name'),
                        'image' => $imageName,
                        'status' => $request->input('age_select')
                    ]);

                    return redirect()->back()->with('success', 'Category added successfully.');
                } else {
                    return redirect()->back()->with('error', 'Uploaded image is not valid.');
                }
            } else {
                return redirect()->back()->with('error', 'No image uploaded.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function display_category()
    {
        $user = \request('id');

        $category = Category::get();

        $admin = Admin::where('id',$user)->first();

        return view('admin.Category.displayCategory',['id'=>$user,'category'=>$category,'admin'=>$admin]);
    }

    public function update_category()
    {
        $user = \request('id');

        $updateCategory = \request('category');

        $category = Category::find($updateCategory);

        $admin = Admin::where('id',$user)->first();

        return view('admin.Category.updateCategory',['id'=>$user,'category'=>$category,'admin'=>$admin]);
    }

    public function category_update(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'sometimes|required|string|max:255',
            'age_select' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $categoryId = $request->input('category_id');
            $category = Category::findOrFail($categoryId);

            $data = [
                'name' => $request->input('name'),
                'status' => $request->input('age_select'),
            ];

            if ($request->hasFile('image')) {
                $pic = $request->file('image');

                if ($pic->isValid()) {
                    $originalname = time() . '_' . $pic->getClientOriginalName();

                    if ($category->image) {
                        $oldPath = public_path('category/' . $category->image);
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }

                    $pic->move(public_path('category'), $originalname);

                    $data['image'] = $originalname;
                } else {
                    return redirect()->back()->with('error', 'Uploaded image is not valid.');
                }
            }


            $category->update($data);

            return redirect()->back()->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function delete_category(Request $request)
    {
        $category = $request->input('category');

        Category::where('id',$category)->delete();

        return redirect()->back()->with('success','Category deleted successfully.');
    }

    public function add_product()
    {
        $user = \request('id');

        $category = Category::get();

        $prod = Products::all();

        $admin = Admin::where('id',$user)->first();

        return view('Products.addProducts',['id'=>$user,'category'=>$category,'admin'=>$admin,'prod'=>$prod]);
    }

    public function insert_product(Request $request)
    {
        $pic = $request->file('image');

        if ($pic) {
            $originalname = $pic->getClientOriginalName();
            $path = $pic->storeAs('public/products', $originalname);
            $path = str_replace('public/', '', $path);
            $path2 = $pic->storeAs('products', $originalname, 'shared');

            Products::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'price'=>$request->input('price'),
                'image'=>$path,
                'stock'=>$request->input('stock'),
                'category'=>$request->input('category'),
                'cartoonqty'=>$request->input('cartoonqty'),
                'cartoonprice'=>$request->input('catroonprice')
            ]);

            return redirect()->back();
        }
    }

    public function display_products()
    {
        $user = \request('id');

        $category = Products::get();

        $catagory = Category::get();

        $admin = Admin::where('id',$user)->first();

        return view('Products.displayProducts',['id'=>$user,'category'=>$category,'catagory'=>$catagory,'admin'=>$admin]);
    }

    public function apply_discount(Request $request)
    {
        Products::where('id',$request->input('category_id'))->update([
            'discount' => $request->input('discount'),
            'price'=> $request->input('new_price'),
            'previous_price' => $request->input('previous_price')
        ]);

        return redirect()->back();
    }

    public function update_products(Request $request)
    {
        Products::where('id',$request->input('prod_id'))->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'category' => $request->input('category'),
            'cartoonqty'=>$request->input('cartoonqty'),
            'cartoonprice'=>$request->input('cartoonprice')

        ]);

        $pic = $request->file('image');

        $categoryId = $request->input('prod_id');
        if ($pic) {
            $originalname = $pic->getClientOriginalName();

            $category = Products::find($categoryId);

            if ($category && $category->image) {
                Storage::delete('public/' . $category->image);
                Storage::disk('shared')->delete('public/' . $category->image);
            }

            $path = $pic->storeAs('public/product', $originalname);
            $path = str_replace('public/', '', $path);
            $path2 = $pic->storeAs('product', $originalname, 'shared');


            $category->update([
                'image' => $path,
            ]);

            return redirect()->back();
        }

        return redirect()->back();
    }

    public function delete_product(Request $request)
    {
        $category = $request->input('category');

        Products::where('id',$category)->delete();

        return redirect()->back();
    }

    public function cutomer_info()
    {
        $user = \request('id');

        $customers = DB::table('users')
            ->join('customer__infos', 'users.id', '=', 'customer__infos.id')
            ->where('users.roles', 'users')
            ->select('customer__infos.*', 'users.id as user_id','users.*')
            ->get();

        $admin = Admin::where('id',$user)->first();

        return view('User.customer-info',['id'=>$user,'customer'=>$customers,'admin'=>$admin]);
    }

    public function depo_info()
    {
        $user = \request('id');

        $customers = DB::table('users')
            ->join('depo_infos', 'users.id', '=', 'depo_infos.id')
            ->where('users.roles', 'depo')
            ->select('depo_infos.*', 'users.id as user_id','users.*')
            ->get();

        $admin = Admin::where('id',$user)->first();

        return view('User.depo-info',['id'=>$user,'customer'=>$customers,'admin'=>$admin]);
    }

    public function depo_status_update(Request $request)
    {
        $user = $request->input('prod_id');
        $email = User::where('id',$user)->first();
        DB::table('depo_infos')->where('id',$request->input('prod_id'))->update([
            'action'=>$request->input('category_id')
        ]);

        Mail::to($email->email)->send(new StatusMail($request->input('prod_id')));
        return redirect()->back();
    }

    public function customer_shipping()
    {
        $user = \request('id');

        $customers = ShippingCharges::where('roles','users')->get();

        $admin = Admin::where('id',$user)->first();

        return view('Shipping.customer-shipping',['id'=>$user,'category'=>$customers,'admin'=>$admin]);
    }

    public function insert_shipping(Request $request)
    {
        if ($request->input('role')=='users'){
            ShippingCharges::create([
                'places'=>$request->input('category_id'),
                'price'=>$request->input('previous_price'),
                'roles'=>$request->input('role'),
            ]);
        }
        elseif ($request->input('role')=='depo'){
            ShippingCharges::create([
                'places'=>$request->input('category_id'),
                'price'=>$request->input('previous_price'),
                'roles'=>$request->input('role'),
            ]);
        }

        return redirect()->back();
    }

    public function update_shipping(Request $request)
    {

        ShippingCharges::where('id',$request->input('prod_id'))->update([
            'places'=>$request->input('category'),
            'price'=>$request->input('price'),

        ]);


        return redirect()->back();
    }

    public function depo_shipping()
    {
        $user = \request('id');

        $customers = ShippingCharges::where('roles','depo')->get();

        $admin = Admin::where('id',$user)->first();

        return view('Shipping.depo-shipping',['id'=>$user,'category'=>$customers,'admin'=>$admin]);
    }

    public function customer_order()
    {
        $user = \request('id');

        $order = DB::table('orders as o1')
            ->where('o1.order_status', 'Processing')

            ->where('o1.roles', 'users')
            ->join('customer__infos as ci', 'ci.id', '=', 'o1.user_id')
            ->distinct()
            ->get();


        $product = DB::table('orders as o1')->where('o1.order_status', 'Processing')

            ->join('products as p1','p1.id', '=', 'o1.product_id')
        ->get();

        $admin = Admin::where('id',$user)->first();

        return view('Order.customer-order',['id'=>$user,'category'=>$order,'products'=>$product,'admin'=>$admin]);
    }

    public function depo_order()
    {
        $user = \request('id');
        $depo = DB::table('users')->find($user);
        $order = DB::table('orders as o1')
            ->where('o1.order_status', 'Processing')
            ->where('o1.roles', 'depo')
            ->join('users as ci', 'ci.id', '=', 'o1.user_id')
            ->join('depo_infos as c2', 'c2.id', '=', 'o1.user_id')
            ->get();


        $product = DB::table('orders as o1')->where('o1.order_status', 'Processing')
            ->join('products as p1','p1.id', '=', 'o1.product_id')
            ->get();

        $admin = Admin::where('id',$user)->first();

        return view('Order.depo-order',['id'=>$user,'category'=>$order,'products'=>$product,'admin'=>$admin]);
    }

    public function update_delivary(Request $request)
    {
        DB::table('orders')->where('invoice_id',$request->input('prod_id'))->update([
            'delivery_date' => $request->input('delivery_date'),
            'order_status' =>'Shipping'
        ]);
        $userEmail = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.invoice_id', $request->input('prod_id'))
            ->value('users.email');

//        dd($userEmail);

        Mail::to($userEmail)->send(new OrderShipped($request->input('delivery_date')));
        return redirect()->back();
    }

    public function invoice()
    {
        $invoice = \request('id');

        $now = Carbon::now('Asia/Dhaka');
        $role = DB::table('orders')->where('invoice_id',$invoice)->first();
        if ($role->roles == 'users') {
            $infos = DB::table('orders')->where('invoice_id', $invoice)
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->select('orders.*', 'orders.price as total_price', 'products.*', 'products.price as price')
                ->get();
        }
        else{
            $infos = DB::table('orders')->where('invoice_id', $invoice)
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->select('orders.*', 'orders.price as total_price', 'products.*', 'products.cartoonprice as price')
                ->get();
        }
        if ($role->roles == 'users') {
            $customer = DB::table('orders')->where('invoice_id', $invoice)
                ->join('customer__infos', 'orders.user_id', '=', 'customer__infos.id')
                ->select('orders.*', 'customer__infos.*')
                ->first();
        }
        else{
            $customer = DB::table('orders')->where('invoice_id', $invoice)

                ->join('depo_infos', 'orders.user_id', '=', 'depo_infos.id')
                ->select('orders.*','depo_infos.*')
                ->first();
        }
        $shippingDhaka = ShippingCharges::where('roles','users')->where('places','Dhaka')->first();
        $shippingOther = ShippingCharges::where('roles','users')->where('places','!=','Dhaka')->first();



        return view('Order.invoice',['infos'=>$infos,'customer'=>$customer,
            'shippingDhaka'=>$shippingDhaka,'shippingOther'=>$shippingOther,'date'=>$now,'roles'=>$role]);
    }

    public function customer_delivery()
    {
        $user = \request('id');

        $order = DB::table('orders as o1')
            ->whereIn('o1.order_status', ['Shipping','Delivered'])
            ->where('o1.roles', 'users')
            ->join('customer__infos as ci', 'ci.id', '=', 'o1.user_id')
            ->distinct()
            ->get();

        $product = DB::table('orders as o1')->whereIn('o1.order_status', ['Shipping','Delivered'])
            ->join('products as p1','p1.id', '=', 'o1.product_id')
            ->get();
        $admin = Admin::where('id',$user)->first();

        return view('Order.customer-delivery',['id'=>$user,'category'=>$order,'products'=>$product,'admin'=>$admin]);
    }

    public function depo_delivery()
    {
        $user = \request('id');

        $order = DB::table('orders as o1')
            ->whereIn('o1.order_status', ['Shipping','Delivered'])
            ->where('o1.roles', 'depo')
            ->join('users as ci', 'ci.id', '=', 'o1.user_id')
            ->join('depo_infos as c2', 'c2.id', '=', 'o1.user_id')
            ->distinct()
            ->get();

        $product = DB::table('orders as o1')->whereIn('o1.order_status', ['Shipping','Delivered'])
            ->join('products as p1','p1.id', '=', 'o1.product_id')
            ->get();
        $admin = Admin::where('id',$user)->first();

        return view('Order.depo-delivery',['id'=>$user,'category'=>$order,'products'=>$product,'admin'=>$admin]);
    }

    public function orderDelivery(Request $request)
    {
        DB::table('orders')->where('invoice_id',$request->input('invo_id'))->update([
            'order_status' => 'Delivered'
        ]);

        return redirect()->back();
    }

    public function marquee()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $mar = marqueetext::first();

        return view('website.marquee',['id'=>$user,'admin'=>$admin,'marquee'=>$mar]);
    }

    public function insertMarquee(Request $request)
    {
        $check = marqueetext::where('id',$request->input('id'))->first();
        if (!$check) {
            marqueetext::create([
                'text' => $request->input('name'),
                'color' => $request->input('color')
            ]);
        } else {
            marqueetext::where('id', $request->input('id'))->update([
                'text' => $request->input('name'),
                'color' => $request->input('color')
            ]);
        }

        return redirect()->back();
    }

    public function testimonial(Request $request)
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $mar = Testimonial::all();

        return view('website.testimonial',['id'=>$user,'admin'=>$admin,'marquee'=>$mar]);

    }

    public function insertTestimonial(Request $request)
    {
        Testimonial::create([
            'title'=>$request->input('name'),
            'description'=>$request->input('description'),
            'profession'=>$request->input('profession')
        ]);

        return redirect()->back()->with('success', 'Testimonial created successfully');
    }

    public function updateTestimonial(Request $request, $id) {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update($request->all());
        return redirect()->back()->with('success', 'Testimonial updated successfully');
    }

    public function deleteTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }

    public function about_us()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $mar = About::first();

        return view('website.about',['id'=>$user,'admin'=>$admin,'marquee'=>$mar]);
    }

    public function img_upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;

//            $resizedImage = Image::make($image)->resize(300, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
            $image->move(public_path('images'), $fileName);

            $url = asset('images/' . $fileName);

            $sharedFolderPath = 'I:\Trodev\Tea Nature\TeaNature_User\public';


            $sharedFilePath = $sharedFolderPath . '\images';


            if (!File::exists($sharedFilePath)) {
                File::makeDirectory($sharedFilePath, 0755, true);
            }


            File::copy(public_path('images/' . $fileName), $sharedFilePath . '\\' . $fileName);


            return response()->json(['url'=>$url,'fileName'=>$fileName,'uploaded'=>1]);
        }
    }

    public function about_us_upload(Request $request)
    {
        $check = About::where('id',$request->input('id'))->first();

        if ($check){
            About::where('id',$request->input('id'))->update([
                'title'=>$request->input('name'),
                'description'=>$request->input('description')
            ]);
            return redirect()->back()->with('success', 'About Us updated successfully');
        }
        else{
            About::create([
                'title'=>$request->input('name'),
                'description'=>$request->input('description')
            ]);

            return redirect()->back()->with('success', 'About Us uploaded successfully');
        }
    }

    public function privacy()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $mar = Privacy::first();

        return view('website.privacy-policy',['id'=>$user,'admin'=>$admin,'marquee'=>$mar]);
    }

    public function privacy_upload(Request $request)
    {
        $check = Privacy::where('id',$request->input('id'))->first();

        if ($check){
            Privacy::where('id',$request->input('id'))->update([

                'privacy'=>$request->input('description')
            ]);
            return redirect()->back()->with('success', 'About Us updated successfully');
        }
        else{
            Privacy::create([

                'privacy'=>$request->input('description')
            ]);

            return redirect()->back()->with('success', 'Privacy uploaded successfully');
        }
    }

    public function blogs()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $mar = Blogs::all();

        return view('website.blogs',['id'=>$user,'admin'=>$admin,'marquee'=>$mar]);
    }

    public function insertBlogs(Request $request)
    {
//        dd($request->all());
      $user =  Blogs::create([
            'title'=>$request->input('name'),
            'slug'=>$request->input('description'),
        ]);

//      dd($user);
        return redirect()->back()->with('success', 'Testimonial created successfully');
    }

    public function updateBlogs(Request $request, $id) {

        $testimonial = Blogs::findOrFail($id);
//        dd($request->all());
        $testimonial->update([
            'title'=>$request->input('title'),
            'slug'=>$request->input('description')
        ]);
        return redirect()->back()->with('success', 'Testimonial updated successfully');
    }

    public function deleteBlogs($id)
    {

        $testimonial = Blogs::findOrFail($id);
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }

    public function contact_page()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $mar = Contact::first();

        return view('website.contact',['id'=>$user,'admin'=>$admin,'marquee'=>$mar]);
    }

    public function contact_upload(Request $request)
    {
        $check = Contact::where('id',$request->input('id'))->first();

        if ($check){
            Contact::where('id',$request->input('id'))->update([
                'fphone'=>$request->input('fphone'),
                'sphone'=>$request->input('sphone'),
                'femail'=>$request->input('femail'),
                'semail'=>$request->input('semail'),
                'address'=>$request->input('address')
            ]);
            return redirect()->back()->with('success', 'Contact updated successfully');
        }
        else{
            Contact::create([
                'fphone'=>$request->input('fphone'),
                'sphone'=>$request->input('sphone'),
                'femail'=>$request->input('femail'),
                'semail'=>$request->input('semail'),
                'address'=>$request->input('address')

            ]);

            return redirect()->back()->with('success', 'Contact uploaded successfully');
        }
    }

    public function logout()
    {
        Auth::logout();

        Session::flush();

        return redirect('/');
    }

    public function img_slider()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $mar = SliderImg::all();

        return view('website.img-slider',['id'=>$user,'admin'=>$admin,'marquee'=>$mar]);
    }

    public function insertSlider(Request $request)
    {
        $img = $request->file('description');
        if ($img) {
            $originalname = time() . '.' . $img->getClientOriginalExtension();
            $path = $img->storeAs('public/slider', $originalname);
            $path = str_replace('public/', '', $path);
            $path2 = $img->storeAs('slider', $originalname, 'shared');

            SliderImg::create([
                'title'=>$request->input('name'),
                'image'=>$path,
            ]);

            return redirect()->back()->with('success', 'Slider image created successfully');
        }
    }

    public function updateImage(Request $request, $id) {
        $testimonial = SliderImg::findOrFail($id);
        $img = $request->file('description');
        if ($img) {
            $originalName = time() . '.' . $img->getClientOriginalExtension();
            $existingImagePath = $testimonial->image;

            if ($existingImagePath) {
                Storage::delete('public/slider/' . $existingImagePath);

                Storage::disk('shared')->delete('slider/' . $existingImagePath);
            }


            $publicPath = $img->storeAs('public/slider', $originalName);


            $publicPath = str_replace('public/', '', $publicPath);


            $sharedPath = $img->storeAs('slider', $originalName, 'shared');
        }

        if ($request->hasFile('description')) {
            $testimonial->update([
                'title'=>$request->input('title'),
                'image'=>$publicPath
            ]);
        }
        else
            $testimonial->update([
                'title'=>$request->input('title'),
            ]);

        return redirect()->back()->with('success', 'Image updated successfully');
    }

    public function deleteImge($id)
    {
        $testimonial = SliderImg::findOrFail($id);

        $existingImagePath = $testimonial->image;

        if ($existingImagePath) {
            Storage::delete('public/slider/' . $existingImagePath);
            Storage::disk('shared')->delete('slider/' . $existingImagePath);
        }
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }


    public function product_page()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $mar = ProductPage::first();

        return view('website.product',['id'=>$user,'admin'=>$admin,'marquee'=>$mar]);
    }

    public function title_upload(Request $request)
    {
        $check = ProductPage::where('id',$request->input('id'))->first();

        if ($check){
            ProductPage::where('id',$request->input('id'))->update([

                'text'=>$request->input('sphone'),

            ]);
            return redirect()->back()->with('success', 'Contact updated successfully');
        }
        else{
            ProductPage::create([

                'text'=>$request->input('sphone'),


            ]);

            return redirect()->back()->with('success', 'Title uploaded successfully');
        }
    }

    public function store_page()
    {
        $user = \request('id');

        $admin = Admin::where('id',$user)->first();

        $mar = StorePage::first();

        return view('website.storepage',['id'=>$user,'admin'=>$admin,'marquee'=>$mar]);
    }

    public function store_title_upload(Request $request)
    {
        $check = StorePage::where('id',$request->input('id'))->first();

        if ($check){
            StorePage::where('id',$request->input('id'))->update([

                'text'=>$request->input('sphone'),

            ]);
            return redirect()->back()->with('success', 'Contact updated successfully');
        }
        else{
            StorePage::create([

                'text'=>$request->input('sphone'),


            ]);

            return redirect()->back()->with('success', 'Title uploaded successfully');
        }
    }

}


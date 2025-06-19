<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SalesReport;
use App\Http\Controllers\User\NonUserController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\DepoController;
use App\Http\Controllers\User\DepoLoginController;
use App\Http\Controllers\User\UddoktapayController;
use App\Http\Controllers\User\NewUserController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;

Route::get('/', function () {
    return view('welcome');
});



/* Non User Start*/
Route::get('/',[NewUserController::class,'index'])->name('home');

Route::get('/login',[NewUserController::class,'login'])->name('login');

Route::get('/product',[NewUserController::class,'product'])->name('products');

Route::get('/store',[NewUserController::class,'store'])->name('store');

Route::get('/contact',[NewUserController::class,'contact'])->name('contact');

Route::get('/testimonials',[NewUserController::class,'testimonial'])->name('testimonial');

Route::get('/blog',[NewUserController::class,'blog'])->name('blog');

Route::get('/blog-list',[NewUserController::class,'blogList'])->name('blog-list');

Route::get('/about',[NewUserController::class,'about'])->name('about');

Route::get('/feature',[NewUserController::class,'feature'])->name('feature');

Route::get('/error-not-found',[NewUserController::class,'page'])->name('page');

Route::get('/single-product',[NewUserController::class,'single_product'])->name('single-product');

Route::get('/my-profile',[NewUserController::class,'my_profile'])->name('user.profile');

Route::get('/my-profile/account-settings',[NewUserController::class,'account_settings'])->name('user.account_settings');

Route::post('/user.data',[NewUserController::class,'upload_user_data'])->name('user.data');

Route::post('/register-customer',[UserLoginController::class,'registration'])->name('register-customer');

Route::post('/orders',[OrderController::class,'store'])->name('user.create-orders');

Route::get('/orders', [OrderController::class, 'index'])->name('cart.view');

Route::post('/orders/destroy', [OrderController::class, 'destroy'])->name('cart.remove');

Route::post('/payment',[PaymentController::class,'index'])->name('payment');

Route::get('/callback',[PaymentController::class,'callback'])->name('callbackURL');

Route::get('/verify-payment', [PaymentController::class, 'verifyPayment'])->name('verifyPayment');

Route::get('/privacy-policy',[NonUserController::class,'privacy_policy'])->name('privacy_policy');
/* Non User End*/

/* Verification Start*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();
    $userId = $request->user();
    $userRoles = $userId->roles;
    event(new \Illuminate\Auth\Events\Verified($request->user()));
    if ($userRoles === 'users') {
        return redirect()->route('welcome', ['id' => $userId]);
    }
    if ($userRoles === 'depo') {
        return redirect()->route('depo-login');
    }
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth'])->name('verification.send');

/* Verification End*/

/* User Start*/
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('welcome');

    Route::get('/home/product',[UserController::class,'product'])->name('product');

    Route::get('/home/store',[UserController::class,'store'])->name('stores');

    Route::get('/home/contact',[UserController::class,'contact'])->name('contacts');

    Route::get('/home/testimonials',[UserController::class,'testimonial'])->name('testimonials');

    Route::get('/home/blogList',[UserController::class,'blogList'])->name('Listblog');

    Route::get('/home/blog',[UserController::class,'blog'])->name('blogs');

    Route::get('/home/about',[UserController::class,'about'])->name('abouts');

    Route::get('/home/feature',[UserController::class,'feature'])->name('features');

    Route::get('/home/error-not-found',[UserController::class,'page'])->name('pages');

    Route::get('/home/single-product',[UserController::class,'single_product'])->name('single-products');

    Route::get('/home/product/cart',[UserController::class,'cart'])->name('cart');

    Route::get('/home/my-profile/order-history',[UserController::class,'order_history'])->name('order_history');

    Route::get('/home/my-profile',[UserController::class,'my_profile'])->name('my_profile');

    Route::get('/home/my-profile/account-settings',[UserController::class,'account_settings'])->name('account_settings');

    Route::post('/update-user-data',[UserController::class,'upload_user_data'])->name('upload_user_data');

    Route::post('/create-order',[UserController::class,'create_order'])->name('create_order');

    Route::get('/checkout',[UserController::class,'checkout'])->name('checkout');

    Route::get('/user_invoice',[UserController::class,'invoice'])->name('invoice');

    Route::post('/update-Cart',[UserController::class,'update_cart'])->name('update_cart');

    Route::get('/delete_cart',[UserController::class,'deleteCart'])->name('delete_cart');
});

/* User End*/

/* User Login Start*/
Route::post('/loggedIn',[UserLoginController::class,'loggedIn'])->name('loggedIn');

Route::get('/logout',[UserLoginController::class,'logout'])->name('logout');
/* User Login End*/
Route::get('/email-success', function () {
    return view('user.emails.success');
})->name('email-success');


/* Depo Login & Register Start*/
Route::get('/depo-login',[DepoController::class,'login'])->name('depo-login');

Route::get('/depo/owner-info',[DepoLoginController::class,'verify'])->name('verify');

Route::post('/depo-logged',[DepoLoginController::class,'loggin'])->name('depo-logged');

Route::post('/depo-register',[DepoLoginController::class,'regis'])->name('depo-register');

Route::post('/owner-verfication',[DepoLoginController::class,'owner_info'])->name('owner-verfication');
/* Depo Login & Register End*/


Route::middleware(['auth'])->group(function () {
    Route::get('/depo/home', [DepoController::class, 'depoHome'])->name('depo-welcome');

    Route::get('/depo/product',[DepoController::class,'product'])->name('depo-product');

    Route::get('/depo/store',[DepoController::class,'store'])->name('depo-stores');

    Route::get('/depo/contact',[DepoController::class,'contact'])->name('depo-contacts');

    Route::get('/depo/testimonials',[DepoController::class,'testimonial'])->name('depo-testimonials');

    Route::get('/depo/blogList',[DepoController::class,'blogList'])->name('depo-blogList');

    Route::get('/depo/blog',[DepoController::class,'blog'])->name('depo-blogs');

    Route::get('/depo/about',[DepoController::class,'about'])->name('depo-abouts');

    Route::get('/depo/feature',[DepoController::class,'feature'])->name('depo-features');

    Route::get('/depo/error-not-found',[DepoController::class,'page'])->name('depo-pages');

    Route::get('/depo/single-product',[DepoController::class,'single_product'])->name('depo-single-products');

    Route::get('/depo/product/cart',[DepoController::class,'cart'])->name('depo-cart');

    Route::get('/depo/product/checkout',[DepoController::class,'checkout'])->name('depo-checkout');

    Route::get('/depo/my-profile/order-history',[DepoController::class,'order_history'])->name('depo-order_history');

    Route::get('/depo/my-profile',[DepoController::class,'my_profile'])->name('depo-my_profile');

    Route::get('/depo/my-profile/account-settings',[DepoController::class,'account_settings'])->name('depo-account_settings');

    Route::post('/update-depo-data',[DepoController::class,'upload_depo_data'])->name('upload-depo-data');
});

Route::get( 'pay', [UddoktapayController::class, 'show'] )->name( 'uddoktapay.payment-form' );
Route::post( 'pay', [UddoktapayController::class, 'pay'] )->name( 'uddoktapay.pay' );
Route::get( 'success', [UddoktapayController::class, 'success'] )->name( 'uddoktapay.success' );
Route::get( 'cancel', [UddoktapayController::class, 'cancel'] )->name( 'uddoktapay.cancel' );
Route::post( 'webhook', [UddoktapayController::class, 'webhook'] )->name( 'uddoktapay.webhook' );
//Route::post('/payment',[App\Http\Controllers\UddoktapayController::class,'insertPayment'])->name('payment');


//Route::group(['middleware' => ['web']], function () {
//    // Payment Routes for bKash
//    Route::get('/bkash/payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'index']);
//    Route::post('/payment',[App\Http\Controllers\BkashTokenizePaymentController::class,'insertPayment'])->name('payment');
//    Route::get('/bkash/create-payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'createPayment'])->name('bkash-create-payment');
//    Route::get('/bkash/callback', [App\Http\Controllers\BkashTokenizePaymentController::class,'callBack'])->name('bkash-callBack');
//
//    //search payment
//    Route::get('/bkash/search/{trxID}', [App\Http\Controllers\BkashTokenizePaymentController::class,'searchTnx'])->name('bkash-serach');
//
//    //refund payment routes
//    Route::get('/bkash/refund', [App\Http\Controllers\BkashTokenizePaymentController::class,'refund'])->name('bkash-refund');
//    Route::get('/bkash/refund/status', [App\Http\Controllers\BkashTokenizePaymentController::class,'refundStatus'])->name('bkash-refund-status');
//
//});

Route::prefix('admin')->group(function (){
   Route::get('/login',[LoginController::class,'registerPage'])->name('admin.login');

    Route::post('/login', [LoginController::class, 'loginController'])->name('admin.login');


    Route::get('/profile',[ProfileController::class,'index'])->name('profile');

    Route::get('/dashboard', [LoginController::class, 'welcomePage'])->name('welcomePage');



    Route::get('/add-category',[DashboardController::class,'add_category'])->name('addCategory');

    Route::post('/insert-category',[DashboardController::class,'insert_category'])->name('insertCategory');

    Route::get('/display-category',[DashboardController::class,'display_category'])->name('displayCategory');

    Route::get('/update-category',[DashboardController::class,'update_category'])->name('updateCategory');

    Route::post('/category-update',[DashboardController::class,'category_update'])->name('categoryUpdate');

    Route::get('/delete-category',[DashboardController::class,'delete_category'])->name('deleteCategory');

    Route::get('/add-product',[DashboardController::class,'add_product'])->name('addProduct');

    Route::post('/insert-product',[DashboardController::class,'insert_product'])->name('insertProduct');

    Route::get('/display-product',[DashboardController::class,'display_products'])->name('displayProduct');

    Route::post('/apply-discount',[DashboardController::class,'apply_discount'])->name('applyDiscount');

    Route::post('/update-product',[DashboardController::class,'update_products'])->name('updateProduct');

    Route::get('/delete-product',[DashboardController::class,'delete_product'])->name('deleteProduct');

    Route::get('/customerInfo',[DashboardController::class,'cutomer_info'])->name('customerInfo');

    Route::get('/depoInfo',[DashboardController::class,'depo_info'])->name('depoInfo');

    Route::post('/depo-status-update',[DashboardController::class,'depo_status_update'])->name('depoStatusUpdate');

    Route::get('/displayAdmin',[AdminController::class,'display_admin'])->name('displayAdmin');

    Route::post('/create-admin',[AdminController::class,'create_admin'])->name('createAdmin');

    Route::post('/update-admin',[AdminController::class,'update_admin'])->name('updateAdmin');

    Route::get('/displayPermission',[AdminController::class,'display_permission'])->name('displayPermission');

    Route::post('/create-permission',[AdminController::class,'create_permission'])->name('createPermission');

    Route::post('/assignPermission',[AdminController::class,'assign_permission'])->name('assignPermission');

    Route::delete('/permission/delete', [AdminController::class, 'delete_permission'])->name('permission.delete');

    Route::post('/removePermission',[AdminController::class, 'remove_permission'])->name('removePermission');

    Route::post('/updatePermission',[AdminController::class, 'update_permission_name'])->name('updatePermission');

    Route::get('/customerShippingCharges',[DashboardController::class,'customer_shipping'])->name('customerShippingCharges');

    Route::get('/depoShippingCharges',[DashboardController::class,'depo_shipping'])->name('depoShippingCharges');

    Route::post('/createShippingCharges',[DashboardController::class,'insert_shipping'])->name('createShippingCharges');

    Route::post('/updateShippingCharges',[DashboardController::class,'update_shipping'])->name('updateShippingCharges');

    Route::get('/customer-orders',[DashboardController::class,'customer_order'])->name('customerOrders');

    Route::post('/update-order',[DashboardController::class,'update_delivary'])->name('updateOrder');

    Route::get('/customerInvoice',[DashboardController::class,'invoice'])->name('admin.invoice');

    Route::get('/customerDeliveryTracking',[DashboardController::class,'customer_delivery'])->name('deliveryTracking');

    Route::post('/updateDelivery',[DashboardController::class,'orderDelivery'])->name('updateDelivery');

    Route::get('/depo-orders',[DashboardController::class,'depo_order'])->name('depoOrders');

    Route::get('/depoDeliveryTracking',[DashboardController::class,'depo_delivery'])->name('depoTracking');

    Route::get('/daily-sales',[SalesReport::class,'daily_sales'])->name('dailySales');

    Route::get('/daily-sales-report/{id}', [SalesReport::class, 'daily_sales'])->name('daily-sales-report');

    Route::get('/monthly-sales',[SalesReport::class,'monthly_sales'])->name('monthlySales');

    Route::get('/monthly-sales-report/{id}', [SalesReport::class, 'monthly_sales'])->name('monthly-sales-report');

    Route::get('/yearly-sales',[SalesReport::class,'yearly_sales'])->name('yearlySales');

    Route::get('/yearly-sales-report/{id}', [SalesReport::class, 'yearly_sales'])->name('yearly-sales-report');

    Route::post('/update-profile-pic',[ProfileController::class,'profile_control'])->name('updateProfilePic');

    Route::post('/post',[ProfileController::class,'post_upload'])->name('post');

    Route::post('/likes',[ProfileController::class,'likes'])->name('likes');

    Route::get('/website/marquee',[DashboardController::class,'marquee'])->name('marquee');

    Route::post('/insertMarquee',[DashboardController::class,'insertMarquee'])->name('insertMarquee');

    Route::get('/testimonial',[DashboardController::class,'testimonial'])->name('testimonial');

    Route::post('/insertTestimonial',[DashboardController::class,'insertTestimonial'])->name('insertTestimonial');

    Route::put('/testimonials/update/{id}', [DashboardController::class, 'updateTestimonial'])->name('updateTestimonial');

    Route::delete('/testimonials/delete/{id}', [DashboardController::class, 'deleteTestimonial'])->name('deleteTestimonial');

    Route::get('/about_us',[DashboardController::class,'about_us'])->name('about_us');

    Route::post('/img-upload',[DashboardController::class,'img_upload'])->name('ckeditior.upload');

    Route::post('/insertAboutUs',[DashboardController::class,'about_us_upload'])->name('about_us_upload');

    Route::get('/privacy-policy',[DashboardController::class,'privacy'])->name('privacy_policy');

    Route::post('/insertPrivacy',[DashboardController::class,'privacy_upload'])->name('privacy_upload');

    Route::get('/blogs',[DashboardController::class,'blogs'])->name('blogs');

    Route::post('/insertBlogs',[DashboardController::class,'insertBlogs'])->name('insertBlogs');

    Route::put('/blogs/update/{id}', [DashboardController::class, 'updateBlogs'])->name('updateBlogs');

    Route::delete('/blogs/delete/{id}', [DashboardController::class, 'deleteBlogs'])->name('deleteBlogs');

    Route::get('/contact',[DashboardController::class,'contact_page'])->name('contact_page');

    Route::post('/contact',[DashboardController::class,'contact_upload'])->name('contact_upload');

    Route::get('/img-slider',[DashboardController::class,'img_slider'])->name('img_slider');

    Route::post('/insertImgae',[DashboardController::class,'insertSlider'])->name('insertImgae');

    Route::put('/slider/update/{id}', [DashboardController::class, 'updateImage'])->name('updateImage');

    Route::delete('/slider/delete/{id}', [DashboardController::class, 'deleteImge'])->name('deleteImge');

    Route::get('/product_page',[DashboardController::class,'product_page'])->name('product_page');

    Route::post('/product-page-upload',[DashboardController::class,'title_upload'])->name('title_upload');

    Route::get('/store_page',[DashboardController::class,'store_page'])->name('store_page');

    Route::post('/store-page-upload',[DashboardController::class,'store_title_upload'])->name('store_title_upload');


    Route::get('/logout',[DashboardController::class,'logout'])->name('logout');
});

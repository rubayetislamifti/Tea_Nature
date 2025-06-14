<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SalesReport;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function (){
   Route::get('/login',[LoginController::class,'registerPage'])->name('admin.login');

    Route::post('/login', [LoginController::class, 'loginController'])->name('login');


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

    Route::get('/customerInvoice',[DashboardController::class,'invoice'])->name('invoice');

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

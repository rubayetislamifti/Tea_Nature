<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesReport extends Controller
{
    public function daily_sales(Request $request)
    {
        $id = request('id');
        $date = $request->input('date', Carbon::today()->toDateString());

        $admin = Admin::find($id);


        $sales = DB::table('orders')
            ->whereDate('orders.created_at', $date)
            ->where('orders.order_status','Delivered')// Specify the table for created_at
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*','orders.price as total_price', 'products.name as product_name', 'products.price as product_price') // Explicitly select columns to avoid ambiguity
            ->get();
        $totalPrice = $sales->sum('total_price');
        return view('SalesReport.daily-sales',['id'=>$id,'date'=>$date,'sales'=>$sales, 'totalPrice'=>$totalPrice,'admin'=>$admin]);
    }

    public function monthly_sales(Request $request)
    {

        $id = \request('id');
        if (!$id) {
            dd($id);
            return redirect()->back()->withErrors('Admin ID is missing');
        }
        $date = $request->input('date', Carbon::today()->format('Y-m'));
        $admin = Admin::where('id',$id)->first();

        $startOfMonth = Carbon::parse($date)->startOfMonth();
        $endOfMonth = Carbon::parse($date)->endOfMonth();


        $sales = DB::table('orders')
            ->whereBetween('orders.created_at', [$startOfMonth, $endOfMonth])
            ->where('orders.order_status', 'Delivered')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'orders.price as total_price', 'products.name as product_name', 'products.price as product_price')
            ->get();
//        dd($sales);
        $totalPrice = $sales->sum('total_price');

        return view('SalesReport.monthly-sales',['id'=>$id,'date'=>$date,'sales'=>$sales, 'totalPrice'=>$totalPrice,'admin'=>$admin]);
    }

    public function yearly_sales(Request $request)
    {
        $id = request('id');
        $year = $request->input('year', Carbon::today()->year);
        $admin = Admin::where('id',$id)->first();
        // Calculate start and end dates of the selected year
        $startOfYear = Carbon::create($year, 1, 1, 0, 0, 0);
        $endOfYear = Carbon::create($year, 12, 31, 23, 59, 59);

        // Fetch sales data for the given year
        $sales = DB::table('orders')
            ->whereBetween('orders.created_at', [$startOfYear, $endOfYear])
            ->where('orders.order_status', 'Delivered')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'orders.price as total_price', 'products.name as product_name', 'products.price as product_price')
            ->get();

        $totalPrice = $sales->sum('total_price');

        return view('SalesReport.yearly-sales',['id'=>$id,'year'=>$year,'sales'=>$sales, 'totalPrice'=>$totalPrice,'admin'=>$admin]);
    }
}

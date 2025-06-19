<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('user.non-user.cartview', ['cart'=>$cart]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = (int)$request->input('quantity', 1);

        $product = Products::findOrFail($productId);

        $cart = session()->get('cart', []);


        if (Auth::user()->roles == 'users'){
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
                $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $product->price;
            } else {
                $cart[$productId] = [
                    'product_id' => $productId,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'total_price' => $product->price * $quantity,
                ];
            }
        }
        else
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
                $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $product->cartoonprice;
            } else {
                $cart[$productId] = [
                    'product_id' => $productId,
                    'name' => $product->name,
                    'price' => $product->cartoonprice,
                    'quantity' => $quantity,
                    'total_price' => $product->cartoonprice * $quantity,
                ];
            }

//            dd($cart);
        session()->put('cart', $cart);


        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $cart = Session::get('cart', []);
        $product_id = $request->input('product_id');

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product removed from cart.');
    }
}

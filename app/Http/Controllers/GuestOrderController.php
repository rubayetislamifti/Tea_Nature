<?php

namespace App\Http\Controllers;

use App\Models\GuestOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class GuestOrderController extends Controller
{
    protected $token;

    public function allKey()
    {
        return [
            'baseURL' => 'https://payment.trodevit.com/troesports',
            'sandBoxURL' => 'https://sandbox.uddoktapay.com',
            'apiKey' => 'jYX9XBfxSxeAmRQZh3PqjvNFxm1quLqnyi7athqe',
            'sandBoxApi' => '982d381360a69d419689740d9f2e26ce36fb7a50',
        ];
    }

    public function paymentInit(Request $request)
    {
        $key = $this->allKey();

        try {
            $data = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'city' => 'required',
                'zip' => 'required',
                'amount' => 'required',
                'paymentMethod'  => 'required|in:pay,COD',
            ]);
            $cart = session()->get('cart');

            if ($data['paymentMethod'] == 'pay') {
                foreach ($cart as $item) {
                    $body = [
                        'full_name' => $data['name'],
                        'email' => $data['email'],
                        'amount' => $data['amount'],
                        'metadata' => [
                            'product_id' => $item['product_id'],
                            'quantity' => $item['quantity'],
                            'phone' => $data['phone'],
                            'address' => $data['address'],
                            'city' => $data['city'],
                            'zip' => $data['zip'],
                        ],
                        'redirect_url' => route('guest.payment.verify', [], true),
                        'return_type' => 'GET',
                        'cancel_url' => route('guest.payment.cancel', [], true)
                    ];
                }


                if (env('APP_ENV') == 'production') {
                    $response = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'RT-UDDOKTAPAY-API-KEY' => $key['apiKey'],
                    ])->post($key['baseURL'] . '/api/checkout', $body);
                } else {
                    $response = Http::withoutVerifying()->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'RT-UDDOKTAPAY-API-KEY' => $key['sandBoxApi'],
                    ])->post($key['sandBoxURL'] . '/api/checkout-v2', $body);
                }
//                dd($response->json());
                if ($response->successful()){
                    return redirect()->away($response->json('payment_url'));
                }
            }
        }
        catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function verify(Request $request){
        $key = $this->allKey();

        try {
            $body = ['invoice_id' => $request->query('invoice_id')];
            if (env('APP_ENV') == 'production') {
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'RT-UDDOKTAPAY-API-KEY' => $key['apiKey'],
                ])->post($key['basrURL'] . '/api/verify-payment', $body);
            } else {
                $response = Http::withoutVerifying()->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'RT-UDDOKTAPAY-API-KEY' => $key['sandBoxApi'],
                ])->post($key['sandBoxURL'] . '/api/verify-payment', $body);
            }

            if ($response->successful()){
                $data = $response->json();
                GuestOrder::create([
                    'name'=>$data['full_name'],
                    'email'=>$data['email'],
                    'phone'=>$response->json(['metadata','phone']),
                    'address'=>$response->json(['metadata','address']),
                    'city'=>$response->json(['metadata','city']),
                    'zip'=>$response->json(['metadata','zip']),
                    'amount'=>$data['amount'],
                    'quantity'=>$response->json(['metadata','quantity']),
                    'payment_method'=>$data['payment_method'],
                    'sender_number'=>$data['sender_number'],
                    'status'=>$data['status'],
                    'transaction_id'=>$data['transaction_id'],
                    'invoice_id'=>$data['invoice_id'],
                    'product_id'=>$response->json(['metadata','product_id'])
                ]);

                Session::forget('cart');

                return redirect()->route('guest.invoice',['invoice_id'=>$data['invoice_id']]);
            }
        }
        catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function cancel(Request $request){
        return 'nthg';
    }

    public function guestInvoice(Request $request)
    {
        $guest = GuestOrder::where('invoice_id',$request->query('invoice_id'))->first();
        $product = GuestOrder::where('invoice_id',$request->query('invoice_id'))
        ->join('products','guest_orders.product_id','=','products.id')
        ->select('guest_orders.*','products.*')
        ->get();

        $userShipping = DB::table('shipping_charges')->where('roles', 'users')->where('places', 'Dhaka')->first();
        $userShippingOutside = DB::table('shipping_charges')->where('roles', 'users')->where('places', 'Outside Dhaka')->first();

        return view('user.guestInvoice',['guest'=>$guest,'products'=>$product,'delivaryDhaka'=>$userShipping,'delivaryOutside'=>$userShippingOutside]);
    }
}

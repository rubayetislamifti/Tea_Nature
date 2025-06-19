<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Order;
use App\Models\User;
use App\Services\bkash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index(Request $request){
        $userId = Auth::user()->id;
        $shipping = Auth::user()->customerInfo->address;
        $projectid = Auth::user()->customerInfo->distric;
        $projectname = $request->input('zip');
        $service = $request->input('paymentMethod');
        $amount = $request->input('total');
        $invoice = rand(1000,9999);

        $cart = session()->get('cart');

        if ($service == 'COD') {

            foreach ($cart as $item) {
                $order = Order::create([
                    'user_id' => $userId,
                    'product_id' => $item['product_id'],
                    'invoice_id' => $invoice,
                    'quantity' => $item['quantity'],
                    'price' => $amount,
                    'payment_method' => $service,
                    'order_status' => 'Completed',
                    'shipping_address' => $shipping,
                    'shipping_city' => $projectid,
                    'zip_code' => $projectname,
                    'roles' => Auth::user()->roles,
                ]);
            }

            Session::forget('cart');

            if ($order) {
                $updatedOrder = Order::where('user_id', Auth::user()->id)
                    ->where('invoice_id', $invoice)
                    ->first();

                $adminEmails = DB::table('admins')->pluck('email')->toArray();

                $userEmail = User::where('id', $updatedOrder->user_id)->first();


                $recipients = array_merge([$userEmail->email], $adminEmails);

                foreach ($recipients as $email) {
                    Mail::to($email)->send(new InvoiceMail($updatedOrder));
                }
                Mail::to("rubayetislam16@gmail.com")->send(new InvoiceMail($updatedOrder));
            }

            return redirect()->route('invoice', ['id' => $invoice]);
        }
        else{
           return $this->initPayment($request,$amount, $invoice);
        }
    }

    protected function bkashPayment(bkash $bkash)
    {
        $tokenData = $bkash->getToken();

        return response()->json($tokenData);
    }

    public function initPayment(Request $request, $amount, $invoice)
    {

        $payerReference = Auth::user()->customerInfo->phone;
        $bkash = new bkash();

        if (!$bkash->getToken()) {
            return response()->json(['error' => 'Failed to get token'], 500);
        }

        $paymentReuslt = $bkash->createPayment($amount, $payerReference, $invoice);
        if ($paymentReuslt['status'] && isset($paymentReuslt['data']['bkashURL'])) {
            return redirect()->away($paymentReuslt['data']['bkashURL']);
        }

        return response()->json($paymentReuslt, 500);
    }

    public function callback(Request $request){
        $bkash = new bkash();
        $paymentId = $request->query('paymentID');
        $status = $request->query('status');

        if ($status === 'cancel') {
            return redirect('/');
        }

        if (!$paymentId) {
            return response()->json(['error' => 'paymentID not provided'], 400);
        }


        if (!$bkash->getToken()) {
            return response()->json(['error' => 'Failed to get token'], 500);
        }

        $executionResult = $bkash->executePayment($paymentId);

        if ($executionResult['status']) {
            return response()->route('verifyPayment', ['paymentID' => $paymentId]);
        }

        return response()->json($executionResult, 500);
    }

    public function verifyPayment(Request $request)
    {
        $paymentId = $request->query('paymentID');

        if (!$paymentId) {
            return response()->json(['error' => 'paymentID not provided'], 400);
        }

        $bkash = new bkash();

        if (!$bkash->getToken()) {
            return response()->json(['error' => 'Failed to get token'], 500);
        }

        $executionResult = $bkash->queryPayment($paymentId);

        if ($executionResult['status']) {
            return response()->json(['message' => 'Agreement executed', 'data' => $executionResult['data']]);
        }

        return response()->json($executionResult, 500);
    }
}

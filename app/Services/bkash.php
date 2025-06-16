<?php

namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class bkash
{
    protected $token;
    protected $appKey;
    protected $appSecret;
    protected $username;
    protected $password;

    public function __construct(){
        $this->appKey = config('bkash.bkash_app_key');
        $this->appSecret = config('bkash.bkash_app_secret');
        $this->username = config('bkash.bkash_username');
        $this->password = config('bkash.bkash_password');
    }

    public function getToken()
    {
        $url = config('bkash.bkash_url') . '/tokenized/checkout/token/grant';

        $headers = [
            'username'=> $this->username,
            'password' =>   $this->password,
            'Accept' => 'application/json',
        ];

        $body = [
            'app_key'=> $this->appKey,
            'app_secret' => $this->appSecret,
        ];

        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders($headers)
            ->withBody(json_encode($body), 'application/json')
            ->post($url);

        if ($response->successful()) {
//            dd($response->json('id_token'));
            $this->token = $response->json('id_token');

            return true;
        }
    }

    public function createPayment($amount, $payerReference, $invoice)
    {
        if (!$this->token) {
            return [
                'status' => false,
                'message' => 'Token not found'
            ];
        }

        $url = config('bkash.bkash_url') . '/tokenized/checkout/create';

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => $this->token,
            'X-App-Key' => $this->appKey
        ];

        $body = [
            'mode' => '0011',
            'payerReference' => $payerReference,
            'callbackURL' => route('callbackURL'),
            'amount' => $amount,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber'=> $invoice
        ];

        try {
            $response = Http::withOptions([
                'verify' => false
            ])->withHeaders($headers)
                ->withBody(json_encode($body), 'application/json')
                ->post($url);

            if ($response->successful()) {
                $data = $response->json();
//                dd($data);
                // Ensure necessary data exists
                if (isset($data['bkashURL']) && isset($data['paymentID'])) {
                    return [
                        'status' => true,
                        'data' => $data,
                    ];
                }

                return [
                    'status' => false,
                    'message' => 'Invalid response structure from bKash.',
                    'data' => $data
                ];
            }

            // Catch known HTTP errors (4xx/5xx)
            return [
                'status' => false,
                'message' => 'bKash API responded with an error.',
                'code' => $response->status(),
                'error' => $response->json()
            ];

        } catch (\Illuminate\Http\Client\RequestException $e) {
            return [
                'status' => false,
                'message' => 'HTTP request failed.',
                'error' => $e->getMessage()
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Unexpected error occurred.',
                'error' => $e->getMessage()
            ];
        }
    }

    public function executePayment($paymentID){
        $url = config('bkash.bkash_url') . '/tokenized/checkout/execute';

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => $this->token,
            'X-App-Key' => $this->appKey
        ];

        $body = [
            'paymentID'=>$paymentID,
        ];

//
        try {

            $response = Http::withOptions([
                'verify' => false
            ])->withHeaders($headers)
                ->withBody(json_encode($body), 'application/json')
                ->post($url);

                if ($response->successful()) {
                    return [
                        'status' => true,
                        'data' => $response->json(),
                    ];
                }


            return [
                'status' => false,
                'message' => 'bKash API error',
                'code' => $response->status(),
                'error' => $response->json(),
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Exception: ' . $e->getMessage(),
            ];
        }
    }

    public function queryPayment($paymentID)
    {
        $url = config('bkash.bkash_url') . '/tokenized/checkout/payment/status';

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => $this->token,
            'X-App-Key' => $this->appKey
        ];

        $body = [
            'paymentID'=>$paymentID,
        ];

//        dd($body);
        try {

                $response = Http::withOptions([
                    'verify' => false
                ])->withHeaders($headers)
                    ->withBody(json_encode($body), 'application/json')
                    ->post($url);

                if ($response->successful()) {
                    return [
                        'status' => true,
                        'data' => $response->json(),
                    ];
                }


            return [
                'status' => false,
                'message' => 'bKash API error',
                'code' => $response->status(),
                'error' => $response->json(),
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Exception: ' . $e->getMessage(),
            ];
        }
    }
}

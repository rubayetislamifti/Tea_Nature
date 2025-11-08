<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        // Detect if it's a GuestOrder or User Order
        if ($this->order instanceof \App\Models\GuestOrder) {

            // 🟢 GUEST ORDER HANDLING
            $products = \App\Models\GuestOrder::where('invoice_id', $this->order->invoice_id)
                ->join('products', 'guest_orders.product_id', '=', 'products.id')
                ->select(
                    'guest_orders.*',
                    'products.name as product_name',
                    'products.price as product_price'
                )
                ->get();

            $user = (object)[
                'name' => $this->order->name,
                'email' => $this->order->email,
                'phone' => $this->order->phone,
                'address' => $this->order->address,
                'city' => $this->order->city,
                'zip' => $this->order->zip
            ];

            // Optional: shipping charges (same logic as user)
            $userDhaka = DB::table('shipping_charges')->where('roles', 'users')->where('places', 'Dhaka')->first();
            $userOut = DB::table('shipping_charges')->where('roles', 'users')->where('places', 'Outside Dhaka')->first();
            $depoShip = DB::table('shipping_charges')->where('roles', 'depo')->where('places', 'Dhaka')->first();
            $depoShipOut = DB::table('shipping_charges')->where('roles', 'depo')->where('places', 'Outside Dhaka')->first();

            return $this->view('user.emails.invoice')
                ->with([
                    'order' => $this->order,
                    'products' => $products,
                    'user' => $user,
                    'userDhaka' => $userDhaka,
                    'userOut' => $userOut,
                    'depoShip' => $depoShip,
                    'depoShipOut' => $depoShipOut,
                    'isGuest' => true,
                ]);
        } else {
            // 🟢 LOGGED-IN USER ORDER HANDLING
            $products = \App\Models\Order::where('invoice_id', $this->order->invoice_id)
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->select(
                    'orders.*',
                    'products.*',
                    'products.name as product_name',
                    'products.price as product_price',
                    'orders.price as total_price'
                )
                ->get();

            $user = \App\Models\Order::where('invoice_id', $this->order->invoice_id)
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.*', 'users.*')
                ->first();

            $userDhaka = DB::table('shipping_charges')->where('roles', 'users')->where('places', 'Dhaka')->first();
            $userOut = DB::table('shipping_charges')->where('roles', 'users')->where('places', 'Outside Dhaka')->first();
            $depoShip = DB::table('shipping_charges')->where('roles', 'depo')->where('places', 'Dhaka')->first();
            $depoShipOut = DB::table('shipping_charges')->where('roles', 'depo')->where('places', 'Outside Dhaka')->first();

            return $this->view('user.emails.invoice')
                ->with([
                    'order' => $this->order,
                    'products' => $products,
                    'user' => $user,
                    'userDhaka' => $userDhaka,
                    'userOut' => $userOut,
                    'depoShip' => $depoShip,
                    'depoShipOut' => $depoShipOut,
                    'isGuest' => false,
                ]);
        }
    }

}

@extends('user.layouts.app')

@section('content')
<!-- Page Header Start -->
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Checkout</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item"><a href="#">Cart</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <form action="{{route('payment')}}" method="POST">
            @csrf
{{--            <input type="hidden" name="id" value="{{$info->id}}">--}}
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h4 class="font-weight-semi-bold">Delivery Charge</h4>
                <p>For Dhaka <strong>
                        @if(isset($charge))
                        ৳{{$charge->price}}
                        @endif</strong>.</p>
                <p>For Outside Dhaka <strong>@if(isset($outside))
                            ৳{{$outside->price}}
                        @endif</strong>.</p>
            </div>
            <!-- Billing Details -->
            <div class="col-lg-8">
                <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" value="{{Auth::user()->name}}" placeholder="John" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="email" value="{{Auth::user()->email}}" placeholder="example@email.com" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" value="{{Auth::user()->customerInfo->phone}}" placeholder="+123 456 789" readonly>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Shipping Address</label>
                        <input class="form-control" type="text" value="{{Auth::user()->customerInfo->address}}"  name="address" placeholder="123 Street" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control" type="text" value="{{Auth::user()->customerInfo->distric}}"  name="city" placeholder="New York" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" type="text" name="zip" placeholder="123" required>
                    </div>

                </div>

            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <h4 class="font-weight-semi-bold mb-4">Order Total</h4>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach($cart as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{$item['name']}}</p>
                                <p>{{$item['total_price']}}৳</p>
                            </div>
                            @php
                                $subtotal += $item['total_price'];
                            @endphp
                        @endforeach
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>{{ $subtotal }}৳</h6>
                        </div>
                        {{-- <div class="d-flex justify-content-between"> --}}
                        {{--     <h6 class="font-weight-medium">Shipping</h6> --}}
                        {{--     <h6 class="font-weight-medium">$10</h6> --}}
                        {{-- </div> --}}
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>{{ $subtotal }}৳</h5> {{-- Assuming $10 shipping --}}
                            <input type="hidden" value="{{ $subtotal }}" name="total">
                        </div>
                    </div>
                </div>
                <div class="bg-light p-30">
                    <div class="border-bottom mb-4">
                        <h6 class="mb-3">Payment</h6>
                         <div class="form-group">
                           <div class="custom-control custom-radio">
                               <input type="radio" class="custom-control-input" name="paymentMethod" id="bkash" value="Bkash">
                               <label class="custom-control-label" for="bkash">bKash (Service Currently Off)</label>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="paymentMethod" id="cod" value="COD">
                                <label class="custom-control-label" for="cod">Cash on Delivery</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                </div>

            </div>

        </div>
        </form>
    </div>
</div>
<!-- Checkout End -->

<!-- Checkout End -->
@endsection

@extends('user.layouts.app')

@section('content')
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
            <form action="{{ route('guest.payment') }}" method="POST">
                @csrf

                @php
                    // Safe defaults
                    $chargePrice   = isset($charge)  && isset($charge->price)  ? (float)$charge->price  : 0;
                    $outsidePrice  = isset($outside) && isset($outside->price) ? (float)$outside->price : 0;

                    $subtotal = 0;
                    if (!empty($cart) && is_iterable($cart)) {
                        foreach ($cart as $item) {
                            $subtotal += (float)($item['total_price'] ?? 0);
                        }
                    }

                    // Defaults: Inside Dhaka selected, matching DB values exactly
                    $defaultArea     = old('delivery_area', 'Dhaka'); // 'Dhaka' | 'Outside Dhaka'
                    $deliveryCharge  = $defaultArea === 'Dhaka' ? $chargePrice : $outsidePrice;
                    $grandTotal      = $subtotal + $deliveryCharge;
                @endphp


                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h4 class="font-weight-semi-bold">Delivery Charge</h4>
                        <p>
                            For Dhaka
                            <strong>৳{{ number_format($chargePrice, 0) }}</strong>.
                        </p>
                        <p>
                            For Outside Dhaka
                            <strong>৳{{ number_format($outsidePrice, 0) }}</strong>.
                        </p>
                    </div>

                    <!-- Billing Details -->
                    <div class="col-lg-8">
                        <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="name" value="" placeholder="John" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="email" value="" name="email" placeholder="example@email.com" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" value="" name="phone" placeholder="+8801XXXXXXXXX" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Shipping Address</label>
                                <input class="form-control" type="text" value="" name="address" placeholder="123 Street" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" value="" name="city" placeholder="Dhaka" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" name="zip" placeholder="1230" required>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="col-lg-4">
                        <h4 class="font-weight-semi-bold mb-4">Order Total</h4>

                        <div class="bg-light p-30 mb-4">
                            <div class="border-bottom">
                                <h6 class="mb-3">Products</h6>
                                @if(!empty($cart))
                                    @foreach($cart as $item)
                                        <div class="d-flex justify-content-between">
                                            <p>{{ $item['name'] ?? 'Item' }}</p>
                                            <p>{{ (float)($item['total_price'] ?? 0) }}৳</p>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted mb-0">No items in cart.</p>
                                @endif
                            </div>

                            <div class="border-bottom pt-3 pb-2">
                                <div class="d-flex justify-content-between mb-2">
                                    <h6>Subtotal</h6>
                                    <h6 id="subtotalText">{{ number_format($subtotal, 0) }}৳</h6>
                                </div>

                                <!-- Delivery Area Selector -->
                                <div class="mb-2">
                                    <label class="form-label fw-semibold d-block">Delivery Area</label>
                                    <div class="form-check">
                                        <input class="form-check-input delivery-radio"
                                               type="radio"
                                               name="delivery_area"
                                               id="areaDhaka"
                                               value="dhaka"
                                               data-charge="{{ $chargePrice }}"
                                            @checked($defaultArea === 'Dhaka')>
                                        <label class="form-check-label" for="areaDhaka">
                                            Inside Dhaka — {{ number_format($chargePrice, 0) }}৳
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input delivery-radio"
                                               type="radio"
                                               name="delivery_area"
                                               id="areaOutside"
                                               value="outside"
                                               data-charge="{{ $outsidePrice }}"
                                            @checked($defaultArea === 'Outside Dhaka')>
                                        <label class="form-check-label" for="areaOutside">
                                            Outside Dhaka — {{ number_format($outsidePrice, 0) }}৳
                                        </label>
                                    </div>
                                </div>

                                <!-- Delivery Charge Row -->
                                <div class="d-flex justify-content-between">
                                    <h6>Delivery</h6>
                                    <h6 id="deliveryText">{{ number_format($deliveryCharge, 0) }}৳</h6>
                                </div>
                            </div>

                            <div class="pt-2">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5>Total</h5>
                                    <h5 id="grandTotalText">{{ number_format($grandTotal, 0) }}৳</h5>
                                </div>

                                <!-- Hidden inputs submitted with the form -->
                                <input type="hidden" name="subtotal" id="subtotalInput" value="{{ $subtotal }}">
                                <input type="hidden" name="delivery_charge" id="deliveryInput" value="{{ $deliveryCharge }}">
                                <input type="hidden" name="amount" id="grandTotalInput" value="{{ $grandTotal }}">
                            </div>
                        </div>

                        <div class="bg-light p-30">
                            <div class="border-bottom mb-4">
                                <h6 class="mb-3">Payment</h6>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="paymentMethod" value="pay" id="bkash">
                                        <label class="custom-control-label" for="bkash">Pay Online</label>
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



    <script>
        (function () {
            const currency = v => `${Number(v || 0).toFixed(0)}৳`;

            const subtotalInput   = document.getElementById('subtotalInput');
            const deliveryInput   = document.getElementById('deliveryInput');
            const grandTotalInput = document.getElementById('grandTotalInput');

            const deliveryText    = document.getElementById('deliveryText');
            const grandTotalText  = document.getElementById('grandTotalText');

            function ensureOneChecked() {
                const checked = document.querySelector('.delivery-radio:checked');
                if (!checked) {
                    const first = document.querySelector('.delivery-radio');
                    if (first) first.checked = true;
                }
            }

            function recalc() {
                const subtotal = Number(subtotalInput?.value || 0);
                const checked  = document.querySelector('.delivery-radio:checked');
                const charge   = Number(checked?.dataset?.charge || 0);

                deliveryText.textContent   = currency(charge);
                grandTotalText.textContent = currency(subtotal + charge);

                deliveryInput.value   = charge;
                grandTotalInput.value = subtotal + charge;
            }

            document.addEventListener('change', function (e) {
                if (e.target?.classList?.contains('delivery-radio')) {
                    recalc();
                }
            });

            ensureOneChecked();
            recalc();
        })();
    </script>

@endsection

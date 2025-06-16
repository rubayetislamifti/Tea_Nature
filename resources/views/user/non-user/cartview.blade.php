@extends('user.layouts.app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Article Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 mt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-4">Your Cart</h2>
                    <h5 class="total-cart-price" style="font-weight: bolder">Total Price: $100</h5> <!-- Moved outside the table -->
                </div>
                @if(Session::has('cart') && count(Session::get('cart')) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Session::get('cart') as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td class="total-price">{{ $item['total_price'] }}</td>

                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            @if(Auth::check())
                                <a href="{{ route('checkout') }}" class="btn btn-success checkout-btn">Checkout</a>
                            @else
                                <a href="{{ route('login', ['redirect' => 'checkout']) }}" class="btn btn-success checkout-btn">Checkout</a>
                            @endif
                        </div>
                    </div>
                @else
                    <p>Your cart is empty.</p>
                @endif

            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInputs = document.querySelectorAll('.quantity');
        const totalPrices = document.querySelectorAll('.total-price');
        const updateButtons = document.querySelectorAll('.update-btn');
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const totalCartPrice = document.querySelector('.total-cart-price');

        updateTotalCartPrice();

        updateButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                const quantity = parseInt(quantityInputs[index].value);
                const price = 10; // Replace with your actual product price
                const totalPrice = quantity * price;
                totalPrices[index].textContent = `৳৳{totalPrice}`;
                updateTotalCartPrice();
            });
        });

        function updateTotalCartPrice() {
            let total = 0;
            totalPrices.forEach(price => {
                total += parseInt(price.textContent.replace('৳', ''));
            });
            totalCartPrice.textContent = `Total Price: ৳${total}`;
        }
    });
</script>

@endsection

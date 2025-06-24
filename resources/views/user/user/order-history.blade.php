@extends('user.layouts.app')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Order History</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">My Profile</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Order History</li>
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
                    <h2 class="mb-4">Your Purchase History</h2>
                     <!-- Moved outside the table -->
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Delivery Date</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Order Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $products)
                    <tr>
                        <td>{{$products->name}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>{{$products->total_price}}</td>
                        <td>
                           {{$products->delivery_date}}
                        </td>
                        <td>
                            @if($products->payment_method == 'bKash')
                                <img src="{{asset('bkash.png')}}" width="50px" height="50px">
                            @else
                                <strong>Cash On Delivery</strong>
                            @endif
                        </td>
                        <td>{{$products->order_status}}</td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>

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
                totalPrices[index].textContent = `$${totalPrice}`;
                updateTotalCartPrice();
            });
        });

        function updateTotalCartPrice() {
            let total = 0;
            totalPrices.forEach(price => {
                total += parseInt(price.textContent.replace('$', ''));
            });
            totalCartPrice.textContent = `Total Price: $${total}`;
        }
    });
</script>



<!-- Article End -->


@endsection

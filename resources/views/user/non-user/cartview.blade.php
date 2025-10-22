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
                            <tr data-product-id="{{ $item['product_id'] }}">
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    <input type="number"
                                           value="{{ $item['quantity'] }}"
                                           min="1"
                                           class="form-control quantity-input"
                                           style="width:80px; text-align:center;">
                                </td>
                                <td class="total-price">{{ $item['total_price'] }}</td>
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST" style="display:inline;">
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
                            @if(!Auth::check())
                                <a href="{{route('guest.checkout')}}" class="btn btn-warning checkout-btn">Guest Checkout</a>
                            @endif
                        </div>
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
        const totalCartPrice = document.querySelector('.total-cart-price');

        function updateTotalCartPrice() {
            let total = 0;
            document.querySelectorAll('.total-price').forEach(price => {
                total += parseFloat(price.textContent.replace('৳', '').trim()) || 0;
            });
            if (totalCartPrice) {
                totalCartPrice.textContent = `Total Price: ৳${total.toFixed(2)}`;
            }
        }

        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function () {
                const row = this.closest('tr');
                const productId = row.dataset.productId;
                const quantity = parseInt(this.value);
                const priceCell = row.querySelector('.total-price');

                if (quantity < 1) {
                    alert('Quantity must be at least 1');
                    this.value = 1;
                    return;
                }

                // Send update request
                fetch('{{ route("cart.update") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            const updatedItem = data.updated_item;
                            priceCell.textContent = `৳${updatedItem.total_price}`;
                            updateTotalCartPrice();
                        } else {
                            alert('Error updating cart.');
                        }
                    })
                    .catch(err => console.error(err));
            });
        });

        updateTotalCartPrice();
    });
</script>


@endsection

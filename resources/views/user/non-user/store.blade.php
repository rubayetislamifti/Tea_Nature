@extends('user.layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
        style="font-family: Space Grotesk, sans-serif;">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown" style="font-family: Space Grotesk, sans-serif;">
                Tea Store</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Store</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Store Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Online Store</p>
                <h1 class="display-6">@if(isset($stText->text)) {{$stText->text}} @endif</h1>
            </div>
            <div class="row g-4">
                @foreach($product as $prods)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="store-item position-relative text-center">
                            <img class="img-fluid" src="{{asset('products/'.$prods->image)}}" alt="">
                            <!-- Discount overlay -->
                            @if(isset($prods->discount))
                                <div class="discount-overlay">
                                    <span class="discount">{{$prods->discount}}% OFF</span>
                                </div>
                            @endif
                            <div class="p-4">
                                <h4 class="mb-3">{{$prods->name}}</h4>
                                <!--<p>{!! $prods->description !!}</p>-->
                                <!-- Previous price with strikethrough -->
                                @if(isset($prods->previous_price))
                                    <div class="previous-price">
                                        <span class="text-secondary">{{$prods->previous_price}}৳</span>
                                    </div>
                                @endif
                                <!-- New price -->
                                <h4 class="text-primary" data-price="{{$prods->price}}">{{$prods->price}}৳</h4>
                            </div>
                            <div class="store-overlay">
                                <a href="{{route('single-product',['id'=>$prods->id])}}" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i
                                        class="fa fa-arrow-right ms-2"></i></a>
                                <form action="{{route('user.create-orders')}}" method="post">
                                    @csrf
                                    {{--                            <input type="hidden" name="user_id" value="{{$info->id}}">--}}
                                    <input type="hidden" name="product_id" value="{{$prods->id}}">
                                    <input type="hidden" name="role" value="non-users">
                                    <input type="hidden" id="quantity" name="quantity" class="form-control mb-4" min="1" value="1">
                                    <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2 add-to-cart-btn">Add to Cart <i
                                            class="fa fa-cart-plus ms-2"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            const form = button.closest('form');
            const productId = form.querySelector('input[name="product_id"]').value;
            const quantity = form.querySelector('input[name="quantity"]').value;
            const productName = button.closest('.store-item').querySelector('h4.mb-3').textContent;
            const price = parseFloat(button.closest('.store-item').querySelector('h4.text-primary').getAttribute('data-price'));

            gtag('event', 'add_to_cart', {
                currency: 'BDT',
                value: price * quantity,
                items: [{
                    item_id: productId,
                    item_name: productName,
                    quantity: parseInt(quantity, 10),
                    price: price,
                }]
            });
        });
    });
});
</script>


@endsection

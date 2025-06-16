@extends('user.layouts.app')

@section('content')

<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">

            @foreach($slider as $index => $slide)
                <div class="carousel-item @if($index == 0) active @endif">
                    <img class="w-100" src="{{ $slide->image ? asset('storage/'.$slide->image) : 'https://via.placeholder.com/1920x820' }}" alt="Slide Image">

                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <!--<h1 class="display-1 text-dark mb-4 animated zoomIn">{{$slide->title}}</h1>-->
                                    <!--<a href="{{route('login')}}"-->
                                    <!--   class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Buy as Customer</a>-->
                                    <!--<a href="{{route('depo-login')}}"-->
                                    <!--   class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Buy as Depo</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <!-- TrustBox widget - Review Collector -->
        <!--            <div class="trustpilot-widget" data-locale="en-US" data-template-id="56278e9abfbbba0bdcd568bc" data-businessunit-id="671dd568cbf0e4d4daab93fc" data-style-height="52px" data-style-width="100%">-->
        <!--              <a href="https://www.trustpilot.com/review/teanatureltd.com" target="_blank" rel="noopener">Trustpilot</a>-->
        <!--            </div>-->
                    <!-- End TrustBox widget -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>-->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myCarousel = document.querySelector('#header-carousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            ride: 'carousel'
        });
    });
</script>

<!-- Carousel End -->






<div class="container-fluid product py-5 my-5">
    <div class="container py-5">
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium fst-italic text-primary">Our Products</p>
            <h1 class="display-6">@if(isset($prodText->text)) {{$prodText->text}} @endif</h1>
        </div>

        <div class="owl-carousel product-carousel wow" data-wow-delay="0.5s">
            @foreach($category as $catas)
            <a href="{{route('store')}}" class="d-block product-item rounded">
                <img src="{{asset('category/'.$catas->image)}}" alt="{{$catas->name}}">
                <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                    <h4 class="text-primary">{{$catas->name}}</h4>
{{--                    <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum</span>--}}
                </div>
            </a>
           @endforeach
        </div>

    </div>
</div>
<!-- Products End -->





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
                    <img class="img-fluid" src="{{asset('products/'.$prods->image)}}" alt="{{$prods->name}}">
                    <!-- Discount overlay -->
                    @if (isset($prods->discount))
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
                        <form action="{{route('create-orders')}}" method="post">
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



            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{route('store')}}" class="btn btn-primary rounded-pill py-3 px-5">View More Products</a>
            </div>
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

            // Send event to Google Analytics
            gtag('event', 'add_to_cart', {
                currency: 'BDT', // Change to your currency
                value: price * quantity, // Total value based on quantity
                items: [{
                    item_id: productId,
                    item_name: productName,
                    quantity: parseInt(quantity, 10),
                    price: price,
                }]
            });

            //  alert('Add to Cart event sent to Google Analytics: ' + JSON.stringify({
            //     currency: 'BDT',
            //     value: price * quantity,
            //     items: [{
            //         item_id: productId,
            //         item_name: productName,
            //         quantity: parseInt(quantity, 10),
            //         price: price,
            //     }]
            // }));
        });
    });
});
</script>
<!-- Store End -->





@endsection

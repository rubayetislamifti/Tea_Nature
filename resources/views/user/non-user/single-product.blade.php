@extends('user.layouts.app')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Product</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Product</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">{{$products->name}}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Article Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <!-- Image with discount overlay -->
                <div class="position-relative">
                    <img class="img-fluid" src="{{asset('products/'. $products->image)}}" alt="{{$products->name}}">
                    <!-- Discount overlay -->
                    @if(isset($products->discount))
                        <div class="discount-overlay">
                            <span class="discount">{{$products->discount}}% OFF</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="section-title">
                    <p class="fs-5 fw-medium fst-italic text-primary">Featured Product</p>
                    <h1 class="display-6">{{$products->name}}</h1>
                </div>
                <p class="mb-4">{!! $products->description !!}</p>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1996841609387194"
                         crossorigin="anonymous"></script>
                    <ins class="adsbygoogle"
                         style="display:block; text-align:center;"
                         data-ad-layout="in-article"
                         data-ad-format="fluid"
                         data-ad-client="ca-pub-1996841609387194"
                         data-ad-slot="2823093208"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                <!-- Prices -->
                <div class="prices">
                    @if(Auth::user()->roles =='users')
                        @if(isset($products->previous_price))
                            <span class="previous-price">{{$products->previous_price}}৳</span>
                        @endif<!-- Previous price with strikethrough -->
                        <span class="new-price">{{$products->price}}৳</span> <!-- New price -->
                    @else
                        <p class="mb-4">Quantity Per Carton: <strong>{{$products->cartoonqty}} pcs</strong>
                        </p>
                        <!-- Previous price with strikethrough -->
                        <span class="new-price">Per Carton: {{$products->cartoonprice}}৳</span> <!-- New price -->
                    @endif

                </div>

                <!-- Notice for Bulk Buyers -->
                @if(!Auth::check())
                    <p class="text-warning mb-2">Note: This is for individual users only. If you want to buy in bulk, please open an account.</p>
                @endif
                <form action="{{route('user.create-orders')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$products->id}}">
                    <input type="hidden" name="role" value="non-users">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control mb-4" min="1" value="1">
                    <button type="submit" class="btn btn-primary rounded-pill py-3 px-5">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

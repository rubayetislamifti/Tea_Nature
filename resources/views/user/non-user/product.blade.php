@extends('user.layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s"
        style="font-family: Space Grotesk, sans-serif;">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Products Start -->
    <div class="container-fluid product py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Our Products</p>
                <h1 class="display-6">@if(isset($prodText->text)) {{$prodText->text}} @endif</h1>
            </div>

                <div class="owl-carousel product-carousel wow " data-wow-delay="0.5s">
                     @foreach($category as $cata)
                    <a href="" class="d-block product-item rounded">
                        <img src="{{asset('category/'.$cata->image)}}" alt="{{$cata->name}}">
                        <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                            <h4 class="text-primary">{{$cata->name}}</h4>
                        </div>
                    </a>
                    @endforeach
                </div>

        </div>
    </div>


@endsection

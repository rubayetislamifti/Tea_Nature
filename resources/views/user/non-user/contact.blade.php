@extends('user.layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
                <h1 class="display-6">If You Have Any Query, Please Contact Us</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="btn-square mx-auto mb-3">
                        <i class="fa fa-envelope fa-2x text-white"></i>
                    </div>
                    <p class="mb-2">@if(isset($contact->femail)) {{$contact->femail}} @endif</p>
                    <p class="mb-0">@if(isset($contact->semail)) {{$contact->semail}} @endif</p>
                </div>
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="btn-square mx-auto mb-3">
                        <i class="fa fa-phone fa-2x text-white"></i>
                    </div>
                    <p class="mb-2">@if(isset($contact->fphone)) {{$contact->fphone}} @endif</p>
                    <p class="mb-0">@if(isset($contact->sphone)) {{$contact->sphone}} @endif</p>
                </div>
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                    <div class="btn-square mx-auto mb-3">
                        <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                    </div>
                    <p class="mb-2">@if(isset($contact->address)) {{$contact->address}} @endif</p>

                </div>
            </div>

                    <div class="h-100">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.977420406674!2d90.40045747442365!3d23.748184588863168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b97b36ccd493%3A0xc125ea60ae42c644!2sUrban%20Stream!5e0!3m2!1sen!2sbd!4v1730092991380!5m2!1sen!2sbd" width="1150" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <!-- Contact End -->


    @endsection

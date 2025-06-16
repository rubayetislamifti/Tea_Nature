@extends('user.layouts.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Testimonial</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Testimonial</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Testimonial</p>
                <h1 class="display-6">What our clients say about our tea</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.5s">
                @foreach($testimonials as $testi)
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">{{$testi->description}}</p>
                    <div class="d-flex align-items-center justify-content-center">

                        <div class="text-start ms-3">
                            <h5>{{$testi->title}}</h5>
                            <span class="text-primary">{{$testi->profession}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1996841609387194"-->
        <!--     crossorigin="anonymous"></script>-->
        <!--<ins class="adsbygoogle"-->
        <!--     style="display:block"-->
        <!--     data-ad-format="autorelaxed"-->
        <!--     data-ad-client="ca-pub-1996841609387194"-->
        <!--     data-ad-slot="8223190746"></ins>-->
        <!--<script>-->
        <!--     (adsbygoogle = window.adsbygoogle || []).push({});-->
        <!--</script>-->
    </div>
    <!--<amp-auto-ads type="adsense"-->
    <!--    data-ad-client="ca-pub-1996841609387194">-->
    <!--</amp-auto-ads>-->
    <!-- Testimonial End -->




@endsection

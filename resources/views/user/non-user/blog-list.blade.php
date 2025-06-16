@extends('user.layouts.app')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Our Blogs</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Blogs</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Article Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="blog-item bg-light rounded overflow-hidden">
{{--                        <div class="blog-img position-relative overflow-hidden">--}}
{{--                            <img class="img-fluid" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">--}}
{{--                            <a href="{{ route('blogs.show', $blog->id) }}" class="position-absolute top-0 start-0 bg-primary text-white rounded-end m-4 py-2 px-4">{{ $blog->category }}</a>--}}
{{--                        </div>--}}
                        <div class="p-4">
                            <h4 class="mb-3">{{ $blog->title }}</h4>
{{--                            <p>{!! Str::limit($blog->slug, 150) !!}</p>--}}
                            <a href="{{route('blog',['id'=>$blog->id])}}" class="text-uppercase">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <img class="rounded-circle me-2" src="{{ asset('storage/' . $blog->author->avatar) }}" width="40" height="40" alt="{{ $blog->author->name }}">--}}
{{--                                <small>{{ $blog->author->name }}</small>--}}
{{--                            </div>--}}
                            <div class="d-flex align-items-center">
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Article End -->

@endsection

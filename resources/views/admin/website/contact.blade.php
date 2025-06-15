@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Pages</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Category System</h4>

                            <!-- Flash Messages -->
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('contact_upload') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="@if(isset($marquee->id)) {{$marquee->id}} @endif">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Contact</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input id="number" class="form-control" name="fphone" value="@if(isset($marquee->fphone)) {{$marquee->fphone}} @endif" type="text" placeholder="Enter contact number">
                                        </div>
                                        <div class="col-lg-6">
                                            <input id="number" class="form-control" name="sphone" value="@if(isset($marquee->sphone)) {{$marquee->sphone}} @endif" type="text" placeholder="Enter secondary contact number">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Email</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input id="email" class="form-control" name="femail" value="@if(isset($marquee->femail)) {{$marquee->femail}} @endif" type="email" placeholder="Enter contact email">
                                        </div>
                                        <div class="col-lg-6">
                                            <input id="email" class="form-control" name="semail" value="@if(isset($marquee->semail)) {{$marquee->semail}} @endif" type="email" placeholder="Enter secondary contact email">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Address</label>
                                    <input id="name" class="form-control" name="address" value="@if(isset($marquee->address)) {{$marquee->address}} @endif" type="text" placeholder="Enter address">
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor' ),{
                        ckfinder:{
                            uploadUrl: '{{route('ckeditior.upload').'?_token='.csrf_token()}}'
                        }
                    } )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
        </div>
    </div>

@endsection

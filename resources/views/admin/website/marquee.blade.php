@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Marquee Texts</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Category System</h4>
                            <form action="{{ route('insertMarquee') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="@if(isset($marquee->id)){{$marquee->id}} @endif" name="id">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Marquee Text</label>
                                    <input id="name" class="form-control" name="name" value="@if(isset($marquee->text)){{$marquee->text}} @endif" type="text" oninput="updateMarquee()">
                                </div>
                                <div class="mb-3">
                                    <label for="color" class="form-label">Marquee Color</label>
                                    <input id="color" class="form-control" name="color" type="color" value="@if(isset($marquee->color)){{$marquee->color}}@else#000000 @endif" oninput="updateMarquee()">
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                            <div class="mt-4">
                                <marquee id="previewMarquee" style="color: @if(isset($marquee->color)){{$marquee->color}} @endif;">@if(isset($marquee->text)){{$marquee->text}} @endif</marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function updateMarquee() {
                    var inputText = document.getElementById('name').value;
                    var inputColor = document.getElementById('color').value;
                    var marquee = document.getElementById('previewMarquee');
                    marquee.textContent = inputText ? inputText : 'Your marquee text looks like this';
                    marquee.style.color = inputColor;
                }
            </script>
        </div>
    </div>

@endsection

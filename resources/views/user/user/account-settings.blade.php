@extends('user.layouts.app')


@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">My Profile</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">My Profile</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Account Settings</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Article Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- User Information Form -->
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        User Information
                    </div>
                    <div class="card-body">
                        <!-- User Information Form -->
                        <form action="{{route('user.data')}}" method="POST" enctype="multipart/form-data">
                            @csrf
{{--                            <input type="hidden" name="id" value="{{Auth::user()->id}}" />--}}
                            <!-- Name Input -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                            </div>
                            @if(Auth::user()->roles == 'depo')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Owner Name:</label>
                                    <input type="text" class="form-control" id="name" name="ownername" value="{{Auth::user()->depoInfo->owner_name}}">
                                </div>
                            @endif
                            <!-- Email Input -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                            </div>
                            <!-- Phone Input -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="@if(Auth::user()->roles == 'users') {{Auth::user()->customerInfo->phone}} @else 0{{Auth::user()->depoInfo->mobile}} @endif">
                            </div>
                            <!-- Address Input -->
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" value="@if(Auth::user()->roles == 'users') {{Auth::user()->customerInfo->address}} @else {{Auth::user()->depoInfo->address}} @endif">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">City:</label>
                                <input type="text" class="form-control" id="address" name="city" value="@if(Auth::user()->roles == 'users') {{Auth::user()->customerInfo->distric}} @else {{Auth::user()->depoInfo->city}} @endif">
                            </div>
                            <!-- Profile Picture Upload -->
                            <div class="mb-3">
                                <label for="profile_picture" class="form-label">Profile Picture:</label>
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                            </div>
                            <!-- Save and Back Buttons -->
                            <div class="row">
                                <div class="col-md-6 offset-md-6">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Profile Picture -->
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        Profile Picture
                    </div>
                    <div class="card-body text-center">
                        @if(Auth::user()->roles == 'users')
                            <img src="{{asset('user_pic/'.Auth::user()->customerInfo->image)}}" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 300px;" />
                        @else
                            <img src="{{asset('depo_pic/'.Auth::user()->depoInfo->pic)}}" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 300px;" />
                        @endif<!-- Display profile picture or initials -->
                        <div id="profile-display">
                            <!-- JavaScript will populate this div -->
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Check if profile picture is set
                    {{--var profilePic = "{{ $profilePic }}"; // Replace "{{ $profilePic }}" with your server-side variable--}}

                    // If profile picture is set, display it
                    if (profilePic) {
                        document.getElementById('profile-display').innerHTML = '<img src="' + profilePic + '" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 200px;">';
                    } else {
                        // If profile picture is not set, display first name and last name initials
                        var firstName = "John"; // Replace with the actual first name
                        var lastName = "Doe"; // Replace with the actual last name
                        var initials = firstName.charAt(0).toUpperCase() + lastName.charAt(0).toUpperCase();
                        document.getElementById('profile-display').innerHTML = '<div style="font-size: 48px;">' + initials + '</div>';
                    }
                });
            </script>
            <div class="row">
                <div class="col-md-8 md-6">
                    <div class="text-end">
                        <a href="{{ route('user.profile') }}" class="btn btn-secondary me-2">Back</a>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

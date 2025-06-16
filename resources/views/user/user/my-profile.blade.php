@extends('user.layouts.app')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">My Profile</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
{{--                <li class="breadcrumb-item"><a href="#">My Profile</a></li>--}}
                <li class="breadcrumb-item text-dark" aria-current="page">My Profile</li>
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
                <!-- User Information -->
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        User Information
                    </div>
                    <div class="card-body">
                        <!-- Display user information here -->
                        <div class="mb-3">
                            <strong>Name:</strong> {{Auth::user()->name}}
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong> {{Auth::user()->email}}
                        </div>
                        <div class="mb-3">
                            <strong>Phone:</strong> {{Auth::user()->phone}}
                        </div>
                        <div class="mb-3">
                            <strong>Address:</strong> {{Auth::user()->address}}, {{Auth::user()->distric}}
                        </div>
                        <!-- Add more user information as needed -->
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
                        @if(isset(Auth::user()->image))
                            <img src="{{asset('storage/'.$info->image)}}" alt="Profile Picture" class="img-fluid rounded-circle" style="max-width: 300px;" />

                            <!-- Display profile picture or initials -->
                        @else
                            <div id="profile-display">
                                <!-- JavaScript will populate this div -->

                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Check if profile picture is set
                    {{--var profilePic = "{{ $profilePic }}"; // Replace "{{ $profilePic }}" with your server-side variable--}}

                    // If profile picture is set, display it

                        // If profile picture is not set, display first name and last name initials
                        var firstName = "{{Auth::user()->name}}"; // Replace with the actual first name
                        // Replace with the actual last name
                        var initials = firstName.charAt(0).toUpperCase();
                        document.getElementById('profile-display').innerHTML = '<div style="font-size: 48px;">' + initials + '</div>';

                });
            </script>
            <!-- Edit Button (outside user info and profile pic) -->
            <div class="col-12 text-center">
                <a href="{{route('user.account_settings')}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>









<!-- Article End -->


@endsection

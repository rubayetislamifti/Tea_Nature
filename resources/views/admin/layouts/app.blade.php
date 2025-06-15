<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
          content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>{{config('app.name')}} Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{asset('admin/assets/vendors/core/core.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flatpickr/flatpickr.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/css/demo3/style.css')}}">

    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- End fonts -->

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/core/core.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/dropzone/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/dropify/dist/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/pickr/themes/classic.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flatpickr/flatpickr.min.css')}}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo3/style.css')}}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
</head>

<body>
<div class="main-wrapper">

    <div class="horizontal-menu">
        <nav class="navbar top-navbar">
            <div class="container">
                <div class="navbar-content">
                    <a href="#" class="navbar-brand">
                        Tea Nature <span> Admin</span>
                    </a>

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span
                                    class="ms-1 me-1 d-none d-md-inline-block">English</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us"
                                                                                     id="us"></i> <span class="ms-1"> English </span></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(isset($admins))
                                    <img class="wd-30 ht-30 rounded-circle" src="{{asset('admins/'.$admins->image)}}" alt="{{$admins->name}}">
                                @elseif(isset($user))
                                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                @endif
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        @if(isset($admins))
                                            <img class="wd-80 ht-80 rounded-circle" src="{{asset('admins/'.$admins->image)}}" alt="{{$admins->name}}">
                                        @elseif(isset($user))
                                            <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">
                                            @if(isset($admins))
                                                {{$admins->name}}
                                            @elseif(isset($user))
                                                Demo Account
                                            @endif</p>
                                        <p class="tx-12 text-muted">@if(isset($admins))
                                                {{$admins->email}}
                                            @elseif(isset($user))
                                                rubayetislam16@gmail.com
                                            @endif</p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">
                                        @if(isset($admins))
                                            <a href="{{route('profile',['id'=>$admins->id])}}" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        @else
                                            <a href="{{route('profile',['id'=>$id])}}" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        @endif
                                    </li>
                                    <li class="dropdown-item py-2">
                                        @if(isset($admins))
                                            <a href="{{ route('profile', ['id' => $admins->id]) }}" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                        @elseif(isset($user))
                                            <a href="{{ route('profile', ['id' => $user->id]) }}" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                        @endif

                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="https://www.teanatureltd.com/" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="repeat"></i>
                                            <span>Switch User</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="{{route('logout')}}" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                        <i data-feather="menu"></i>
                    </button>
                </div>
            </div>
        </nav>
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
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


    @if(isset($admins))
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcomePage', ['id' => $admins]) }}">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="menu-title">Products</span>
                                <i class="link-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="category-heading">Category Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('addCategory', ['id' => $admins]) }}">Add Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('displayCategory', ['id' => $admins]) }}">Display Category</a></li>
                                    <li class="category-heading">Products Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('addProduct', ['id' => $admins]) }}">Add Products</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('displayProduct', ['id' => $admins]) }}">Display Products</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="user"></i>
                                <span class="menu-title">Customer & Depo Section</span>
                                <i class="link-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="category-heading">Customer Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('customerInfo', ['id' => $admins]) }}">Customer Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('customerOrders', ['id' => $admins]) }}">Customer Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('deliveryTracking', ['id' => $admins]) }}">Customer Delivery Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('customerShippingCharges', ['id' => $admins]) }}">Customer Shipping Price</a></li>
                                    <li class="category-heading">Depo Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoInfo', ['id' => $admins]) }}">Depo Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoOrders', ['id' => $admins]) }}">Depo Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoTracking', ['id' => $admins]) }}">Depo Delivery Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoShippingCharges', ['id' => $admins]) }}">Depo Shipping Price</a></li>
                                </ul>
                            </div>
                        </li>
                        @if($admins->permission == 'Superadmin')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="link-icon" data-feather="inbox"></i>
                                    <span class="menu-title">Sales</span>
                                    <i class="link-arrow"></i>
                                </a>
                                <div class="submenu">
                                    <ul class="submenu-item">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('dailySales', ['id' => $admins]) }}">Daily Sales Tracking</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('monthlySales', ['id' => $admins]) }}">Monthly Sales Tracking</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('yearlySales', ['id' => $admins]) }}">Yearly Sales Tracking</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="link-icon" data-feather="smile"></i>
                                    <span class="menu-title">Admin Control</span>
                                    <i class="link-arrow"></i>
                                </a>
                                <div class="submenu">
                                    <ul class="submenu-item">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('displayAdmin', ['id' => $admins->id]) }}">Admins</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('displayPermission', ['id' => $admins]) }}">Permission</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item mega-menu">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="book"></i>
                                <span class="menu-title">Website Pages</span>
                                <i class="link-arrow"></i>
                            </a>
                            <div class="submenu">
                                <div class="col-group-wrapper row">
                                    <div class="col-group col-md-4">
                                        <p class="category-heading">Home Page</p>
                                        <ul>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('marquee', ['id' => $admins]) }}">Marquee Text</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('img_slider', ['id' => $admins]) }}">Image Slider</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-group col-md-4">
                                        <p class="category-heading">Products & Store</p>
                                        <ul>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('product_page', ['id' => $admins]) }}">Products Page</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('store_page', ['id' => $admins]) }}">Store Page</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-group col-md-4">
                                        <p class="category-heading">Explore Pages</p>
                                        <div class="submenu-item">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('about_us',['id'=>$admins])}}">About</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('testimonial',['id'=>$admins])}}">Testimonial</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('privacy_policy',['id'=>$admins])}}">Privacy and Policy</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('blogs',['id'=>$admins])}}">Blogs</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('contact_page',['id'=>$admins])}}">Contact</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>

        @else
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcomePage', ['id' => $id]) }}">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="menu-title">Products</span>
                                <i class="link-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="category-heading">Category Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('addCategory', ['id' => $id]) }}">Add Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('displayCategory', ['id' => $id]) }}">Display Category</a></li>
                                    <li class="category-heading">Products Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('addProduct', ['id' => $id]) }}">Add Products</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('displayProduct', ['id' => $id]) }}">Display Products</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="user"></i>
                                <span class="menu-title">Customer & Depo Section</span>
                                <i class="link-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="category-heading">Customer Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('customerInfo', ['id' => $id]) }}">Customer Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('customerOrders', ['id' => $id]) }}">Customer Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('deliveryTracking', ['id' => $id]) }}">Customer Delivery Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('customerShippingCharges', ['id' => $id]) }}">Customer Shipping Price</a></li>
                                    <li class="category-heading">Depo Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoInfo', ['id' => $id]) }}">Depo Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoOrders', ['id' => $id]) }}">Depo Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoTracking', ['id' => $id]) }}">Depo Delivery Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoShippingCharges', ['id' => $id]) }}">Depo Shipping Price</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="inbox"></i>
                                <span class="menu-title">Sales</span>
                                <i class="link-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('dailySales', ['id' => $id]) }}">Daily Sales Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('monthlySales', ['id' => $id]) }}">Monthly Sales Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('yearlySales', ['id' => $id]) }}">Yearly Sales Tracking</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="smile"></i>
                                <span class="menu-title">Admin Control</span>
                                <i class="link-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('displayAdmin', ['id' => $id]) }}">Admins</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('displayPermission', ['id' => $id]) }}">Permission</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mega-menu">
                            <a href="#" class="nav-link">
                                <i class="link-icon" data-feather="book"></i>
                                <span class="menu-title">Website Pages</span>
                                <i class="link-arrow"></i>
                            </a>
                            <div class="submenu">
                                <div class="col-group-wrapper row">
                                    <div class="col-group col-md-2">
                                        <p class="category-heading">Home Page</p>
                                        <div class="submenu-item">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('marquee',['id'=>$id])}}">Marquee Text</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-group col-md-4">
                                        <p class="category-heading">Explore Pages</p>
                                        <div class="submenu-item">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('img_slider',['id'=>$id])}}">Photo Slider</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        @endif
    </div>

    @yield('content')

    <footer class="footer border-top">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between py-3 small">
            <p class="text-muted mb-1 mb-md-0">Copyright © 2023 <a href="https://www.teanature.com" target="_blank">TeanaturE</a>.</p>
            <p class="text-muted mb-1 mb-md-0">Developed By <a href="https://www.trodev.com" target="_blank">Trodev</a>.</p>
            <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart">Trodev</i></p>
        </div>
    </footer>

</div>

<script src="{{asset('admin/assets/vendors/core/core.js')}}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{asset('admin/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{asset('admin/assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/assets/js/template.js')}}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{asset('../assets/js/dashboard-light.js')}}"></script>
<!-- End custom js for this page -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get data attributes from the chart container
        var chartContainer = document.getElementById('customersCharts');
        var daily = parseFloat(chartContainer.getAttribute('data-daily'));
        var percentageChange = parseFloat(chartContainer.getAttribute('data-percentage-change'));

        // Calculate previous day's value (for demo purposes)
        var previousDayValue = daily / (1 + (percentageChange / 100));

        // Chart.js configuration
        var ctx = chartContainer.getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Previous Day', 'Current Day'],
                datasets: [{
                    label: 'Daily Price',
                    data: [previousDayValue, daily],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)', // Previous Day
                        'rgba(54, 162, 235, 0.2)'   // Current Day
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<!-- core:js -->
<script src="{{asset('admin/assets/vendors/core/core.js')}}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{asset('admin/assets/vendors/jquery-validation/jquery.validate.min.js"')}}></script>
<script src="{{asset('admin/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/dropzone/dropzone.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/dropify/dist/dropify.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/pickr/pickr.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{asset('admin/assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/assets/js/template.js')}}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{asset('admin/assets/js/form-validation.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('admin/assets/js/inputmask.js')}}"></script>
<script src="{{asset('admin/assets/js/select2.js')}}"></script>
<script src="{{asset('admin/assets/js/typeahead.js')}}"></script>
<script src="{{asset('admin/assets/js/tags-input.js')}}"></script>
<script src="{{asset('admin/assets/js/dropzone.js')}}"></script>
<script src="{{asset('admin/assets/js/dropify.js')}}"></script>
<script src="{{asset('admin/assets/js/pickr.js')}}"></script>
<script src="{{asset('admin/assets/js/flatpickr.js')}}"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#exampleInputTextarea1'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>

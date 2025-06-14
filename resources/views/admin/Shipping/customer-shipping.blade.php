<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Customer Shipping</title>

    <!-- Fonts -->
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
    <link rel="stylesheet" href="../../../assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/dropzone/dropzone.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/dropify/dist/dropify.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/pickr/themes/classic.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/flatpickr/flatpickr.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="../../../assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../assets/css/demo3/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
</head>
<body>
<div class="main-wrapper">

    <!-- partial:../../partials/_navbar.html -->
    <div class="horizontal-menu">
        <nav class="navbar top-navbar">
            <div class="container">
                <div class="navbar-content">
                    <a href="#" class="navbar-brand">
                        TeaNature<span>Admin</span>
                    </a>
{{--                    <form class="search-form">--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="input-group-text">--}}
{{--                                <i data-feather="search"></i>--}}
{{--                            </div>--}}
{{--                            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">--}}
{{--                        </div>--}}
{{--                    </form>--}}
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">English</span>
                            </a>
                        </li>
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i data-feather="grid"></i>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">--}}
{{--                                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">--}}
{{--                                    <p class="mb-0 fw-bold">Web Apps</p>--}}
{{--                                    <a href="javascript:;" class="text-muted">Edit</a>--}}
{{--                                </div>--}}
{{--                                <div class="row g-0 p-1">--}}
{{--                                    <div class="col-3 text-center">--}}
{{--                                        <a href="../../pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-3 text-center">--}}
{{--                                        <a href="../../pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-3 text-center">--}}
{{--                                        <a href="../../pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-3 text-center">--}}
{{--                                        <a href="../../pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">--}}
{{--                                    <a href="javascript:;">View all</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i data-feather="mail"></i>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">--}}
{{--                                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">--}}
{{--                                    <p>9 New Messages</p>--}}
{{--                                    <a href="javascript:;" class="text-muted">Clear all</a>--}}
{{--                                </div>--}}
{{--                                <div class="p-1">--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="me-3">--}}
{{--                                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                                            <div class="me-4">--}}
{{--                                                <p>Leonardo Payne</p>--}}
{{--                                                <p class="tx-12 text-muted">Project status</p>--}}
{{--                                            </div>--}}
{{--                                            <p class="tx-12 text-muted">2 min ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="me-3">--}}
{{--                                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                                            <div class="me-4">--}}
{{--                                                <p>Carl Henson</p>--}}
{{--                                                <p class="tx-12 text-muted">Client meeting</p>--}}
{{--                                            </div>--}}
{{--                                            <p class="tx-12 text-muted">30 min ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="me-3">--}}
{{--                                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                                            <div class="me-4">--}}
{{--                                                <p>Jensen Combs</p>--}}
{{--                                                <p class="tx-12 text-muted">Project updates</p>--}}
{{--                                            </div>--}}
{{--                                            <p class="tx-12 text-muted">1 hrs ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="me-3">--}}
{{--                                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                                            <div class="me-4">--}}
{{--                                                <p>Amiah Burton</p>--}}
{{--                                                <p class="tx-12 text-muted">Project deatline</p>--}}
{{--                                            </div>--}}
{{--                                            <p class="tx-12 text-muted">2 hrs ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="me-3">--}}
{{--                                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                                            <div class="me-4">--}}
{{--                                                <p>Yaretzi Mayo</p>--}}
{{--                                                <p class="tx-12 text-muted">New record</p>--}}
{{--                                            </div>--}}
{{--                                            <p class="tx-12 text-muted">5 hrs ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">--}}
{{--                                    <a href="javascript:;">View all</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i data-feather="bell"></i>--}}
{{--                                <div class="indicator">--}}
{{--                                    <div class="circle"></div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">--}}
{{--                                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">--}}
{{--                                    <p>6 New Notifications</p>--}}
{{--                                    <a href="javascript:;" class="text-muted">Clear all</a>--}}
{{--                                </div>--}}
{{--                                <div class="p-1">--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                                            <i class="icon-sm text-white" data-feather="gift"></i>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1 me-2">--}}
{{--                                            <p>New Order Recieved</p>--}}
{{--                                            <p class="tx-12 text-muted">30 min ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                                            <i class="icon-sm text-white" data-feather="alert-circle"></i>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1 me-2">--}}
{{--                                            <p>Server Limit Reached!</p>--}}
{{--                                            <p class="tx-12 text-muted">1 hrs ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1 me-2">--}}
{{--                                            <p>New customer registered</p>--}}
{{--                                            <p class="tx-12 text-muted">2 sec ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                                            <i class="icon-sm text-white" data-feather="layers"></i>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1 me-2">--}}
{{--                                            <p>Apps are ready for update</p>--}}
{{--                                            <p class="tx-12 text-muted">5 hrs ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                                            <i class="icon-sm text-white" data-feather="download"></i>--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-grow-1 me-2">--}}
{{--                                            <p>Download completed</p>--}}
{{--                                            <p class="tx-12 text-muted">6 hrs ago</p>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">--}}
{{--                                    <a href="javascript:;">View all</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($admin)
                                    <img class="wd-30 ht-30 rounded-circle" src="{{asset('admins/'.$admin->image)}}" alt="{{$admin->name}}">
                                @else
                                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                @endif
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        @if($admin)
                                            <img class="wd-80 ht-80 rounded-circle" src="{{asset('admins/'.$admin->image)}}" alt="{{$admin->name}}">
                                        @else
                                            <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">
                                            @if($admin)
                                                {{$admin->name}}
                                            @else
                                                Demo Account
                                            @endif</p>
                                        <p class="tx-12 text-muted">@if($admin)
                                                {{$admin->email}}
                                            @else
                                                rubayetislam16@gmail.com
                                            @endif</p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">
                                        @if($admin)
                                            <a href="{{route('profile',['id'=>$admin->id])}}" class="text-body ms-0">
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
                                        <a href="{{route('profile',['id'=>$admin->id])}}" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="edit"></i>
                                            <span>Edit Profile</span>
                                        </a>
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
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                        <i data-feather="menu"></i>
                    </button>
                </div>
            </div>
        </nav>
        @if($admin)
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcomePage', ['id' => $admin]) }}">
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
                                    <li class="nav-item"><a class="nav-link" href="{{ route('addCategory', ['id' => $admin]) }}">Add Category</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('displayCategory', ['id' => $admin]) }}">Display Category</a></li>
                                    <li class="category-heading">Products Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('addProduct', ['id' => $admin]) }}">Add Products</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('displayProduct', ['id' => $admin]) }}">Display Products</a></li>
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
                                    <li class="nav-item"><a class="nav-link" href="{{ route('customerInfo', ['id' => $admin]) }}">Customer Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('customerOrders', ['id' => $admin]) }}">Customer Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('deliveryTracking', ['id' => $admin]) }}">Customer Delivery Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('customerShippingCharges', ['id' => $admin]) }}">Customer Shipping Price</a></li>
                                    <li class="category-heading">Depo Section</li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoInfo', ['id' => $admin]) }}">Depo Information</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoOrders', ['id' => $admin]) }}">Depo Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoTracking', ['id' => $admin]) }}">Depo Delivery Tracking</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('depoShippingCharges', ['id' => $admin]) }}">Depo Shipping Price</a></li>
                                </ul>
                            </div>
                        </li>
                        @if($admin->permission == 'Superadmin')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="link-icon" data-feather="inbox"></i>
                                    <span class="menu-title">Sales</span>
                                    <i class="link-arrow"></i>
                                </a>
                                <div class="submenu">
                                    <ul class="submenu-item">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('dailySales', ['id' => $admin]) }}">Daily Sales Tracking</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('monthlySales', ['id' => $admin]) }}">Monthly Sales Tracking</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('yearlySales', ['id' => $admin]) }}">Yearly Sales Tracking</a></li>
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
                                        <li class="nav-item"><a class="nav-link" href="{{ route('displayAdmin', ['id' => $admin]) }}">Admins</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('displayPermission', ['id' => $admin]) }}">Permission</a></li>
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
                                                <a class="nav-link" href="{{ route('marquee', ['id' => $admin]) }}">Marquee Text</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('img_slider', ['id' => $admin]) }}">Image Slider</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-group col-md-4">
                                        <p class="category-heading">Products & Store</p>
                                        <ul>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('product_page', ['id' => $admin]) }}">Products Page</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('store_page', ['id' => $admin]) }}">Store Page</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-group col-md-4">
                                        <p class="category-heading">Explore Pages</p>
                                        <div class="submenu-item">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('about_us',['id'=>$admin])}}">About</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('testimonial',['id'=>$admin])}}">Testimonial</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('privacy_policy',['id'=>$admin])}}">Privacy and Policy</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('blogs',['id'=>$admin])}}">Blogs</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="{{route('contact_page',['id'=>$admin])}}">Contact</a></li>
                                                        {{--                                                    <li class="nav-item"><a class="nav-link" href="pages/general/invoice.html">Privacy and Policy</a></li>--}}
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
                                        <p class="category-heading">Home</p>
                                        <div class="submenu-item">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="pages/general/blank-page.html">Home page</a></li>
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
                                                        <li class="nav-item"><a class="nav-link" href="pages/general/blank-page.html">Feature</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="pages/general/faq.html">About</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="pages/general/invoice.html">Article</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="pages/general/profile.html">Contact</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="pages/general/pricing.html">Testimonial</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">Auth Pages</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item"><a class="nav-link" href="pages/auth/login.html">Login</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/auth/register.html">Register</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">Error Pages</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item"><a class="nav-link" href="pages/error/404.html">404</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/error/500.html">500</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                                <i class="link-icon" data-feather="hash"></i>
                                <span class="menu-title">Documentation</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        @endif
    </div>
    <!-- partial -->
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer Shipping Charges</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0">Charges List</h4>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#discountModal">Add Charges</a>
                            </div>

                            <!-- Discount Modal -->
                            <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="discountModalLabel">Add Charges</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('createShippingCharges')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="role" value="users">
                                                <div class="form-group">
                                                    <label for="category">Places</label>
                                                    <select class="form-control" id="category" name="category_id" onchange="updatePrice()">
                                                        <option>Select Places</option>
                                                        <option value="Dhaka">Dhaka</option>
                                                        <option value="Outside Dhaka">Outside Dhaka</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="price">Charges</label>
                                                    <input type="number" class="form-control" id="price" name="previous_price" value="">
                                                </div>



                                                <script>
                                                    function updatePrice() {
                                                        var select = document.getElementById('category');
                                                        var selectedOption = select.options[select.selectedIndex];
                                                        var price = selectedOption.getAttribute('data-price');
                                                        document.getElementById('price').value = price ? price : '';
                                                        calculateNewPrice();
                                                    }

                                                    function calculateNewPrice() {
                                                        var price = parseFloat(document.getElementById('price').value);
                                                        var discount = parseFloat(document.getElementById('discount').value);
                                                        if (!isNaN(price) && !isNaN(discount)) {
                                                            var newPrice = price - (price * (discount / 100));
                                                            document.getElementById('new-price').value = newPrice.toFixed(2);
                                                        } else {
                                                            document.getElementById('new-price').value = '';
                                                        }
                                                    }
                                                </script>

                                                <button type="submit" class="btn btn-primary">Apply</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>Places</th>
                                        <th>Shipping Charges</th>
                                        <th>Update</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($category as $cata)

                                        <tr>
                                            <td>{{$cata->places}}</td>
                                            <td>{{$cata->price}}</td>

                                            <td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{$cata->id}}">Update</a></td>


                                        </tr>
                                        <!-- Update Modal -->

                                        <div class="modal fade" id="updateModal{{$cata->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$cata->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{$cata->id}}">Update Charges</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('updateShippingCharges') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="prod_id" value="{{$cata->id}}">
                                                            <input type="hidden" name="role" value="{{$cata->roles}}">

                                                            <div class="form-group">
                                                                <label for="category">City</label>
                                                                <select class="form-control" id="category" name="category" onchange="updatePrice()">
                                                                    <option value="{{$cata->places}}">{{$cata->places}}</option>

                                                                        @if($cata->places == 'Dhaka')
                                                                            <option value="Outside Dhaka">Outside Dhaka</option>
                                                                    @else
                                                                        <option value="Dhaka">Dhaka</option>
                                                                        @endif

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price{{$cata->id}}">Price</label>
                                                                <input type="number" class="form-control" id="price{{$cata->id}}" name="price" value="{{ $cata->price }}" required>
                                                            </div>



                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- partial:../../partials/_footer.html -->
        <footer class="footer border-top">
            <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between py-3 small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2023 <a href="https://www.teanature.com" target="_blank">TeanaturE</a>.</p>
                <p class="text-muted mb-1 mb-md-0">Developed By <a href="https://www.trodev.com" target="_blank">Trodev</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart">Trodev</i></p>
            </div>
        </footer>
        <!-- partial -->

    </div>
</div>

<!-- core:js -->
<script src="../../../assets/vendors/core/core.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="../../../assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="../../../assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="../../../assets/vendors/inputmask/jquery.inputmask.min.js"></script>
<script src="../../../assets/vendors/select2/select2.min.js"></script>
<script src="../../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="../../../assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="../../../assets/vendors/dropzone/dropzone.min.js"></script>
<script src="../../../assets/vendors/dropify/dist/dropify.min.js"></script>
<script src="../../../assets/vendors/pickr/pickr.min.js"></script>
<script src="../../../assets/vendors/moment/moment.min.js"></script>
<script src="../../../assets/vendors/flatpickr/flatpickr.min.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="../../../assets/vendors/feather-icons/feather.min.js"></script>
<script src="../../../assets/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="../../../assets/js/form-validation.js"></script>
<script src="../../../assets/js/bootstrap-maxlength.js"></script>
<script src="../../../assets/js/inputmask.js"></script>
<script src="../../../assets/js/select2.js"></script>
<script src="../../../assets/js/typeahead.js"></script>
<script src="../../../assets/js/tags-input.js"></script>
<script src="../../../assets/js/dropzone.js"></script>
<script src="../../../assets/js/dropify.js"></script>
<script src="../../../assets/js/pickr.js"></script>
<script src="../../../assets/js/flatpickr.js"></script>

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
<!-- End custom js for this page -->

</body>
</html>

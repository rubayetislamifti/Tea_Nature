<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Profile</title>

  <!-- Fonts --><link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="../../../assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
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
{{--						<form class="search-form">--}}
{{--							<div class="input-group">--}}
{{--                <div class="input-group-text">--}}
{{--                  <i data-feather="search"></i>--}}
{{--                </div>--}}
{{--								<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">--}}
{{--							</div>--}}
{{--						</form>--}}
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">English</span>
								</a>
								<div class="dropdown-menu" aria-labelledby="languageDropdown">
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ms-1"> English </span></a>
{{--									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ms-1"> French </span></a>--}}
{{--									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ms-1"> German </span></a>--}}
{{--									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ms-1"> Portuguese </span></a>--}}
{{--									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ms-1"> Spanish </span></a>--}}
								</div>
							</li>
{{--              <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                  <i data-feather="grid"></i>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">--}}
{{--                  <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">--}}
{{--                    <p class="mb-0 fw-bold">Web Apps</p>--}}
{{--                    <a href="javascript:;" class="text-muted">Edit</a>--}}
{{--                  </div>--}}
{{--                  <div class="row g-0 p-1">--}}
{{--                    <div class="col-3 text-center">--}}
{{--                      <a href="../../pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>--}}
{{--                    </div>--}}
{{--                    <div class="col-3 text-center">--}}
{{--                      <a href="../../pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>--}}
{{--                    </div>--}}
{{--                    <div class="col-3 text-center">--}}
{{--                      <a href="../../pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>--}}
{{--                    </div>--}}
{{--                    <div class="col-3 text-center">--}}
{{--                      <a href="../../pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                  <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">--}}
{{--                    <a href="javascript:;">View all</a>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </li>--}}
{{--              <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                  <i data-feather="mail"></i>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">--}}
{{--                  <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">--}}
{{--                    <p>9 New Messages</p>--}}
{{--                    <a href="javascript:;" class="text-muted">Clear all</a>--}}
{{--                  </div>--}}
{{--                  <div class="p-1">--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="me-3">--}}
{{--                        <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                      </div>--}}
{{--                      <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                        <div class="me-4">--}}
{{--                          <p>Leonardo Payne</p>--}}
{{--                          <p class="tx-12 text-muted">Project status</p>--}}
{{--                        </div>--}}
{{--                        <p class="tx-12 text-muted">2 min ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="me-3">--}}
{{--                        <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                      </div>--}}
{{--                      <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                        <div class="me-4">--}}
{{--                          <p>Carl Henson</p>--}}
{{--                          <p class="tx-12 text-muted">Client meeting</p>--}}
{{--                        </div>--}}
{{--                        <p class="tx-12 text-muted">30 min ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="me-3">--}}
{{--                        <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                      </div>--}}
{{--                      <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                        <div class="me-4">--}}
{{--                          <p>Jensen Combs</p>--}}
{{--                          <p class="tx-12 text-muted">Project updates</p>--}}
{{--                        </div>--}}
{{--                        <p class="tx-12 text-muted">1 hrs ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="me-3">--}}
{{--                        <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                      </div>--}}
{{--                      <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                        <div class="me-4">--}}
{{--                          <p>Amiah Burton</p>--}}
{{--                          <p class="tx-12 text-muted">Project deatline</p>--}}
{{--                        </div>--}}
{{--                        <p class="tx-12 text-muted">2 hrs ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="me-3">--}}
{{--                        <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                      </div>--}}
{{--                      <div class="d-flex justify-content-between flex-grow-1">--}}
{{--                        <div class="me-4">--}}
{{--                          <p>Yaretzi Mayo</p>--}}
{{--                          <p class="tx-12 text-muted">New record</p>--}}
{{--                        </div>--}}
{{--                        <p class="tx-12 text-muted">5 hrs ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                  </div>--}}
{{--                  <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">--}}
{{--                    <a href="javascript:;">View all</a>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </li>--}}
{{--              <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                  <i data-feather="bell"></i>--}}
{{--                  <div class="indicator">--}}
{{--                    <div class="circle"></div>--}}
{{--                  </div>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">--}}
{{--                  <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">--}}
{{--                    <p>6 New Notifications</p>--}}
{{--                    <a href="javascript:;" class="text-muted">Clear all</a>--}}
{{--                  </div>--}}
{{--                  <div class="p-1">--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                        <i class="icon-sm text-white" data-feather="gift"></i>--}}
{{--                      </div>--}}
{{--                      <div class="flex-grow-1 me-2">--}}
{{--                        <p>New Order Recieved</p>--}}
{{--                        <p class="tx-12 text-muted">30 min ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                        <i class="icon-sm text-white" data-feather="alert-circle"></i>--}}
{{--                      </div>--}}
{{--                      <div class="flex-grow-1 me-2">--}}
{{--                        <p>Server Limit Reached!</p>--}}
{{--                        <p class="tx-12 text-muted">1 hrs ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                        <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
{{--                      </div>--}}
{{--                      <div class="flex-grow-1 me-2">--}}
{{--                        <p>New customer registered</p>--}}
{{--                        <p class="tx-12 text-muted">2 sec ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                        <i class="icon-sm text-white" data-feather="layers"></i>--}}
{{--                      </div>--}}
{{--                      <div class="flex-grow-1 me-2">--}}
{{--                        <p>Apps are ready for update</p>--}}
{{--                        <p class="tx-12 text-muted">5 hrs ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                    <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
{{--                      <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">--}}
{{--                        <i class="icon-sm text-white" data-feather="download"></i>--}}
{{--                      </div>--}}
{{--                      <div class="flex-grow-1 me-2">--}}
{{--                        <p>Download completed</p>--}}
{{--                        <p class="tx-12 text-muted">6 hrs ago</p>--}}
{{--                      </div>--}}
{{--                    </a>--}}
{{--                  </div>--}}
{{--                  <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">--}}
{{--                    <a href="javascript:;">View all</a>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </li>--}}
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
                                            <a href="https://www.teanature.com/" class="text-body ms-0">
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
                                            <p class="category-heading">Home</p>
                                            <ul>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('marquee', ['id' => $admin]) }}">Marquee Text</a>
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

				<div class="row">
					<div class="col-12 grid-margin">
						<div class="card">
							<div class="position-relative">
								<figure class="overflow-hidden mb-0 d-flex justify-content-center">
                                    @if($admin)
									    <img src="{{asset('admins/'.$admin->name. '/' .$adminprofile->cover_pic)}}" class="rounded-top" alt="profile cover" style="width: 100%; height: 10%;">
                                    @else
                                        <img src="https://via.placeholder.com/1560x370" class="rounded-top" alt="profile cover">
                                    @endif
								</figure>
								<div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
									<div>
                                        @if($admin)
                                            <a href="{{asset('admins/'.$admin->image)}}" target="_blank">
                                                <img class="wd-80 rounded-circle" src="{{asset('admins/'.$admin->image)}}" alt="{{$admin->name}}">
                                            </a>
                                        @else
                                            <img class="wd-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                        @endif
										<span class="h4 ms-3 text-white">@if($admin)
                                                {{$admin->name}}
                                            @else
                                                Demo Account
                                            @endif</span>
									</div>
                                    <div class="d-none d-md-block">
                                        <button class="btn btn-primary btn-icon-text" data-toggle="modal" data-target="#editProfileModal">
                                            <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editProfileForm" action="{{route('updateProfilePic')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$admin->id}}"/>
                                                        <div class="form-group">
                                                            <label for="profileImage">Profile Image</label>
                                                            <input type="file" class="form-control-file" name="propic" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profileImage">Cover Image</label>
                                                            <input type="file" class="form-control-file" name="cover" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="aboutField">About</label>
                                                            <textarea class="form-control" id="aboutField" name="about" rows="3">@if(isset($adminprofile->about)) {{$adminprofile->about}} @endif</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dropdownMenu">Facebook</label>
                                                            <input type="url" class="form-control-file" name="facebook" value="@if(isset($adminprofile->facebook)) {{$adminprofile->facebook}} @endif" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dropdownMenu">X</label>
                                                            <input type="url" class="form-control-file" name="twitter" value="@if(isset($adminprofile->twitter)) {{$adminprofile->twitter}} @endif" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dropdownMenu">Instagram</label>
                                                            <input type="url" class="form-control-file" name="insta" value="@if(isset($adminprofile->instagram)) {{$adminprofile->instagram}} @endif" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dropdownMenu">Linkedin</label>
                                                            <input type="url" class="form-control-file" name="link" value="@if(isset($adminprofile->linkedin)) {{$adminprofile->linkedin}} @endif" id="profileImage">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
							</div>
{{--                            <div class="d-flex justify-content-center p-3 rounded-bottom">--}}
{{--                                <ul class="d-flex align-items-center m-0 p-0">--}}
{{--                                    <li class="d-flex align-items-center active">--}}
{{--                                        <i class="me-1 icon-md text-primary" data-feather="columns"></i>--}}
{{--                                        <button type="submit" class="btn btn-primary">Timeline</button>--}}
{{--                                    </li>--}}
{{--                                    <li class="ms-3 ps-3 border-start d-flex align-items-center">--}}
{{--                                        <i class="me-1 icon-md" data-feather="user"></i>--}}
{{--                                        <button type="submit" class="btn btn-primary">About</button>--}}
{{--                                    </li>--}}
{{--                                    <li class="ms-3 ps-3 border-start d-flex align-items-center">--}}
{{--                                        <i class="me-1 icon-md" data-feather="user"></i>--}}
{{--                                        <button type="submit" class="btn btn-primary">About</button>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
						</div>
					</div>
				</div>
				<div class="row profile-body">
					<!-- left wrapper start -->
					<div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
						<div class="card rounded">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-2">
									<h6 class="card-title mb-0">About</h6>

								</div>
								<p>@if(isset($adminprofile->about)) {{$adminprofile->about}} @endif</p>
								<div class="mt-3">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
									<p class="text-muted">@if($admin)
                                            {{$admin->created_at->format('F j, Y')}}
                                        @else
                                            Demo Account
                                        @endif</p>
								</div>
								<div class="mt-3">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
									<p class="text-muted">@if($admin)
                                            {{$admin->address}}
                                        @else
                                            Demo Account
                                        @endif</p>
								</div>
								<div class="mt-3">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
									<p class="text-muted">@if($admin)
                                            {{$admin->email}}
                                        @else
                                            Demo Account
                                        @endif</p>
								</div>

								<div class="mt-3 d-flex social-links">
                                    @if(isset($adminprofile->facebook))
									<a href="{{$adminprofile->facebook}}" target="_blank" class="btn btn-icon border btn-xs me-2">
										<i data-feather="facebook"></i>
									</a>
                                    @endif
                                        @if(isset($adminprofile->instagram))
                                    <a href="{{$adminprofile->instagram}}" target="_blank" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="instagram"></i>
                                    </a>
                                        @endif
                                        @if(isset($adminprofile->twitter))
									<a href="{{$adminprofile->twitter}}" target="_blank" class="btn btn-icon border btn-xs me-2">
										<i data-feather="twitter"></i>
									</a>
                                        @endif
                                        @if(isset($adminprofile->linkedin))
                                    <a href="{{$adminprofile->linkedin}}" target="_blank" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="linkedin"></i>
                                    </a>
                                        @endif
								</div>
							</div>
						</div>
					</div>
					<!-- left wrapper end -->
					<!-- middle wrapper start -->
					<div class="col-md-8 col-xl-6 middle-wrapper">
						<div class="row">
							<div class="col-md-12 grid-margin">
                                <div class="card rounded mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Post a Picture</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('post')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="admin" value="{{$admin->id}}">
                                            <div class="mb-3">
                                                <label for="postDescription" class="form-label">Description</label>
                                                <textarea class="form-control" id="postDescription" rows="3" name="description" placeholder="Enter description"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="postImage" class="form-label">Upload Image</label>
                                                <input class="form-control" type="file" name="pic" id="postImage">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Post</button>
                                        </form>
                                    </div>
                                </div>
                                @foreach($postAll as $post)
								<div class="card rounded">
									<div class="card-header">
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<img class="img-xs rounded-circle" src="{{asset('admins/'.$post->image)}}" alt="">
												<div class="ms-2">
													<p>{{$post->name}}</p>

                                                    <p class="tx-11 text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>

                                                </div>
											</div>
                                            <div class="dropdown">
                                                <a type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-lg pb-3px" data-feather="more-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="share-2" class="icon-sm me-2"></i> <span class="">Share</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="copy" class="icon-sm me-2"></i> <span class="">Copy link</span></a>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="card-body">
										<p class="mb-3 tx-14">{{$post->description}}</p>
										<img class="img-fluid" src="{{asset('admins/post/' .$post->pictuers)}}" alt="">
									</div>
                                    <div class="card-footer">
                                        <div class="d-flex post-actions">
                                            <form action="{{route('likes')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$post->posts}}">
                                            <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                                                <i class="icon-md" data-feather="heart"></i>
                                                @if(isset($post->likes))
                                                <button type="submit" class="d-none d-md-block ms-2" style="border: hidden;  background: transparent;">
                                                    {{$post->likes}}
                                                </button>
                                                @elseif($post->likes == 0)
                                                    <button type="submit" class="d-none d-md-block ms-2" style="border: hidden; background: transparent;">Like</button>
                                                @endif
                                            </a>
                                            </form>
                                            <a href="javascript:;" class="d-flex align-items-center text-muted">
                                                <i class="icon-md" data-feather="share"></i>
                                                <p class="d-none d-md-block ms-2">Share</p>
                                            </a>
                                        </div>
                                    </div>
								</div>
                                @endforeach
							</div>

						</div>
					</div>
					<!-- middle wrapper end -->
					<!-- right wrapper start -->
					<div class="d-none d-xl-block col-xl-3">
						<div class="row">
							<div class="col-md-12 grid-margin">
								<div class="card rounded">
									<div class="card-body">
										<h6 class="card-title">latest photos</h6>
                    <div class="row ms-0 me-0">
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-2">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>

                    </div>
									</div>
								</div>
							</div>
{{--							--}}
						</div>
					</div>
					<!-- right wrapper end -->
				</div>

			</div>

			<!-- partial:../../partials/_footer.html -->
			<footer class="footer border-top">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between py-3 small">
          <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
          <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
        </div>
			</footer>
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="../../../assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="../../../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../../../assets/js/template.js"></script>
	<!-- endinject -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Products Display</title>

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

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">English</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <img class="wd-30 ht-30 rounded-circle" src="{{asset('admins/'.$admin->image)}}" alt="{{$admin->name}}">

                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">

                                            <img class="wd-80 ht-80 rounded-circle" src="{{asset('admins/'.$admin->image)}}" alt="{{$admin->name}}">

                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">

                                                {{$admin->name}}
                                            </p>
                                        <p class="tx-12 text-muted">
                                                {{$admin->email}}
                                            </p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">

                                            <a href="#" class="text-body ms-0">
                                                <i class="me-2 icon-md" data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>

                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="#" class="text-body ms-0">
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


    </div>
    <!-- partial -->
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Display Products</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0">Product List</h4>
                                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#discountModal">Discount</a>
                            </div>

                            <!-- Discount Modal -->
                            <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="discountModalLabel">Apply Discount</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('applyDiscount')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="category">Product</label>
                                                    <select class="form-control" id="category" name="category_id" onchange="updatePrice()">
                                                        <option>Select Product</option>
                                                        @foreach($category as $cata)
                                                            <option value="{{ $cata->id }}" data-price="{{ $cata->price }}">{{ $cata->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="number" class="form-control" id="price" name="previous_price" value="" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="discount">Discount (%)</label>
                                                    <input type="number" class="form-control" id="discount" name="discount" min="0" max="100" oninput="calculateNewPrice()" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="new-price">New Price</label>
                                                    <input type="number" class="form-control" id="new-price" name="new_price" readonly>
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
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Cartoon Qty</th>
                                        <th>Catroon Price</th>
                                        <th>Discount</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($category as $cata)

                                        <tr>
                                            <td>{{$cata->id}}</td>
                                            <td>{{$cata->name}}</td>
                                            <td>
                                                <span data-toggle="tooltip" data-placement="top" title="{{ $cata->description }}">
                                                        {!! Str::limit($cata->description, 50) !!}
                                                    </span>
                                            </td>
                                            <td>
                                                <a href="{{asset('storage/'.$cata->image)}}" target="_blank">
                                                    <img src="{{asset('storage/'.$cata->image)}}" alt="{{$cata->name}}" width="50">
                                                </a>
                                            </td>
                                            <td>{{$cata->price}}</td>
                                            <td>{{$cata->stock}}</td>
                                            <td>{{$cata->cartoonqty}}</td>
                                            <td>{{$cata->cartoonprice}}</td>
                                            <td>{{$cata->discount}}</td>
                                            <td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{$cata->id}}">Update</a></td>

                                            <td><a class="btn btn-secondary" href="{{route('deleteProduct',['category'=>$cata->id])}}">Delete</a></td>
                                        </tr>
                                        <!-- Update Modal -->

                                        <div class="modal fade" id="updateModal{{$cata->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$cata->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{$cata->id}}">Update Category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="prod_id" value="{{$cata->id}}">
                                                            <div class="form-group">
                                                                <label for="name{{$cata->id}}">Product Name</label>
                                                                <input type="text" class="form-control" id="name{{$cata->id}}" name="name" value="{{ $cata->name }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description{{$cata->id}}">Description</label>
                                                                <textarea class="form-control" id="description{{$cata->id}}" name="description" required>{{ $cata->description }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category{{$cata->id}}">Product</label>
                                                                <select class="form-control" id="category{{$cata->id}}" name="category">
                                                                    <option value="{{$cata->category}}">{{$cata->category}}</option>
                                                                    @foreach($catagory as $catas)
                                                                        @if($catas->name !== $cata->category)
                                                                            <option value="{{ $catas->name }}">{{ $catas->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price{{$cata->id}}">Price</label>
                                                                <input type="number" class="form-control" id="price{{$cata->id}}" name="price" value="{{ $cata->price }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="stock{{$cata->id}}">Stock</label>
                                                                <input type="number" class="form-control" id="stock{{$cata->id}}" name="stock" value="{{ $cata->stock }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cartoonqty{{$cata->id}}">Per Cartoon Quantity</label>
                                                                <input type="number" class="form-control" id="cartoonqty{{$cata->id}}" name="cartoonqty" value="{{ $cata->cartoonqty }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cartoonprice{{$cata->id}}">Per Cartoon Price</label>
                                                                <input type="number" class="form-control" id="cartoonprice{{$cata->id}}" name="cartoonprice" value="{{ $cata->cartoonprice }}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="image{{$cata->id}}">Image</label>
                                                                <input type="file" class="form-control" id="image{{$cata->id}}" name="image">
                                                                <img src="{{asset('storage/'.$cata->image)}}" alt="{{$cata->name}}" width="50">
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
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($category as $cata)
        ClassicEditor
            .create(document.querySelector('#description{{$cata->id}}'))
            .then(editor => {
                console.log('Editor initialized for #description{{$cata->id}}');
            })
            .catch(error => {
                console.error('Error initializing editor for #description{{$cata->id}}', error);
            });
        @endforeach
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

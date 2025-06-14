@extends('admin.layouts.app')

@section('content')



    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admins</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0">Admins</h4>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#discountModal">+ Create New Admin</a>
                            </div>

                            <!-- Discount Modal -->
                            <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="discountModalLabel">Create New Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('createAdmin')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="category">Name</label>
                                                    <input type="text" class="form-control" id="price" name="name" value="" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="price">Email</label>
                                                    <input type="email" class="form-control" id="price" name="email" value="" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="discount">Address</label>
                                                    <input type="text" class="form-control" id="discount" name="address" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="new-price">Mobile</label>
                                                    <input type="text" class="form-control" id="new-price" name="mobile" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="new-price">Password</label>
                                                    <input type="text" class="form-control" id="new-price" name="password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="new-price">Image</label>
                                                    <input type="file" class="form-control" id="new-price" name="image" required>
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

                                                <button type="submit" class="btn btn-primary">Submit</button>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Password</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @if(isset($admin))--}}
                                        @foreach($admin as $cata)

                                        <tr>
                                            <td>{{$cata->id}}</td>
                                            <td>{{$cata->name}}</td>
                                            <td>
                                                {{$cata->email}}
                                            </td>

                                            <td>{{$cata->address}}</td>
                                            <td>{{$cata->phone}}</td>
                                            <td>{{$cata->password}}</td>
                                            <td>
                                                <a href="{{asset('admins/'.$cata->image)}}" target="_blank">
                                                    <img src="{{asset('admins/'.$cata->image)}}" alt="{{$cata->name}}" width="50">
                                                </a>
                                            </td>
                                            <td>{{$cata->permission}}</td>
                                            <td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{$cata->id}}">Update</a></td>

                                            <td><a class="btn btn-secondary" href="{{route('deleteProduct',['category'=>$cata->id])}}">Delete</a></td>
                                        </tr>
                                        <!-- Update Modal -->

                                        <div class="modal fade" id="updateModal{{$cata->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$cata->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{$cata->id}}">Update Profile {{$cata->name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('updateAdmin') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="prod_id" value="{{$cata->id}}">
                                                            <div class="form-group">
                                                                <label for="name{{$cata->id}}">Name</label>
                                                                <input type="text" class="form-control" id="name{{$cata->id}}" name="name" value="{{ $cata->name }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description{{$cata->id}}">Email</label>
                                                                <input class="form-control" name="description" value="{{ $cata->email }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category">Address</label>
                                                                <textarea class="form-control" name="address" required>{{ $cata->address }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price{{$cata->id}}">Mobile</label>
                                                                <input type="number" class="form-control" id="price{{$cata->id}}" name="price" value="{{ $cata->phone }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="stock{{$cata->id}}">Password</label>
                                                                <input type="number" class="form-control" id="stock{{$cata->id}}" name="stock" value="{{ $cata->password }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="image{{$cata->id}}">Image</label>
                                                                <input type="file" class="form-control" id="image{{$cata->id}}" name="image">
                                                                <img src="{{asset('admins/'.$cata->image)}}" alt="{{$cata->name}}" width="50">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    @endforeach
{{--                                    @else--}}
{{--                                        <p>Nthg</p>--}}
{{--                                    @endif--}}
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

@endsection

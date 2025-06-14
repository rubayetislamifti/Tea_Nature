@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Permission</li>
                </ol>
            </nav>



            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0">Permission
                                </h4>
{{--                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#discountModal">+ Create New Permission</a>--}}
                            </div>




                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Update</th>
                                        <th>Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ads as $cata)

                                        <tr>
                                            <td>{{$cata->id}}</td>
                                            <td>{{$cata->name}}</td>

                                            <td>
                                                <a href="{{asset('admins/'.$cata->image)}}" target="_blank">
                                                    <img src="{{asset('admins/'.$cata->image)}}" alt="{{$cata->name}}" width="50">
                                                </a>
                                            </td>
                                            <td>{{$cata->permission}}</td>
                                            <td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{$cata->id}}">Details -></a></td>

                                            <td>
                                                <form action="{{ route('removePermission') }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="per_id" value="{{ $cata->id }}">
                                                    <button type="submit" class="btn btn-danger">
                                                        <span><i class="fa-solid fa-trash"></i></span> Remove
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Update Modal -->

                                        <div class="modal fade" id="updateModal{{$cata->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$cata->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{$cata->id}}">Assign to {{$cata->name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('assignPermission') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="prod_id" value="{{$cata->id}}">
                                                            <div class="form-group">
                                                                <label for="name{{$cata->id}}">Permission</label>
                                                                <select class="form-control" name="per">
                                                                    <option>Select</option>
                                                                    <option value="Superadmin">Superadmin</option>
                                                                    <option value="Admin">Admin</option>
                                                                </select>
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

        <!-- partial -->

    </div>
@endsection

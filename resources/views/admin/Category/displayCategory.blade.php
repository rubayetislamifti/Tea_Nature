@extends('admin.layouts.app')

@section('content')
		<!-- partial -->
        <div class="page-wrapper">

            <div class="page-content">

                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Display Category</li>
                    </ol>
                </nav>
                <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category List</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $cata)

                                <tr>
                                    <td>{{$cata->id}}</td>
                                    <td>{{$cata->name}}</td>
                                    <td>{{$cata->status}}</td>
                                    <td><img src="{{asset('category/'.$cata->image)}}" alt="{{$cata->name}}" width="50"></td>
                                    <td><a class="btn btn-primary" href="{{route('updateCategory',['id'=>$id,'category'=>$cata->id])}}">Update</a></td>
                                    <td><a class="btn btn-secondary" href="{{route('deleteCategory',['category'=>$cata->id])}}">Delete</a></td>
                                </tr>

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

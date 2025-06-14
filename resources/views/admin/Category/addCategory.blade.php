@extends('admin.layouts.app')

@section('content')

		<div class="page-wrapper">

			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Category</li>
					</ol>
				</nav>

                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Category System</h4>
                                <form action="{{route('insertCategory')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Category Name</label>
                                        <input id="name" class="form-control" name="name" type="text">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ageSelect" class="form-label">Status</label>
                                        <select class="form-select" name="age_select" id="ageSelect">
                                            <option class="Active">Active</option>
                                            <option class="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Dropify</h6>
                                            <p class="text-muted mb-3">Read the <a href="https://github.com/JeremyFagis/dropify" target="_blank"> Official Dropify Documentation </a>for a full list of instructions and other options.</p>
                                            <input type="file" name="image" id="myDropify"/>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 grid-margin stretch-card">
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($category as $cata)

                                            <tr>
                                                <td>{{$cata->id}}</td>
                                                <td>{{$cata->name}}</td>
                                                <td>{{$cata->status}}</td>
                                                <td><img src="{{ asset('category/' . $cata->image) }}" alt="{{$cata->name}}" width="50"></td>
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


			</div>

@endsection

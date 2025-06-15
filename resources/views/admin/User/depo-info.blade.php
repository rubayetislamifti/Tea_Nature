@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Depo Info</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Depo Info List</h4>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    {{--                                    <thead>--}}
                                    {{--                                    <tr>--}}
                                    {{--                                        <th>User</th>--}}
                                    {{--                                        <th>Name</th>--}}
                                    {{--                                        <th>Email</th>--}}
                                    {{--                                        <th>Phone</th>--}}
                                    {{--                                        <th>Details</th>--}}
                                    {{--                                    </tr>--}}
                                    {{--                                    </thead>--}}
                                    {{--                                    <tbody>--}}
                                    @foreach($customer as $customers)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="{{ asset('storage/'.$customers->pic) }}" alt="image" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <h5 class="card-title">{{ $customers->name }}</h5>
                                                        <p class="card-text">{{ $customers->email }}</p>
                                                        <p class="card-text">{{ $customers->mobile }}</p>
                                                        <p class="card-text">Status:
                                                            @if($customers->action == 'Active')
                                                                <span style="color:green; font-weight: bolder;">{{ $customers->action }}</span>
                                                            @else
                                                                <span style="color:red; font-weight: bolder;">{{ $customers->action }}</span>
                                                            @endif
                                                        </p>
                                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{$customers->id}}">Details -></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Details Modal -->
                                        <div class="modal fade" id="updateModal{{$customers->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$customers->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{$customers->id}}">Details for {{$customers->name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('depoStatusUpdate')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                                <input type="hidden" name="prod_id" value="{{$customers->id}}">
                                                            <div class="form-group">
                                                                <label for="name{{$customers->id}}">Store Name</label>
                                                                <input type="text" class="form-control" id="name{{ $customers->name }}" name="name" value="{{ $customers->name }}" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name{{$customers->id}}">Owner Name</label>
                                                                <input type="text" class="form-control" id="name{{ $customers->owner_name }}" name="name" value="{{ $customers->owner_name }}" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name{{$customers->id}}">Trade Licence</label>
                                                                <input type="text" class="form-control" id="name{{ $customers->trade_lic }}" name="name" value="{{ $customers->trade_lic }}" readonly>
                                                            </div>
                                                            <div class="form-group">

                                                               <img src="{{asset('storage/'.$customers->nid_front)}}" width="100%" height="100%"/><br>
                                                               <img src="{{asset('storage/'.$customers->nid_back)}}" width="100%" height="100%"/>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="description{{$customers->id}}">Email</label>
                                                                <input class="form-control" id="description" name="description" value="{{ $customers->email }}" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category">Address</label>
                                                                <input type="text" class="form-control" id="name{{ $customers->address }}" name="name" value="{{ $customers->address }}" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="category">Mobile</label>
                                                                <input type="text" class="form-control" id="name{{ $customers->mobile }}" name="name" value="{{ $customers->mobile }}" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price{{$customers->id}}">City</label>
                                                                <input type="text" class="form-control" id="price{{$customers->id}}" name="price" value="{{ $customers->city }}" readonly>
                                                            </div>
                                                            {{--                                                            <div class="form-group">--}}
                                                            {{--                                                                <label for="stock{{$customers->id}}">Stock</label>--}}
                                                            {{--                                                                <input type="number" class="form-control" id="stock{{$customers->id}}" name="stock" value="{{ $customers->stock }}" required>--}}
                                                            {{--                                                            </div>--}}

                                                            <div class="form-group">
                                                                <label for="category">Status</label>
                                                                <select class="form-control" id="category" name="category_id" onchange="updatePrice()">
                                                                    <option>Select</option>

                                                                    <option value="Active">Active</option>
                                                                    <option value="Inactive">Inactive</option>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">

                                                                <img src="{{asset('storage/'.$customers->pic)}}" alt="{{$customers->name}}" width="50">
                                                            </div>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach




                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>



    </div>


@endsection

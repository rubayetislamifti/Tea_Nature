@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer Pending Orders</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0">Orders List</h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Invoice Id</th>
                                        <th>User Name</th>
                                        <th>Phone Number</th>
                                        <th>Shipping Address</th>
                                        <th>Total</th>
                                        <th>Payment</th>
                                        <th>Transaction Id</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Update</th>
                                        <th>Invoice</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $previousInvoiceId = null;
                                    @endphp
                                    @foreach($category as $index => $cata)

                                        <tr>
                                            @if ($previousInvoiceId !== $cata->invoice_id)
                                                @php
                                                    $previousInvoiceId = $cata->invoice_id;
                                                    $rowSpan = $category->where('invoice_id', $cata->invoice_id)->count();
                                                @endphp
                                                <td rowspan="{{ $rowSpan }}" style="vertical-align: middle; text-align: center;">{{$cata->invoice_id}}</td>
                                            @endif
                                            <td>{{$cata->name}}</td>
                                                <td>{{$cata->phone}}</td>
                                            <td>
                                                {{$cata->shipping_address}}
                                            </td>

                                            <td>{{$cata->price}}</td>

                                            @if($cata->payment_method == 'bKash')
                                                <td>
                                                    <img src="{{asset('bkash.png')}}" />
                                                    {{$cata->payment_method}}
                                                </td>
                                            @else
                                                <td>
                                                    <img src="{{asset('cod.jpg')}}" />
                                                    {{$cata->payment_method}}
                                                </td>
                                            @endif
                                            @if($cata->payment_method == 'bKash')
                                                <td>{{$cata->transaction_id}}</td>
                                            @else
                                                <td>
                                                    <strong>Cash On Delivery</strong>
                                                </td>
                                            @endif
                                                <td>{{$cata->created_at}}</td>
                                            @if(isset($cata->transaction_id))
                                            <td style="color:  #008000;font-weight: bolder">Completed<br>
                                               <span style="color:  #ff0000;font-weight: bolder">{{$cata->order_status}}</span>
                                            </td>
                                            @else
                                                <td style="color:  #ff0000;font-weight: bolder">{{$cata->order_status}}</td>
                                            @endif
                                            <td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{$cata->invoice_id}}">Update</a></td>

                                            <td><a class="btn btn-primary" href="{{route('invoice',['id'=>$cata->invoice_id])}}" target="_blank">Invoice</a></td>
                                        </tr>
                                        <!-- Update Modal -->

                                        <div class="modal fade" id="updateModal{{$cata->invoice_id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$cata->invoice_id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{$cata->invoice_id}}">Order Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('updateOrder') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="prod_id" value="{{$cata->invoice_id}}">
                                                            <h5>Products:</h5>
                                                            <ul>

                                                                @foreach($products as $product)
                                                                    @if($cata->invoice_id == $product->invoice_id)
                                                                        <li><strong>{{ $product->name }}</strong><br> - Price: {{ $product->price }}৳<br> - Quantity: {{ $product->quantity }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <div class="form-group">
                                                                <label for="delivery_date{{$cata->id}}">Delivery Date</label>
                                                                <input type="date" class="form-control" id="delivery_date{{$cata->id}}" name="delivery_date" required>
                                                            </div>
                                                            <!-- Invoice Information -->
                                                            <div class="form-group">
                                                                <label for="invoice_number{{$cata->id}}">Invoice Number</label>
                                                                <input type="text" class="form-control" id="invoice_number{{$cata->id}}" name="invoice_number" value="{{$cata->invoice_id}}" readonly>
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



    </div>

@endsection

{{--@extends('admin.layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="page-wrapper">--}}

{{--        <div class="page-content">--}}

{{--            <nav class="page-breadcrumb">--}}
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>--}}
{{--                    <li class="breadcrumb-item active" aria-current="page">Customer Pending Orders</li>--}}
{{--                </ol>--}}
{{--            </nav>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 grid-margin stretch-card">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex justify-content-between align-items-center mb-3">--}}
{{--                                <h4 class="card-title mb-0">Orders List</h4>--}}
{{--                            </div>--}}

{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-striped">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Invoice Id</th>--}}
{{--                                        <th>User Name</th>--}}
{{--                                        <th>Phone Number</th>--}}
{{--                                        <th>Shipping Address</th>--}}
{{--                                        <th>Total</th>--}}
{{--                                        <th>Payment</th>--}}
{{--                                        <th>Transaction Id</th>--}}
{{--                                        <th>Order Date</th>--}}
{{--                                        <th>Status</th>--}}
{{--                                        <th>Update</th>--}}
{{--                                        <th>Invoice</th>--}}

{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @php--}}
{{--                                        $previousInvoiceId = null;--}}
{{--                                    @endphp--}}
{{--                                    @foreach($category as $index => $cata)--}}

{{--                                        <tr>--}}
{{--                                            @if ($previousInvoiceId !== $cata->invoice_id)--}}
{{--                                                @php--}}
{{--                                                    $previousInvoiceId = $cata->invoice_id;--}}
{{--                                                    $rowSpan = $category->where('invoice_id', $cata->invoice_id)->count();--}}
{{--                                                @endphp--}}
{{--                                                <td rowspan="{{ $rowSpan }}" style="vertical-align: middle; text-align: center;">{{$cata->invoice_id}}</td>--}}
{{--                                            @endif--}}
{{--                                            <td>{{$cata->name}}</td>--}}
{{--                                                <td>{{$cata->phone}}</td>--}}
{{--                                            <td>--}}
{{--                                                {{$cata->shipping_address}}--}}
{{--                                            </td>--}}

{{--                                            <td>{{$cata->price}}</td>--}}

{{--                                            @if($cata->payment_method == 'bKash')--}}
{{--                                                <td>--}}
{{--                                                    <img src="{{asset('bkash.png')}}" />--}}
{{--                                                    {{$cata->payment_method}}--}}
{{--                                                </td>--}}
{{--                                            @else--}}
{{--                                                <td>--}}
{{--                                                    <img src="{{asset('cod.jpg')}}" />--}}
{{--                                                    {{$cata->payment_method}}--}}
{{--                                                </td>--}}
{{--                                            @endif--}}
{{--                                            @if($cata->payment_method == 'bKash')--}}
{{--                                                <td>{{$cata->transaction_id}}</td>--}}
{{--                                            @else--}}
{{--                                                <td>--}}
{{--                                                    <strong>Cash On Delivery</strong>--}}
{{--                                                </td>--}}
{{--                                            @endif--}}
{{--                                                <td>{{$cata->created_at}}</td>--}}
{{--                                            @if(isset($cata->transaction_id))--}}
{{--                                            <td style="color:  #008000;font-weight: bolder">Completed<br>--}}
{{--                                               <span style="color:  #ff0000;font-weight: bolder">{{$cata->order_status}}</span>--}}
{{--                                            </td>--}}
{{--                                            @else--}}
{{--                                                <td style="color:  #ff0000;font-weight: bolder">{{$cata->order_status}}</td>--}}
{{--                                            @endif--}}
{{--                                            <td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{$cata->invoice_id}}">Update</a></td>--}}

{{--                                            <td><a class="btn btn-primary" href="{{route('invoice',['id'=>$cata->invoice_id])}}" target="_blank">Invoice</a></td>--}}
{{--                                        </tr>--}}
{{--                                        <!-- Update Modal -->--}}

{{--                                        <div class="modal fade" id="updateModal{{$cata->invoice_id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$cata->invoice_id}}" aria-hidden="true">--}}
{{--                                            <div class="modal-dialog">--}}
{{--                                                <div class="modal-content">--}}
{{--                                                    <div class="modal-header">--}}
{{--                                                        <h5 class="modal-title" id="updateModalLabel{{$cata->invoice_id}}">Order Details</h5>--}}
{{--                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                            <span aria-hidden="true">&times;</span>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-body">--}}
{{--                                                        <form action="{{ route('updateOrder') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                                            @csrf--}}
{{--                                                            <input type="hidden" name="prod_id" value="{{$cata->invoice_id}}">--}}
{{--                                                            <h5>Products:</h5>--}}
{{--                                                            <ul>--}}

{{--                                                                @foreach($products as $product)--}}
{{--                                                                    @if($cata->invoice_id == $product->invoice_id)--}}
{{--                                                                        <li><strong>{{ $product->name }}</strong><br> - Price: {{ $product->price }}৳<br> - Quantity: {{ $product->quantity }}</li>--}}
{{--                                                                    @endif--}}
{{--                                                                @endforeach--}}
{{--                                                            </ul>--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="delivery_date{{$cata->id}}">Delivery Date</label>--}}
{{--                                                                <input type="date" class="form-control" id="delivery_date{{$cata->id}}" name="delivery_date" required>--}}
{{--                                                            </div>--}}
{{--                                                            <!-- Invoice Information -->--}}
{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="invoice_number{{$cata->id}}">Invoice Number</label>--}}
{{--                                                                <input type="text" class="form-control" id="invoice_number{{$cata->id}}" name="invoice_number" value="{{$cata->invoice_id}}" readonly>--}}
{{--                                                            </div>--}}



{{--                                                            <button type="submit" class="btn btn-primary">Update</button>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}


{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}



{{--    </div>--}}

{{--@endsection--}}

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
                                <table class="table table-striped align-middle">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice ID</th>
                                        <th>User Name</th>
                                        <th>Phone Number</th>
                                        <th>Shipping Address</th>
                                        <th>Products</th>
                                        <th>Total</th>
                                        <th>Payment</th>
                                        <th>Transaction Id</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $groupedOrders = $category->groupBy('invoice_id');
                                    @endphp

                                    @forelse($groupedOrders as $invoiceId => $orders)
                                        @php
                                            $first = $orders->first();
                                            $total = $orders->sum('price');
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $invoiceId }}</td>
                                            <td>{{ $first->name }}</td>
                                            <td>{{ $first->phone }}</td>
                                            <td>{{ $first->shipping_address }}</td>
                                            <td>
                                                <ul class="mb-0">
                                                    @foreach($orders as $product)
                                                        <li>{{ $product->product_name ?? $product->name }} (x{{ $product->quantity }})</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ number_format($total, 2) }}৳</td>

                                            <td>
                                                @if($first->payment_method == 'bKash')
                                                    <img src="{{ asset('bkash.png') }}" style="width:25px;"> {{ $first->payment_method }}
                                                @else
                                                    <img src="{{ asset('cod.jpg') }}" style="width:25px;"> {{ $first->payment_method }}
                                                @endif
                                            </td>

                                            <td>
                                                @if($first->payment_method == 'bKash')
                                                    {{ $first->transaction_id }}
                                                @else
                                                    <strong>Cash On Delivery</strong>
                                                @endif
                                            </td>

                                            <td>{{ \Carbon\Carbon::parse($first->created_at)->format('d M, Y h:i A') }}</td>

                                            <td>
                                                @if(isset($first->transaction_id))
                                                    <span style="color: #008000; font-weight: bold;">Completed</span><br>
                                                    <span style="color: #ff0000; font-weight: bold;">{{ $first->order_status }}</span>
                                                @else
                                                    <span style="color: #ff0000; font-weight: bold;">{{ $first->order_status }}</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{ $invoiceId }}">Update</a>
                                                <a class="btn btn-sm btn-info" href="{{ route('invoice', ['id' => $invoiceId]) }}" target="_blank">Invoice</a>
                                            </td>
                                        </tr>

                                        <!-- Update Modal -->
                                        <div class="modal fade" id="updateModal{{ $invoiceId }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $invoiceId }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{ $invoiceId }}">Order Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('updateOrder') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="prod_id" value="{{ $invoiceId }}">
                                                            <h6>Products:</h6>
                                                            <ul>
                                                                @foreach($orders as $product)
                                                                    <li><strong>{{ $product->product_name ?? $product->name }}</strong>
                                                                        <br>Price: {{ $product->price }}৳
                                                                        <br>Qty: {{ $product->quantity }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                            <div class="form-group">
                                                                <label for="delivery_date{{ $invoiceId }}">Delivery Date</label>
                                                                <input type="date" class="form-control" id="delivery_date{{ $invoiceId }}" name="delivery_date" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="invoice_number{{ $invoiceId }}">Invoice Number</label>
                                                                <input type="text" class="form-control" id="invoice_number{{ $invoiceId }}" name="invoice_number" value="{{ $invoiceId }}" readonly>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center text-muted py-4">No pending orders found.</td>
                                        </tr>
                                    @endforelse
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

@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Depo Delivered Order</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0">Depo Delivered Order List</h4>
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
                                        <th>Status</th>
                                        <th></th>


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
                                            <td>0{{$cata->mobile}}</td>
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
                                            @if(isset($cata->transaction_id))
                                                @if($cata->order_status == 'Shipping')
                                                    <td style="color:  #008000;font-weight: bolder">Completed<br>
                                                        <span style="color:  #ff0000;font-weight: bolder">{{$cata->order_status}}</span>
                                                    </td>
                                                @else
                                                    <td style="color:  #008000;font-weight: bolder">{{$cata->order_status}}<br>
                                                    </td>
                                                @endif
                                            @else
                                                @if($cata->order_status == 'Shipping')
                                                    <td style="color:  #ff0000;font-weight: bolder">{{$cata->order_status}}</td>
                                                @else
                                                    <td style="color:  #008000;font-weight: bolder">{{$cata->order_status}}</td>
                                                @endif
                                            @endif
                                            <td>
                                                @if($cata->order_status == 'Shipping')
                                                    <form action="{{route('updateDelivery')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="invo_id" value="{{$cata->invoice_id}}"/>
                                                        <button class="btn btn-primary" type="submit">Update</button>
                                                    </form>
                                                @else
                                                    <a class="btn btn-primary" href="{{route('invoice',['id'=>$cata->invoice_id])}}" target="_blank">Invoice</a>
                                                @endif
                                            </td>


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

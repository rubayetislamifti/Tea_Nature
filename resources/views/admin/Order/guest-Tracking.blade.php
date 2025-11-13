{{--@extends('admin.layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container py-4">--}}
{{--        <div class="card border-0 shadow-sm rounded-4">--}}
{{--            <div class="card-header bg-body-tertiary d-flex justify-content-between align-items-center">--}}
{{--                <h5 class="mb-0 fw-semibold">Approved Guest Orders</h5>--}}
{{--                <span class="badge bg-success text-white">--}}
{{--                {{ $order->count() }} Approved--}}
{{--            </span>--}}
{{--            </div>--}}

{{--            <div class="card-body">--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-striped align-middle">--}}
{{--                        <thead class="table-light">--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Order ID</th>--}}
{{--                            <th>Invoice ID</th>--}}
{{--                            <th>Customer Name</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Phone</th>--}}
{{--                            <th>Product</th>--}}
{{--                            <th>Quantity</th>--}}
{{--                            <th>Total Amount</th>--}}
{{--                            <th>Delivery Date</th>--}}
{{--                            <th>Status</th>--}}
{{--                            <th>Created At</th>--}}
{{--                            <th class="text-end">Actions</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @forelse($order as $index => $item)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $index + 1 }}</td>--}}
{{--                                <td>{{ $item->id }}</td>--}}
{{--                                <td>{{ $item->invoice_id }}</td>--}}
{{--                                <td>{{ $item->name }}</td>--}}
{{--                                <td>{{ $item->email }}</td>--}}
{{--                                <td>{{ $item->phone }}</td>--}}
{{--                                <td>{{ $item->product_name }}</td>--}}
{{--                                <td>{{ $item->quantity }}</td>--}}
{{--                                <td>{{ number_format($item->amount, 2) }}</td>--}}
{{--                                <td>--}}
{{--                                    {{ $item->delivery_date ? \Carbon\Carbon::parse($item->delivery_date)->format('d M, Y') : 'N/A' }}--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <span class="badge bg-success text-white">{{ ucfirst($item->order_status) }}</span>--}}
{{--                                </td>--}}
{{--                                <td>{{ $item->created_at->format('d M, Y h:i A') }}</td>--}}
{{--                                <td class="text-end">--}}
{{--                                    <a href="{{ route('guestInvoice',['invoice'=>$item->invoice_id]) }}" class="btn btn-sm btn-info">View</a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                            <tr>--}}
{{--                                <td colspan="13" class="text-center text-muted py-4">--}}
{{--                                    No approved orders found.--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('admin.layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-body-tertiary d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">Approved Guest Orders</h5>
                <span class="badge bg-success text-white">
                    {{ $order->count() }} Approved
                </span>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Invoice ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Products</th>
                            <th>Total Amount</th>
                            <th>Delivery Date</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th class="text-end">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $groupedOrders = $order->groupBy('invoice_id');
                        @endphp

                        @forelse($groupedOrders as $invoice_id => $orders)
                            @php
                                $first = $orders->first();
                                $totalAmount = $orders->sum('amount');
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $invoice_id }}</td>
                                <td>{{ $first->name }}</td>
                                <td>{{ $first->email }}</td>
                                <td>{{ $first->phone }}</td>
                                <td>
                                    <ul class="mb-0">
                                        @foreach($orders as $product)
                                            <li>{{ $product->product_name }} (x{{ $product->quantity }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ number_format($totalAmount, 2) }}</td>
                                <td>
                                    {{ $first->delivary_date ? \Carbon\Carbon::parse($first->delivary_date)->format('d M, Y') : 'N/A' }}
                                </td>
                                <td>
                                    <span class="badge bg-success text-white">{{ ucfirst($first->order_status) }}</span>
                                </td>
                                <td>{{ $first->created_at->format('d M, Y h:i A') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('guestInvoice',['invoice'=>$invoice_id]) }}" class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted py-4">
                                    No approved orders found.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

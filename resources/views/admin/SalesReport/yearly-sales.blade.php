@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Sales Report</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yearly Sales Report</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="mb-0">Yearly Sales Report for {{ $year }}</h2>
                        <h3 class="mb-0">Total Sales: Tk. {{ number_format ($totalPrice,2) }}</h3><br>
                        @if(isset($admins))
                            <div>
                                <form method="GET" action="{{ route('yearly-sales-report',['id'=>$admins->id]) }}" class="form-inline">
                                    <div class="form-group mr-2">
                                        <label for="year">Select Year:</label>
                                        <select id="year" name="year" class="form-control" style="width: 100px;">
                                            @for ($y = date('Y'); $y >= 2000; $y--)
                                                <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Get Report</button>
                                </form>
                            </div>
                        @else
                            <div>
                                <form method="GET" action="{{ route('yearly-sales-report',['id'=>$id]) }}" class="form-inline">
                                    <div class="form-group mr-2">
                                        <label for="year">Select Year:</label>
                                        <select id="year" name="year" class="form-control" style="width: 100px;">
                                            @for ($y = date('Y'); $y >= 2000; $y--)
                                                <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Get Report</button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <div id="print-area">
                        <table class="table table-bordered" id="sales-report-table">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($sales as $sale)
                                <tr>
                                    <td>{{ $sale->product_name }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ \Carbon\Carbon::parse($sale->created_at)->format('F j, Y h:i A') }}</td>
                                    <td>Tk. {{ number_format($sale->total_price, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No sales found for this year.</td>
                                </tr>
                            @endforelse
                            </tbody>
                            @if(!$sales->isEmpty())
                                <tfoot>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th>Tk. {{ number_format($totalPrice, 2) }}</th>
                                </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-secondary" onclick="printReport()">Print Report</button>
                    </div>
                </div>


            </div>

        </div>
        <script>
            function printReport() {
                var printContents = document.getElementById('print-area').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = '<html><head><title>Print Report</title><style>' +
                    '@media print {' +
                    'body { font-family: Arial, sans-serif; }' +
                    'table { width: 100%; border-collapse: collapse; }' +
                    'th, td { border: 1px solid black; padding: 10px; text-align: left; }' +
                    'th { background-color: #f2f2f2; }' +
                    'tfoot { display: table-row-group; }' + // Ensure tfoot is displayed in print view
                    '}' +
                    '</style></head><body>' +
                    printContents +
                    '</body></html>';

                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
    </div>
@endsection

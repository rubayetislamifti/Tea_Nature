@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer Shipping Charges</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-0">Charges List</h4>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#discountModal">Add Charges</a>
                            </div>

                            <!-- Discount Modal -->
                            <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="discountModalLabel">Add Charges</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('createShippingCharges')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="role" value="users">
                                                <div class="form-group">
                                                    <label for="category">Places</label>
                                                    <select class="form-control" id="category" name="category_id" onchange="updatePrice()">
                                                        <option>Select Places</option>
                                                        <option value="Dhaka">Dhaka</option>
                                                        <option value="Outside Dhaka">Outside Dhaka</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="price">Charges</label>
                                                    <input type="number" class="form-control" id="price" name="previous_price" value="">
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

                                                <button type="submit" class="btn btn-primary">Apply</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th>Places</th>
                                        <th>Shipping Charges</th>
                                        <th>Update</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($category as $cata)

                                        <tr>
                                            <td>{{$cata->places}}</td>
                                            <td>{{$cata->price}}</td>

                                            <td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{$cata->id}}">Update</a></td>


                                        </tr>
                                        <!-- Update Modal -->

                                        <div class="modal fade" id="updateModal{{$cata->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$cata->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateModalLabel{{$cata->id}}">Update Charges</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('updateShippingCharges') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="prod_id" value="{{$cata->id}}">
                                                            <input type="hidden" name="role" value="{{$cata->roles}}">

                                                            <div class="form-group">
                                                                <label for="category">City</label>
                                                                <select class="form-control" id="category" name="category" onchange="updatePrice()">
                                                                    <option value="{{$cata->places}}">{{$cata->places}}</option>

                                                                        @if($cata->places == 'Dhaka')
                                                                            <option value="Outside Dhaka">Outside Dhaka</option>
                                                                    @else
                                                                        <option value="Dhaka">Dhaka</option>
                                                                        @endif

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price{{$cata->id}}">Price</label>
                                                                <input type="number" class="form-control" id="price{{$cata->id}}" name="price" value="{{ $cata->price }}" required>
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

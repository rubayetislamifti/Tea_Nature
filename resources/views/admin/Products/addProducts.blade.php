@extends('admin.layouts.app')

@section('content')

		<div class="page-wrapper">

			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Product</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
				</div>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Product Information</h6>
								<form action="{{route('insertProduct')}}" method="post" enctype="multipart/form-data">
                                    @csrf
									<div class="mb-3">
										<label for="exampleInputText1" class="form-label">Product Name</label>
										<input type="text" class="form-control" name="name" id="exampleInputText1" placeholder="Enter Name">
									</div>

                                    <div class="mb-3">
                                        <label for="exampleInputTextarea1" class="form-label">Product Description</label>
                                        <textarea class="form-control" name="description" id="exampleInputTextarea1"></textarea>
                                    </div>


                                    <div class="mb-3">
										<label for="exampleInputNumber1" class="form-label">Product price</label>
										<input type="number" class="form-control" name="price" id="exampleInputNumber1">
									</div>

									<div class="mb-3">
										<label for="exampleInputNumber1" class="form-label">Product Stock</label>
										<input type="number" class="form-control" name="stock" id="exampleInputNumber1">
									</div>

                                    <div class="mb-3">
                                        <label for="exampleInputNumber1" class="form-label">Product Per Cartoon Quantity</label>
                                        <input type="number" class="form-control" name="cartoonqty" id="exampleInputNumber1">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputNumber1" class="form-label">Product Per Cartoon Price</label>
                                        <input type="number" class="form-control" name="catroonprice" id="exampleInputNumber1">
                                    </div>

									<div class="mb-3">
										<label for="exampleFormControlSelect1" class="form-label">Select Category</label>
										<select class="form-select" name="category" id="exampleFormControlSelect1">
											<option selected disabled>Product Category</option>
                                            @foreach($category as $cata)
                                                <option value="{{$cata->name}}">{{$cata->name}}</option>
                                            @endforeach
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label" for="formFile">Upload Product Image</label>
										<input class="form-control" name="image" type="file" id="formFile">
									</div>

									<button class="btn btn-primary" type="submit">Upload Product</button>
								</form>
							</div>
						</div>
					</div>
				</div>

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title mb-0">Product List</h4>
                                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#discountModal">Discount</a>
                                    </div>

                                    <!-- Discount Modal -->
                                    <div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="discountModalLabel">Apply Discount</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('applyDiscount')}}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="category">Product</label>
                                                            <select class="form-control" id="category" name="category_id" onchange="updatePrice()">
                                                                <option>Select Product</option>
                                                                @foreach($prod as $cata)
                                                                    <option value="{{ $cata->id }}" data-price="{{ $cata->price }}">{{ $cata->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="price">Price</label>
                                                            <input type="number" class="form-control" id="price" name="previous_price" value="" readonly>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="discount">Discount (%)</label>
                                                            <input type="number" class="form-control" id="discount" name="discount" min="0" max="100" oninput="calculateNewPrice()" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="new-price">New Price</label>
                                                            <input type="number" class="form-control" id="new-price" name="new_price" readonly>
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
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Cartoon Qty</th>
                                                <th>Catroon Price</th>
                                                <th>Discount</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($prod as $cata)

                                                <tr>
                                                    <td>{{$cata->id}}</td>
                                                    <td>{{$cata->name}}</td>
                                                    <td>
                                                <span data-toggle="tooltip" data-placement="top" title="{{ $cata->description }}">
                                                        {!! Str::limit($cata->description, 50) !!}
                                                    </span>
                                                    </td>
                                                    <td>
                                                        <a href="{{asset('products/'.$cata->image)}}" target="_blank">
                                                            <img src="{{asset('products/'.$cata->image)}}" alt="{{$cata->name}}" width="50">
                                                        </a>
                                                    </td>
                                                    <td>{{$cata->price}}</td>
                                                    <td>{{$cata->stock}}</td>
                                                    <td>{{$cata->cartoonqty}}</td>
                                                    <td>{{$cata->cartoonprice}}</td>
                                                    <td>{{$cata->discount}}</td>
                                                    <td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#updateModal{{$cata->id}}">Update</a></td>

                                                    <td><a class="btn btn-secondary" href="{{route('deleteProduct',['category'=>$cata->id])}}">Delete</a></td>
                                                </tr>
                                                <!-- Update Modal -->

                                                <div class="modal fade" id="updateModal{{$cata->id}}" tabindex="-1" aria-labelledby="updateModalLabel{{$cata->id}}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="updateModalLabel{{$cata->id}}">Update Category</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="prod_id" value="{{$cata->id}}">
                                                                    <div class="form-group">
                                                                        <label for="name{{$cata->id}}">Product Name</label>
                                                                        <input type="text" class="form-control" id="name{{$cata->id}}" name="name" value="{{ $cata->name }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="description{{$cata->id}}">Description</label>
                                                                        <textarea class="form-control" id="description" name="description" required>{!! $cata->description !!} </textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="category">Product</label>
                                                                        <select class="form-control" id="category" name="category" onchange="updatePrice()">
                                                                            <option value="{{$cata->category}}">{{$cata->category}}</option>
                                                                            @foreach($category as $catas)
                                                                                @if($catas->name !== $cata->category)
                                                                                    <option value="{{ $catas->name }}">{{ $catas->name }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="price{{$cata->id}}">Price</label>
                                                                        <input type="number" class="form-control" id="price{{$cata->id}}" name="price" value="{{ $cata->price }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="stock{{$cata->id}}">Stock</label>
                                                                        <input type="number" class="form-control" id="stock{{$cata->id}}" name="stock" value="{{ $cata->stock }}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="stock{{$cata->id}}">Per Cartoon Quantity</label>
                                                                        <input type="number" class="form-control" id="stock{{$cata->id}}" name="cartoonqty" value="{{ $cata->cartoonqty }}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="stock{{$cata->id}}">Per Cartoon Price</label>
                                                                        <input type="number" class="form-control" id="stock{{$cata->id}}" name="catroonprice" value="{{ $cata->cartoonprice }}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="image{{$cata->id}}">Image</label>
                                                                        <input type="file" class="form-control" id="image{{$cata->id}}" name="image">
                                                                        <img src="{{asset('products/'.$cata->image)}}" alt="{{$cata->name}}" width="50">
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
	</div>

        @endsection

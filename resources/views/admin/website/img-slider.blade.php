@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Image Slider</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Image Slider</h4>

                            <!-- Flash Messages -->
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('insertImgae') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Text</label>
                                    <input id="name" class="form-control" name="name" type="text" oninput="updateMarquee()">
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input id="image" class="form-control" name="description" type="file" accept="image/*" onchange="previewImage(event)">
                                </div>
                                <div class="mb-3">
                                    <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 100%; max-height: 50%;">
                                </div>

                                <script>
                                    function previewImage(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('imagePreview');

                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();

                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            preview.src = '#';
                                            preview.style.display = 'none';
                                        }
                                    }
                                </script>

                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Image List</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>

                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($marquee as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->title }}</td>
                                            <td>
                                                <a href="{{asset('storage/'.$testimonial->image)}}" target="_blank">
                                                    <img src="{{asset('storage/'.$testimonial->image)}}" />
                                                </a>

                                            </td>

                                            <td>
                                                <button class="btn btn-warning btn-sm update-button" data-id="{{ $testimonial->id }}" data-name="{{ $testimonial->title }}" >Update</button>
                                                <form action="{{ route('deleteImge', $testimonial->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this testimonial?')">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($marquee->isEmpty())
                                    <p class="text-center">No Images found.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel">Update Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="updateForm" method="post" action="" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="updateName" class="form-label">Title</label>
                                    <input id="updateName" class="form-control" name="title" type="text">
                                </div>

                                <div class="mb-3">
                                    <label for="updateDescription" class="form-label">Image</label> <br>
                                    <input id="updateDescription" class="form-control" name="description" type="file" accept="image/*" onchange="previewUpdateImage(event)">
                                </div>
                                <div class="mb-3">
                                    <img id="updateImagePreview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px;">
                                </div>

                                <script>
                                    function previewUpdateImage(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('updateImagePreview');

                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();

                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            };

                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            preview.src = '#';
                                            preview.style.display = 'none';
                                        }
                                    }
                                </script>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const updateButtons = document.querySelectorAll('.update-button');
                    const updateForm = document.getElementById('updateForm');
                    const updateModal = new bootstrap.Modal(document.getElementById('updateModal'));

                    updateButtons.forEach(button => {
                        button.addEventListener('click', function () {
                            const id = this.getAttribute('data-id');
                            const name = this.getAttribute('data-name');


                            updateForm.action = '/slider/update/' + id;
                            updateForm.querySelector('#updateName').value = name;


                            updateModal.show();
                        });
                    });
                });
            </script>
        </div>
    </div>

@endsection

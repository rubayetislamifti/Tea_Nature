@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">

            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs Page</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Category System</h4>

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

                            <form action="{{ route('insertBlogs') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Title</label>
                                    <input id="name" class="form-control" name="name" type="text" oninput="updateMarquee()">
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Description</label>
                                    <textarea id="editor" class="form-control" name="description"></textarea>
                                </div>
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
                            <h4 class="card-title">Blogs List</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($marquee as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->title }}</td>
                                            <td>{!! Str::limit(strip_tags($testimonial->slug), 100) !!}

                                            </td>
                                            @if(isset($testimonial->id))
                                            <td>
                                                <button class="btn btn-warning btn-sm update-button" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                                                <form action="{{ route('deleteBlogs', $testimonial->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this testimonial?')">Remove</button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($marquee->isEmpty())
                                    <p class="text-center">No blogs found.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($testimonial->id))
            <!-- Update Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel">Update Testimonial</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('updateBlogs',['id'=>$testimonial->id])}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="updateName" class="form-label">Name</label>
                                    <input class="form-control" name="title" value="{{  $testimonial->title }}" type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="updateDescription" class="form-label">Description</label>
                                    <textarea id="updateDescription" class="form-control" name="description">{!!  $testimonial->slug !!}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const updateButtons = document.querySelectorAll('.update-button');
                    const updateForm = document.getElementById('updateForm');
                    const updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
                    let updateEditor;
                    ClassicEditor
                        .create( document.querySelector( '#updateDescription' ),{
                            ckfinder:{
                                uploadUrl: '{{route('ckeditior.upload').'?_token='.csrf_token()}}'
                            }
                        } )
                        .then( editor => {
                            console.log( editor );
                        } )
                        .catch( error => {
                            console.error( error );
                        } );
                    updateButtons.forEach(button => {
                        button.addEventListener('click', function () {
                            const id = this.getAttribute('data-id');
                            const name = this.getAttribute('data-name');

                            const description = this.getAttribute('data-description');

                            updateForm.action = '/blogs/update/' + id;
                            updateForm.querySelector('#updateName').value = name;
                            updateForm.querySelector('#updateDescription').value = description;
                            if (updateEditor) {
                                updateEditor.setData(description);
                            }
                            updateModal.show();
                        });
                    });
                });
            </script>

            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor' ),{
                        ckfinder:{
                            uploadUrl: '{{route('ckeditior.upload').'?_token='.csrf_token()}}'
                        }
                    } )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
        </div>
    </div>

@endsection

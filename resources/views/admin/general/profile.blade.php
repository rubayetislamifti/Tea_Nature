@extends('admin.layouts.app')

@section('content')
		<div class="page-wrapper">

			<div class="page-content">

				<div class="row">
					<div class="col-12 grid-margin">
						<div class="card">
							<div class="position-relative">
								<figure class="overflow-hidden mb-0 d-flex justify-content-center">
                                    @if(isset($admins))
                                        @if($adminprofile)
									    <img src="{{asset('admins/'.$admins->name. '/' .$adminprofile->cover_pic)}}" class="rounded-top" alt="profile cover" style="width: 100%; height: 10%;">
                                        @endif
                                    @else
                                        <img src="https://via.placeholder.com/1560x370" class="rounded-top" alt="profile cover">
                                    @endif
								</figure>
								<div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
									<div>
                                        @if(isset($admins))
                                            <a href="{{asset('admins/'.$admins->image)}}" target="_blank">
                                                <img class="wd-80 rounded-circle" src="{{asset('admins/'.$admins->image)}}" alt="{{$admins->name}}">
                                            </a>
                                        @else
                                            <img class="wd-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                        @endif
										<span class="h4 ms-3 text-white">@if(isset($admins))
                                                {{$admins->name}}
                                            @else
                                                Demo Account
                                            @endif</span>
									</div>
                                    <div class="d-none d-md-block">
                                        <button class="btn btn-primary btn-icon-text" data-toggle="modal" data-target="#editProfileModal">
                                            <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editProfileForm" action="{{route('updateProfilePic')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$admins->id}}"/>
                                                        <div class="form-group">
                                                            <label for="profileImage">Profile Image</label>
                                                            <input type="file" class="form-control-file" name="propic" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profileImage">Cover Image</label>
                                                            <input type="file" class="form-control-file" name="cover" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="aboutField">About</label>
                                                            <textarea class="form-control" id="aboutField" name="about" rows="3">@if(isset($adminprofile->about)) {{$adminprofile->about}} @endif</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dropdownMenu">Facebook</label>
                                                            <input type="url" class="form-control-file" name="facebook" value="@if(isset($adminprofile->facebook)) {{$adminprofile->facebook}} @endif" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dropdownMenu">X</label>
                                                            <input type="url" class="form-control-file" name="twitter" value="@if(isset($adminprofile->twitter)) {{$adminprofile->twitter}} @endif" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dropdownMenu">Instagram</label>
                                                            <input type="url" class="form-control-file" name="insta" value="@if(isset($adminprofile->instagram)) {{$adminprofile->instagram}} @endif" id="profileImage">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dropdownMenu">Linkedin</label>
                                                            <input type="url" class="form-control-file" name="link" value="@if(isset($adminprofile->linkedin)) {{$adminprofile->linkedin}} @endif" id="profileImage">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
							</div>
						</div>
					</div>
				</div>
				<div class="row profile-body">
					<!-- left wrapper start -->
					<div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
						<div class="card rounded">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-2">
									<h6 class="card-title mb-0">About</h6>

								</div>
								<p>@if(isset($adminprofile->about)) {{$adminprofile->about}} @endif</p>
								<div class="mt-3">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
									<p class="text-muted">@if(isset($admins))
                                            {{$admins->created_at->format('F j, Y')}}
                                        @else
                                            Demo Account
                                        @endif</p>
								</div>
								<div class="mt-3">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
									<p class="text-muted">@if(isset($admins))
                                            {{$admins->address}}
                                        @else
                                            Demo Account
                                        @endif</p>
								</div>
								<div class="mt-3">
									<label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
									<p class="text-muted">@if(isset($admins))
                                            {{$admins->email}}
                                        @else
                                            Demo Account
                                        @endif</p>
								</div>

								<div class="mt-3 d-flex social-links">
                                    @if(isset($adminprofile->facebook))
									<a href="{{$adminprofile->facebook}}" target="_blank" class="btn btn-icon border btn-xs me-2">
										<i data-feather="facebook"></i>
									</a>
                                    @endif
                                        @if(isset($adminprofile->instagram))
                                    <a href="{{$adminprofile->instagram}}" target="_blank" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="instagram"></i>
                                    </a>
                                        @endif
                                        @if(isset($adminprofile->twitter))
									<a href="{{$adminprofile->twitter}}" target="_blank" class="btn btn-icon border btn-xs me-2">
										<i data-feather="twitter"></i>
									</a>
                                        @endif
                                        @if(isset($adminprofile->linkedin))
                                    <a href="{{$adminprofile->linkedin}}" target="_blank" class="btn btn-icon border btn-xs me-2">
                                        <i data-feather="linkedin"></i>
                                    </a>
                                        @endif
								</div>
							</div>
						</div>
					</div>
					<!-- left wrapper end -->
					<!-- middle wrapper start -->
					<div class="col-md-8 col-xl-6 middle-wrapper">
						<div class="row">
							<div class="col-md-12 grid-margin">
                                <div class="card rounded mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Post a Picture</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('post')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="admin" value="{{$admins->id}}">
                                            <div class="mb-3">
                                                <label for="postDescription" class="form-label">Description</label>
                                                <textarea class="form-control" id="postDescription" rows="3" name="description" placeholder="Enter description"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="postImage" class="form-label">Upload Image</label>
                                                <input class="form-control" type="file" name="pic" id="postImage">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Post</button>
                                        </form>
                                    </div>
                                </div>
                                @foreach($postAll as $post)
								<div class="card rounded">
									<div class="card-header">
										<div class="d-flex align-items-center justify-content-between">
											<div class="d-flex align-items-center">
												<img class="img-xs rounded-circle" src="{{asset('admins/'.$post->image)}}" alt="">
												<div class="ms-2">
													<p>{{$post->name}}</p>

                                                    <p class="tx-11 text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>

                                                </div>
											</div>
                                            <div class="dropdown">
                                                <a type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-lg pb-3px" data-feather="more-horizontal"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="share-2" class="icon-sm me-2"></i> <span class="">Share</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="copy" class="icon-sm me-2"></i> <span class="">Copy link</span></a>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="card-body">
										<p class="mb-3 tx-14">{{$post->description}}</p>
										<img class="img-fluid" src="{{asset('admins/post/' .$post->pictuers)}}" alt="">
									</div>
                                    <div class="card-footer">
                                        <div class="d-flex post-actions">
                                            <form action="{{route('likes')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$post->posts}}">
                                            <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                                                <i class="icon-md" data-feather="heart"></i>
                                                @if(isset($post->likes))
                                                <button type="submit" class="d-none d-md-block ms-2" style="border: hidden;  background: transparent;">
                                                    {{$post->likes}}
                                                </button>
                                                @elseif($post->likes == 0)
                                                    <button type="submit" class="d-none d-md-block ms-2" style="border: hidden; background: transparent;">Like</button>
                                                @endif
                                            </a>
                                            </form>
                                            <a href="javascript:;" class="d-flex align-items-center text-muted">
                                                <i class="icon-md" data-feather="share"></i>
                                                <p class="d-none d-md-block ms-2">Share</p>
                                            </a>
                                        </div>
                                    </div>
								</div>
                                @endforeach
							</div>

						</div>
					</div>
					<!-- middle wrapper end -->
					<!-- right wrapper start -->
					<div class="d-none d-xl-block col-xl-3">
						<div class="row">
							<div class="col-md-12 grid-margin">
								<div class="card rounded">
									<div class="card-body">
										<h6 class="card-title">latest photos</h6>
                    <div class="row ms-0 me-0">
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-2">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>

                    </div>
									</div>
								</div>
							</div>
{{--							--}}
						</div>
					</div>
					<!-- right wrapper end -->
				</div>

			</div>


		</div>
@endsection

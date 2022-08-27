@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        @empty($admin_details[0]->cover_photo)
                            <div class="cover-photo"></div>
                        @else
                            <div class="cover-photo"
                                style="background:url({{ asset('uploads/admin_profile') }}/{{ $admin_details[0]->cover_photo }}); background-size:contain; background-position:center center;">
                            </div>
                        @endempty
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            @empty($admin_details[0]->profile_photo)
                                <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" />
                            @else
                                <img src="{{ asset('uploads/admin_profile') }}/{{ $admin_details[0]->profile_photo }}"
                                    class="img-fluid rounded-circle"
                                    alt="{{ asset('uploads/admin_profile') }}/{{ $admin_details[0]->profile_photo }}">
                            @endempty
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                                <p>{{ auth()->user()->role }}</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
                                <p>Email</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile"><i
                                        class="fa-solid fa-user"></i>
                                    Profile </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#settings"><i
                                        class="fa-solid fa-hammer"></i>>Setteings</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile" role="tabpanel">
                                <div class="pt-4">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Profile Update</h4>
                                        @if (session('profile_update'))
                                            <div class="alert alert-success" role="alert">
                                                <h5>{{ session('profile_update') }}</h5>
                                            </div>
                                        @endif
                                        <form
                                            action="{{ route('admin.adminprofile.update', ['adminprofile' => $admin_details[0]->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Profile Photo</label>
                                                    <input class="form-control" type="file" name="profile_photo">
                                                    @error('profile_photo')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Profile Cover Photo </label>
                                                    <input class="form-control" type="file" name="cover_photo">
                                                    @error('cover_photo')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input style="border-color:rgba(128, 128, 128, 0.365);" type="email"
                                                        readonly class="form-control" name="email"
                                                        value="{{ auth()->user()->email }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Phone Number </label>
                                                    <input style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                                        type="tel" class="form-control" name="phone_number"
                                                        value="{{ $admin_details[0]->phone_number }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                                    type="text" class="form-control" name="address"
                                                    value="{{ $admin_details[0]->address }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Bio</label>
                                                <textarea class="form-control" name="bio" rows="10"
                                                    style="color: black; border-color:rgba(128, 128, 128, 0.365);">{{ $admin_details[0]->bio }}</textarea>
                                                @error('bio')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="settings">
                                <div class="pt-4">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Change Password</h4>
                                        @if (session('password_update'))
                                            <div class="alert alert-success" role="alert">
                                                <h5>{{ session('password_update') }}</h5>
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger" role="alert">
                                                    <h5>{{ $error }}</h5>
                                                </div>
                                            @endforeach
                                        @endif
                                        <form
                                            action="{{ route('admin.user.update', ['user' => auth()->guard('admin')->id()]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                                    type="password" class="form-control" name="old_password">
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                                    type="password" class="form-control" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input style="color: black; border-color:rgba(128, 128, 128, 0.365);"
                                                    type="password" class="form-control" name="password_confirmation">
                                            </div>
                                            <button class="btn btn-primary" type="submit">Update</button>
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
    <!--**********************************
                                                                                                            Content body end
                                                                                                        ***********************************-->
@endsection

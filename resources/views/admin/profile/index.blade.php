@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            {{-- @if (auth()->guard('admin')->user()->profile_photo === null)
                                <img src="{{ Avatar::create(auth()->guard('admin')->user()->name)->toBase64() }}" />
                            @else
                                <img src="{{ asset('dashboard_assets') }}/images/profile/profile.png"
                                    class="img-fluid rounded-circle" alt="">
                            @endif --}}
                            <img src="{{ asset('dashboard_assets') }}/images/profile/profile.png"
                                class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
                                <p>UX / UI Designer</p>
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
                    <div class="pt-3">
                        <div class="settings-form">
                            <h4 class="text-primary">Account Setting</h4>
                            <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Profile Photo</label>
                                        <input class="form-control" type="file" name="profile_photo">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Profile Cover Photo </label>
                                        <input class="form-control" type="file" name="profile_cover">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input style="border-color:rgba(128, 128, 128, 0.365);" type="email" readonly
                                            class="form-control" name="email" value="{{ auth()->user()->email }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone Number </label>
                                        <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="tel"
                                            class="form-control" name="phone_number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="text"
                                        placeholder="1234 Main St" class="form-control" name="address">
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
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

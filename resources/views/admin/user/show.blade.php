@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        @empty($admin_details->cover_photo)
                            <div class="cover-photo"></div>
                        @else
                            <div class="cover-photo"
                                style="background:url({{ asset('uploads/admin_profile') }}/{{ $admin_details->cover_photo }}); background-size:contain; background-position:center center;">
                            </div>
                        @endempty
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            @empty($admin_details->profile_photo)
                                <img src="{{ Avatar::create($auth[0]->name)->toBase64() }}" />
                            @else
                                <img src="{{ asset('uploads/admin_profile') }}/{{ $admin_details->profile_photo }}"
                                    class="img-fluid rounded-circle"
                                    alt="{{ asset('uploads/admin_profile') }}/{{ $admin_details->profile_photo }}">
                            @endempty
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">Name</h4>
                                <p>{{ $auth[0]->name }}</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-primary mb-0">Email</h4>
                                <p>{{ $auth[0]->email }}</p>
                            </div>
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">Role</h4>
                                <p>{{ $auth[0]->role }}</p>
                            </div>
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">Phone Number</h4>
                                <p>{{$admin_details->phone_number }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="profile-email px-2 pt-2">
                            <h4 class="text-muted mb-0">Address</h4>
                            <p>{{$admin_details->address }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="profile-email px-2 pt-2">
                            <h4 class="text-muted mb-0">Bio</h4>
                            <p>{{$admin_details->bio }}</p>
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

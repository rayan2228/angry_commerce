@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="pt-3">
                        <div class="settings-form">
                            @if (session('user_add'))
                                <div class="alert alert-success" role="alert">
                                    <h5>{{ session('user_add') }}</h5>
                                </div>
                            @endif
                            <h4 class="text-primary">Add User</h4>
                            <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>User Name</label>
                                        <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="text"
                                            class="form-control" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>User Email</label>
                                        <input style="color: black; border-color:rgba(128, 128, 128, 0.365);" type="text"
                                            class="form-control" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>User Role</label>
                                        <select style="color: black; border-color:rgba(128, 128, 128, 0.365);" name="role"
                                            class="form-control">
                                            <option value="admin">admin</option>
                                            <option value="editor">editor</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

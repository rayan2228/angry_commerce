@extends('admin.layouts.guest')
@section('content')
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <div class="text-center mb-3">
                                <a href="index.html"><img src="{{ asset('dashboard_assets') }}/images/logo-full.png"
                                        alt=""></a>
                            </div>
                            <h4 class="text-center mb-4 text-white">Account Password Reset</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    <h5>{{ session('status') }}</h5>
                                </div>
                            @endif
                            <form action="{{ route('admin.password.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="form-group">
                                    <label class="text-white"><strong>Email</strong></label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                        style="color: black">
                                </div>
                                <div class="form-group">
                                    <label class="text-white"><strong>Password</strong></label>
                                    <input type="text" class="form-control" name="password" style="color: black">
                                </div>
                                <div class="form-group">
                                    <label class="text-white"><strong>Confirm Password</strong></label>
                                    <input type="text" class="form-control" name="password_confirmation"
                                        style="color: black">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-white text-primary btn-block">Password
                                        Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

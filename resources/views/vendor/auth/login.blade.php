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
                            <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="mb-1 text-white"><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control" style="color:black;"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label class="mb-1 text-white"><strong>Password</strong></label>
                                    <input type="password" name="password" class="form-control" style="color:black;"
                                        autocomplete="current-password">
                                </div>
                                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox ml-1 text-white">
                                            <input type="checkbox" name="remember" id="remember_me"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="remember_me">Rememeber me</label>
                                        </div>
                                    </div>
                                    @if (Route::has('admin.password.request'))
                                        <div class="form-group">
                                            <a class="text-white" href="{{ route('admin.password.request') }}">Forgot
                                                Password?</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-white text-primary btn-block">Sign Me
                                        In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@extends('customer.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on
                        the link
                        we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
                    </div>
                    <p class="card-text">
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-primary" role="alert">
                                <p class="mb-0">'A new verification link has been sent to the email address you provided
                                    during registration.'</p>
                            </div>
                        @endif
                    </p>
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark">Resend Verification Email</button>
                        </form>
                        <form  method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

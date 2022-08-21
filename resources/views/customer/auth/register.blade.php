@extends('customer.layouts.app')
@section('content')
    <!-- breadcrumb_section - start
                                                ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Login/Register</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
                                                ================================================== -->

    <!-- register_section - start
                                                ================================================== -->
    <section class="register_section section_space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <ul class="nav register_tabnav ul_li_center" role="tablist">
                        <li role="presentation">
                            <button class="active" data-bs-toggle="tab" data-bs-target="#signin_tab" type="button"
                                role="tab" aria-controls="signin_tab" aria-selected="true">Sign In</button>
                        </li>
                        <li role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#signup_tab" type="button" role="tab"
                                aria-controls="signup_tab" aria-selected="false">Register</button>
                        </li>
                    </ul>

                    <div class="register_wrap tab-content">
                        <div class="tab-pane fade show active" id="signin_tab" role="tabpanel">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form_item_wrap">
                                    <h3 class="input_title">Email</h3>
                                    <div class="form_item">
                                        <label for="email_input"><i class="fas fa-user"></i></label>
                                        <input id="email_input" type="text" name="email" placeholder="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <h3 class="input_title">Password</h3>
                                    <div class="form_item">
                                        <label for="password_input"><i class="fas fa-lock"></i></label>
                                        <input id="password_input" type="password" name="password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="checkbox_item form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1 text-white">
                                                <input type="checkbox" name="remember" id="remember_me"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="remember_me">Rememeber me</label>
                                            </div>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <div class="form-group">
                                                <a class="text-dark" href="{{ route('password.request') }}">Forgot
                                                    Password?</a>
                                            </div>
                                        @endif
                                    </div>

                                </div>

                                <div class="form_item_wrap">
                                    <button type="submit" class="btn btn_primary">Sign In</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="signup_tab" role="tabpanel">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form_item_wrap">
                                    <h3 class="input_title">Name</h3>
                                    <div class="form_item">
                                        <label for="your name"><i class="fas fa-user"></i></label>
                                        <input id="your name" type="text" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <h3 class="input_title">Email</h3>
                                    <div class="form_item">
                                        <label for="your_email"><i class="fas fa-envelope"></i></label>
                                        <input id="your_email" type="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <h3 class="input_title">Password</h3>
                                    <div class="form_item">
                                        <label for="your password"><i class="fas fa-lock"></i></label>
                                        <input id="your password" type="password" name="password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form_item_wrap">
                                    <h3 class="input_title">Confirm Password</h3>
                                    <div class="form_item">
                                        <label for="your confirm password"><i class="fas fa-lock"></i></label>
                                        <input id="your confirm password" type="password" name="password_confirmation">
                                        @error('password_confirmation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form_item_wrap">
                                    <button type="submit" class="btn btn_secondary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- register_section - end
                                                ================================================== -->

    <!-- newsletter_section - start
                                                ================================================== -->
    <section class="newsletter_section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-6">
                    <h2 class="newsletter_title text-white">Sign Up for Newsletter </h2>
                    <p>Get E-mail updates about our latest products and special offers.</p>
                </div>
                <div class="col col-lg-6">
                    <form action="#!">
                        <div class="newsletter_form">
                            <input type="email" name="email" placeholder="Enter your email address">
                            <button type="submit" class="btn btn_secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- newsletter_section - end
                                                ================================================== -->

    </main>
    <!-- main body - end
                                            ================================================== -->
@endsection

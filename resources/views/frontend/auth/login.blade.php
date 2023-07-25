@extends('frontend.layouts.master')
@section('title')
     {{ (Route::is('admin.login.page')) ? 'Admin' : ''  }} Login
@endsection
@section('content')
    @if (Route::is('admin.login.page'))
        <div class=" container vh-100 vw-100 d-flex justify-content-center align-items-center"
            style="background-image: url({{ asset('assets/images/municipality-of-calauan.jpg') }}); background-size: cover; background-repeat: no-repeat;
    max-width:100%; background-position:center;">
            <div class="row">
                <div class="card bg-glass border-0 text-center d-flex  my-auto p-3">
                    <div class="card-header bg-transparent border-bottom-0 pb-1 d-flex flex-column mb-1">
                        <div class="row justify-content-center mb-2">
                            <img src="{{ asset('assets/images/CL-LOGO.png') }}" alt="CL LOGO"
                                style="height: 140px; width:150px;" style="bg-white">
                        </div>
                        <h4 class="text-dark font-weight-normal">Welcome back!</h4>
                        <p class="text-muted">Enter email and password to log in to your account.</p>
                    </div>
                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('login.auth') }}" class="form">
                            @csrf
                            <!--begin::Form-->
                            <div class="form-group py-3 m-0">
                                <input class="form-control h-auto border-0 placeholder-dark-75" type="text"
                                    placeholder="email" name="email" value="{{ old('email') }}" autocomplete="off" />
                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group py-3 border-top m-0">
                                <input class="form-control h-auto border-0 placeholder-dark-75" type="Password"
                                    placeholder="Password" name="password" id="password" />
                            </div>


                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center ">
                                <button class="btn btn-primary font-weight-bold mx-auto w-100" type="submit">Sign
                                    In</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @else
        <section class="section overflow-hidden">
            <div class="row row-gap-0 bg-white" id="kt_login">
                <!--begin::Aside-->
                <div class="col-lg-3 col-md-4 px-0">
                    <!--begin: Aside Container-->
                    <div class="vh-100 d-flex flex-row-fluid flex-column justify-content-between border border-secondary">
                        <!--begin::Aside body-->
                        <div class="d-flex flex-column-fluid flex-column flex-center p-4 mt-5">
                            <!--begin::Signin-->
                            <div class="login-form login-signin">
                                <div class="text-center mb-10 mb-lg-20">
                                    <img src="{{ asset('assets/images/CL-LOGO.png') }}" alt="logo" width="100"
                                        class="shadow rounded-circle mb-3 mt-2">
                                    <h4 class="text-dark font-weight-normal">Welcome back!</h4>
                                    <p class="text-muted">Enter email and password to log in to your account.</p>
                                </div>

                                <form method="POST" action="{{ route('login.auth') }}" class="form">
                                    @csrf
                                    <!--begin::Form-->
                                    <div class="form-group py-3 m-0">
                                        <input class="form-control h-auto border-0 placeholder-dark-75" type="text"
                                            placeholder="email" name="email" value="{{ old('email') }}"
                                            autocomplete="off" />
                                        {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group py-3 border-top m-0">
                                        <input class="form-control h-auto border-0 placeholder-dark-75" type="Password"
                                            placeholder="Password" name="password" id="password" />
                                    </div>


                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center ">
                                        <button class="btn btn-primary font-weight-bold mx-auto w-100" type="submit">Sign
                                            In</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>

                        </div>
                        <!--end::Aside body-->

                        <!--begin: Aside footer for desktop-->
                        <div class="d-flex flex-column-auto justify-content-between mt-15">
                            <div class="text-dark-50 font-weight-bold my-2 text-center mx-auto">
                                &copy; PUPC
                            </div>

                        </div>
                        <!--end: Aside footer for desktop-->
                    </div>
                    <!--end: Aside Container-->
                </div>
                <div class="col-lg-9 col-md-8 px-0 "
                    style="background-image: url({{ asset('img/cl-townplaza.jpg') }}); background-size: cover; background-repeat: no-repeat;
            max-width:100%;">
                    <div class="d-flex align-items-end justify-content-start vh-100">
                        <h3 class="text-center px-5 mb-5">
                            <span class="bg-glass-radius-10 py-1 px-2">Brgy. {{ $barangay->name }}</span>
                        </h3>
                    </div>
                </div>
                <!--begin::Aside-->
                <!--end::Content-->
            </div>
        </section>
    @endif
@endsection

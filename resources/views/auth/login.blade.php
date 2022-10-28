@extends('layout.auth')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-size1: 100% 50%; background-image: url(assets/media/illustrations/development-hd-dark.png)">

            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <a href="#" class="mb-12">
                    <img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-45px" />
                </a>

                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}"
                        method="POST">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Sign In to {{ $settings->title }}</h1>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">@lang('admin.email')</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                                autocomplete="off" />
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <a href="#" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                            </div>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                                autocomplete="off" />
                        </div>

                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <label class="form-check form-check-custom form-check-solid form-check-inline">
                                <input class="form-check-input" type="checkbox" name="remember" value="1">
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Remember me</span>
                            </label>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

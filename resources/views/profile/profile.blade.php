@extends('layout.master')

@section('title', __('admin.profile'))


@section('breadcrumb')
    <x-toolbar :title="__('admin.profile')" />
@endsection

@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_profile_details" aria-expanded="true"
                aria-controls="kt_account_profile_details">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">@lang('admin.profile info')</h3>
                </div>
            </div>
            <div id="kt_account_profile_details" class="collapse show" style="">
                {!! Form::model(auth()->user(), ['route' => 'profile', 'id' => 'kt_account_profile_details_form', 'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework', 'novalidate', 'files' => true]) !!}
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">@lang('admin.avatar')</label>
                            <div class="col-lg-8">
                                <div class="image-input image-input-outline  @unless($avatar = auth()->user()->getFirstMedia('avatar')) image-input-empty @endif" data-kt-image-input="@if($avatar) true @else false @endif"
                                    style="background-image: url({{ blankAvatar() }})">
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: @if($avatar) url({{ $avatar->getFullUrl() }}) @else none @endif"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="@lang('admin.change avatar')">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="@lang('admin.cancel avatar')">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="@lang('admin.remove avatar')">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">@lang('admin.allowed formats'): png jpg jpeg.</div>
                                @error('avatar')
                                <div class="fv-plugins-message-container">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">@lang('admin.name')</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        {!! Form::text('name', auth()->user()->name, ['class' => "form-control form-control-lg form-control-solid mb-3 mb-lg-0"]) !!}
                                        @error('name')
                                        <div class="fv-plugins-message-container">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label for="username" class="col-lg-4 col-form-label required fw-bold fs-6">@lang('admin.username')</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        {!! Form::text('username', null, ['class' => "form-control form-control-lg form-control-solid mb-3 mb-lg-0"]) !!}
                                        @error('username')
                                        <div class="fv-plugins-message-container">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">@lang('admin.email')</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                {!! Form::email('email', auth()->user()->email, ['class' => "form-control form-control-lg form-control-solid mb-3 mb-lg-0"]) !!}
                                @error('email')
                                <div class="fv-plugins-message-container">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">@lang('admin.password')</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                {!! Form::password('password', ['class' => "form-control form-control-lg form-control-solid mb-3 mb-lg-0"]) !!}
                                @error('password')
                                <div class="fv-plugins-message-container">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            {!! Form::label('password_confirmation', __('admin.password_confirmation'), ['class' => 'col-lg-4 col-form-label fw-bold fs-6']) !!}
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                {!! Form::password('password_confirmation', ['class' => "form-control form-control-lg form-control-solid mb-3 mb-lg-0"]) !!}
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div> --}}

                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{ route('home') }}" type="reset" class="btn btn-white btn-active-light-primary me-2">@lang('admin.cancel')</a>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">@lang('admin.save')</button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>

        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_change_password" aria-expanded="true"
                aria-controls="kt_account_change_password">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">@lang('admin.change password')</h3>
                </div>
            </div>
            <div id="kt_account_change_password" class="collapse show" style="">
                {!! Form::open(['route' => 'profile.change-password', 'id' => 'kt_account_change_password_form', 'class' => 'form fv-plugins-bootstrap5 fv-plugins-framework', 'novalidate', 'files' => true]) !!}
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">@lang('admin.old password')</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                {!! Form::password('old_password', ['class' => "form-control form-control-lg form-control-solid mb-3 mb-lg-0"]) !!}
                                @error('old_password')
                                <div class="fv-plugins-message-container">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6 required">@lang('admin.new password')</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                {!! Form::password('new_password', ['class' => "form-control form-control-lg form-control-solid mb-3 mb-lg-0"]) !!}
                                @error('new_password')
                                <div class="fv-plugins-message-container">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            {!! Form::label('new_password_confirmation', __('admin.password_confirmation'), ['class' => 'col-lg-4 col-form-label fw-bold fs-6 required']) !!}
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                {!! Form::password('new_password_confirmation', ['class' => "form-control form-control-lg form-control-solid mb-3 mb-lg-0"]) !!}
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{ route('home') }}" type="reset" class="btn btn-white btn-active-light-primary me-2">@lang('admin.cancel')</a>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">@lang('admin.update')</button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
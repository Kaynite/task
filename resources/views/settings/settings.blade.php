@extends('layout.master')

@section('title', __('admin.settings'))

@section('content')
    <x-toolbar :title="__('admin.settings')" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="card">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">@yield('title')</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    {!! Form::model($settings, ['route' => 'settings', 'files' => true]) !!}
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">@lang('admin.general info')</button>
                        </li>

                        {{-- <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">@lang('admin.contact info')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">@lang('admin.location info')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">@lang('admin.social info')</button>
                        </li> --}}

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active py-10 px-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @foreach (locales() as $locale)
                                <div class="row mb-10 align-items-center">
                                    <div class="col-md-2">
                                        {!! Form::label("title[$locale]", __("admin.title_$locale")) !!}
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::text("title[$locale]", $settings->getTranslation('title', $locale), ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                        @error("title[$locale]")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                            <div class="separator my-10"></div>

                            @foreach (locales() as $locale)
                                <div class="row mb-10 align-items-center">
                                    <div class="col-md-2">
                                        {!! Form::label("description[$locale]", __("admin.description_$locale")) !!}
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::text("description[$locale]", $settings->getTranslation('description', $locale), ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                        @error("description[$locale]")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="separator my-10"></div> --}}

                            {{-- @foreach (locales() as $locale)
                                <div class="row mb-10 align-items-center">
                                    <div class="col-md-2">
                                        {!! Form::label("keywords[$locale]", __("admin.keywords_$locale")) !!}
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::text("keywords[$locale]", $settings->getTranslation('keywords', $locale), ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                        @error("keywords[$locale]")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach --}}

                        </div>

                        {{-- <div class="tab-pane fade py-10 px-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('email', __('admin.email')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::email('email', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('landline', __('admin.landline')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('landline', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('landline')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('mobile', __('admin.mobile')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('mobile', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('hotline', __('admin.hotline')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('hotline', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('hotline')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('postal_code', __('admin.postal_code')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('postal_code', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('postal_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade py-10 px-5" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            @foreach (locales() as $locale)
                                <div class="row mb-10 align-items-center">
                                    <div class="col-md-2">
                                        {!! Form::label('address', __("admin.address_$locale")) !!}
                                    </div>
                                    <div class="col-md-10">
                                        {!! Form::text("address[$locale]", $settings->getTranslation('address', $locale), ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                        @error("address[$locale]")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('map_location', __('admin.map_location')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('map_location', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('map_location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade py-10 px-5" id="social" role="tabpanel" aria-labelledby="social-tab">
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('facebook', __('admin.facebook')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('facebook', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('facebook')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('twitter', __('admin.twitter')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('twitter', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('whatsapp', __('admin.whatsapp')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('whatsapp', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('whatsapp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('instagram', __('admin.instagram')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('instagram', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('instagram')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('youtube', __('admin.youtube')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('youtube', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('youtube')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-10 align-items-center">
                                <div class="col-md-2">
                                    {!! Form::label('linkedin', __('admin.linkedin')) !!}
                                </div>
                                <div class="col-md-10">
                                    {!! Form::text('linkedin', null, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                                    @error('linkedin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    <div class="text-center mb-5">
                        <button class="btn btn-primary px-20">@lang('admin.save')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

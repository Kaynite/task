@extends('layout.master')

@section('title', __('admin.add new user'))

@section('breadcrumb')
    <x-toolbar :title="__('admin.users')" :subtitle="__('admin.add new user')" />
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="card">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">@yield('title')</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    {!! Form::open(['route' => 'users.store']) !!}
                    <x-text-input name="name" :required="true" :label="__('admin.name')" />
                    <x-text-input name="username" :required="true" :label="__('admin.username')" />
                    <x-email-input name="email" :required="true" :label="__('admin.email')" />
                    <x-password-input name="password" :required="true" :label="__('admin.password')" />
                    <x-check-input name="is_active" :required="true" :label="__('admin.active')" />

                    <div class="separator my-10"></div>

                    <h3 class="mb-12">@lang('admin.roles')</h3>

                    <div class="row">
                        @foreach ($roles as $role)
                            <div class="col-md-3 mb-5">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]"/>
                                    <label class="form-check-label">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="separator my-10"></div>

                    <h3 class="mb-12">@lang('admin.permissions')</h3>

                    <div class="row mb-15">
                        @foreach ($permissions as $permission)
                            <div class="col-md-3 mb-5">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissions[]"/>
                                    <label class="form-check-label">
                                        @lang("permissions.$permission->name")
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <x-submit-button />
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

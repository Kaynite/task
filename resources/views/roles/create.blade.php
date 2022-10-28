@extends('layout.master')

@section('title', __('admin.add new role'))

@section('breadcrumb')
    <x-toolbar :title="__('admin.roles')" :subtitle="__('admin.add new role')" />
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
                    {!! Form::open(['route' => 'roles.store']) !!}
                    <x-text-input name="name" :required="true" :label="__('admin.name')" />
                    <div class="separator my-10"></div>
                    <div class="row mb-10">
                        @foreach ($permissions as $permission)
                            <div class="col-md-3 mb-5">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissions[]" />
                                    <label class="form-check-label">
                                        @lang("permissions.$permission->name")
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        @error('permissions')
                            <small class="text-danger mt-5">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mb-10">
                        <div class="col text-center">
                            <button class="btn btn-primary px-20">@lang('admin.save')</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.master')

@section('title', __('admin.edit role'))


@section('breadcrumb')
    <x-toolbar :title="__('admin.roles')" :subtitle="__('admin.edit role')" />
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <x-card>
                {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'put']) !!}
                <x-text-input name="name" :required="true" :label="__('admin.name')" />
                <div class="separator my-10"></div>
                <div class="row mb-15">
                    @foreach ($permissions as $permission)
                    <div class="col-md-3 mb-5">
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissions[]" @if(in_array($permission->id, $role->permissions->pluck('id')->toArray())) checked @endif />
                            <label class="form-check-label">
                                @lang("permissions.$permission->name")
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row ">
                    <div class="col text-center">
                        <button class="btn btn-primary px-20">@lang('admin.save')</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </x-card>
        </div>
    </div>
@endsection

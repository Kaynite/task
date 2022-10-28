@extends('layout.master')

@section('title', __('admin.edit user'))


@section('breadcrumb')
    <x-toolbar :title="__('admin.users')" :subtitle="__('admin.edit user')" />
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <x-card>
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <x-text-input name="name" :required="true" :label="__('admin.name')" />
                <x-text-input name="username" :required="true" :label="__('admin.username')" />
                <x-email-input name="email" :required="true" :label="__('admin.email')" />
                <x-password-input name="password" :required="false" :label="__('admin.password')" />
                <x-check-input name="is_active" :required="true" :label="__('admin.active')" />


                <div class="separator my-10"></div>

                <h3 class="mb-12">@lang('admin.roles')</h3>

                <div class="row">
                    @foreach ($roles as $role)
                        <div class="col-md-3 mb-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="roles[]" 
                                    @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif
                                />
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
                                <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissions[]"
                                    @if(in_array($permission->id, $user->permissions->pluck('id')->toArray())) checked @endif
                                />
                                <label class="form-check-label">
                                    @lang("permissions.$permission->name")
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="row mb-10">
                    <div class="col text-center">
                        <button class="btn btn-primary px-20">@lang('admin.save')</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </x-card>
        </div>
    </div>
@endsection

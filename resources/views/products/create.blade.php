@extends('layout.master')

@section('title', __('admin.add new product'))

@section('breadcrumb')
    <x-toolbar :title="__('admin.products')" :subtitle="__('admin.add new product')" />
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
                    {!! Form::open(['route' => 'products.store']) !!}
                    <x-text-input name="name" :required="true" :label="__('admin.name')" />
                    <x-number-input name="price" :required="true" :label="__('admin.price')" />

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

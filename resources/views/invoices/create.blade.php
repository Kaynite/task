@extends('layout.master')

@section('title', __('admin.add new invoice'))

@section('breadcrumb')
    <x-toolbar :title="__('admin.invoices')" :subtitle="__('admin.add new invoice')" />
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
                    @livewire('create-invoice')
                </div>
            </div>
        </div>
    </div>
@endsection

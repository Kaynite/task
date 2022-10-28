@extends('layout.master')

@section('title', __('admin.roles'))

@section('breadcrumb')
    <x-toolbar :title="__('admin.roles')" />
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
                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-striped table-bordered fs-6 gx-5 table-rounded', 'id' => 'kt_datatable_example_1']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link href="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('/assets/plugins/custom/datatables/buttons.server-side.js') }}"></script>
    {{ $dataTable->scripts() }}
@endsection

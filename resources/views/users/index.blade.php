@extends('layout.master')

@section('title', __('admin.users'))

@section('breadcrumb')
    <x-toolbar :title="__('admin.users')" />
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            {{-- <div class="card">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">@yield('title')</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    @can('user-create')
                        <div>
                            <a class="btn btn-secondary buttons-create btn-primary mb-5" href="{{ route('users.create') }}">
                                <i class="fas fa-plus fa-fw"></i>
                                @lang('admin.add new user')
                            </a>
                        </div>
                    @endcan

                    <div class="table-responsive">
                        {{ $dataTable->table(['class' => 'table table-striped table-bordered fs-6 gx-5 rounded table-rounded']) }}
                    </div>



                </div>
            </div> --}}

            @livewire('users-table')
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

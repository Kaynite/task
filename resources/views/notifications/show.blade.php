@extends('layout.master')

@section('title', __('admin.notifications'))

@section('breadcrumb')
    <x-toolbar :title="__('admin.requests')" :subtitle="__('admin.notifications')" />
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <x-card>
                @forelse ($notifications as $day => $dayNotifications)
                    <div class="timeline">
                        <h5 class="mb-6">{{ $day }}</h5>
                        @foreach ($dayNotifications as $notificationn)
                            <div class="timeline-item">
                                <div class="timeline-line w-40px"></div>
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <x-icon name="user" />
                                        </span>
                                    </div>
                                </div>
                                <div class="timeline-content mb-10 mt-n2">
                                    <div class="overflow-auto pe-3">
                                        <div class="fs-5 fw-bold mb-2">Invitation for crafting engaging designs that speak
                                            human
                                            workshop</div>
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @empty
                @endforelse
            </x-card>
        </div>
    </div>
@endsection

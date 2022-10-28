<div class="d-flex align-items-center ms-1 ms-lg-3">
    <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px"
        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
        data-kt-menu-flip="bottom"
        @if ($unreadNotifications->count()) wire:click="markAllAsRead" @endif
        >
        <span class="svg-icon svg-icon-1">
            <x-icon name="r-grid"></x-icon>
        </span>
        @if ($unreadNotifications->count())
            <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
        @endif
    </div>
    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" wire:ignore>
        <div class="d-flex flex-column bgi-no-repeat rounded-top"
            style="background-image:url('{{ asset('assets/media/misc/pattern-1.jpg') }}')">
            <h3 class="text-white fw-bold px-9 mt-10 mb-6">Notifications</h3>
            <!--end::Title-->
            <!--begin::Tabs-->
            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab"
                        href="#kt_topbar_notifications_1">Alerts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 " data-bs-toggle="tab"
                        href="#kt_topbar_notifications_2">Updates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab"
                        href="#noti_logs">Logs</a>
                </li>
            </ul>
            <!--end::Tabs-->
        </div>
        <!--end::Heading-->
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab panel-->
            <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
                <!--begin::Items-->
                <div class="scroll-y mh-325px my-5 px-8">
                    @forelse ($notifications as $notification)
                        <x-notification :notification="$notification" />
                    @empty
                    <p class="text-center">@lang('admin.no notifications')</p>

                    @endforelse
                </div>
                <!--end::Items-->
                <!--begin::View more-->
                <div class="py-3 text-center border-top">
                    <a href="#"
                        class="btn btn-color-gray-600 btn-active-color-primary">@lang('notifications.view all')
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                        x="7.5" y="7.5" width="2" height="9" rx="1" />
                                    <path
                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                </div>
                <!--end::View more-->
            </div>
            <!--end::Tab panel-->
            <!--begin::Tab panel-->
            <div class="tab-pane fade " id="kt_topbar_notifications_2" role="tabpanel">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column px-9">
                    <!--begin::Section-->
                    <div class="pt-10 pb-0">
                        <!--begin::Title-->
                        <h3 class="text-dark text-center fw-bolder">Get Pro Access</h3>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="text-center text-gray-600 fw-bold pt-1">Outlines keep you honest. They stoping you
                            from amazing poorly about drive</div>
                        <!--end::Text-->
                        <!--begin::Action-->
                        <div class="text-center mt-5 mb-9">
                            <a href="#" class="btn btn-sm btn-primary px-6" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_upgrade_plan">Upgrade</a>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Illustration-->
                    <div class="text-center px-4">
                        <img class="mw-100 mh-200px" alt="metronic"
                            src="{{ asset('assets/media/illustrations/alert.png') }}" />
                    </div>
                    <!--end::Illustration-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Tab panel-->

            <!--begin::Tab panel-->
            <div class="tab-pane fade" id="noti_logs" role="tabpanel">
                <div class="scroll-y mh-325px my-5 px-8">
                    <!--begin::Item-->
                    <div class="d-flex flex-stack py-4">
                        <div class="d-flex align-items-center me-2">
                            <span class="w-70px badge badge-light-success me-4">200 OK</span>
                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">New order</a>
                        </div>
                        <span class="badge badge-light fs-8">Just now</span>
                    </div>
                </div>
                <div class="py-3 text-center border-top">
                    <a href="../../demo1/dist/pages/profile/activity.html"
                        class="btn btn-color-gray-600 btn-active-color-primary">View All
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                        x="7.5" y="7.5" width="2" height="9" rx="1" />
                                    <path
                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                </div>
            </div>
            <!--end::Tab panel-->

        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Menu-->
</div>

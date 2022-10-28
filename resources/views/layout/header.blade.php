<div id="kt_header" style="" class="header align-items-stretch">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                <span class="svg-icon svg-icon-2x mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                            <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="../../demo1/dist/index.html" class="d-lg-none">
                <img alt="Logo" src="assets/media/logos/logo-3.svg" class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-center" id="kt_header_nav">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_header_nav'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    @yield('breadcrumb')
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <!--begin::Notifications-->
                    @livewire('notifications')
                    <!--end::Notifications-->
                    <!--begin::User-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            <img class="of-cover" src="{{ userAvatar() }}" alt="Avatar" />
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Avatar" src="{{ userAvatar() }}" class="of-cover"/>
                                    </div>
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">Kareem Saber
                                    </div>
                                        <a class="fw-bold text-muted text-hover-primary fs-7">kareem@test.com</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <a href="{{ route('profile') }}" class="menu-link px-5">@lang('admin.profile')</a>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="bottom, top">
                                <a href="#" class="menu-link px-5">
                                    <span class="menu-title position-relative">
                                        @lang('admin.language')
                                        <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
                                            {{-- {{ LaravelLocalization::getCurrentLocaleNative() }} --}}
                                            {{-- <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('assets/media/flags/' . LaravelLocalization::getCurrentLocale() . '.svg') }}" alt="metronic" /> --}}
                                        </span>
                                    </span>
                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    {{-- @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <div class="menu-item px-3">
                                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="menu-link d-flex px-5 active">
                                            <span class="symbol symbol-20px me-4">
                                                <img class="rounded-1" src="{{ asset("assets/media/flags/{$localeCode}.svg") }}" alt="metronic" />
                                            </span>{{ $properties['native'] }}</a>
                                        </div>
                                    @endforeach --}}
                                </div>
                            </div>
                            <div class="menu-item px-5 my-1">
                                <a href="../../demo1/dist/account/settings.html" class="menu-link px-5">Account Settings</a>
                            </div>
                            <div class="menu-item px-5">
                                <a onclick="document.getElementById('logout-form').submit()" class="menu-link px-5">@lang('admin.sign out')</a>
                                <form action="{{ route('logout') }}" method="post" id="logout-form">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

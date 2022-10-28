<div class="card" data-select2-id="select2-data-85-3bok">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6" data-select2-id="select2-data-84-yhpu">
        <!--begin::Card title-->
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <x-icon name="search" />
                </span>
                <input type="text" class="form-control form-control-solid w-250px ps-14" placeholder="Search user"
                    wire:model="search">
            </div>
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base"
                data-select2-id="select2-data-83-viwi">
                <!--begin::Filter-->
                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                    data-kt-menu-placement="bottom-end">
                    <span class="svg-icon svg-icon-2">
                        <x-icon name="filter" />
                    </span>
                    @lang('admin.filter')
                </button>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" style=""
                    data-select2-id="select2-data-82-h4w2">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">@lang('admin.filter options')</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Content-->
                    <div class="px-7 py-5" data-kt-user-table-filter="form" data-select2-id="select2-data-81-z42n">
                        <!--begin::Input group-->
                        <div class="mb-10" data-select2-id="select2-data-91-hf4d">
                            <label class="form-label fs-6 fw-bold">@lang('admin.role'):</label>
                            <select class="form-select form-select-solid fw-bolder" wire:model.defer="role">
                                <option selected value="">@lang('admin.select role')</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                data-kt-menu-dismiss="true" data-kt-user-table-filter="reset"
                                wire:click="resetFilter">@lang('admin.reset')</button>
                            <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true"
                                data-kt-user-table-filter="filter" wire:click="filter">@lang('admin.apply')</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Content-->
                </div>

                @can('user-create')
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <span class="svg-icon svg-icon-2">
                            <x-icon name="plus"></x-icon>
                        </span>
                        @lang('admin.add new user')
                    </a>
                @endcan
            </div>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"
            wire:loading.class="overlay overlay-block">
            <div class="table-responsive overlay-wrapper">
                <table class="table align-middle table-row-dashed fs-6 g-5 dataTable no-footer" id="kt_table_users"
                    role="grid">
                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0" role="row">
                            <th class="w-10px sorting" wire:click="sort('id')">@lang('admin.hashid')
                            </th>
                            <th class="min-w-125px sorting" wire:click="sort('name')">@lang('admin.user')</th>
                            <th class="min-w-125px">@lang('admin.role')</th>
                            <th class="min-w-125px sorting">@lang('admin.last login')</th>
                            <th class="min-w-125px sorting" wire:click="sort('is_active')">@lang('admin.status')</th>
                            <th class="min-w-10px sorting_disabled">@lang('admin.actions')</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <div class="symbol-label">
                                            <img src="{{ $user->getFirstMedia('avatar')?->getFullUrl('thumbnail') ?? blankAvatar() }}"
                                                alt="Emma Smith" class="w-100">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</span>
                                        <span>{{ $user->email }}</span>
                                    </div>
                                </td>
                                <td>
                                    {{ implode(', ', $user->getRoleNames()->toArray()) }}
                                </td>
                                <td>
                                    @if ($user->lastLogin)
                                        <div class="badge badge-light fw-bolder">
                                            {{ $user->lastLogin->datetime->diffForHumans() }}
                                            ({{ $user->lastLogin->datetime }})
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->is_active)
                                        <div class="badge badge-light-success fw-bolder">@lang('admin.active')</div>
                                    @else
                                        <div class="badge badge-light-danger fw-bolder">@lang('admin.suspended')</div>
                                    @endif
                                </td>

                                <td>
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                        data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end">@lang('admin.actions')
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <x-icon name="arrow-down" />
                                        </span>
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="{{ route('users.edit', $user->id) }}" class="menu-link px-3">
                                                @lang('admin.edit')
                                            </a>
                                        </div>
                                        @if (auth()->user()->isNot($user))

                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#modal-{{ $user->id }}">
                                                    @lang('admin.delete')
                                                </a>
                                            </div>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                @lang('admin.delete user')</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @lang('admin.gen delete msg', ['name' => $user->name])
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">@lang('admin.cancel')</button>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-danger">@lang('admin.delete')</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
            <div class="overlay-layer card-rounded bg-dark bg-opacity-5" wire:loading.flex>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                </div>
                <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                    <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>

@if ($is_active)
    <div class="badge badge-light-success">@lang('admin.active')</div>
@else
    <div class="badge badge-light-danger">@lang('admin.suspended')</div>
@endif

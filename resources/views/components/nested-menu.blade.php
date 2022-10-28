@props(['title', 'open' => false])

<div data-kt-menu-trigger="click" class="menu-item menu-accordion @if ($open) hover show @endif">
    <span class="menu-link">
        <span class="menu-icon">
            <span class="svg-icon svg-icon-2">
                <x-icon name="r-grid" />
            </span>
        </span>
        <span class="menu-title">{{ $title }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        {{ $slot }}
    </div>
</div>

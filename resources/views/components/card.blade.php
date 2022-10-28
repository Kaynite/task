@props(['title' => ''])

<div {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">@if ($title) {{ $title }} @else @yield('title') @endif</span>
        </h3>
    </div>
    <div class="card-body py-3">
        {{ $slot }}
    </div>
    @isset($cardFooter)
        <div class="card-footer">
            {{ $cardFooter }}
        </div>
    @endisset
</div>

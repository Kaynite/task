@props(['active', 'url', 'icon', 'title'])

<div class="menu-item">
    <a class="menu-link @if ($active) active @endif"
        href="{{ $url }}">
        <span class="menu-icon">
            <span class="svg-icon svg-icon-2">
                <x-icon :name="$icon"></x-icon>
            </span>
        </span>
        <span class="menu-title">{{ $title }}</span>
    </a>
</div>

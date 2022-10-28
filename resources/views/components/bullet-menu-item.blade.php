@props(['url', 'title', 'active' => false])

<div class="menu-item">
    <a class="menu-link @if($active) active @endif" href="{{ $url }}">
        <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
        </span>
        <span class="menu-title">{{ $title }}</span>
    </a>
</div>

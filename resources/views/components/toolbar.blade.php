@props(['title' => '', 'subtitle' => ''])

<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ $title }}</h1>
@if ($subtitle)
    <span class="h-20px border-gray-200 border-start mx-4"></span>
    <span class="text-muted text-hover-primary">{{ $subtitle }}</span>
@endif

@props(['title' => ''])


<div class="card">
    <div class="card-header card-header-stretch">
        <h3 class="card-title">@if ($title) {{ $title }} @else @yield('title') @endif</h3>
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                {{ $nav }}
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            {{ $panes }}
        </div>
    </div>
</div>

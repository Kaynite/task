@props(['notification'])

<div class="d-flex flex-stack py-4">
    <div class="d-flex align-items-center">
        @if ($notification->type == 'App\Notifications\ClientAdded')
            <div class="symbol symbol-35px me-4">
                <span class="symbol-label bg-light-primary">
                    <span class="svg-icon svg-icon-2 svg-icon-primary">
                        <x-icon name="user" />
                    </span>
                </span>
            </div>
            <div class="mb-0 me-2">
                <a href="{{ route('clients.show', $notification->data['id']) }}" class="fs-6 text-gray-800 text-hover-primary fw-bolder">
                    @lang('notifications.new client')
                </a>
                <div class="text-gray-400 fs-7">{{ $notification->data['name'] }}</div>
            </div>
        @elseif($notification->type == 'App\Notifications\UpcomingEvent')
            <div class="symbol symbol-35px me-4">
                <span class="symbol-label bg-light-warning">
                    <span class="svg-icon svg-icon-2 svg-icon-warning">
                        <x-icon name="calendar" />
                    </span>
                </span>
            </div>
            <div class="mb-0 me-2">
                <a href="{{ route('events.index') }}" class="fs-6 text-gray-800 text-hover-primary fw-bolder">
                    @lang('notifications.upcoming events', ['number' => $notification->data['count']])
                </a>
                <div class="text-gray-400 fs-7">{{ $notification->created_at->format('d F Y') }}</div>
            </div>
        @elseif($notification->type == 'App\Notifications\RequestAdded')
            <div class="symbol symbol-35px me-4">
                <span class="symbol-label bg-light-success">
                    <span class="svg-icon svg-icon-2 svg-icon-success">
                        <x-icon name="envelope" />
                    </span>
                </span>
            </div>
            <div class="mb-0 me-2">
                <a href="{{ route('requests.show', $notification->data['id']) }}"
                    class="fs-6 text-gray-800 text-hover-primary fw-bolder">@lang('notifications.new request')</a>
                <div class="text-gray-400 fs-7">{{ $notification->data['client']['name'] }}</div>
            </div>
        @endif
    </div>
    <span class="badge badge-light fs-8">{{ $notification->created_at->diffForHumans(null, false, true) }}</span>
</div>

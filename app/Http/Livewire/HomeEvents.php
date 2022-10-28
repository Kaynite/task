<?php

namespace App\Http\Livewire;

use App\Enums\EventStatus;
use App\Models\Event;
use Livewire\Component;

class HomeEvents extends Component
{

    public $status;
    public $events;

    public function mount()
    {
        $this->events = Event::query()
            ->with('client')
            ->where('date', '>=', now())
            ->orWhere([
                ['date', '<', now()],
                ['status', EventStatus::notCompleted()],
            ])
            ->authOnly()
            ->get();

        $this->status = $this->events->pluck('status', 'id')->map(fn($status) => $status == 'completed' ? true : false);
    }

    public function render()
    {

        return view('livewire.home-events', [
            'events' => $this->events,
        ]);
    }

    public function updatedStatus($value, $event)
    {
        $event = Event::firstWhere([
            ['id', $event],
            ['user_id', auth()->id()],
        ]);
        if ($value) {
            $event->update(['status' => EventStatus::completed()]);
        } else {
            $event->update(['status' => EventStatus::notCompleted()]);
        }

        return $this->mount();
    }
}

<?php

namespace App\Http\Livewire;

use App\Enums\EventStatus;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $status;
    public $date;
    public $client;

    public function events()
    {
        return Event::query()
            ->authOnly()
            ->whereHas('client', function ($q) {
                return $q->when($this->client, fn($qq) => $qq->where('name', 'LIKE', "%{$this->client}%"));
            })
            ->with('client')
            ->when($this->status, fn($q) => $q->whereStatus($this->status))
            ->when($this->date, fn($q) => $q->where('date', $this->date))
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.events-list', [
            'events'   => $this->events(),
            'statuses' => EventStatus::labels(),
        ]);
    }

    public function complete(Event $event)
    {
        $event->update(
            ['status' => EventStatus::completed()]
        );
    }
}

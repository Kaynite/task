<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\ClientRequest;
use App\Models\Unit;
use App\Models\User;
use Livewire\Component;

class Stats extends Component
{
    public $stats;

    public function mount()
    {
        $this->stats = cache()->remember('stats', now()->addHour(), function () {
            return [
                'clients'      => Client::count(),
                'requests'     => ClientRequest::count(),
                'units'        => Unit::count(),
                'active_users' => User::active()->count(),
            ];
        });
    }

    public function render()
    {
        return view('livewire.stats');
    }

    public function refresh()
    {
        $this->dispatchBrowserEvent('stats-refreshed', ['sdsd']);
        cache()->forget('stats');
        $this->mount();
    }
}

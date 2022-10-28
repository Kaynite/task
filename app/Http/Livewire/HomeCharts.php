<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\ClientRequest;
use Carbon\Carbon;
use Livewire\Component;

class HomeCharts extends Component
{
    public function render()
    {

        return view('livewire.home-charts', [
            'data' => $this->data(),
        ]);
    }

    public function data()
    {
        $clients = Client::query()
            ->selectRaw('COUNT(id) AS clients_count')
            ->selectRaw('MONTH(created_at) AS month')
            ->groupBy('month')
            ->orderBy('month')
            ->whereRaw('YEAR(created_at) = ' . now()->format('Y'))
            ->get()
            ->map(fn($month) => [Carbon::create()->month($month->month)->format('F') => $month->clients_count])
            ->collapse();

        $requests = ClientRequest::query()
            ->selectRaw('COUNT(id) AS requests_count')
            ->selectRaw('MONTH(created_at) AS month')
            ->groupBy('month')
            ->orderBy('month')
            ->whereRaw('YEAR(created_at) = ' . now()->format('Y'))
            ->get()
            ->map(fn($month) => [Carbon::create()->month($month->month)->format('F') => $month->requests_count])
            ->collapse();

        $theClients = collect([]);
        $theRequests = collect([]);

        for ($m = 1; $m <= 12; $m++) {
            $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $theClients[$month] = $clients->toArray()[$month] ?? 0;
            $theRequests[$month] = $requests->toArray()[$month] ?? 0;
        }

        return (object) [
            'clients'  => $theClients,
            'requests' => $theRequests,
        ];
    }
}

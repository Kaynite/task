<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $stats = [
            'clients'  => Client::count(),
            'products' => Product::count(),
            'invoices' => Invoice::count(),
        ];

        return view('home', [
            'stats' => $stats,
        ]);
    }
}

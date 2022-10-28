<?php

namespace App\Http\Controllers;

use App\DataTables\ClientDataTable;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ClientDataTable $table)
    {
        return $table->render('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());
        return redirect()->route('clients.index')->withSuccess(__('admin.created success'));
    }
}

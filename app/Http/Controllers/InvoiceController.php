<?php

namespace App\Http\Controllers;

use App\DataTables\InvoiceDataTable;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InvoiceDataTable $table)
    {
        return $table->render('invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create');
    }
}

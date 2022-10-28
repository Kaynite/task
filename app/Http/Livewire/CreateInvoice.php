<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Product;
use Livewire\Component;

class CreateInvoice extends Component
{
    public $invoice;

    public $number;
    public $date;
    public $client_id;

    public $product;
    public $quantity;

    public function render()
    {
        return view('livewire.create-invoice', [
            'clients'  => Client::pluck('name', 'id'),
            'products' => Product::select('id', 'name', 'price')->get(),
        ]);
    }

    public function saveInvoice()
    {
        $this->invoice = Invoice::create([
            'number'    => $this->number,
            'date'      => $this->date,
            'client_id' => $this->client_id,
        ]);
    }

    public function addProduct()
    {
        if($this->invoice) {
            $product = Product::findOrFail($this->product);

            $this->invoice->products()->attach($product, [
                'quantity' => $this->quantity,
                'price' => $product->price
            ]);

            $this->invoice->refresh();

            $this->product = null;
            $this->quantity = null;
        }
    }
}

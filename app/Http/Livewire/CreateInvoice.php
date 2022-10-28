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
    public $quantity = 0;

    public function render()
    {
        return view('livewire.create-invoice', [
            'clients'  => Client::pluck('name', 'id'),
            'products' => Product::select('id', 'name', 'price')->get(),
        ]);
    }

    /**
     * Save invoice data.
     *
     * @return void
     */
    public function saveInvoice(): void
    {
        $this->invoice = Invoice::create([
            'number'    => $this->number,
            'date'      => $this->date,
            'client_id' => $this->client_id,
        ]);
    }

    /**
     * Handle adding product to the invoice.
     *
     * @return void
     */
    public function addProduct(): void
    {
        if ($this->invoice) {
            $this->validate();

            $product = Product::find($this->product);

            $this->invoice->products()->attach($product, [
                'quantity' => $this->quantity,
                'price'    => $product->price,
            ]);

            $this->invoice->refresh();

            $this->product  = null;
            $this->quantity = 0;
        }
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'product'  => ['required', 'exists:products,id'],
            'quantity' => ['required', 'numeric', 'min:1'],
        ];
    }
}

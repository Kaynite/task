<div>
    @unless($invoice)
        {!! Form::open(['route' => 'clients.store', 'wire:submit.prevent' => 'saveInvoice']) !!}
        <x-text-input name="number" :required="true" :label="__('admin.number')" wire:model.defer="number" />
        <x-date-input name="date" :required="true" :label="__('admin.date')" wire:model.defer="date" />
        <x-select name="client_id" :required="true" :label="__('admin.client')" :options="$clients" placeholder="Select Client"
            wire:model.defer="client_id" />

        <div class="row mb-10">
            <div class="col text-center">
                <button class="btn btn-primary px-20">@lang('admin.save')</button>
            </div>
        </div>
        {!! Form::close() !!}
    @else
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Number</label>
                    <input type="text" class="form-control form-control-solid" value="{{ $invoice->number ?? '' }}"
                        readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control form-control-solid" value="{{ $invoice->date ?? '' }}"
                        readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Client</label>
                    <input type="text" class="form-control form-control-solid" value="{{ $invoice->client->name ?? '' }}"
                        readonly>
                </div>
            </div>
        </div>
        <div class="separator my-10"></div>
        <div class="row align-items-end">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Product</label>
                    <select class="form-control form-control-solid" wire:model.defer="product">
                        <option value="" selected>Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->price }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" class="form-control form-control-solid" wire:model.defer="quantity">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <button class="btn btn-primary w-100" wire:click="addProduct">Add</button>
                </div>
            </div>
        </div>

        <div class="separator my-10"></div>

        @if ($invoice->products->count())
            <table class="border gx-5 rounded-1 table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->products as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->pivot->price }}</td>
                            <td>{{ $item->pivot->quantity }}</td>
                            <td>{{ $item->pivot->price * $item->pivot->quantity }}</td>
                        </tr>
                    @endforeach
                    <tr class="border-top-1 border-dark">
                        <td colspan="3">Total</td>
                        <td>{{ $invoice->products->sum(fn($item) => $item->pivot->price * $item->pivot->quantity) }}</td>
                    </tr>
                </tbody>
            </table>
        @endif

    @endunless
</div>

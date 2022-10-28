<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ClientNote as ClientNoteModel;

class ClientNotes extends Component
{
    use WithPagination;

    public $note;
    public $client;
    protected $clientNotes;

    protected $listeners = ['noteDeleted' => '$refresh'];
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'note' => 'required|max:255',
    ];

    public function render()
    {
        return view('livewire.client-notes', [
            'notes' => $this->client->notes()->with('user')->latest()->paginate(3),
        ]);
    }

    public function saveNote()
    {
        $this->validate();

        ClientNoteModel::create([
            'note'      => $this->note,
            'user_id'   => auth()->id(),
            'client_id' => $this->client->id,
        ]);

        $this->reset('note');
        $this->resetPage();
    }
}

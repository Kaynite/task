<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NoteCard extends Component
{
    public $note;

    public function render()
    {
        return view('livewire.note-card');
    }

    public function delete()
    {
        $this->note->delete();
        $this->emit('noteDeleted', $this->note->id);
    }
}

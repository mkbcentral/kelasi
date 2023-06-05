<?php

namespace App\Http\Livewire\Secretaryship\Inscription\Modals;

use App\Models\Classe;
use App\Models\CostInscription;
use App\Models\Inscription;
use Livewire\Component;

class EditInscriptionModal extends Component
{
    public $inscription;
    public $classes = [];
    public $costs = [];
    public function mount(Inscription $inscription){
        $this-> inscription=$inscription;
        $this->classes = Classe::all();
        $this->costs = CostInscription::all();
    }

    public function render()
    {
        return view('livewire.secretaryship.inscription.modals.edit-inscription-modal');
    }
}

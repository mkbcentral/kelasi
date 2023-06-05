<?php

namespace App\Http\Livewire\Secretaryship\Inscription;

use App\Models\Inscription;
use Livewire\Component;

class ListNewInscriptionsPage extends Component
{
    public $listNewInscriptions = [];
    public function render()
    {
        $this->listNewInscriptions = Inscription::join('students', 'students.id', '=', 'inscriptions.student_id')
            ->select('inscriptions.*', 'students.name', 'students.date_of_birth', 'students.gender', 'students.school_id')
            ->where('students.school_id', auth()->user()->school_id)
            ->orderBy('inscriptions.created_at','DESC')
            ->where('is_new',true)
            ->get();
        return view('livewire.secretaryship.inscription.list-new-inscriptions-page', ['listNewInscriptions', $this->listNewInscriptions]);
    }
}

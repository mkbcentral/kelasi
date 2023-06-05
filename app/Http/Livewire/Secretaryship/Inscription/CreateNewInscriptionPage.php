<?php

namespace App\Http\Livewire\Secretaryship\Inscription;

use App\Models\Classe;
use App\Models\CostInscription;
use App\Models\Inscription;
use App\Models\ScolaryYear;
use App\Models\Student;
use Livewire\Component;

class CreateNewInscriptionPage extends Component
{
    public $classes = [];
    public $costs = [];
    public $name, $gender, $date_of_birth, $school_id, $classe_id, $cost_inscription_id;
    public $listNewInscriptions = [];


    public function saveNewInscription()
    {
        $this->validate([
            'name' => ['required'],
            'gender' => ['required'],
            'classe_id' => ['required', 'numeric'],
            'cost_inscription_id' => ['required', 'numeric'],
            'date_of_birth' => ['required', 'date'],
        ]);

        $student = Student::create([
            'code' => rand(100, 1000),
            'name' => $this->name,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'school_id' => auth()->user()->school->id,
        ]);
        if ($student) {
            $scolaryYear = ScolaryYear::where('is_active', true)->first();
            Inscription::create([
                'student_id' => $student->id,
                'classe_id' => $this->classe_id,
                'cost_inscription_id' => $this->cost_inscription_id,
                'scolary_year_id' => $scolaryYear->id,
            ]);
            session()->flash('message', 'Student inscripted succefully.');
        }
    }

    public function mount()
    {
        $this->classes = Classe::all();
        $this->costs = CostInscription::all();
    }
    public function render()
    {
        return view('livewire.secretaryship.inscription.create-new-inscription-page');
    }
}

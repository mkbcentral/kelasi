<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'classe_id', 'cost_inscription_id', 'scolary_year_id'];

    /**
     * Get the student that owns the Inscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * Get the classe that owns the Inscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    /**
     * Get the costInscription that owns the Inscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function costInscription(): BelongsTo
    {
        return $this->belongsTo(CostInscription::class, 'cost_inscription_id');
    }

    /**
     * Get the scolaryYear that owns the Inscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scolaryYear(): BelongsTo
    {
        return $this->belongsTo(ScolaryYear::class, 'scolary_year_id');
    }
}

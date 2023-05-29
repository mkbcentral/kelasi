<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classe extends Model
{
    use HasFactory;

    protected $fillable=['name','classe_option_id'];

    /**
     * Get the classeOption that owns the Classe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classeOption(): BelongsTo
    {
        return $this->belongsTo(ClasseOption::class, 'classe_option_id',);
    }
}

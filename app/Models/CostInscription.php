<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CostInscription extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'amount', 'school_id','scolary_year_id', 'is_active'];
    /**
     * Get the school that owns the CostInscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}

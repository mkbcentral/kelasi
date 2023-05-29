<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CostOtherType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'scolary_year_id', 'school_id'];

    /**
     * Get the scolaryYear that owns the CostOtherType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scolaryYear(): BelongsTo
    {
        return $this->belongsTo(ScolaryYear::class, 'scolary_year_id');
    }

    /**
     * Get the school that owns the CostOtherType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}

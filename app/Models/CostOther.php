<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CostOther extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount', 'cost_other_type_id', 'is_active'];

    /**
     * Get the costOtherType that owns the CostOther
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function costOtherType(): BelongsTo
    {
        return $this->belongsTo(CostOtherType::class, 'cost_other_type_id');
    }
}

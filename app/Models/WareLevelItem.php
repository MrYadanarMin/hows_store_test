<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class WareLevelItem extends Model
{
    protected $fillable = ['ware_id', 'level_id', 'item_id', 'quantity'];

    public function ware(): BelongsTo
    {
        return $this->belongsTo(Ware::class);
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}

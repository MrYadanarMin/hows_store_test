<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Ware extends Model
{
    protected $fillable = ['name', 'unit_id', 'order'];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function wareLevelItems(): HasMany
    {
        return $this->hasMany(WareLevelItem::class);
    }
}

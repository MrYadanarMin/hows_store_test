<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Item extends Model
{
    protected $fillable = ['name', 'image', 'quantity', 'brand_id'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function wareLevelItems(): HasMany
    {
        return $this->hasMany(WareLevelItem::class);
    }

    public function stockAdjustments(): HasMany
    {
        return $this->hasMany(StockAdjustment::class);
    }

    public function borrows(): BelongsToMany
    {
        return $this->belongsToMany(Borrow::class, 'borrow_items')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}

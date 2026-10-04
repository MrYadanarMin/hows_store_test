<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class StockAdjustment extends Model
{
    protected $table = 'stock_adjustment';

    protected $fillable = ['item_id', 'quantity', 'reason_id', 'status'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function reason(): BelongsTo
    {
        return $this->belongsTo(Reason::class);
    }
}

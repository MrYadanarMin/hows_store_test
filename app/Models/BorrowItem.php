<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BorrowItem extends Model
{
    protected $table = 'borrow_items';

    // Disable auto-incrementing primary key behavior
    public $incrementing = false;

    // Define composite key
    protected $primaryKey = ['borrow_id', 'item_id'];

    protected $fillable = [
        'borrow_id',
        'item_id',
        'quantity',
    ];

    public function borrow(): BelongsTo
    {
        return $this->belongsTo(Borrow::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}

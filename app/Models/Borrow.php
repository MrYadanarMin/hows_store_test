<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Borrow extends Model
{
    protected $fillable = [
        'partner_id',
        'type',
        'borrow_date',
        'return_date',
        'note',
        'status',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'borrow_items')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}

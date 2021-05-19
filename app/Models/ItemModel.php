<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dealeritem;
class ItemModel extends Model
{
    use HasFactory;
     /**
     * Get the user that owns the address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function connectToAddress(): BelongsTo
    {
        return $this->belongsTo(Dealeritem::class);
    }
}

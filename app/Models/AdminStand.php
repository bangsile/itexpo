<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminStand extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stand'
    ];

    public function badge(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

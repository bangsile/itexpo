<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Badge extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'website',
        'iot',
        'mobile',
        'cyber',
        'multimedia',
        'gis',
        'game',
        'network',
        'troubleshoot',
    ];
    public function badge(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

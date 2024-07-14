<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function domesticworker(): BelongsTo
    {
        return $this->belongsTo(Domesticworker::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(ServiceType::class);
    }
}

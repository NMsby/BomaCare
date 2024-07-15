<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homeowner(): HasOne
    {
        return $this->hasOne(Homeowner::class);
    }

    public function domesticworker(): HasOne
    {
        return $this->hasOne(Domesticworker::class);
    }

    public function services(): HasOneOrMany
    {
        return $this->hasMany(ServiceType::class);
    }
}

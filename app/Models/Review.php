<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'homeowner_id',
        'service_type_id',
        'rating',
        'comment',
    ];

    // Relationship with Homeowner
    public function homeowner()
    {
        return $this->belongsTo(User::class, 'homeowner_id');
    }

    // Relationship with ServiceType
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
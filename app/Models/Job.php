<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'worker_id', // Ensure this matches the actual foreign key column in your jobs table
    ];

    // Relationship method to define the belongsTo relationship with Worker model
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}

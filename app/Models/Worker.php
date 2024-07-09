<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'user_id', 'profile_picture', 'name', 'phone_number', 'specialty',
        'id_number', 'age', 'certificate_of_good_conduct', 'recommendation_letter'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(WorkerJob::class);
    }
}
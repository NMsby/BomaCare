<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_picture',
        'name',
        'phone_number',
        'specialty',
        'id_number',
        'age',
        'certificate_of_good_conduct',
        'recommendation_letter',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homeowner extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_picture',
        'name',
        'location',
        'age',
        'gender',
        'phone_number',
        'id_number',
    ];
}

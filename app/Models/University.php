<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    // Fillable
    protected $fillable = [
        'name',
        'slug',
        'village',
        'district',
        'city',
        'province',
        'address',
        'telephone',
        'email',
        'website',
        'logo',
        'status'
    ];
}

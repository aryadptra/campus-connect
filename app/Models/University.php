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
        'description',
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

    // Relationship
    public function faculties()
    {
        return $this->hasMany(UniversityFaculty::class);
    }
}

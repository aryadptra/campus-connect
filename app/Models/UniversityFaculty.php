<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityFaculty extends Model
{
    use HasFactory;

    // Fillable
    protected $fillable = [
        'name',
        'slug',
        'university_id'
    ];

    // Relationship
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityStudyPrograms extends Model
{
    use HasFactory;

    protected $table = 'university_study_programs';

    protected $fillable = [
        'faculty_id',
        'name',
        'slug',
    ];

    public function faculty()
    {
        return $this->belongsTo(UniversityFaculty::class, 'faculty_id');
    }
}

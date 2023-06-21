<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'title',
        'slug',
        'image',
        'isi',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}

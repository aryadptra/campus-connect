<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityRegisterSnm extends Model
{
    use HasFactory;

    protected $table = 'university_register_snms';

    protected $fillable = [
        'university_id',
        'name',
        'description',
        'start_date',
        'end_date',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}

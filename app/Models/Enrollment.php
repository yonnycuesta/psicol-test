<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'all_sclasses',
        'date_enrolled',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function sClass()
    {
        return $this->belongsTo(sClass::class);
    }
}

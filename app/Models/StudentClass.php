<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        's_class_id',
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

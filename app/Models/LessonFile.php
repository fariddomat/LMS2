<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonFile extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'file_name'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}

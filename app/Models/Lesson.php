<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\Constraint\Count;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function course_category()
    {
        return $this->belongsTo(BelongsTo::class);
    }

    public function getVideoAttribute()
    {
        return asset($this->video_path);
    }

    public function lessonFiles()
    {
        return $this->hasMany(LessonFile::class);
    }
}


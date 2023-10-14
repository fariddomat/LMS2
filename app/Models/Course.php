<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $appends=['thumbnail_url'];
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function course_categories()
    {
        return $this->hasMany(CourseCategory::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function getThumbnailUrlAttribute()
    {

        return asset('public/images/courses/'.$this->thumbnail);
        // return Storage::url('images/courses/'.$this->thumbnail);
    }

    public function getUserAttribute()
    {
        $enrollment=Enrollment::where('course_id', $this->id)
            ->where('user_id', auth()->id())
            ->get();
        if($enrollment->count() > 0){
            return true;
        }
        return false;
    }
}

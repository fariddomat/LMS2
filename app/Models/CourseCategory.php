<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    // Define the relationship for child categories
    public function subCategories()
    {
        return $this->hasMany(CourseCategory::class, 'parent_id')->orderBy('sort_id', 'asc');
    }

    // Define the relationship for the parent category
    public function parentCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'parent_id');
    }

    public function getAllSubCategories()
    {
        return $this->subCategories->map(function ($category) {
            return [
                'category' => $category,
                'sub_categories' => $category->getAllSubCategories(),
            ];
        });
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('sort_id', 'asc');
    }
}

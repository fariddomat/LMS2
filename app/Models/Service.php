<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getImagePathAttribute()
    {

        return asset('photos/services/'.$this->image);
        // return Storage::url('images/courses/'.$this->thumbnail);
    }

    public function sections()
    {
        return $this->hasMany(ServiceSection::class);
    }

    public function sliderImages()
    {
        return $this->hasMany(ServiceSliderImage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'order_services');
    }
}

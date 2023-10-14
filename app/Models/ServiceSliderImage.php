<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSliderImage extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function getImagePathAttribute()
    {

        return asset($this->image);
        // return Storage::url('images/courses/'.$this->thumbnail);
    }
}

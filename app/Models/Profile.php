<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function scopeWhenSearch($query,$search)
    {
        return $query->when($search,function($q) use ($search){
            return $q->where('full_name','like',"%$search%" );
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'email');
    }

    public function getUserpAttribute()
    {
       $user= User::where('email',$this->email)->firstOrFail();
       return $user;
    }

}

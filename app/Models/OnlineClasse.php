<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClasse extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyAppointment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function day_of_work()
    {
        return $this->belongsTo(DayOfWork::class);
    }
}

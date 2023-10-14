<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSystem extends Model
{
    use HasFactory;

    public static function success($request)
    {
        LogSystem::create([
            'type'=>'success',
            'content'=>$request,
        ]);
    }

    public static function info($request)
    {
        LogSystem::create([
            'type'=>'info',
            'content'=>$request,
        ]);
    }

    public static function warning($request)
    {
        LogSystem::create([
            'type'=>'warning',
            'content'=>$request,
        ]);
    }

    public static function error($request)
    {
        LogSystem::create([
            'type'=>'error',
            'content'=>$request,
        ]);
    }
}

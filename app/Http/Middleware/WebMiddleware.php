<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\Models\Service;
use Closure;
use Illuminate\Http\Request;

class WebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $services_count=Service::latest()->limit(4)->get();
        $courses_count=Course::latest()->limit(3)->get();
        // dd($services);
        view()->share('services_count',$services_count);
        view()->share('courses_count',$courses_count);
        return $next($request);
    }


}

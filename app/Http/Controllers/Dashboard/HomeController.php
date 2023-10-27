<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\Payment;
use App\Models\PaymentService;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users=User::count()-1;
        $posts=Post::count();
        $services=Service::count();
        $payment_services=PaymentService::count();
        $courses=Course::count();
        $enrollments=Enrollment::count();
        $course_payments=Payment::count();
        $materials=Material::count();
        return view('dashboard.index', compact('users', 'posts', 'services', 'payment_services', 'courses', 'enrollments', 'course_payments', 'materials'));
    }
}

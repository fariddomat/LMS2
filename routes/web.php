<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'WebMiddleware'], function(){
Route::get('/', 'App\Http\Controllers\Home\HomeController@index')->name('home');


Route::resource('posts','App\Http\Controllers\Home\PostController');
Route::resource('academy','App\Http\Controllers\Home\AcademyController');
Route::resource('courses','App\Http\Controllers\Home\CourseController');
Route::resource('services','App\Http\Controllers\Home\ServiceController');
Route::post('/contact', 'App\Http\Controllers\Home\HomeController@contact')->name('contact');
Route::get('/contactPage', 'App\Http\Controllers\Home\HomeController@contactPage')->name('contactPage');
Route::get('/faqs', 'App\Http\Controllers\Home\HomeController@faqs')->name('faqs');
Route::get('/whoiam', 'App\Http\Controllers\Home\HomeController@whoiam')->name('whoiam');
Route::get('/integrativeMedicine', 'App\Http\Controllers\Home\HomeController@integrativeMedicines')->name('integrativeMedicine');

// Route::get('tap-payment', 'App\Http\Controllers\TapController@form')->name('tap.form');
Route::post('tap-payment', 'App\Http\Controllers\TapController@payment')->name('tap.payment');
Route::any('tap-callback','App\Http\Controllers\TapController@callback')->name('tap.callback');
Route::any('enrollments/tap-callback','App\Http\Controllers\Home\EnrollmentController@callback')->name('enrollments.callback');
  });

  Route::resource('profiles','App\Http\Controllers\Home\ProfileController')->only('create', 'store');


// Clear cashe route
Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

 });

 Route::middleware(['auth'])
    ->group(function () {
        Route::resource('profiles','App\Http\Controllers\Home\ProfileController')->except('create', 'store');
        Route::get('profile/passowrd','App\Http\Controllers\Home\ProfileController@password')->name('profiles.password');
        Route::post('profile/changePassowrd','App\Http\Controllers\Home\ProfileController@changePassword')->name('profiles.changePassword');
        Route::post('services/rating','App\Http\Controllers\Home\ServiceController@rating')->name('services.rating');

        Route::resource('enrollments','App\Http\Controllers\Home\EnrollmentController');
        Route::resource('orderservices','App\Http\Controllers\Home\OrderServiceController');
        Route::any('orderservices/tap-callback/{id}','App\Http\Controllers\Home\OrderServiceController@callback')->name('orderservices.callback');

        Route::resource('lessons','App\Http\Controllers\Home\LessonController')->only('show');
    });


 Route::group(['prefix' => '/dashboard', 'middleware' => ['auth', 'role:superadministrator'], 'as' => 'dashboard.'], function () {
   Route::get('home', 'App\Http\Controllers\Dashboard\HomeController@index')->name('home');

    Route::resource('users','App\Http\Controllers\Dashboard\UserController');
    Route::post('ban/{id}', 'App\Http\Controllers\Dashboard\UserController@ban')->name('users.ban');
    Route::post('unban/{id}', 'App\Http\Controllers\Dashboard\UserController@unban')->name('users.unban');
    Route::resource('profiles','App\Http\Controllers\Dashboard\ProfileController');
    Route::post('active/{id}', 'App\Http\Controllers\Dashboard\ProfileController@active')->name('profiles.active');
    Route::post('reject/{id}', 'App\Http\Controllers\Dashboard\ProfileController@reject')->name('profiles.reject');
    Route::post('paid/{id}', 'App\Http\Controllers\Dashboard\ProfileController@paid')->name('profiles.paid');
    Route::resource('trainers','App\Http\Controllers\Dashboard\TrainerController');

    Route::resource('posts','App\Http\Controllers\Dashboard\PostController');
    Route::resource('categories','App\Http\Controllers\Dashboard\CategoryController');
    Route::resource('courses','App\Http\Controllers\Dashboard\CourseController');
    Route::resource('enrollments','App\Http\Controllers\Dashboard\EnrollmentController');
    Route::resource('lessons','App\Http\Controllers\Dashboard\LessonController');
    Route::post('lessons/sortable', 'App\Http\Controllers\Dashboard\LessonController@sort');

    Route::resource('course_categories','App\Http\Controllers\Dashboard\CourseCategoryController');
    Route::post('course_categories/sortable', 'App\Http\Controllers\Dashboard\CourseCategoryController@sort');



    Route::get('lessons/{lesson}/lesson_files/create','App\Http\Controllers\Dashboard\LessonFileController@create')->name('lesson.files.create');
    Route::get('lessons/{lesson}/lesson_files/show','App\Http\Controllers\Dashboard\LessonFileController@show')->name('lesson.files.show');
Route::post('lessons/{lesson}/lesson_files', 'App\Http\Controllers\Dashboard\LessonFileController@store')->name('lesson.files.store');
Route::delete('lesson_files/{lessonFile}', 'App\Http\Controllers\Dashboard\LessonFileController@destroy')->name('lesson.files.destroy');

    Route::get('/courses/{course}/lessons/create', [App\Http\Controllers\Dashboard\LessonController::class, 'create'])->name('lessons.create');

    Route::resource('payments','App\Http\Controllers\Dashboard\PaymentController');

    Route::resource('tags','App\Http\Controllers\Dashboard\TagController');
    Route::resource('whoiam','App\Http\Controllers\Dashboard\WhoIAmController');
    Route::resource('integrativeMedicines','App\Http\Controllers\Dashboard\IntegrativeMedicineController');


    Route::get('/contactForm', 'App\Http\Controllers\Dashboard\ContactFormController@index')->name('contactForm.index');
    Route::delete('/contactForm/{contactForm}', 'App\Http\Controllers\Dashboard\ContactFormController@destroy')->name('contactForm.destroy');
    Route::post('/contactForm/{contactForm}/status', 'App\Http\Controllers\Dashboard\ContactFormController@changeStatus')->name('contactForm.status');
    Route::put('/contactForm/{contactForm}/note', 'App\Http\Controllers\Dashboard\ContactFormController@note')->name('contactForm.note');



    Route::get('/imageGallery/browser', 'App\Http\Controllers\Dashboard\ImageGalleryController@browser')->name('imageGallery.browser');
    Route::post('/imageGallery/uploader', 'App\Http\Controllers\Dashboard\ImageGalleryController@uploader')->name('imageGallery.uploader');

    Route::get('/about', 'App\Http\Controllers\Dashboard\AboutController@create')->name('about.create');
    Route::post('/about', 'App\Http\Controllers\Dashboard\AboutController@store')->name('about.store');

    Route::get('/academy', 'App\Http\Controllers\Dashboard\AcademyController@create')->name('academy.create');
    Route::post('/academy', 'App\Http\Controllers\Dashboard\AcademyController@store')->name('academy.store');

    Route::resource('services','App\Http\Controllers\Dashboard\ServiceController');
    Route::resource('servicereviews','App\Http\Controllers\Dashboard\ServiceReviewController');
    Route::get('/services/{service}/sliderImages', 'App\Http\Controllers\Dashboard\ServiceSliderImageController@index')->name('sliderImages.index');
    Route::get('/services/{service}/sliderImages/create', 'App\Http\Controllers\Dashboard\ServiceSliderImageController@create')->name('sliderImages.create');
    Route::post('/services/{service}/sliderImages', 'App\Http\Controllers\Dashboard\ServiceSliderImageController@store')->name('sliderImages.store');
    Route::get('/services/sliderImages/{image}/edit', 'App\Http\Controllers\Dashboard\ServiceSliderImageController@edit')->name('sliderImages.edit');
    Route::put('/services/sliderImages/{image}', 'App\Http\Controllers\Dashboard\ServiceSliderImageController@update')->name('sliderImages.update');
    Route::delete('/services/sliderImages/{image}/delete', 'App\Http\Controllers\Dashboard\ServiceSliderImageController@destroy')->name('sliderImages.destroy');
    Route::get('/services/{service}/sliderImages/show', 'App\Http\Controllers\Dashboard\ServiceSliderImageController@show')->name('sliderImages.show');
    Route::get('/services/{service}/sliderImages/hide', 'App\Http\Controllers\Dashboard\ServiceSliderImageController@hide')->name('sliderImages.hide');

    Route::get('/services/{service}/sections', 'App\Http\Controllers\Dashboard\ServiceSectionController@index')->name('sections.index');
    Route::get('/services/{service}/sections/create', 'App\Http\Controllers\Dashboard\ServiceSectionController@create')->name('sections.create');
    Route::post('/services/{service}/sections', 'App\Http\Controllers\Dashboard\ServiceSectionController@store')->name('sections.store');
    Route::get('/services/sections/{section}/edit', 'App\Http\Controllers\Dashboard\ServiceSectionController@edit')->name('sections.edit');
    Route::put('/services/sections/{section}', 'App\Http\Controllers\Dashboard\ServiceSectionController@update')->name('sections.update');
    Route::delete('/services/sections/{section}/delete', 'App\Http\Controllers\Dashboard\ServiceSectionController@destroy')->name('sections.destroy');
    Route::delete('/services/sections/{section}/deleteImage', 'App\Http\Controllers\Dashboard\ServiceSectionController@destroyImage')->name('sections.destroyImage');


    Route::resource('orderservices','App\Http\Controllers\Dashboard\OrderServiceController');
    Route::resource('faqs','App\Http\Controllers\Dashboard\FAQController');


    Route::get('/settings/cover', 'App\Http\Controllers\Dashboard\SettingController@cover')->name('setting.cover');
    Route::post('/settings/change_cover', 'App\Http\Controllers\Dashboard\SettingController@change_cover')->name('setting.change_cover');
    Route::get('/settings/logs', 'App\Http\Controllers\Dashboard\SettingController@logs')->name('setting.logs');
    Route::get('/settings/settings', 'App\Http\Controllers\Dashboard\SettingController@settingsText')->name('setting.settingsText');
    Route::post('/settings/setting', 'App\Http\Controllers\Dashboard\SettingController@settings')->name('setting.settings');
    Route::get('/settings/social', 'App\Http\Controllers\Dashboard\SettingController@social')->name('setting.social');
    Route::get('/settings/changePassword', 'App\Http\Controllers\Dashboard\SettingController@changePassword')->name('setting.changePassword');
    Route::post('/settings/changePass', 'App\Http\Controllers\Dashboard\SettingController@changePass')->name('setting.changePass');

 });


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::any('/lessons/video/{file}', 'App\Http\Controllers\Home\HomeController@video')->where(['file'=>'.*']);

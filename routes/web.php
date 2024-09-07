<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardCntroller;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CraftController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\CalenderController;
use App\Http\Controllers\Admin\RoutineController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\FrontendController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=> 'admin', 'middleware'=> 'auth'], function(){
	Route::get('dashboard', [DashboardCntroller::class, 'index'])->name('admin.dashboard');
	Route::resource('slider', SliderController::class); 
	Route::resource('news', NewsController::class); 
	Route::resource('teacher', TeacherController::class); 
	Route::resource('craft', CraftController::class); 
	Route::resource('staff', StaffController::class); 
	Route::resource('calender', CalenderController::class); 
	Route::resource('routine', RoutineController::class); 
	Route::resource('result', ResultController::class); 
	Route::resource('student', StudentController::class); 
});
Route::get('/', [FrontendController::class, 'index']);
Route::get('/teacher', [FrontendController::class, 'teachers'])->name('teacher');
Route::get('/craft', [FrontendController::class, 'crafts'])->name('craft');
Route::get('/staff', [FrontendController::class, 'staffs'])->name('staff');
Route::get('/calender', [FrontendController::class, 'calenders'])->name('calender');
Route::get('/routine', [FrontendController::class, 'routines'])->name('routine');
Route::get('/result', [FrontendController::class, 'results'])->name('result');
Route::get('/student', [FrontendController::class, 'students'])->name('student');


Route::get('preface', function () {
    return view('preface');
})->name('preface');

Route::get('mission&vission', function () {
    return view('mission-vission');
})->name('msvs');
Route::get('contact', function () {
    return view('contact');
})->name('contact');


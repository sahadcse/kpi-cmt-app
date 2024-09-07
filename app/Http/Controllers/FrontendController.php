<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\News;
use App\Models\Teacher;
use App\Models\Craft;
use App\Models\Staff;
use App\Models\Calender;
use App\Models\Routine;
use App\Models\Result;
use App\Models\Student;

class FrontendController extends Controller
{
    public function index(){
    	$sliders = Slider::all();
    	$newses = News::all();
        return view('welcome', compact('sliders','newses'));
    }
    public function teachers()
    {
    	$teachers = Teacher::all();
        return view('teacher', compact('teachers'));
    	
    }
    public function crafts()
    {
    	$crafts = Craft::all();
        return view('craft-instructor', compact('crafts'));
    	
    }
     public function staffs()
    {
    	$staffs = Staff::all();
        return view('staff', compact('staffs'));
    	
    } 
    public function calenders()
    {
    	$calenders = Calender::all();
        return view('calender', compact('calenders'));
    	
    }
     public function routines()
    {
    	$routines = Routine::all();
        return view('routine', compact('routines'));
    	
    }
     public function results()
    {
    	$results = Result::all();
        return view('result', compact('results'));
    	
    }
     public function students()
    {
    	$students = Student::all();
        return view('student', compact('students'));
    	
    }
}

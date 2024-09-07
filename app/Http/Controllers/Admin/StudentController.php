<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'roll' => 'required',
            'name' => 'required',
            'session' => 'required',
            'semester' => 'required',
            'result' => 'required',
            'department' => 'required',
            // 'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        // $image = $request->file('image');
        $slug = str_slug($request->roll);

        // if(isset($image)) {
        //     $currentDate = Carbon::now()->toDateString();
        //     $imagename = $slug.'-'.$currentDate.'.'.$image->getClientOriginalExtension();

        //     if(!file_exists('uploads/slider')){
        //         mkdir('uploads/slider', 077, true);
        //     }
        //     $image->move('uploads/slider', $imagename);
        // }else{
        //     $imagename = 'default.png';
        // }

        $student = new Student();
        $student->roll = $request->roll;
        $student->name = $request->name;
        $student->session = $request->session;
        $student->semester = $request->semester;
        $student->result = $request->result;
        $student->department = $request->department;
        $student->save();

        return redirect()->route('student.index')->with('successMsg', 'Student Successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'roll' => 'required',
            'name' => 'required',
            'session' => 'required',
            'semester' => 'required',
            'result' => 'required',
            'department' => 'required',
            // 'image' => 'required|mimes:jpeg,jpg,png',
        ]);
    

        $slug = str_slug($request->roll);
        $student = Student::find($id);

        $student->roll = $request->roll;
        $student->name = $request->name;
        $student->session = $request->session;
        $student->semester = $request->semester;
        $student->result = $request->result;
        $student->department = $request->department;
        $student->save();

        return redirect()->route('student.index')->with('successMsg', 'Student Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        // if(file_exists('uploads/slider/'.$slider->image))
        // {
        //     unlink('uploads/slider/'.$slider->image);
        // }

        $student->delete();
        return redirect()->back()->with('successMsg', 'Student Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Carbon\Carbon;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
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
            'name' => 'required',
            'designation' => 'required',
            'qualification' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if(isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/teacher')){
                mkdir('uploads/teacher', 077, true);
            }
            $image->move('uploads/teacher', $imagename);
        }else{
            $imagename = 'default.png';
        }

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->designation = $request->designation;
        $teacher->qualification = $request->qualification;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->image = $imagename;
        $teacher->save();

        return redirect()->route('teacher.index')->with('successMsg', 'teacher Successfully saved');
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
         $teacher = Teacher::find($id);
        return view('admin.teacher.edit', compact('teacher'));
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
            'name' => 'required',
            'designation' => 'required',
            'qualification' => 'required',
            'email' => 'required',
            'phone' => 'required',
            /*'image' => 'required|mimes:jpeg,jpg,png',*/
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $teacher = Teacher::find($id);

        if(isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/teacher')){
                mkdir('uploads/teacher', 077, true);
            }
            $image->move('uploads/teacher', $imagename);
        }else{
            $imagename = 'default.png';
        }

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->designation = $request->designation;
        $teacher->qualification = $request->qualification;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->image = $imagename;

        return redirect()->route('teacher.index')->with('successMsg', 'teacher Successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $teacher = Teacher::find($id);
        if(file_exists('uploads/teacher/'.$teacher->image))
        {
            unlink('uploads/teacher/'.$teacher->image);
        }

        $teacher->delete();
        return redirect()->back()->with('successMsg', 'teacher Deleted Successfully');
    }
}

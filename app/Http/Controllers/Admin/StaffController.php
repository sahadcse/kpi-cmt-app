<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Carbon\Carbon;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $staffs = Staff::all();
        return view('admin.staff.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
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

            if(!file_exists('uploads/staff')){
                mkdir('uploads/staff', 077, true);
            }
            $image->move('uploads/staff', $imagename);
        }else{
            $imagename = 'default.png';
        }

        $staff = new Staff();
        $staff->name = $request->name;
        $staff->designation = $request->designation;
        $staff->qualification = $request->qualification;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->image = $imagename;
        $staff->save();

        return redirect()->route('staff.index')->with('successMsg', 'staff Successfully saved');
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
        $staff = Staff::find($id);
        return view('admin.staff.edit', compact('staff'));
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
        $staff = Staff::find($id);

        if(isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/staff')){
                mkdir('uploads/staff', 077, true);
            }
            $image->move('uploads/staff', $imagename);
        }else{
            $imagename = 'default.png';
        }

        
        $staff->name = $request->name;
        $staff->designation = $request->designation;
        $staff->qualification = $request->qualification;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->image = $imagename;

        return redirect()->route('staff.index')->with('successMsg', 'staff Successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $staff = Staff::find($id);
        if(file_exists('uploads/staff/'.$staff->image))
        {
            unlink('uploads/staff/'.$staff->image);
        }

        $staff->delete();
        return redirect()->back()->with('successMsg', 'staff Deleted Successfully');
    }
}

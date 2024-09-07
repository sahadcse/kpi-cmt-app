<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Craft;
use Carbon\Carbon;

class CraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crafts = Craft::all();
        return view('admin.craft.index',compact('crafts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.craft.create');
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

            if(!file_exists('uploads/craft')){
                mkdir('uploads/craft', 077, true);
            }
            $image->move('uploads/craft', $imagename);
        }else{
            $imagename = 'default.png';
        }

        $craft = new craft();
        $craft->name = $request->name;
        $craft->designation = $request->designation;
        $craft->qualification = $request->qualification;
        $craft->email = $request->email;
        $craft->phone = $request->phone;
        $craft->image = $imagename;
        $craft->save();

        return redirect()->route('craft.index')->with('successMsg', 'craft Successfully saved');
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
         $craft = Craft::find($id);
        return view('admin.craft.edit', compact('craft'));
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
        $craft = Craft::find($id);

        if(isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/craft')){
                mkdir('uploads/craft', 077, true);
            }
            $image->move('uploads/craft', $imagename);
        }else{
            $imagename = 'default.png';
        }

        
        $craft->name = $request->name;
        $craft->designation = $request->designation;
        $craft->qualification = $request->qualification;
        $craft->email = $request->email;
        $craft->phone = $request->phone;
        $craft->image = $imagename;

        return redirect()->route('craft.index')->with('successMsg', 'Craft Successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $craft = Craft::find($id);
        if(file_exists('uploads/craft/'.$craft->image))
        {
            unlink('uploads/craft/'.$craft->image);
        }

        $craft->delete();
        return redirect()->back()->with('successMsg', 'Craft Deleted Successfully');
    }
}

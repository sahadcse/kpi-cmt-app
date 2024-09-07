<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Routine;
use Carbon\Carbon;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routines = Routine::all();
        return view('admin.routine.index',compact('routines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.routine.create');
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
            'shift' => 'required',
            'semester' => 'required',
            'document' => 'required|mimes:jpeg,jpg,png,pdf',
        ]);

        $document = $request->file('document');
        $slug = str_slug($request->semester);

        if(isset($document)) {
            $currentDate = Carbon::now()->toDateString();
            $documentname = $slug.'-'.$currentDate.'.'.$document->getClientOriginalExtension();

            if(!file_exists('uploads/routine')){
                mkdir('uploads/routine', 077, true);
            }
            $document->move('uploads/routine', $documentname);
        }else{
            $documentname = 'default.png';
        }

        $routine = new Routine();
        $routine->shift = $request->shift;
        $routine->semester = $request->semester;
        $routine->document = $documentname;
        $routine->save();

        return redirect()->route('routine.index')->with('successMsg', 'Routine Successfully saved');
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
        $routine = Routine::find($id);
        return view('admin.routine.edit', compact('routine'));
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
            'shift' => 'required',
            'semester' => 'required',
            'document' => 'required|mimes:jpeg,jpg,png,pdf',
        ]);

        $document = $request->file('document');
        $slug = str_slug($request->semester);
        $routine = Routine::find($id);

        if(isset($document)) {
            $currentDate = Carbon::now()->toDateString();
            $documentname = $slug.'-'.$currentDate.'.'.$document->getClientOriginalExtension();

            if(!file_exists('uploads/routine')){
                mkdir('uploads/routine', 077, true);
            }
            $document->move('uploads/routine', $documentname);
        }else{
            $documentname = 'default.png';
        }

        $routine->shift = $request->shift;
        $routine->semester = $request->semester;
        $routine->document = $documentname;
        $routine->save();

        return redirect()->route('routine.index')->with('successMsg', 'Routine Successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $routine = Routine::find($id);
        if(file_exists('uploads/routine/'.$routine->document))
        {
            unlink('uploads/routine/'.$routine->document);
        }

        $routine->delete();
        return redirect()->back()->with('successMsg', 'Routine Deleted Successfully');
    }
}

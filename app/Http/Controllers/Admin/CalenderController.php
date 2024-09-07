<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calender;
use Carbon\Carbon;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calenders = Calender::all();
        return view('admin.calender.index',compact('calenders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calender.create');
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

            if(!file_exists('uploads/calender')){
                mkdir('uploads/calender', 077, true);
            }
            $document->move('uploads/calender', $documentname);
        }else{
            $documentname = 'default.png';
        }

        $calender = new calender();
        $calender->shift = $request->shift;
        $calender->semester = $request->semester;
        $calender->document = $documentname;
        $calender->save();

        return redirect()->route('calender.index')->with('successMsg', 'calender Successfully saved');
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
        $calender = Calender::find($id);
        return view('admin.calender.edit', compact('calender'));
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
        $calender = Calender::find($id);

        if(isset($document)) {
            $currentDate = Carbon::now()->toDateString();
            $documentname = $slug.'-'.$currentDate.'.'.$document->getClientOriginalExtension();

            if(!file_exists('uploads/calender')){
                mkdir('uploads/calender', 077, true);
            }
            $document->move('uploads/calender', $documentname);
        }else{
            $documentname = 'default.png';
        }

        $calender->shift = $request->shift;
        $calender->semester = $request->semester;
        $calender->document = $documentname;
        $calender->save();

        return redirect()->route('calender.index')->with('successMsg', 'calender Successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $calender = Calender::find($id);
        if(file_exists('uploads/calender/'.$calender->document))
        {
            unlink('uploads/calender/'.$calender->document);
        }

        $calender->delete();
        return redirect()->back()->with('successMsg', 'Calender Deleted Successfully');
    }
}

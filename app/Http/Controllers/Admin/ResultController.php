<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use Carbon\Carbon;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $results = Result::all();
        return view('admin.result.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.result.create');
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

            if(!file_exists('uploads/result')){
                mkdir('uploads/result', 077, true);
            }
            $document->move('uploads/result', $documentname);
        }else{
            $documentname = 'default.png';
        }

        $result = new Result();
        $result->shift = $request->shift;
        $result->semester = $request->semester;
        $result->document = $documentname;
        $result->save();
         return redirect()->route('result.index')->with('successMsg', 'Result Successfully saved');
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
        $result = Result::find($id);
        return view('admin.result.edit', compact('result'));
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
        $result = Result::find($id);

        if(isset($document)) {
            $currentDate = Carbon::now()->toDateString();
            $documentname = $slug.'-'.$currentDate.'.'.$document->getClientOriginalExtension();

            if(!file_exists('uploads/result')){
                mkdir('uploads/result', 077, true);
            }
            $document->move('uploads/result', $documentname);
        }else{
            $documentname = 'default.png';
        }

        $result->shift = $request->shift;
        $result->semester = $request->semester;
        $result->document = $documentname;
        $result->save();

        return redirect()->route('result.index')->with('successMsg', 'result Successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Result::find($id);
        if(file_exists('uploads/result/'.$result->document))
        {
            unlink('uploads/result/'.$result->document);
        }

        $result->delete();
        return redirect()->back()->with('successMsg', 'Result Deleted Successfully');
    }
}

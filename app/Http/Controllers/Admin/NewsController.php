<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newses = News::all();
        return view('admin.news.index',compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
            'title' => 'required',
            'document' => 'required|mimes:jpeg,jpg,png,pdf',
        ]);

        $document = $request->file('document');
        $slug = str_slug($request->title);

        if(isset($document)) {
            $currentDate = Carbon::now()->toDateString();
            $documentname = $slug.'-'.$currentDate.'.'.$document->getClientOriginalExtension();

            if(!file_exists('uploads/news')){
                mkdir('uploads/news', 077, true);
            }
            $document->move('uploads/news', $documentname);
        }else{
            $documentname = 'default.png';
        }

        $news = new News();
        $news->title = $request->title;
        $news->document = $documentname;
        $news->save();

        return redirect()->route('news.index')->with('successMsg', 'News Successfully saved');
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
         $news = News::find($id);
        return view('admin.news.edit', compact('news'));
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
            'title' => 'required',
            /*'document' => 'required|mimes:jpeg,jpg,png,pdf',*/
        ]);

        $document = $request->file('document');
        $slug = str_slug($request->title);
        $news = News::find($id);

        if(isset($document)) {
            $currentDate = Carbon::now()->toDateString();
            $documentname = $slug.'-'.$currentDate.'.'.$document->getClientOriginalExtension();

            if(!file_exists('uploads/news')){
                mkdir('uploads/news', 077, true);
            }
            $document->move('uploads/news', $documentname);
        }else{
            $documentname = 'default.png';
        }

        
        $news->title = $request->title;
        $news->document = $documentname;
        $news->save();

        return redirect()->route('news.index')->with('successMsg', 'News Successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $news = News::find($id);
        if(file_exists('uploads/news/'.$news->document))
        {
            unlink('uploads/news/'.$news->document);
        }

        $news->delete();
        return redirect()->back()->with('successMsg', 'News Deleted Successfully');
    }
}

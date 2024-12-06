<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = News::all();
        return view('admin.news.index', ['news'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->except("_token");
        dd($data);
        $image = $request->file('image'); 
        $storedPath = $image->move('uploads_news', $image->getClientOriginalName());
        $data['image'] = $image->getClientOriginalName();
        News::create($data);
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $news = News::find($id);
        return view('admin.news.edit',['news'=> $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $news = News::find($id);
        if(empty($request -> file('image'))){
            $filename = $news->image;
        } else{
            $image = $request->file('image'); 
            $storedPath = $image->move('uploads_news', $image->getClientOriginalName());
            $filename = $image->getClientOriginalName();
           
            if(file_exists(public_path('uploads_news/'.$news->image))){
                unlink(public_path('uploads_news/'.$news->image));
            }
        }

        $news->title = $request->title;
        $news->author = $request->author;
        $news->intro = $request->intro;
        $news->content = $request->content;
        $news->image = $filename;
        $news->save();
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $news = News::find($id);
        if(file_exists(public_path('uploads_news/'.$news->image))){
            unlink(public_path('uploads_news/'.$news->image));
        }
        $news -> delete();
        return redirect()->route('admin.news.index');
    }
}

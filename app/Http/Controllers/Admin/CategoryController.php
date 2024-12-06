<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  
        $data = Category::all();
        return view('admin.category.index', [
            'categories' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $file = $request -> file('image');
        $filename = $file->getClientOriginalName();
        $file->move('uploads', $filename);
        
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $filename;
        $category->save();
 
        return redirect()->route('admin.category.index')->with('success', 'Thành công') ;
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
        $category = Category::find($id);
        return view('admin.category.edit', [
            'category' => $category
        ]);
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $category = Category::find($id);

        if(empty($request -> file('image'))){
            $filename = $category->image;
        } else {
            $validated = $request->validate([
                'image' => 'mimes:jpg,png'
            ], [
                'image.mimes' => 'Hình của bạn chỉ được phép là jpg hoặc png'
            ]);

            $file = $request -> file('image');
            $filename = $file->getClientOriginalName();
            $file->move('uploads', $filename); 

            if(file_exists(public_path('uploads/'.$category->image))){
                unlink(public_path('uploads/'.$category->image));
            }
        }



        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $filename;
        $category->save();
 
        return redirect()->route('admin.category.index')->with('success', 'Thành công') ;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);

        if(file_exists(public_path('uploads/'.$category->image))){
            unlink(public_path('uploads/'.$category->image));
        }
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Xóa Thành công') ;
    }
}

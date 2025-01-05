<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HasRoles;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user_role');
    }

    public function index()
    {
        $categories=Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        if($request->user()->hasRole('admin')){
            $validatedData=$request->validated();
            if ($request->hasFile('image')) {
                $file=$request->file('image');
                $path = UploadImage($file, "categories",'category');
                $validatedData['image'] = $path;
            }
            Category::create($validatedData);
            return redirect()->route('categories.index')->with('success', 'Category created successfully!');
        }
        else{
            abort(403,'you do not have permissions to add a Category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $courses=Course::with('category')->where('category_id',$category->id)->get();
        return view('categories.show', compact('category','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if($request->user()->hasRole('admin')){
            $validatedData=$request->validated();
            if($request->hasFile('image')){
                $file = $request->file('image');
                $path = UploadImage($file,'categories','category');    
                $validatedData['image'] = $path;
            }
            $category->update([
                'name' => $validatedData['name'],
                'image' => $validatedData['image'],
            ]);
            return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
        }
        else{
            abort(403,'you do not have permissions to update a Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $user=Auth::user();
        if($user->hasRole('admin')){
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
        }
        else{
            abort(403,'you do not have permissions to delete a Category');
        }
    }
}

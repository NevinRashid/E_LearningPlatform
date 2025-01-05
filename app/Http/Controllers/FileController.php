<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Course;
use App\Http\Requests\FileRequest;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
       $files=File::all();
       return view('files.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * displays the create file form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $courses=Course::all();
        return view('files.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * store files in the database
     * @param \App\Http\Requests\FileRequest $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store(FileRequest $request)
    {
        $file=$request->file('file');
        $type=getFileType(fopen($file,'r'));//get file type (helpers folder)
        $path=storageFolder($type,$file);//file path (helpers folder)
        $storefile=File::create(['name'=>$request->name,'path'=>$path,'type'=>$type,'course_id'=>$request->course]);
        $course=Course::findOrFail($request->course);
        $course->files()->save($storefile);//to attach the new file with the course relationship
        return redirect()->route('files.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $file=File::where('id',$id)->first();
        return view('files.video',compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

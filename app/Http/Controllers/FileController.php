<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Course;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;

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
        $validated=$request->validated();
        $file=$request->file('file');
        $type=getFileType(fopen($file,'r'));//get file type (helpers folder)
        $path=storageFolder($type,$file);//file path (helpers folder)
        $storefile=File::create(['name'=>$validated['name'],'path'=>$path,'type'=>$type,'course_id'=>$validated['course']]);
        $course=Course::findOrFail($validated['course']);
        $course->files()->save($storefile);//to attach the new file with the course relationship
        return redirect()->route('files.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $file=File::where('id',$id)->first();
        $comments=Comment::where('file_id',$file->id)->get();
        return view('files.video',compact('file','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpg,png,jpeg,doc,docx,pdf|max:2048',
            'type' => 'nullable|string|max:255',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        // Update name and type
        $file->name = $request->input('name');
        $file->type = $request->input('type');
        $file->course_id = $request->input('course_id');

        // Check if a new file is uploaded
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::delete($file->path);

            // Store new file
            $filePath = $request->file('file')->store('files');
            $file->path = $filePath;
        }

        $file->save();

        return redirect()->route('files.index')->with('success', 'File updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        // Delete the file from storage
        Storage::delete($file->path);
        // Delete the record from the database
        $file->delete();

        return redirect()->route('files.index')->with('success', 'File deleted successfully.');
    }
}

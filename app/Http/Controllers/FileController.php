<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function create()
    {
        return view('files.create');
    }

    public function show(File $file)
    {
        return view('files.show', compact('file'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,png,jpeg,doc,docx,pdf|max:2048',
            'type' => 'nullable|string|max:255', // Add validation for type
            'course_id' => 'nullable|exists:courses,id', // Assuming there's a courses table
        ]);

        // Store file
        $filePath = $request->file('file')->store('files'); // Store the file in the "files" directory

        // Create a new File record
        $file = new File();
        $file->name = $request->input('name');
        $file->path = $filePath;
        $file->type = $request->input('type');
        $file->course_id = $request->input('course_id');
        $file->save();

        return redirect()->route('files.index')->with('success', 'File uploaded successfully.');
    }

    public function index()
    {
        $files = File::all(); // Retrieve all files
        return view('files.index', compact('files'));
    }

    public function edit(File $file)
    {
        return view('files.edit', compact('file'));
    }

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

    public function destroy(File $file)
    {
        // Delete the file from storage
        Storage::delete($file->path);
        // Delete the record from the database
        $file->delete();

        return redirect()->route('files.index')->with('success', 'File deleted successfully.');
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show File</title>
</head>
<body>
    <h1>File Details</h1>

    <div>
        <strong>Name:</strong> {{ $file->name }}<br>
        <strong>Path:</strong> {{ $file->path }}<br>
        <strong>Type:</strong> {{ $file->type }}<br>
        <strong>Course ID:</strong> {{ $file->course_id }}<br>
    </div>

    <div>
        <a href="{{ route('files.index') }}">Back to Files</a>
        <a href="{{ route('files.edit', $file) }}">Edit</a>
        <form action="{{ route('files.destroy', $file) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit File</title>
</head>
<body>
    <h1>Edit File</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('files.update', $file) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $file->name }}" required>
        </div>
        <div>
            <label for="file">File (Leave blank to keep current file)</label>
            <input type="file" name="file" id="file">
        </div>
        <div>
            <label for="type">Type</label>
            <input type="text" name="type" id="type" value="{{ $file->type }}">
        </div>
        <div>
            <label for="course_id">Course ID</label>
            <input type="number" name="course_id" id="course_id" value="{{ $file->course_id }}">
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h1>Upload File</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="file">File</label>
            <input type="file" name="file" id="file" required>
        </div>
        <div>
            <label for="type">Type</label>
            <input type="text" name="type" id="type">
        </div>
        <div>
            <label for="course_id">Course ID</label>
            <input type="number" name="course_id" id="course_id">
            <small>Enter course ID if applicable.</small>
        </div>
        <button type="submit">Upload</button>
    </form>
</body>
</html>

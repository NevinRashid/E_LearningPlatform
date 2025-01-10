<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files Index</title>
</head>
<body>
    <h1>Files</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('files.create') }}">Upload New File</a>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Path</th>
            <th>Type</th>
            <th>Course ID</th>
            <th>Actions</th>
        </tr>
        @foreach($files as $file)
        <tr>
            <td><a href="{{ route('files.show', $file) }}">{{ $file->name }}</a></td>
            <td>{{ $file->path }}</td>
            <td>{{ $file->type }}</td>
            <td>{{ $file->course_id }}</td>
            <td>
                <a href="{{ route('files.edit', $file) }}">Edit</a>
                <form action="{{ route('files.destroy', $file) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>

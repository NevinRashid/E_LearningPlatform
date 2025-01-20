@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-multiple"></i>
        </span> Files
    </h3>
</div>

<div class="row">
    @if (auth()->user()->hasRole('admin'))  
        <div class="col">
            <a href="{{ route('files.create') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Add new file</a>
        </div>
    @endif
</div>

@if ($files->count()>0)
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All files</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Type </th>
                            <th> Course </th>
                            <th> Category </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td> {{ $file->id }} </td>
                            <td> {{ $file->name }} </td>
                            <td>{{ $file->type }}</td>
                            <td>{{$file->course->title}} </td>
                            <td> {{ $file->course->category->name }} </td>
                            <td> 
                                @if (auth()->user()->hasRole('admin'))  
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('files.show', $file) }}" class="btn btn-outline-success btn-sm">show</a>
                                        <a href="{{ route('files.edit', $file) }}" class="btn btn-outline-info btn-sm">edit</a>
                                        <form action="{{ route('files.destroy', $file->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this file?')">delete</button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted" style="margin-top: 10px">
                    <small>
                        Showing {{ $files->firstItem() }} to {{ $files->lastItem() }} of {{ $files->total() }} results
                    </small>
                </div>
                <div>
                    {{ $files->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@else
<div class="row">
    <p>There are no files currently</p>
</div>
@endif
@endsection

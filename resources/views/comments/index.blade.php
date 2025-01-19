@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-comment-text-multiple"></i>
        </span> Comments
    </h3>
</div>
<div class="row">
    @if (auth()->user()->hasRole('admin'))  
        <div class="col">
            <a href="{{ route('comments.create') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Add new comment</a>
        </div>
    @endif
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All comments</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Comment text </th>
                            <th> comment writer </th>
                            <th> role </th>
                            <th> course </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td> {{ $comment->id }} </td>
                            <td> {{ $comment->comment_text }} </td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->user->getRoleNames()->first() }}</td>
                            <td>{{$comment->course->title}} </td>
                            <td> 
                                @if (auth()->user()->hasRole('admin'))  
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('comments.show', $comment) }}" class="btn btn-outline-success btn-sm">show</a>
                                        <a href="{{ route('comments.edit', $comment) }}" class="btn btn-outline-info btn-sm">edit</a>
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this comment?')">delete</button>
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
                        Showing {{ $comments->firstItem() }} to {{ $comments->lastItem() }} of {{ $comments->total() }} results
                    </small>
                </div>
                <div>
                    {{ $comments->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

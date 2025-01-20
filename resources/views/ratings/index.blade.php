@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-star"></i>
        </span> Ratings
    </h3>
</div>
<div class="row">
        <div class="col">
            <a href="{{ route('ratings.create') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Add new rating</a>
        </div>
</div>
@if ($ratings->count()>0)
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All ratings</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> User name </th>
                            <th> Role </th>
                            <th> Course </th>
                            <th> Rating value </th>
                            <th> Rating at </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($ratings as $rating)
                        <tr>
                            <td> {{ $rating->user->name }} </td>
                            <td>{{ $rating->user->getRoleNames()->first() }}</td>
                            <td>{{ $rating->course->title}} </td>
                            <td>{{ $rating->rating_value}} </td>
                            <td>{{$rating->created_at}} </td>
                            <td>
                                @if (auth()->user()->hasRole('admin'))  
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="{{ route('ratings.destroy', $rating->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this rating?')">delete</button>
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
                        Showing {{ $ratings->firstItem() }} to {{ $ratings->lastItem() }} of {{ $ratings->total() }} results
                    </small>
                </div>
                <div>
                    {{ $ratings->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <p>There are no ratings currently</p>
</div>
@endif
@endsection

@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-grid"></i>
        </span> Categories
    </h3>
</div>
<a href="{{ route('categories.create') }}" type="button" class="btn btn-gradient-primary btn-fw" style="margin-top:20px;">Add new category</a>
@endsection




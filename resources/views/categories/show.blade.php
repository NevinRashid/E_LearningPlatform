<div class="col-md-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $category->name }}</h4>
            <img src="{{ asset('imgs/'.$category->image) }}" class="img-fluid mx-auto d-block" >
            <a href="{{ route('categories.show',$category) }}" type="button" class="btn btn-gradient-info" style="margin-top:10px">Show</a>
        </div>
    </div>
</div>

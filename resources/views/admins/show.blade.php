@extends('main')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Current Admin</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Mobile phone </th>
                                <th> Created at </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @if (file_exists('storage/'.$admin->image))
                                        <img src="{{ asset('storage/'.$admin->image) }}" class="me-2" alt=""> {{ $admin->name}}
                                    @else
                                        <img src="{{asset('storage/images/face.webp')}}" class="me-2" alt=""> {{ $admin->name}}
                                    @endif 
                                    <img src="{{ asset('storage/'.$admin->image) }}" class="me-2" alt=""> {{ $admin->name }}
                                </td>
                                <td> {{ $admin->email }} </td>
                                <td> {{ $admin->phone }} </td>
                                <td> {{ $admin->created_at }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col">
                <a href="{{ route('admins.index') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Back</a>
            </div>
    </div>
</div>
@endsection
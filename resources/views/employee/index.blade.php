@extends('layouts.app')

@section('content')
<style>
img.img-circle{
    width: 40px;
    height: 40px;
    border: 2px solid #51D2B7;
}
</style>
<div class="container">
    @extends('layouts.message')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="5"><h2>Employee Lists</h2></th>
                            <th colspan="2">
                                <a href="{{route('employee.create')}}">
                                    <span class="btn btn-info">Add Employee</span>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>DoJ</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>
                            @if (file_exists( storage_path() . '/'.$value->featured_image))
                                <img src="{{asset('storage/')}}/{{$value->featured_image }}" class="img-circle">
                            @endif
                            </td>
                            <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->mobile }}</td>
                            <td>{{ $value->doj }}</td>
                            <td>{{ $value->status }}</td>
                            <td>
                                <a href="{{ route('employee.edit', $value->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form method="post" action="{{ route('employee.destroy', $value->id) }}" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $records->links('pagination::bootstrap-4') }}
                
            </div>
        </div>
    </div>
</div>
@endsection

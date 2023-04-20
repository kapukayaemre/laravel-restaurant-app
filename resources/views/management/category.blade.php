@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <strong>Category</strong>
                <a href="{{ route("category.create") }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Create Category</a>
                <hr>
                @if(session()->has('status'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        {{ session()->get('status') }}
                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td><a href="{{ route("category.edit", ['category' => $category->id]) }}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{ route("category.destroy", ['category' => $category->id]) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection

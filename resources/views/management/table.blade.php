@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                <strong>Table</strong>
                <a href="{{ route("table.create") }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Create Table</a>
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
                            <th scope="col">Table</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tables as $table)
                        <tr>
                            <td>{{ $table->id }}</td>
                            <td>{{ $table->name }}</td>
                            <td>{{ $table->status }}</td>
                            <td><a href="{{ route("table.edit", ['table' => $table->id]) }}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{ route("table.destroy",['table' => $table->id]) }}" method="POST">
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

                </div>

            </div>
        </div>
    </div>
@endsection

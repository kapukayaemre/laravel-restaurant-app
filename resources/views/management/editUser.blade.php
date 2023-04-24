@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('management.inc.sidebar')
            <div class="col-md-8">
                Create a User
                <hr>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    <button type="button" class="close" data-dismiss="alert">X</button>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/management/user/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-3" placeholder="Name...">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control mb-3" placeholder="Email...">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control mb-3" placeholder="Password...">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control">
                            <option value="">Select Role</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected': '' }}>Admin</option>
                            <option value="cashier" {{ $user->role == 'cashier' ? 'selected': '' }}>Cashier</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

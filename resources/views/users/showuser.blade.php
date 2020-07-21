@extends('posts.layers.layout')
@section('title')
    All users
@endsection
@section('content')
    <div class="container text-center">
        <h1>All Users</h1>
        <a href=""><i class="fa fa-2x fa-plus" aria-hidden="true"></i></a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">User Name</th>
                <th scope="col">user Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($data as $user)
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href=""><i class="fa fa-2x fa-pencil" aria-hidden="true"></i></a></td>
                    <td><a href=""><i class="fa fa-2x fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
            @endforeach
            </tbody>
        </table
    </div>
    >@endsection

@extends('layouts.layout')
@section('title')
    Add new User
@endsection
@section('content')
    <div class="container text-center">
        <h1>Add new User</h1>
        @if (session()->get('success'))
            <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ route('user.store') }}" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection





@extends('layouts.layout')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="container text-center">
        <h1>Edit new User</h1>
        @if (session()->get('success'))
            <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ route('user.update',$data->id) }}" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" value="{{$data->email}}" name="email">
            </div>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" value="{{$data->password}}" name="password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" value="{{$data->name}}" name="name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

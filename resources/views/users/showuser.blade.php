@extends('layouts.layout')
@section('title')
    All users
@endsection
@section('content')

    <div class="container text-right">
        <h1 style="font-family:'Bodoni MT Black'" class="text-center">All Users</h1>
        <a href="{{route('user.create')}}" class="btn bg-primary"><i class="fa fa-2x fa-plus" aria-hidden="true"></i></a>
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">User Name</th>
                <th scope="col">User Email</th>
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
                    <td><a href="{{ route('user.edit',$user->id)}} " class="btn bg-success"><i class="fa fa-2x fa-pencil" aria-hidden="true"></i></a></td>
                    <td>
                        <form method="post" action="{{route('user.destroy', $user->id)}}"class="m-auto">
                            <div class="form-group text-center">
                                @method('DELETE')
                                @csrf
                                <button type="submit"  class="btn bg-danger" ><i class="fa fa-2x fa-trash-o" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

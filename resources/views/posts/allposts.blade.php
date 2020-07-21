@extends('layouts.layout')
@section('title')
   All Posts
@endsection
@section('content')
    {{--  SHOW ALL POSTS  --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <H1 style="font-family:'Bodoni MT Black';color: #4c110f" class="my-4">All Posts Page</H1>
               {{--          LOOP ON OUR DATABASE TO GET ALL POSTS              --}}
                @foreach($data as $data)
                <div class="content d-flex text-center my-3" style="justify-content: space-between;border:3px solid black;">
                    <div class="card  w-100 text-center">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{asset('uploads/'.$data->image)}}" class="card-img w-100" style="height: 500px">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body bg-warning"style="height: 500px">
                                    <h2 class="card-title"> Title : {{ $data->title }}</h2>
                                    <p class="card-text" style="font-weight: bold;color: blue"> {{$data->cont}}</p>
                                    <h4 class="card-text"> Created at : {{ $data->created_at }}</h4>
                                    <div class="card-group">
                                    {{--            EDIT BUTTON                            --}}
                                        <div class="text-center m-auto">
                                            <a href="{{route('post.edit', $data->id)}}" style="color: black;text-decoration: none" class="btn bg-success" ><i class="fa fa-3x fa-pencil" aria-hidden="true"></i></a>
                                        </div>
                                    {{--            DELETE BUTTON                            --}}
                                        <form method="post" action="{{route('post.destroy', $data->id)}}"class="m-auto">
                                            <div class="form-group text-center">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"  class="btn bg-danger" ><i class="fa fa-3x fa-trash-o" aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection


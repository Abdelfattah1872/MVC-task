@extends('layouts.layout')
@section('title')
    Main Page
@endsection
@section('content')
    {{--  SHOW ALL POSTS IN PAGE VIEW   --}}
    <div class="container text-right">
        <H1 class="text-center" style="font-family:'Bodoni MT Black';color: #4c110f">Main Page</H1>
        <div class="new">
            <a style="color: black" href="{{route('post.create')}}"><i class="fa fa-4x fa-plus" aria-hidden="true"></i></a>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-md-12 text-center">
                <div class="content d-flex text-center" style="justify-content: space-between;flex-wrap: wrap">
                {{--     LOOP ON THE DATABASE TO GET ALL PAGES         --}}
                    @foreach($data as $post)
                        <div class="card card-dark bg-dark mt-5 mx-2" style="width: 19rem;">
                            <img src="{{asset('uploads/'.$post->image)}}" class="card-img-top" style="height: 200px">
                            <div class="card-body">
                                <h5 class="card-title text-white">Title : {{$post->title}}</h5>
                                <p class="card-text text-white" style="">Brief : {{$post->brief}}</p>
                                <div class="card-group">
                                    <div class="text-center ml-auto">
                                        <a href="{{route('post.edit', $post->id)}}" style="color: black;text-decoration: none" class="btn bg-success" ><i class="fa fa-2x fa-pencil" aria-hidden="true"></i></a>
                                    </div>
                                    <form method="post" action="{{route('post.destroy', $post->id)}}"class="mr-auto mx-2">
                                        <div class="form-group text-center">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"  class="btn bg-danger" ><i class="fa fa-2x fa-trash-o" aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <a href="{{route('post.show',$post->id)}}" class="btn btn-info m-2">Read more</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

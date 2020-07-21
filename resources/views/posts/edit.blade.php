@extends('layouts.layout')
@section('title')
    Edit Post
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center bg-primary">
                    <div class="card-header" style="font-family:'Bodoni MT Black'"><h1>Edit Post</h1></div>
                    <div class="card-body text-center">
                    @if (session()->get('success'))
                            <div class="alert alert-dark text-center">{{ session()->get('success') }}</div>
                        @endif
                        <form method="POST" action="{{route('post.update',$data->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group text-center">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $data->title }}" required>
                            </div>
                            <div class="form-group text-center">
                                <label for="exampleInputEmail1">Brief</label>
                                <input type="text" class="form-control" value="{{ $data->brief }}" name="brief" required>
                            </div>

                            <div class="form-group text-center">
                                <label for="exampleInputEmail1">Add Content</label>
                                <textarea name="cont" rows="10" class="form-control" required>{{ $data->cont }}</textarea>
                            </div>

                            <div class="form-group text-center">
                                <label for="exampleInputEmail1">Add image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

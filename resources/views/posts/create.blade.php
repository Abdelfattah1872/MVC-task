@extends('layouts.layout')
@section('title')
    Add New Post
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center bg-warning">
                    <div class="card-header" style="font-family:'Bodoni MT Black'"><h1>Add New Post</h1></div>
                    <div class="card-body text-center">
                        @if (session()->get('success'))
                            <div class="alert alert-dark text-center">{{ session()->get('success') }}</div>
                        @endif
                        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-center">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" required>
                                {{ $errors->first('title') }}
                            </div>
                            <div class="form-group text-center">
                                <label for="exampleInputEmail1">Brief</label>
                                <input type="text" class="form-control" name="brief" required>
                                {{ $errors->first('brief') }}
                            </div>

                            <div class="form-group text-center">
                                <label for="exampleInputEmail1">Add Content</label>
                                <textarea name="cont" rows="10" class="form-control" required></textarea>
                                {{ $errors->first('brief') }}
                            </div>
                            <div class="form-group text-center">
                                <label for="exampleInputEmail1">Add image</label>
                                <input type="file" class="form-control" name="image" required>
                                {{ $errors->first('image') }}
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

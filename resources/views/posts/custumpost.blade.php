@extends('layouts.layout')
@section('title')
    Post Page
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <H1 style="font-family:'Bodoni MT Black';color: #4c110f" class="my-2">Custom Page</H1>
                <div class="content d-flex text-center" style="justify-content: space-between;border:3px solid black;">
                    <div class="card  w-100 text-center">
                        <div class="row no-gutters">
                            <div class="col-md-12">
                                <div class="card-body bg-warning m-auto">
                                    <p class="card-text m-auto" style="font-weight: bold;color: blue;font-size: medium"> {{$data->cont}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


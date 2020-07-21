<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Post::all();
        return view('posts.showlast',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //  Validate the inputs
        $request->validate([
            'title'=>"required|string|min:1|max:25",
            'brief'=>"required|string|min:1|max:50",
            'cont'=>"required|string|min:10"
        ]);
        //        upload image
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads'), $imageName);
        //        Add  data to database
        $data = new Post();
        $data->title        = $request->title;
        $data->brief        = $request->brief;
        $data->image        = $imageName;
        $data->cont         = $request->cont;
        $data->save();
        session()->flash('success',"Thank You:)");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
    $data = Post::findOrfail($id);
    return view('posts.custumpost',compact('data'));
    }

    public function above()
    {
        $data = Post::all();
        return view('posts.allposts',compact('data'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = Post::findOrfail($id);
        return view('posts.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>"required|string|min:1|max:25",
            'brief'=>"required|string|min:1|max:50",
            'cont'=>"required|string|min:10"
        ]);
        $data = Post::findOrfail($id);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads'), $imageName);
        $data->title        = $request->title;
        $data->brief        = $request->brief;
        $data->image        = $imageName;
        $data->cont         = $request->cont;
        session()->flash('success',"Thank You :) -updated");
        $data->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        session()->flash('success',"Deleted:)");
        return view('posts.delete');
    }
}

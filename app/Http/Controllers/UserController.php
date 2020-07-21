<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    //   SHOW ALL USERS DATA
    public function index()
    {
        $data = User::all();
        return view('users.showuser',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    //    ADD NEW USER VIEW (PAGE)
    public function create()
    {
        return view('users.addnew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    //    STORE THE NEW USER DATA INO OUR DATA BASE AFTER VERFICATION
    public function store(Request $request)
    {
        $request->validate([
            'name'=>"required|string|min:5|max:10",
            'email'=>'required|email|unique:users',
            'password'=>"required|min:10"
        ]);

        $data = new User();
        $data->name        = $request->name;
        $data->password    = $request->password;
        $data->email       = $request->email;
        $data->save();
        session()->flash('success',"Thank You:)");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    //    GO TO THE EDIT PAGE AS PER HIS UNIQE ID
    public function edit($id)
    {
        $data = User::findOrfail($id);
        return view('users.edituser',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    //    EDIT AN EXISTING USER DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>"required|string|min:5|max:10",
            'email'=>'required|email|unique:users',
            'password'=>"required|min:10"
        ]);

        $data = User::findOrfail($id);
        $data->name        = $request->name;
        $data->password    = $request->password;
        $data->email       = $request->email;
        $data->save();
        session()->flash('success',"Thank You:)");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */



    //    DELETE AN EXISTING USER DATA
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success',"Deleted:)");
        return back();
    }
}

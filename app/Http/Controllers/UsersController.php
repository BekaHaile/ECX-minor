<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Webpatser\Uuid\Uuid;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $users = User::orderBy('created_at','asc')->paginate(5);

        $user = auth()->user();
        if($user->userType == 'Manager' || 'Administrator')
            return view('pages.viewUsers', compact('user'))->with('users',$users);
        else
            return view('pages.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();

        $users->id = request('id');
        $users->username = request('username');
        $users->password = Uuid::generate()->string;
        $users->fname = request('fname');
        $users->lname = request('lname');
        $users->sex = request('sex');
        $users->zone = request('zone');
        $users->woreda = request('woreda');
        $users->kebele = request('kebele');
        $users->phoneNumber = request('phoneNumber');
        $users->userType = request('userType');
        $users->city = request('city');
        $users->dateOfBirth = request('dateOfBirth');
        $users->email = request('email');

        $users->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('forms.editUser', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('forms.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->username = request('username');
        $user->password = request('password');
        $user->fname = request('fname');
        $user->lname = request('lname');
        $user->sex = request('sex');
        $user->zone = request('zone');
        $user->woreda = request('woreda');
        $user->kebele = request('kebele');
        $user->phoneNumber = request('phoneNumber');
        $user->userType = request('userType');
        $user->city = request('city');
        $user->dateOfBirth = request('dateOfBirth');
        $user->email = request('email');

        $user->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users');
    }
}

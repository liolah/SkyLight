<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUser;

class UserController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:update,user')->only('edit', 'update');
        $this->middleware('password.confirm')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
        $imagePath = 'storage/' . $request->file('image')->store('Profile Pictures', 'public');
        } else { $imagePath = $user->image; }
        $user->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'about' => $data['about'],
            'email' => $data['email'],
            'image' => $imagePath,
        ]);

        return redirect('/users/'. $user->id);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    { 
        Auth::logout();
        $user->delete();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allusers= User::all();
       return view('users.index',['users'=>$allusers]);
    }

    // login
    public function login(Request $request)
    {
     $credentials=$request->validate(
        [
            'username'=>"required",
            'password'=>"required"
        ]
        );
        if(Auth::attempt($credentials)){
            return redirect()->route('users.index');
        }
       else{ return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);}
   }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $user= new User();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->address=$request->address;
    $user->password=Hash::make($request->password);
    $user->username=$request->username;
    $user->role=$request->role;
    $user->save();

    return redirect()->route('users.index');
   }
    

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    
    /**
     *logging out a specified resource.
     */
    public function logout(User $user)
    {
        Auth::logout();
        return view('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

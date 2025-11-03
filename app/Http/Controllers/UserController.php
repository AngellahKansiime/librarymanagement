<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
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


        $allusers= User::all()->where('role','!=','student');
       return view('users.index',['users'=>$allusers]);
    }

    public function showLoginForm(){
        return view  ('welcome');
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

            return redirect()->route('dashboard');
        }
       else{ return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);}
   }
    public function studentsIndex()
    {
        $students = \App\Models\Student::all();
        return view('students.index', compact('students'));
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
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
    }
    /**
     * Logout the user.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the current user (admin or student)

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
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
        $user = User::findOrFail($user->id);
        $user->delete();
        return redirect()->route('users.index');

//        User::destroy($user->id);
    }

    public function viewRequests()
    {
        $requests = Borrower::with('book', 'student')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.requests', compact('requests'));
    }

}

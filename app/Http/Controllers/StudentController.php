<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allstudents= Student::all();
       return view('students.index',['students'=>$allstudents]);
    }

     public function login(Request $request)
    {
     $credentials=$request->validate(
        [
            'username'=>"required",
            'password'=>"required"
        ]
        );
        if(Auth::attempt($credentials)){
            return redirect()->route('userlogin');
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
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $student= new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->course = $request->course;
        $student->year_of_study = $request->year_of_study ;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->username = $request->last_name;
        $student->password = $request->phone;
        $student->role = $request->role;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $student = Student::findOrFail($id);  // find the book or throw 404 if not found
    return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
         return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
    $student->update($request->all());
    return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
    $student->delete();
    return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}

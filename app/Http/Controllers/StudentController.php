<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class StudentController extends Controller
{
    //  use AuthenticatesUsers;
    //protected $redirectTo = '/admin/dashboard';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allstudents= Student::all();
       return view('students.index',['students'=>$allstudents]);
    }


     public function mystudents(){
        return view('students.mystudents');
     }


    public function showStudentlogin(){
        return view  ('students.login');
    }

     public function login(Request $request)
    {
     $credentials=$request->validate(
        [
            'username'=>"required",
            'password'=>"required"
        ]
        );
//         if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
//     // Admin is logged in
// }

// // To get the currently authenticated admin
// $admin = Auth::guard('admin')->user();



        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->route('student.dashboard');

    
        }
       else{ 
echo "No user found";

       }
   }
   public function dashboard(){
   
        return view('students/dashboard');
   }

   protected function guard()
    {
        return Auth::guard('student');
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
      
       
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $course = $request->course;
        $year_of_study = $request->year_of_study ;
        $phone = $request->phone;
        $email = $request->email;
        $username = $request->last_name;
        $password = $request->phone;
        $role = $request->role;

        $user = new User();
        $user->name=$first_name." ".$last_name;
        $user->username = $username;
        $user->password = $password;
        $user->email = $email;
        $user->role = 'student';
        $user->save();

        $user->student()->create([
            "first_name"=>$first_name,
            "last_name"=>$last_name,
            "course"=>$course,
            "year_of_study"=>$year_of_study,
            "phone"=>$phone,
            "email"=>$email,
            "username"=>$username,
            "password"=>$password,
            "role"=>$role
            

        ]);
       
           
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
    
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        return redirect('/student/login');
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

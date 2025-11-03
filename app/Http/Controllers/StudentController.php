<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        // Get the currently logged-in student's borrowed books
        $borrowedBooks = Borrower::where('borrowers_id', Auth::user()->id)->get();

        return view('students.dashboard', compact('books', 'borrowedBooks'));
    }


     public function mystudents(){
        return view('students.mystudents');
     }


    public function showStudentlogin(){
        return view  ('students.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('student.dashboard');
        }

        return back()->withErrors([
            'login_error' => 'Invalid username or password'
        ])->withInput();
    }

    public function dashboard(){

        return view('students/dashboard');
   }

//   protected function guard()
//    {
//        return Auth::guard('student');
//    }
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
        $year_of_study = $request->year_of_study;
        $phone = $request->phone;
        $reg_no = $request->reg_no;
        $email = $request->email;
        $username = $request->last_name;
        $password = $request->phone;
        $role = 'student';

        $user = new User();
        $user->name = $first_name . " " . $last_name;
        $user->username = $reg_no;
        $user->password = bcrypt($password);
        $user->email = $email;
        $user->role = $role;
        $user->save();


        $user->student()->create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'course' => $course,
            'year_of_study' => $year_of_study,
            'phone' => $phone,
            'reg_no' => $reg_no,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'role' => $role,
        ]);


        return redirect()->route('studentlist')->with('success', 'Student registered successfully!');
    }

    /**
     *
//     */


    public function getData(Request $request)
    {

        if ($request->ajax()) {
            $students = Student::query();

            if ($request->course) {
                $students->where('course', $request->course);
            }

            if ($request->year) {
                $students->where('year_of_study', $request->year);
            }

            return DataTables::of($students)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    return '
                <a href="'.route('students.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a>
                <a href="'.route('students.show', $row->id).'" class="btn btn-info btn-sm">View</a>
            ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

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
    return redirect()->route('studentlist')->with('success', 'Student updated successfully!');
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

    public function availableBooks()
    {
        $books = Book::where('quantity', '>', 0)->get();
        return view('students.availablebooks', compact('books'));
    }

    public function borrowedBooks()
    {
        $borrowedbooks = Borrower::where('borrowers_id', auth()->id())
            ->whereIn('status', ['pending', 'borrowed'])
            ->get();

        return view('students.borrowedbooks', compact('borrowedbooks'));
    }

    public function borrowHistory()
    {
        $borrowhistory = Borrower::where('borrowers_id', auth()->id())
            ->where('status', 'returned')
            ->get();

        return view('students.borrowhistory', compact('borrowhistory'));
    }



}

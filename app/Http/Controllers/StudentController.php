<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Town;
use App\Models\Career;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Filters\StudentFilter;
use App\Http\Resources\StudentResource;
use App\Http\Resources\StudentColletion;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*$students = Student::all();
        return view('student.index', compact('students'));*/

        /*return Student::all();*/
        
        $filter = new StudentFilter();
        $queryItems = $filter->transform($request);
        $students = Student::where($queryItems);
        return new StudentColletion($students->paginate()->appends($request->query()));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $towns = Town::all();
        $careers = Career::all();

        return view('student.create', compact('roles', 'towns', 'careers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        return new StudentResource(Student::create($request->all()));
        // dd($request);
        /*$data = $request->validate([
            'control_number' => 'required',
            'student_name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required|in:Hombre,Mujer',
            'birthdate' => 'required',
            'telephone' => 'required',
            'street' => 'required',
            'suburb' => 'required',
            'status' => 'required',
            'street' => 'required',
            'semester' => 'required',
            'role_id' => 'required',
            'town_id' => 'required',
            'career_id' => 'required',
        ]);*/

        /*Student::create($data);
        return redirect()->route('students.index');*/
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        /*return view('student.show', compact('student'));*/
        
        return new StudentResource($student);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $roles = Role::all();
        $towns = Town::all();
        $careers = Career::all();

        return view('student.edit', compact('student','roles', 'towns', 'careers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        /*$data = $request->validate([
            'control_number' => 'required',
            'student_name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required|in:Hombre,Mujer',
            'birthdate' => 'required',
            'telephone' => 'required',
            'street' => 'required',
            'suburb' => 'required',
            'status' => 'required',
            'street' => 'required',
            'role_id' => 'required',
            'town_id' => 'required',
            'career_id' => 'required',
        ]);*/

        $student->update($request->all());
        /*return redirect()->route('students.index');*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $message = 'Alumno eliminado correctamente';

        try {
            $student->delete();
        } catch (\Exception $e) {
            $message = 'Error al eliminar';
        }
        return redirect()->route('students.index')->with('message', $message);
    }
}

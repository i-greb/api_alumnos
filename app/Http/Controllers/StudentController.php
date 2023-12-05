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
    /*este método se encarga de manejar la solicitud para obtener una lista pgainada de los alumnos*/
    public function index(Request $request)
    {

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
    /*método del controladpr que peri¿mite almacenar un uevo estudiante en la base de datos*/
    public function store(StoreStudentRequest $request)
    {
        return new StudentResource(Student::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        
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
       
        $student->update($request->all());
       
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

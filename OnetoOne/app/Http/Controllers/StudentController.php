<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request){
        $students = Student::with(['academic', 'country'])->get();
        if ($request->is('api/*')) {
            return response()->json(['students' => $students]);
        } else {
            $students = Student::all();
            return view('index', compact('students'));
        }
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        if ($request->is('api/*')) {
            $students = Student::create($request->all());
            $students->academic()->create($request->input('academic'));
            $students->country()->create($request->input('country'));
            return response()->json(["message" => "Successfully created the student's data"]);
        } else {
            $student = Student::create([
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'address' => $request->input('address'),
            ]);
    
            $student->academic()->create([
                'course' => $request->input('course'),
                'year' => $request->input('year'),
            ]);
    
            $student->country()->create([
                'continent' => $request->input('continent'),
                'country_name' => $request->input('country_name'),
                'capital' => $request->input('capital'),
            ]);
            return redirect()->route('students.index')->with('message', 'Student, Academic, and Country Created');
        }
    }

    public function edit(Student $student){
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id){
        $student = Student::find($id);
        $student->update($request->all());

        if ($request->is('api/*')) {
            $student->academic()->update($request->input('academic'));
            $student->country()->update($request->input('country'));
            return response()->json(["message" => "Successfully updated the student's data"]);
        } else {
            $student->academic()->update($request->only(['course', 'year']));
            $student->country()->update($request->only(['continent', 'country_name', 'capital']));
            return redirect()->route('students.index')->with('message', 'Student, Academic, and Country Updated');
        }
    }

    public function destroy($id){
        $student = Student::find($id);
        $student->academic()->delete();
        $student->country()->delete();
        $student->delete();

        if (request()->is('api/*')) {
            return response()->json(["message" => "Successfully deleted the student's data"]);
        } else {
            return redirect()->route('students.index')->with('message', 'Student, Academic, and Country Deleted');
        }
    }
}

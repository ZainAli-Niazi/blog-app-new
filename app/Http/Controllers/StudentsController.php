<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{

    // This method will show products page
    public function index()
    {
        $student = student::orderBy('created_at', 'DESC')->get();

        return view('students.list', [ 'student' => $student ]);
    }


    // This method will show create product page
    public function create()
    {

        return view('students.create');
    }




    // This method will show store product page

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:30',
            'roll_number' => 'required|numeric|digits:8|unique:students,roll_number',
            'gender' => 'required|in:male,female,other',
            'class' => 'required|string|max:20',
            'subjects' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('students.create')->withInput()->withErrors($validator);
        }
        
        // Insert product into the database
        $student = new student();
        $student->name = $request->input('name');
        $student->roll_number = $request->input('roll_number');
        $student->gender = $request->input('gender');
        $student->class = $request->input('class');
        $student->subjects = $request->input('subjects');
        $student->save();
    }




    // This method will show edit product page
    public function edit() {}






    // This method will show update product page
    public function update() {}







    // This method will show delete product page
    public function delete() {}






     // This method will show products page


     public function extra()
     {
         return view('extra');
     }
 
     public function extra1()
     {
         return view('extra1');
     }
     public function extra2()
     {
         return view('extra2');
     }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
    	$students = Student::paginate(3);
    	return view('welcome', compact('students'));
    }

    public function create()
    {
    	return view('create');
    }

    public function store(Request $request)
    {
    	// get form data from create page and validate
    	$this->validate($request, [
    		'firstName'		=> 	'required',
    		'lastName'		=> 	'required',
    		'email'			=> 	'required',
    		'phoneNumber'	=> 	'required'
    	]);

    	// send form data to model named 'Student'
    	$student = new Student;
    	$student->first_name	= $request->firstName;
    	$student->last_name		= $request->lastName; 
    	$student->email 		= $request->email;
    	$student->phone 		= $request->phoneNumber;
    	$student->save();

    	return redirect(route('home'))->with('successMsg', 'Student Added Successfully!!!');
    }

    public function edit($id)
    {
    	$student = Student::find($id);
    	return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'firstName'		=> 	'required',
    		'lastName'		=> 	'required',
    		'email'			=> 	'required',
    		'phoneNumber'	=> 	'required'
    	]);

    	$student = Student::find($id);
    	$student->first_name	= $request->firstName;
    	$student->last_name		= $request->lastName; 
    	$student->email 		= $request->email;
    	$student->phone 		= $request->phoneNumber;
    	$student->save();
    	return redirect(route('home'))->with('successMsg', 'Student Updated Successfully!');
    }

    public function delete($id)
    {
    	Student::find($id)->delete();
    	return redirect(route('home'))->with('successMsg', 'Student Deleted Successfully!');
    }

}

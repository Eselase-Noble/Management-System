<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //select * from students;
    public function getAllStudents(){
        $student = Student::all();
        return response()->json($student);
    }

    //select * from users where id = id;
    public function getStudentByID($id){
        $student = Student::find($id);
        if(!$student){
            return response()->json(['error' => 'Student not found'], 404);
        }
        return response()->json($student);
    }

    //insert into users
    public function addStudent(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
        'surname' => ['required', 'string', 'max:255'],
        'othernames'=> ['required', 'string', 'max:255'],
        'email'=> ['required', 'string', 'email', 'max:255','unique:users'],
        'dob'=> ['required', 'date'],
        'gender'=> ['required', 'in:Male,Female'],
        'telephone'=> ['required', 'string', 'max:255'],
        'address'=> ['required', 'string', 'max:255'],
        'nationality'=> ['required', 'string', 'max:255'],
        ]);


            // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        //New student instance

        $student = new Student();
        $student->surname = $input['surname'];
        $student->othernames = $input['othernames'];
        $student->email = $input['email'];
        $student->dob = $input['dob'];
        $student->gender = $input['gender'];
        $student->telephone = $input['telephone'];
        $student->address = $input['address'];
        $student->nationality = $input['nationality'];

        //save the student to the students table
        $student->save();

        return response()->json([
            'message' => 'Student registered successfully',
        ], 201);

    }

    //update users table
    public function updateStudent(Request $request, $id){
        $student = Student::find($id);

        if(!$student){
            return response()->json([
                'error' => 'Student not found'
            ], 404);
        }

        $validator = Validator::make ($request->all(), [
            'surname' => ['required', 'string', 'max:255'],
            'othernames'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255','unique:users,email,' .$id],
            'dob'=> ['required', 'date'],
            'gender'=> ['required', 'in:Male,Female'],
            'telephone'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string', 'max:255'],
            'nationality'=> ['required', 'string', 'max:255'],
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        //update the student records
        $student->surname = $request->surname;
        $student->othernames = $request->othernames;
        $student->email = $request->email;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->telephone = $request->telephone;
        $student->address = $request->address;
        $student->nationality = $request->nationality;


        $student->save();

        return response()->json([
            'message' => 'Student sucessfully updated'
        ]);
    }

    public function deleteStudent($id){
        $student = Student::find($id);

        if (!$student){
            return response()->json([
                'message' => 'Student with ', $id , ' not found'
            ]);
        }

        $student->delete();

         return response()->json(['message' => 'Student deleted successfully']);
    }



}

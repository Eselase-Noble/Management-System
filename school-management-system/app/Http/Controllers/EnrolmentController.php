<?php

namespace App\Http\Controllers;

use App\Models\Enrolments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class EnrolmentController extends Controller
{
    //todo

    //Get all the courses
    public function getAllEnrolments(){
        $enrolments = Enrolments::all();

        return response()->json($enrolments);
    }


    //Get a course based on a particular courseID
    public function getEnrolmentByID($enrolmentID){
        $enrolment = Enrolments::find($enrolmentID);

        if (!$enrolment){
            return response()->json([
                'error' => 'Enrolment with ', $enrolmentID,' not found'
            ], 404);
        }

        return response()->json($enrolment);
    }


    //insert into the course table
    public function enrol(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'studentID' => ['required','string' ,'max:100'],
            'courseID' => ['required', 'string', 'max:100'],
            'enrolDate' => ['required', 'date', 'max:100']
        ]);

        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 422);

            //Enrol a new student to a course
            $enrolment = new Enrolments();
            $enrolment->studentID = $input['studentID'];
            $enrolment->courseID = $input['courseID'];
            $enrolment->enrolDate = $input['enrolDate'];

            //SAVE A NEW TO THE DB
            $enrolment->save();

            return response()->json([
                'message' => 'Student enrolled successfully',
            ], 201);
        }
    }

    //update the course record based on a specified courseID

    public function updateEnrolment(Request $request, $enrolmentID){
        $enrolment = Enrolments::find($enrolmentID);

        if (!$enrolment){
            return response()->json([
                'error' => 'Enrolment with ', $enrolmentID,' not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'studentID' => ['required','string' ,'max:100'],
            'courseID' => ['required', 'string', 'max:100'],
            'enrolDate' => ['required', 'date', 'max:100']
        ]);

        //Update the existing record(s)
        $enrolment->studentID = $request['studentID'];
        $enrolment->courseID = $request['courseID'];
        $enrolment->enrolDate = $request['enrolDate'];

        //SAVE A NEW TO THE DB
        $enrolment->save();

        return response()->json([
            'message' => 'Student enrolment details updated successfully',
        ]);

    }

    //delete a specific courseID
    public function deleteEnrolment($enrolmentID){
        $enrolment = Enrolments::find($enrolmentID);

        if (!$enrolment){
            return response()->json([
                'error' => 'Enrolment with ', $enrolmentID,' not found'
            ], 404);
        }
        //Delete a particular enrolment
        $enrolment->delete();


        return response()->json([
            'message' => 'Student enrolment  deleted successfully',
        ]);
    }

}

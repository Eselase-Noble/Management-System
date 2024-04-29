<?php

namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Transcript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * author: Nobleson
 * version: 1.0.0
 * date: 28/04/2024
 * This class handle the apis for the Grade entity: The GET, POST, PUT, DELETE functions.
 */
class GradesController extends Controller
{


    /**
     * Get all the grades
     * @return \Illuminate\Http\JsonResponse
     */

    public function getAllGrades(){
        $grade = Grades::all();

        return response()->json($grade);
    }




    /**
     * Get a grade based on a particular courseID
     * @param $gradeID
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function getGradeByID($gradeID){
        $grade = Grades::find($gradeID);

        if (!$grade){
            return response()->json([
                'error' => "Grade not found"
            ], 404);
        }
    }

    //

    /**
     * insert into the grade table
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createGrade(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'gradeID' => ['required', 'string', 'max:100'],
            'courseID' => ['required', 'string', 'max:100'],
            'studentID' => ['required', 'string', 'max:100'],
            'grade' => ['required', 'char']


        ]);

        //check for form validation
        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ],422);
        }

        //Create a new grade
        $grade = new Grades();
        $grade->gradeID = $input['gradeID'];
        $grade->courseID = $input['courseID'];
        $grade->studentID = $input['studentID'];
        $grade->grade = $input['grade'];

        //save the new grade to the DB
        $grade->save();

        return response()->json([
            'message'=>'Grade created successfully'
        ], 201);

    }



    /**
     * update the grade record based on a specified gradeID
     * @param Request $request
     * @param $gradeID
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateGrade(Request $request, $gradeID){
        $grade = Grades::all();
        $validator = Validator::make($request->all(), [
            'gradeID' => ['required', 'string', 'max:100'],
            'courseID' => ['required', 'string', 'max:100'],
            'studentID' => ['required', 'string', 'max:100'],
            'grade' => ['required', 'char']


        ]);

        //check for form validation
        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ],422);
        }

        $grade->gradeID = $request->gradeID;
        $grade->courseID = $request->courseID;
        $grade->studentID = $request->studentID;
        $grade->grade = $request->grade;

        //save the update grade to the DB
        $grade->save();

        return response()->json([
            'message'=>'Grade updated successfully'
        ]);


    }



    /**
     * delete a specific gradeID
     * @param $gradeID
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteGrade($gradeID){
        $grade = Grades::find($gradeID);

        if (!$grade){
            return response()->json([
                'error'=>'Grade not found'
            ],404);

        }

        //delete the found grade
        $grade->delete();

        return response()->json([
            'message'=>'Grade deleted successfully'
        ]);
    }

}

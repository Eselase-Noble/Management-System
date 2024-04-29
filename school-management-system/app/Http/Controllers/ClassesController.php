<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * author: Nobleson
 * version: 1.0.0
 * date: 27/04/2024
 * This class handle the apis for the Classes entity: The GET, POST, PUT, DELETE functions.
 */
class ClassesController extends Controller
{
    //

    /**
     * SELECT ALL CLASSES FROM THE CLASSES TABLE
     * @return \Illuminate\Http\JsonResponse
     */

    public function getAllClasses(){
        $session = classes::all();

        return response()->json($session);
    }

    /**
     * SELECT * FROM CLASSES WHERE CLASSID = $CLASSID;
     * @param $classID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getClassByID($classID){
        $session = classes::find($classID);

        if (!$session){
            return response()->json([
                'error' => 'Class with ', $classID,' not found'
            ], 404);
        }

        return response()->json($session);
    }

    /**
     * SAVE A NEW CLASS TO THE DB
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addClass(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [

            'courseID' => ['required', 'string', 'max:100'],
            'venueID' => ['required', 'string', 'max:100'],
            'startTime' => ['required', 'date'],
            'endTime' => ['required', 'date']
        ]);

        if ($validator){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        //create a new class
        $session = new classes();
        $session->courseID = $input['courseID'];
        $session->venueID = $input['venueID'];
        $session->startTime = $input['startTime'];
        $session->endTime = $input['endTime'];

        //Save the new class to the DB
        $session->save();

        return response()->json([
            'message' => 'Class saved successfully'
        ], 201);
    }

    /** UPDATE AN EXISTING CLASS
     * @param Request $request
     * @param $classID
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateClass(Request $request, $classID){
        $session = classes::find($classID);

        if(!$session){
            return response()->json(['error' => 'Class not found'], 404);

        }

        $validator = Validator::make($request->all(), [

            'courseID' => ['required', 'string', 'max:100'],
            'venueID' => ['required', 'string', 'max:100'],
            'startTime' => ['required', 'date'],
            'endTime' => ['required', 'date']
        ]);

        if ($validator){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $session->courseID = $request->courseID;
        $session->venueID = $request->venueID;
        $session->startTime = $request->startTime;
        $session->endTime = $request->endTime;

        //Save the updated class to the DB
        $session->save();

        return response()->json([
            'message' => 'Class updated successfully'
        ]);


    }

    /** DELETE A CLASS BASED ON THE CLASSID SPECIFIED
     * @param $classID
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteClass($classID){
        $session = classes::find($classID);
        if(!$session){
            return response()->json(['error' => 'Class not found'], 404);

        }

        //delete the found class
        $session->delete();

        return response()->json(['message' => 'Class deleted successfully']);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Levels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * author: Nobleson
 * version: 1.0.0
 * date: 27/04/2024
 * This class handle the apis for the Level entity: The GET, POST, PUT, DELETE functions.
 */
class LevelController extends Controller
{
    //todo


    /**
     * Get all the courses
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllLevels(){
        $level = Levels::all();

        return response()->json($level);
    }



    /**
     * //Get a level based on a particular levelID
     * @param $levelID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLevelByID($levelID){
        $level = Levels::find($levelID);

        if (!$level){
            return response()->json([
                'error'=>'Level not found'
            ], 404);
        }

        return response()->json($level);
    }



    /**
     * insert into the course table
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createLevel(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'studentLevel' => ['required', 'string', 'max:100']
        ]);

        //check for form validation
        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        //Create a new level
        $level = new Levels();
        $level->levelName = $input['levelName'];

        //save the level to the DB
        $level->save();

        return response()->json([
            'message'=>'Level created successfully'
        ], 201);
    }

    //

    /**
     * update the level record based on a specified levelID
     * @param Request $request
     * @param $levelID
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateLevelRecords(Request $request, $levelID){
        $level = Levels::find($levelID);

        if (!$level){
            return response()->json(['error'=>'Level not found']);
        }
        $validator = Validator::make($request->all(), [
            'studentLevel' => ['required', 'string', 'max:100']
        ]);

        //check form validation
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()],422);
        }
        //Update the records
        $level->levelName = $request->levelName;

        //save the updated record to the DB
        $level->save();

        return response()->json(['message'=>'Level updated successfully']);


    }



    /**
     * delete a specific level
     * @param $levelID
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLevel($levelID){
        $level = Levels::find($levelID);

        if (!$level){
            return response()->json(['error'=> 'Level with ', $levelID, ' not found']);
        }

        $level->delete();

        return response()->json([
            'message' => 'Level deleted successfully'
        ]);
    }


}

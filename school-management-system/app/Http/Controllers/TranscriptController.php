<?php

namespace App\Http\Controllers;

use App\Models\Transcript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * author: Nobleson
 * version: 1.0.0
 * date: 28/04/2024
 * This class handle the apis for the Transcript entity: The GET, POST, PUT, DELETE functions.
 */
class TranscriptController extends Controller
{
    //

    /** Get All the transcript from the DB
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllTranscript(){
        $transcript = Transcript::all();

        return response()->json($transcript);
    }

    /**
     * Get a particular transcript from the DB
     * @param $transcriptID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTranscriptByID($transcriptID){
        $transcript = Transcript::find($transcriptID);

        if (!$transcript){
            return response()->json([
                'error' => "Transcript not found"
            ], 404);
        }

        return response()->json($transcript);
    }

    /**
     * Add a new transcript to the database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTranscript(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'gradeID' => ['required', 'BigInteger', 'max:100']
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        //New instance of transcript
        $transcrpt = new Transcript();
        $transcrpt->gradeID = $input['gradeID'];

        //Save the new transcript to the DB
        $transcrpt->save();

        return response()->json([
            'message' => 'Transcript saved successfully'
        ], 201);
    }


    /**
     * TODO
     * Implement the PUT and DELETE functions
     */

}

<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VenueController extends Controller
{
    //

    /**
     * select all from venues
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllVenues(){
        $venue = Venue::all();

        return response()->json($venue);
    }

    /**
     * SELECT * FROM VENUES WHERE VENUEID = $VENUEID
     * @param $venueID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVenueByID($venueID){
        $venue = Venue::find($venueID);

        if (!$venue){
            return response()->json([
                'error'=> 'Venue not found'
            ], 404);
        }

        return response()->json($venue);
    }

    /**
     *  SAVE A NEW VENUE TO THE VENUE TABLE
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function addVenue(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'venueID' => ['required', 'string', 'max:100'],
            'venueName' => ['required', 'string', 'max:100'],
        ]);

        if ($validator->fails()){
            return response()->json([
                'error'=>$validator->errors()
            ], 422);
        }

        //New Venue Instance
        $venue = new Venue();
        $venue->venueID = $input['venusID'];
        $venue->venueName = $input['venueName'];

        //save the new venue to the database
        $venue->save();

        return response()->json([
            'message' => "Venue saved successfully"
        ],201);
    }



    /**
     * UPDATE THE VENUE RECORDS
     * @param Request $request
     * @param $venueID
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateVenue(Request $request, $venueID){
        $venue = Venue::find($venueID);

        if (!$venue){
            return response()->json([
                'error' => 'Venue not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'venueID' => ['required', 'string', 'max:100'],
            'venueName' => ['required', 'string', 'max:100'],
        ]);
        if ($validator->fails()){
            return response()->json([
                'error'=>$validator->errors()
            ], 422);
        }

        //Update the venue records
        $venue->venueID = $request['venusID'];
        $venue->venueName = $request['venueName'];

        //Save the updated venus records
        $venue->save();


        return response()->json([
            'message' => 'Venue updated successfully'
        ]);

    }

    /** DELETE A VENUE BASED ON THE ID SPECIFIED
     * @param $venueID
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteVenue($venueID){
        $venue = Venue::find($venueID);
        //Check if the venue is available
        if (!$venue){
            return response()->json([
                'message' => 'Venus with ' , $venueID, ' not found'
            ]);
        }
        //Delete the venue
        $venue->delete();

        return response()->json([
            'message' => 'Venue successfully deleted'
        ]);
    }
}

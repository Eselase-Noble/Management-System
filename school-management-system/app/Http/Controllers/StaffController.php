<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;


class StaffController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    //selecy * from staff table
    public function getAllStaffs(){
        $staff =  Staff::all();
        return response()->json($staff);
    }

    //Select * from staff table where id = $id

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStaffByID($id){
        $staff = Staff::find($id);
        if(!$staff){
            return response()->json(['error'=> 'Staff not found'], 404);
        }

        return response()->json($staff);
    }

    //TODO

    //insert into the staff table

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addStaff(Request $request){

        $input = $request->all();
        $validator = Validator::make($input, [
            'staffID' => ['required', 'max:100', 'string'],
        'surname' => ['required', 'string', 'max:255'],
        'otherNames'=> ['required', 'string', 'max:255'],
        'email'=> ['required', 'string', 'email', 'max:255','unique:users'],
        'dob'=> ['required', 'date'],
        'gender'=> ['required', 'in:Male,Female'],
        'telephone'=> ['required', 'string', 'max:255'],
        'address'=> ['required', 'string', 'max:255'],
        'nationality'=> ['required', 'string', 'max:255'],
        'qualification' => ['required', 'string', 'max:255']
        ]);

        //check if validation fails
        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        //New Staff instance

        $staff = new Staff();
        $staff->staffID = $input['staffID'];
        $staff->surname = $input['surname'];
        $staff->otherNames = $input['otherNames'];
        $staff->email = $input['email'];
        $staff->dob = $input['dob'];
        $staff->gender = $input['gender'];
        $staff->telephone = $input['telephone'];
        $staff->address = $input['address'];
        $staff->nationality = $input['nationality'];
        $staff->qualification = $input['qualification'];


        $staff->save();

        return response()->json([
            'message' => 'Staff has been successfully created'
        ], 201);



    }

    //update staff

    /**
     * @param Request $request
     * @param $staffID
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStaff(Request $request, $staffID){

        $staff = Staff::find($staffID);

        if(!$staff){
            return response()->json([
                'error' => 'Staff not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'staffID' => ['required', 'max:100', 'string'],
            'surname' => ['required', 'string', 'max:255'],
            'otherNames'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255','unique:users,email' .$staffID],
            'dob'=> ['required', 'date'],
            'gender'=> ['required', 'in:Male,Female'],
            'telephone'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string', 'max:255'],
            'nationality'=> ['required', 'string', 'max:255'],
            'qualification' => ['required', 'string', 'max:255']
        ]);

        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $staff->staffID = $request['staffID'];
        $staff->surname = $request['surname'];
        $staff->otherNames = $request['otherNames'];
        $staff->email = $request['email'];
        $staff->dob = $request['dob'];
        $staff->gender = $request['gender'];
        $staff->telephone = $request['telephone'];
        $staff->address = $request['address'];
        $staff->nationality = $request['nationality'];
        $staff->qualification = $request['qualification'];

        $staff->save();

        return response()->json([
            'message' => 'Staff successfully updated'
        ]);

    }

    //delete from staff table

    /**
     * @param $staffID
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function deleteStaff($staffID){
        $staff = Staff::find($staffID);

        if(!$staff){
            return response()->json([
                'message'=>'Staff with ' , $staffID, ' not found'
            ]);

            $staff->delete();

            return response()->json([
                'message' => 'Staff with ' , $staffID, ' deleted successfully'
            ]);
        }
    }

}

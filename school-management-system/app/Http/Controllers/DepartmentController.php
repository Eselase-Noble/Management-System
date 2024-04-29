<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{


    /**
     * Get all the departments
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllDepartments(){
        $department = Department::all();

        return response()->json($department);


    }


    /**
     * Get department based on the id
     * @param $departmentID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartmentByID($departmentID){
        $department = Department::find($departmentID);
        if (!$department){
            return response()->json([
                'error'=> 'Department with ', $departmentID, ' not found'
            ], 404);
        }

        return response()->json($department);
    }



    /**
     * Insert into a department table
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addDepartment(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'departmentID' => ['required', 'string', 'max:100'],
            'departmentName'=> ['required', 'string', 'max:120'],
        ]);

        if ($validator->fail()){
            return response()->json([
                'error' => $validator->errors()], 422
            );
        }

        $department = new Department();
        $department->departmentID = $input['departmentID'];
        $department->departmentName = $input['departmentName'];

        $department->save();

        return response()->json([
            'message' => 'Department created successfully'
        ], 201);

    }




    /**
     * update a record in the department table
     * @param Request $request
     * @param $departmentID
     * @return void
     */
    public function updateDepartment(Request $request, $departmentID){
        $department = Department::find($departmentID);

        if(!$department){
            return response()->json([
                'error'=> 'Department not found'
            ], 404);
        }

        $validator = Validator::make($request->all(),[
            'departmentID' => ['required', 'string', 'max:100'],
            'departmentName'=> ['required', 'string', 'max:120'],
        ]);

        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $department->departmentID = $request->departmentID;
        $department->departmentName = $request->departmentName;

        $department->save();

        return  response()->json([
            'message' => 'Department successfully updated'
        ]);
    }



    /**
     * delete a particular department
     * @param $departmentID
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function deleteDepartment($departmentID){
        $department = Department::find($departmentID);
        if (!$department){
            return response()->json([
                'message'=> 'Department with ' , $departmentID , ' not found'
            ]);

            $department->delete();

            return response()->json([
                'message' => 'Department successfully deleted'
            ]);
        }
    }
}

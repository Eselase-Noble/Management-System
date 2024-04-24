<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;


class StaffController extends Controller
{
    //selecy * from staff table

    public function getAllStaffs(){
        $staff =  Staff::all();
        return response()->json($staff);
    }

    //Select * from staff table where id = $id
    public function getStaffByID($id){
        $staff = Staff::find($id);
        if(!$staff){
            return response()->json(['error'=> 'Staff not found'], 404);
        }

        return response()->json($staff);
    }

    //TODO

    //insert into the staff table

    //update staff 

    //delete from staff table

}

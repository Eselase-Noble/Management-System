<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * author: Nobleson
 * version: 1.0.0
 * date: 27/04/2024
 * This class handle the apis for the Course entity: The GET, POST, PUT, DELETE functions.
 */
class CourseController extends Controller
{

    /**
     * Get all the courses
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCourses(){
        $course = Courses::all();

        return response()->json($course);
    }


    /**
     * Get a course based on a particular courseID
     * @param $courseID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCourseByID($courseID){
        $course = Courses::find($courseID);

        if (!$course){
            return response()->json([
                'error' => 'Course not found'
            ], 404);
        }

        return response()->json($course);
    }



    /**
     * insert a new course into the course table
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCourse(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'courseID' => ['required', 'string', 'max:100'],
            'courseName' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:255'],
            'departmentID' => ['required', 'string', 'max:100'],
            'staffID' => ['required', 'string' , 'max:100']
        ]);

        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        //New Course Instance
        $course = new Courses();
        $course->courseID = $input['courseID'];
        $course->courseName = $input['courseName'];
        $course->description = $input['description'];
        $course->departmentID = $input['departmentID'];
        $course->staffID = $input['staffID'];

        //Save the new course instance
        $course->save();

        return response()->json([
            'message' => 'Course saved successfully'
        ], 201);
    }


    /**
     * update the course record based on a specified courseID
     * @param Request $request
     * @param $courseID
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCourse(Request $request, $courseID){
        $course = Courses::find($courseID);

        if (!$course){
            return response()->json([
                'message' => 'Course with ', $courseID, ' not found'
            ], 404);
        }
        $validator = Validator::make($request->all(), [
            'courseID' => ['required', 'string', 'max:100'],
            'courseName' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:255'],
            'departmentID' => ['required', 'string', 'max:100'],
            'staffID' => ['required', 'string' , 'max:100']
        ]);

        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }
    //Update the course records
        $course->courseID = $request['courseID'];
        $course->courseName = $request['courseName'];
        $course->description = $request['description'];
        $course->departmentID = $request['departmentID'];
        $course->staffID = $request['staffID'];

        //Save the new course instance
        $course->save();

        return response()->json([
            'message' => 'Course updated successfully'
        ] );
    }


    /**
     * delete course based on a specific courseID
     * @param $courseID
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function deleteCourse($courseID){
        $course = Courses::find($courseID);

        if (!$course){
            return response()->json([
                'message' => 'Course with ', $courseID, ' not found'
            ]);

            //Delete the course
            $course->delete();

            return response()->json([
                'message' => 'Venue successfully deleted'
            ]);
        }
    }


}

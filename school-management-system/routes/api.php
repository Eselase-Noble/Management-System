<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\TranscriptController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ClassesController;

Route::get('/user', function (Request $request) {
    return response()->json($request->user());
})->middleware('auth:sanctum');

/**
 * APIs for User
 */

Route::get('/user/all', [UserController::class, 'getAllUsers']);

Route::post('/user/login', [UserController::class, 'login']);

Route::post('/user/register', [UserController::class, 'register']);

Route::put('/user/update/{id}', [UserController::class, 'update']);

Route::delete('/user/delete/{id}', [UserController::class, 'delete']);

/**
 * APIs for Student
 */

Route::post('/student/addStudent', [StudentController::class, 'addStudent']);
Route::get('/student/all', [StudentController::class, 'getAllStudents']);
Route::get('/student/get/{studentID}', [StudentController::class, 'getStudentByStudentID']);
Route::put('/student/update/{id}', [StudentController::class, 'updateStudent']);
Route::delete('/student/delete/{id}', [StudentController::class, 'deleteStudent']);

/**
 * APIs for the Staff
 */

Route::get('/staff/all', [StaffController::class, 'getAllStaffs']);

Route::get('/staff/find/{id}', [StaffController::class, 'getStaffByID']);

Route::post('/staff/add', [StaffController::class, 'addStaff']);

Route::put('/staff/update/{id}', [StaffController::class, 'updateStaff']);

Route::delete('/staff/delete/{id}', [StaffController::class, 'deleteStaff']);

/**
 * APIs department
 */
Route::get('/department/all', [DepartmentController::class, 'getAllDepartments']);

Route::get('/department/find/{id}', [DepartmentController::class, 'getDepartmentByID']);

Route::post('/department/add', [DepartmentController::class, 'addDepartment']);

Route::put('/department/update/{id}', [DepartmentController::class, 'updateDepartment']);

Route::delete('/department/delete/{id}', [DepartmentController::class, 'deleteDepartment']);


/**
 * APIs for Venue
 */

Route::get('/venue/all', [VenueController::class, 'getAllVenues']);
Route::get('/venue/find/{ID}', [VenueController::class, 'getVenueByID']);
Route::post('/venue/add', [VenueController::class, 'addVenue']);
Route::put('/venue/update/{id}',[VenueController::class, 'updateVenue']);
Route::delete('/venue/delete/{id}', [VenueController::class,'deleteVenue']);

/**
 * APIs for Courses
 */

Route::get('/course/all', [CourseController::class, 'getAllCourses']);
Route::get('/course/find/{id}', [CourseController::class,'getCourseByID']);
Route::post('/course/add', [CourseController::class, 'addCourse']);
Route::put('/course/update/{id}', [CourseController::class, 'updateCourse']);
Route::delete('/course/delete/{id}', [CourseController::class, 'deleteCourse']);

/**
 * APIs for Enrolment
 */

Route::get('/student/enrolment/all', [EnrolmentController::class,'getAllEnrolments']);
Route::get('/student/enrolment/find/{id}', [EnrolmentController::class, 'getEnrolmentByID']);
Route::post('/student/enrolment/enrol', [EnrolmentController::class, 'enrol']);
Route::put('/student/enrolment/update/{id}', [EnrolmentController::class,'updateEnrolment']);
Route::delete('/student/enrolment/delete/{id}', [EnrolmentController::class, 'deleteEnrolment']);

/**
 * APIs for Grades
 */

Route::get('/student/grade/all', [GradesController::class,'getAllGrades']);
Route::get('/student/grade/find/{id}', [GradesController::class, 'getGradeByID']);
Route::post('/student/grade/add', [GradesController::class, 'createGrade']);
Route::put('/student/grade/update/{id}', [GradesController::class,'updateGrade']);
Route::delete('/student/grade/delete/{id}', [GradesController::class, 'deleteGrade']);

/**
 * APIs for Transcript
 */

Route::get('/student/transcript/all', [TranscriptController::class,'getAllTranscript']);
Route::get('/student/transcript/find/{id}', [TranscriptController::class, 'getTranscriptByID']);
Route::post('/student/transcript/add', [TranscriptController::class, 'createTranscript']);
//Route::put('/student/transcript/update/{id}', [TranscriptController::class,'']);
//Route::delete('/student/transcript/delete/{id}', [GradesController::class, 'deleteGrade']);

/**
 * APIs for Classes
 */

Route::get('/student/class/all', [ClassesController::class,'getAllClasses']);
Route::get('/student/class/find/{id}', [ClassesController::class, 'getClassByID']);
Route::post('/student/class/add', [ClassesController::class, 'addClass']);
Route::put('/student/class/update/{id}', [ClassesController::class,'updateClass']);
Route::delete('/student/class/delete/{id}', [ClassesController::class, 'deleteClass']);

/**
 * APIs for Level
 */

Route::get('/student/level/all', [LevelController::class,'getAllLevels']);
Route::get('/student/level/find/{id}', [LevelController::class, 'getLevelByID']);
Route::post('/student/level/add', [LevelController::class, 'createLevel']);
Route::put('/student/level/update/{id}', [LevelController::class,'updateLevelRecords']);
Route::delete('/student/level/delete/{id}', [LevelController::class, 'deleteLevel']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DepartmentController;

Route::get('/user', function (Request $request) {
    return response()->json($request->user());
})->middleware('auth:sanctum');

/**
 * APIs for User
 */

Route::post('/user/login', [UserController::class, 'login']);

Route::post('/user/register', [UserController::class, 'register']);

Route::put('/user/update/{id}', [UserController::class, 'update']);

Route::delete('/user/delete/{id}', [UserController::class, 'delete']);

/**
 * APIs for Student
 */

Route::post('/student/add', [StudentController::class, 'addStudent']);

Route::get('/student/all', [StudentController::class, 'getAllStudents']);

Route::get('/student/get/{id}', [StudentController::class, 'getStudentByID']);

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

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return response()->json($request->user());
})->middleware('auth:sanctum');


Route::post('/login', [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'register']);

Route::put('/update/{id}', [UserController::class, 'update']);

Route::delete('/delete/{id}', [UserController::class, 'delete']);

Route::post('/student/add', [StudentController::class, 'addStudent']);

Route::get('/student/all', [StudentController::class, 'getAllStudents']);

Route::get('/student/get/{id}', [StudentController::class, 'getStudentByID']);

Route::put('/student/update/{id}', [StudentController::class, 'updateStudent']);

Route::delete('/student/delete/{id}', [StudentController::class, 'deleteStudent']);

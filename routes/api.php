<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/projects',function(){
    $projects= DB::table('projects')->get();
    return $projects;
});

Route::post('/projects',function(){
   $project= DB::table('projects')->insert([
        [
            'name'=>'devOp',
            'description'=>'very improtant for the future ',
            'start_date'=>'2025-10-14',
            'end_date'=>'2027-10-14',
            'status'=>'in progress',
        ]
    ]);
});
Route::post('/tasks',function(){
   $task= DB::table('tasks')->insert([
        [
            'project_id'=>1,
            'title'=>'build structure',
            'details'=>'very improtant for the future ',
            'status'=>'in progress',
            'priority'=>'high',
            'due_date'=>'2025-11-14',
        ]
     ]);
     return $task;
});
Route::post('/tasks/{id}/addComment',[CommentController::class,'addNewComment']);
Route::get('/tasks/getCommentWithAssociatedTask',[CommentController::class,'getAllCommentWithSpecificTask']);




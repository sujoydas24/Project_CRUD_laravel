<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/project',[ProjectController::class,'index'])->name('project.index');
Route::get('/project/create',[ProjectController::class,'create'])->name('project.create');
Route::post('/project',[ProjectController::class,'store'])->name('project.store');
Route::get('/project/{project}/edit',[ProjectController::class,'edit'])->name('project.edit');
Route::put('/project/{project}',[ProjectController::class,'update'])->name('project.update');
Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

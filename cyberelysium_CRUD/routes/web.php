<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);

Route::prefix('/student')->group(function () {
    Route::get('/',[StudentController::class,'index']->name('student'));
    Route::get('/list',[StudentController::class,'list']->name('student.list'));
    Route::get('/{id}/get',[StudentController::class,'get']->name('student.get'));
    Route::get('/store',[StudentController::class,'store']->name('student.store'));

});

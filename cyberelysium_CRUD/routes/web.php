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
    Route::get('/',[StudentController::class,'index'])->name('student');
    Route::get('/list',[StudentController::class,'list'])->name('student.list');
    Route::get('/{id}/get',[StudentController::class,'get'])->name('student.get');
    Route::post('/store',[StudentController::class,'store'])->name('student.store');
    Route::get('/{id}/status',[StudentController::class,'status'])->name('student.status');
    Route::get('/{id}/delete',[StudentController::class,'delete'])->name('student.delete');
    Route::get('/{id}/update',[StudentController::class,'update'])->name('student.update');
    Route::get('/student/upload-image',[StudentController::class,'uploadImage'])->name('student.uploadImage');

});

require __DIR__.'/auth.php';

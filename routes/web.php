<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,"index"])->name('home');
//Route::get('/student',[StudentController::class,"index"])->name('student');

Route::prefix('/student')->group(function() {

    Route::get('/',[StudentController::class,"index"])->name('student');
    Route::post('/store',[StudentController::class,"store"])->name('student.store');
    Route::get('/edit',[StudentController::class,"edit"])->name('student.edit');
    //edit loads data to the modal
    Route::post('/{student_id}/update',[StudentController::class,"update"])->name('student.update');
    Route::get('/{student_id}/delete',[StudentController::class,"delete"])->name('student.delete');
    Route::get('/{student_id}/done',[StudentController::class,"done"])->name('student.done');

} );

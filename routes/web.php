<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Route::get('/',[HomeController::class,"index"])->name('home');
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
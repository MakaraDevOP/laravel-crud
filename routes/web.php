<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
});
// Route::get('/student', [StudentController::class,'index']);

Auth::routes();

Route::get('/home', [StudentController::class, 'index'])->name('home');
Route::get('/fetch_student', [StudentController::class, 'fetchStudent'])->name(
    'student.get'
);
Route::get('/student_id/{id}', [StudentController::class, 'getStudent']);
Route::put('/sub_student', [StudentController::class, 'submitStudent'])->name(
    'student.update'
);
Route::post('/add_student', [StudentController::class, 'addStudent'])->name(
    'student.add'
);
Route::delete('/delete_student/{id}', [
    StudentController::class,
    'deleteStudent',
]);
Route::put('/clone_student/{id}', [StudentController::class, 'cloneStudent']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\staffController;
use App\Http\Controllers\studentcontoler;

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

Route::get('student', [studentcontoler::class, 'index']) -> name('student.index');
Route::get('student/create', [studentcontoler::class, 'create']) -> name('student.create');
Route::post('student/store', [studentcontoler::class, 'store']) -> name('student.store');
Route::get('student/show/{id}', [studentcontoler::class, 'show']) -> name('student.show');
Route::get('student/delete/{id}', [studentcontoler::class, 'destroy']) -> name('student.delete');
Route::get('student/edite/{id}', [studentcontoler::class, 'edite']) -> name('student.edite');
Route::post('student/update/{id}', [studentcontoler::class, 'update']) -> name('student.update');
 

/* resource controller in laravel  */
Route::resource('staff', staffController::class);
<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
return view('welcome');
}); */
Route::get('/', [TaskController::class, 'index']); // this will bring only the landing page i.e the page when we hit the url of web
Route::get('/', [TaskController::class, 'ShowAllTasks']);
Route::post('/', [TaskController::class, 'AddTasks']);
Route::delete('/{taskId}', [TaskController::class, 'DeleteTask']);

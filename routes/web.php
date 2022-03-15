<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessTwoExamplesController;

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

Route::group(['prefix' => 'less2'], function () {
    Route::get('example1', [LessTwoExamplesController::class, 'exampleOne']);
    Route::get('example2', [LessTwoExamplesController::class, 'exampleTwo']);
    Route::get('example3', [LessTwoExamplesController::class, 'exampleThree']);
});

<?php

use App\Exceptions\ExampleException;
use App\Http\Controllers\Web\ExampleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'example'
], function() {
    Route::match(['get', 'post'], '/', [ExampleController::class, 'example'])->name('example');
});



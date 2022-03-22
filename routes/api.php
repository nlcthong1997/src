<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ExampleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/example/login', [ExampleController::class, 'exampleLogin'])->name('api.example.login');

Route::group([
    'prefix' => 'example',
    'middleware' => []
], function() {
    Route::get('/', [ExampleController::class, 'exampleShow'])->name('api.example.show');
});

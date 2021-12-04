<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('ibadahs', IbadahAPIController::class);
Route::resource('agapes', AgapeAPIController::class);
Route::resource('jemaats', JemaatAPIController::class);

Route::get('search/{request}', [App\Http\Controllers\API\JemaatAPIController::class, 'search']);
Route::get('semua-ibadah', [App\Http\Controllers\API\IbadahAPIController::class, 'indexAll']);



<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
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

// Route::post('/customers', function() {
//     return Customer::create([
//         'name' => 'Lahana',
//         'address' => 'Panadura',
//         'salary' => '25.99'
//     ]);
// });

// Route::get('/customers', [CustomerController::class, 'index']);
// Route::post('/customers', [CustomerController::class, 'store']);

    /**
     * if we are using very simple basic CRUD operations, then we can 
     *  use below Route::resourde to it
     */

//public routes     
// Route::resource('customers', CustomerController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);
Route::get('/customers/search/{name}', [CustomerController::class, 'search']);



// Route::get('/customers/search/{name}', [CustomerController::class, 'search']);


//Sanctum Auth route
//Protected outes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'register']);
    Route::post('/customers', [CustomerController::class, 'store']);
    Route::put('/customers/{id}', [CustomerController::class, 'update']);
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



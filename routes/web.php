<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;

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

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/seed/{token}', [AuthController::class, 'seed']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
   Route::group(['middleware' => 'role:DEV,ADMIN'], function () {
      Route::get('/', [HomeController::class, 'index']);
   
      Route::put('/products/stock/{id}', [ProductsController::class, 'add_stock']);
      
      Route::resource('/products', ProductsController::class);

      Route::resource('/users', UsersController::class);

      Route::resource('/clients', ClientsController::class);

      Route::get('/sales', [SalesController::class, 'index']);
      Route::get('/sales/{id}', [SalesController::class, 'show']);
   });

   Route::group(['prefix' => '/sale'], function () {
       
      Route::get('/', [OperationController::class, 'index']);
      Route::post('/client/create', [OperationController::class, 'store_client']);
      Route::post('/client', [OperationController::class, 'handle_client']);
      Route::post('/', [OperationController::class, 'store']);
      Route::get('/{id}', [OperationController::class, 'show']);
   });

});

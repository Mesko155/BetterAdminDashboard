<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate']);

Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/dashboard', DashboardController::class);

    Route::resources([
        'practices' => PracticeController::class,
        'employees' => EmployeeController::class,
        'fields' => FieldController::class,
    ]);
});

// Route::resource('practices', PracticeController::class);
// Route::resource('employees', EmployeeController::class);
// Route::resource('fields', FieldController::class);
<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/contacts', [IndexController::class, 'contacts']);
Auth::routes();
Route::post('/ajaxAdd', [App\Http\Controllers\AjaxController::class, 'addOrder']);
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search']);
Route::get('/sort', [App\Http\Controllers\SortController::class, 'sort']);
Route::get ('/library/{categoryId}', [App\Http\Controllers\IndexController::class, 'choosenCategory']);
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/asd', [IndexController::class, 'asd']);

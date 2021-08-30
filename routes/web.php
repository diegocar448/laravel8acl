<?php

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
Route::put('admin/plans/{url}/update', 'Admin\PlanController@update')->name('plans.update');
Route::get('admin/plans/{url}/edit', 'Admin\PlanController@edit')->name('plans.edit');
Route::any("admin/plans/search", "Admin\PlanController@search")->name('plans.search');
Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
Route::delete('admin/plans/{url}', 'Admin\PlanController@destroy')->name('plans.destroy');
Route::get('admin/plans/{url}', 'Admin\PlanController@show')->name('plans.show');
Route::post('admin/plans', 'Admin\PlanController@store')->name('plans.store');

//Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index')->group(base_path('routes/web.php'));
Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');
//Route::get('admin/plans', [ 'as' => 'plans.index', 'uses' => 'Admin\PlanController@index']);

Route::get('admin', 'Admin\PlanController@index')->name('admin.index');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

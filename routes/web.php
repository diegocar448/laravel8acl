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

Route::prefix('admin')
                ->namespace('Admin')
                ->group(function() {


    /* 
    * Plans x Profile
    */
    Route::get("plans/{id}/profile/{idProfile}/detach", "ACL\PlanProfileController@detachProfilePlan")->name('plans.profile.detach');    
    Route::post("plans/{id}/profiles", "ACL\PlanProfileController@attachProfilesPlan")->name('plans.profiles.attach');    
    Route::any("plans/{id}/profiles/create", "ACL\PlanProfileController@profilesAvailable")->name('plans.profiles.available');    
    Route::get("plans/{id}/profiles", "ACL\PlanProfileController@profiles")->name('plans.profiles');
    /* Ver os planos da permissão */
    Route::get("profiles/{id}/plans", "ACL\PlanProfileController@plans")->name('profiles.plans');


    /* 
    * Permission x Profile
    */
    Route::get("profiles/{id}/permissions/{idPermission}/detach", "ACL\PermissionProfileController@detachPermissionsProfile")->name('profiles.permission.detach');    
    Route::post("profiles/{id}/permissions", "ACL\PermissionProfileController@attachPermissionsProfile")->name('profiles.permissions.attach');    
    Route::any("profiles/{id}/permissions/create", "ACL\PermissionProfileController@permissionsAvailable")->name('profiles.permissions.available');    
    Route::get("profiles/{id}/permissions", "ACL\PermissionProfileController@permissions")->name('profiles.permissions');
    /* Ver os perfis da permissão */
    Route::get("permissions/{id}/profiles", "ACL\PermissionProfileController@profiles")->name('permissions.profiles');


    /* 
    * Routes Permissions
    */
    Route::any("permissions/search", "ACL\PermissionController@search")->name("permissions.search");    
    Route::resource('permissions', "ACL\PermissionController");


    /* 
    * Routes Profiles
    */
    Route::any("profiles/search", "ACL\ProfileController@search")->name("profiles.search");    
    Route::resource('profiles', "ACL\ProfileController");


    /* 
    * Routes Detail Plans
    */
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::delete('plans/{url}/details/{idPlan}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idPlan}', 'DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idPlan}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idPlan}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');
    


    /* 
    * Routes Plan
    */
    Route::put('plans/{url}/update', 'PlanController@update')->name('plans.update');    
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::any("plans/search", "PlanController@search")->name('plans.search');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');    
    Route::get('plans', 'PlanController@index')->name('plans.index');

    
    


    /* 
    * Home Dashboard
    */

    Route::get('/', 'PlanController@index')->name('admin.index');
});






Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

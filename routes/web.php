<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FuzzyController;
use App\Http\Controllers\HandleController;
use App\Http\Controllers\KualitasUdaraController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\TsukamotoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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




Auth::routes();



Route::get('/', function () {
    return view('auth.login');
});


Route::group(['prefix'=>'dashboard', "middleware"=>"auth"], function(){
    //MAIN
        //dashboard
        Route::get('/', [DashboardController::class, 'index']);
        Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard.index");

    //MASTER
        //kualitas-udara
        Route::get('/kualitas-udara',[KualitasUdaraController::class, 'index'])->name('dashboard.kualitas-udara.index');
        

        //tsukamoto
        Route::get('/tsukamoto',[TsukamotoController::class, 'index'])->name('dashboard.fuzzy-tsukamoto.index');
        Route::put('/tsukamoto/{id}/update',[TsukamotoController::class, 'update'])->name('dashboard.fuzzy-tsukamoto.update');
        Route::delete('/tsukamoto/{id}/delete',[TsukamotoController::class, 'destroy'])->name('dashboard.fuzzy-tsukamoto.destroy');
        Route::get('/tsukamoto/{id}',[TsukamotoController::class, 'show'])->name('dashboard.fuzzy-tsukamoto.show');
        Route::post('/tsukamoto',[TsukamotoController::class, 'store'])->name('dashboard.fuzzy-tsukamoto.store');

        //rules
        Route::get('/rules',[RulesController::class, 'index'])->name('dashboard.fuzzy-rules.index');
        Route::put('/rules/{id}/update',[RulesController::class, 'update'])->name('dashboard.fuzzy-rules.update');
        Route::delete('/rules/{id}/delete',[RulesController::class, 'destroy'])->name('dashboard.fuzzy-rules.destroy');
        Route::get('/rules/{id}',[RulesController::class, 'show'])->name('dashboard.fuzzy-rules.show');
        Route::post('/rules',[RulesController::class, 'store'])->name('dashboard.fuzzy-rules.store');
        Route::post('/rules/import_rules',[RulesController::class,'import_rules'])->name('dashboard.fuzzy-rules.import_rules');

        //sensor
        Route::get('/sensor',[SensorController::class, 'index'])->name('dashboard.sensor.index');
        Route::post('/sensor/{id}/update',[SensorController::class, 'update'])->name('dashboard.sensor.update');
        Route::post('/sensor/{id}/delete',[SensorController::class, 'destroy_sensor'])->name('dashboard.sensor.destroy');
        Route::get('/sensor/{id}',[SensorController::class, 'show'])->name('dashboard.sensor.show');
        Route::post('/sensor',[SensorController::class, 'store'])->name('dashboard.sensor.store');
        Route::get('/get-one-last-data-sensor', [SensorController::class, 'getOneLastDataSensor'])->name('get-one-last-data-sensor');
        Route::get('/get-data-sensor-all', [SensorController::class, 'getDataSensorAll'])->name('get-data-sensor-all');
        Route::get('/get-data-sensor', [SensorController::class, 'getDataSensor'])->name('get-data-sensor');

        //handle
        Route::get('/handle',[HandleController::class, 'index'])->name('dashboard.handle.index');
        Route::put('/handle/{id}/update',[HandleController::class, 'update'])->name('dashboard.handle.update');
        Route::post('/handle/{id}/delete',[HandleController::class, 'destroy_handle'])->name('dashboard.handle.destroy');
        Route::get('/handle/{id}',[HandleController::class, 'show'])->name('dashboard.handle.show');
        Route::post('/handle',[HandleController::class, 'store'])->name('dashboard.handle.store');
        Route::post('/handle/import_handle',[HandleController::class,'import_handle'])->name('dashboard.handle.import_handle');

        //proses
        Route::get('/proses',[ProsesController::class, 'index'])->name('dashboard.proses.index');
        Route::post('/proses/{id}/update',[ProsesController::class, 'update'])->name('dashboard.proses.update');
        Route::post('/proses/{id}/delete',[ProsesController::class, 'destroy_proses'])->name('dashboard.proses.destroy');
        Route::get('/proses/{id}',[ProsesController::class, 'show'])->name('dashboard.proses.show');
        Route::post('/proses',[ProsesController::class, 'store'])->name('dashboard.proses.store');

    //SETTING
        //user
        Route::get('/user', [UserController::class, "index"])->name("dashboard.user.index");
        Route::get('/user/getRole', [UserController::class, "getRole"])->name("dashboard.user.getrole");
        Route::put('/user/{id}/update', [UserController::class, "update"])->name("dashboard.user.update");
        Route::delete('/user/{id}/destroy', [UserController::class, "destroy"])->name("dashboard.user.destroy");
        Route::get('/user/{id}', [UserController::class, "show"])->name("dashboard.user.show");
        Route::post('/user', [UserController::class, "store"])->name("dashboard.user.store");
            //update profile
            Route::put('/user/{id}/update-profile', [UserController::class, "updateProfile"])->name("dashboard.user.update-profile");
            //update password
            Route::put('/user/{id}/update-password', [UserController::class, "updatePassword"])->name("dashboard.user.update-password");


        //role
        Route::get('/role', [RoleController::class, "index"])->name("dashboard.user.role.index");
        Route::put('/role/{id}/update', [RoleController::class, "update"])->name("dashboard.user.role.update");
        Route::delete('/role/{id}/destroy', [RoleController::class, "destroy"])->name("dashboard.user.role.destroy");
        Route::get('/role/{id}', [RoleController::class, "show"])->name("dashboard.user.role.show");
        Route::post('/role', [RoleController::class, "store"])->name("dashboard.user.role.store");

        //permission
        Route::get('/permission', [PermissionController::class, "index"])->name("dashboard.user.permission.index");
        Route::put('/permission/{id}/update', [PermissionController::class, "update"])->name("dashboard.user.permission.update");
        Route::delete('/permission/{id}/destroy', [PermissionController::class, "destroy"])->name("dashboard.user.permission.destroy");
        Route::get('/permission/{id}', [PermissionController::class, "show"])->name("dashboard.user.permission.show");
        Route::post('/permission', [PermissionController::class, "store"])->name("dashboard.user.permission.store");

        //profile
        Route::get('/profile', [ProfileController::class, 'index'])->name("dashboard.user.profile");
        Route::delete('/profile/{id}/delete-picture', [ProfileController::class, 'deletePhotoPic'])->name("dashboard.user.deletePhotoPic");
        Route::post('/profile/upload-picture', [ProfileController::class, 'uploadPhotoPic'])->name("dashboard.user.uploadPhotoPic");
        Route::get('/profile/password', function () {
            return view('dashboard.profile.password');
        });



});

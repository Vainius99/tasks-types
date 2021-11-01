<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('tasks')->group(function () {

    Route::get('','App\Http\Controllers\TaskController@index')->name('task.index')->middleware("auth");
    Route::get('search', 'App\Http\Controllers\TaskController@search')->name('task.search')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\TaskController@create')->name('task.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\TaskController@store')->name('task.store')->middleware("auth");
    Route::get('edit/{task}', 'App\Http\Controllers\TaskController@edit')->name('task.edit')->middleware("auth");
    Route::post('update/{task}', 'App\Http\Controllers\TaskController@update')->name('task.update')->middleware("auth");
    Route::post('delete/{task}', 'App\Http\Controllers\TaskController@destroy')->name('task.destroy')->middleware("auth");
    Route::get('show/{task}', 'App\Http\Controllers\TaskController@show')->name('task.show')->middleware("auth");
    Route::get('filter','App\Http\Controllers\TaskController@filter')->name('task.filter')->middleware('auth');
    Route::get('/pdf', 'App\Http\Controllers\TaskController@generatePDF')->name('task.pdf');
    Route::get('pdftask/{task}', 'App\Http\Controllers\TaskController@generateTaskPDF')->name('task.pdftask');
    Route::get('statistics', 'App\Http\Controllers\TaskController@generatePDFAll')->name('task.statistics');
});

Route::prefix('types')->group(function () {

    Route::get('','App\Http\Controllers\TypeController@index')->name('type.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\TypeController@create')->name('type.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\TypeController@store')->name('type.store')->middleware("auth");
    Route::get('edit/{type}', 'App\Http\Controllers\TypeController@edit')->name('type.edit')->middleware("auth");
    Route::post('update/{type}', 'App\Http\Controllers\TypeController@update')->name('type.update')->middleware("auth");
    Route::post('delete/{type}', 'App\Http\Controllers\TypeController@destroy')->name('type.destroy')->middleware("auth");
    Route::get('show/{type}', 'App\Http\Controllers\TypeController@show')->name('type.show')->middleware("auth");
});

Route::prefix('paginationsettings')->group(function () {

    Route::get('','App\Http\Controllers\PaginatonSettingController@index')->name('paginationsetting.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\PaginatonSettingController@create')->name('paginationsetting.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\PaginatonSettingController@store')->name('paginationsetting.store')->middleware("auth");
    Route::get('edit/{paginationsetting}', 'App\Http\Controllers\PaginatonSettingController@edit')->name('paginationsetting.edit')->middleware("auth");
    Route::post('update/{paginationsetting}', 'App\Http\Controllers\PaginatonSettingController@update')->name('paginationsetting.update')->middleware("auth");
    Route::post('delete/{paginationsetting}', 'App\Http\Controllers\PaginatonSettingController@destroy')->name('paginationsetting.destroy')->middleware("auth");
    Route::get('show/{paginationsetting}', 'App\Http\Controllers\PaginatonSettingController@show')->name('paginationsetting.show')->middleware("auth");
});

Route::prefix('owners')->group(function () {

    Route::get('','App\Http\Controllers\OwnerController@index')->name('owner.index')->middleware("auth");
    Route::get('create', 'App\Http\Controllers\OwnerController@create')->name('owner.create')->middleware("auth");
    Route::post('store', 'App\Http\Controllers\OwnerController@store')->name('owner.store')->middleware("auth");
    Route::get('edit/{owner}', 'App\Http\Controllers\OwnerController@edit')->name('owner.edit')->middleware("auth");
    Route::post('update/{owner}', 'App\Http\Controllers\OwnerController@update')->name('owner.update')->middleware("auth");
    Route::post('delete/{owner}', 'App\Http\Controllers\OwnerController@destroy')->name('owner.destroy')->middleware("auth");
    Route::get('show/{owner}', 'App\Http\Controllers\OwnerController@show')->name('owner.show')->middleware("auth");
    Route::get('/pdf', 'App\Http\Controllers\OwnerController@generatePDF')->name('owner.pdf');
    Route::get('pdfowner/{owner}', 'App\Http\Controllers\OwnerController@generateOwnerPDF')->name('owner.pdfowner');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return view('index');
//});

Route::match(['get', 'post'],'/',['uses' => 'IndexController@execute'])->name('home');
Route::match(['get', 'post'],'/2',['uses' => 'Index2Controller@execute'])->name('home2');
Route::match(['get','post'],'/responses',['uses' => 'ResponseController@execute'])->name('responses');
Route::match(['get','post'],'/responses2',['uses' => 'Response2Controller@execute'])->name('responses2');
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index_user', function () {
    // ここに個人用ログイン画面の処理を書く
})->name('user.login');

Route::get('/company/index_com', function () {
    // ここに企業用ログイン画面の処理を書く
})->name('company.login');

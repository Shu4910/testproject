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
    return view('index');
});

Route::get('/index_user', function () {
    // ここにユーザーログイン画面の表示処理を書く
})->name('user.login');

Route::get('/company/login', function () {
    return view('company.login');
})->name('company.login');

Route::get('/company/register', function () {
    // ここに企業の登録画面の表示処理を書く
    return view('company.register');
})->name('company.register');


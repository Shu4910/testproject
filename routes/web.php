<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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

Route::get('/company/register', function () {
    // ここに企業の登録画面の表示処理を書く
    return view('company.register');
})->name('company.register');

Route::post('/write', [CompanyController::class, 'write'])->name('write');

Route::get('/company/login', function () {
    return view('company.login');
})->name('company.login');

Route::post('/company/login', [CompanyController::class, 'login'])->name('company.login');
Route::get('/dashboard', 'App\Http\Controllers\CompanyController@dashboard')->name('dashboard');

Route::get('/company/info_com', function () {
    return view('index');
});

Route::get('/info_com', function () {
    //
})->name('info_com');

Route::get('/com_scout_set', function () {
    //
})->name('com_scout_set');

Route::get('/com_scout_set', function () {
    //
})->name('com_scout_set');

Route::get('/cus_search', function () {
    //
})->name('cus_search');

Route::get('/com_chat', function () {
    //
})->name('com_chat');

Route::get('/index_com', function () {
        return view('company.login');
})->name('index_com');

Route::get('/result', function () {
    //
})->name('result');

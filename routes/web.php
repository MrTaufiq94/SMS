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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/country', function () {
    return view('country/index');
});

// Route::get('/country/create', function () {
//     return view('country/create');
// });

// Route::get('/country/edit', function () {
//     return view('country/edit');
// });



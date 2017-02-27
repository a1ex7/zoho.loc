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

/**
 * Route patterns
 */
Route::pattern('id', '[0-9]+');


/* Main page */

Route::get('/', function () {
    return redirect(route('deals.index'));
})->name('home');


/* CRUD Deals */

Route::resource('deals', 'DealController', ['only' => [
    'index', 'create', 'store'
]]);

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
    return redirect()->route("pupuk.index");
})->name("home");

Route::prefix('pupuk')->group(function () {
    Route::get("", "PupukController@index")->name("pupuk.index");
    Route::post("/store", "PupukController@store")->name("pupuk.store");
    Route::delete("/destroy/{id}", "PupukController@destroy")->name("pupuk.destroy");
});

Route::prefix('transaksi')->group(function () {
    Route::get("", "TransaksiController@index")->name("transaksi.index");
    Route::get("/create", "TransaksiController@create")->name("transaksi.create");
    Route::post("/store", "TransaksiController@store")->name("transaksi.store");
    Route::delete("/destroy/{id}", "TransaksiController@destroy")->name("transaksi.destroy");
    Route::get("/edit/{id}", "TransaksiController@edit")->name("transaksi.edit");
    Route::get("/update/{id}", "TransaksiController@update")->name("transaksi.update");
});

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


Route::get('downloadkeluar/{id}', 'KeluarController@download')->name('download.data.keluar');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:administrator']], function() {
    Route::put('updatestatuskasie/{id}', 'KeluarController@statuskasie')->name('status.kasie');
    Route::get('download/{id}', 'MasukController@download')->name('download.data');
    Route::get('view/datakeluar', 'KeluarController@viewdatakeluar')->name('viewdatakeluar');
    Route::get('view/datamasuk', 'MasukController@viewdatamasuk')->name('viewdatamasuk');

    Route::get('/', function () {

        return view('admin.index');
    });

    Route::resource('masuk', 'MasukController');
    Route::resource('keluar', 'KeluarController');

});

Route::group(['prefix' => 'lurah', 'middleware' => ['auth', 'role:lurah']], function() {
    Route::get('viewlurah/{id}', 'KeluarController@viewlurah')->name('view.lurah');

    Route::get('/', function () {
        $data = App\Keluar::all();

        return view('lurah.index', compact('data'));
    })->name('lurah.index');

});

Route::group(['prefix' => 'kasie', 'middleware' => ['auth', 'role:kasie']], function() {
    // Route::get('view/datakeluarkasie', 'KeluarController@viewdatakeluarkasie')->name('viewdatakeluar.kasie');
    // Route::resource('keluar', 'KeluarController');
    Route::put('updatestatuslurah/{id}', 'KeluarController@statuslurah')->name('status.lurah');

    Route::get('viewkasie/{id}', 'KeluarController@viewkasie')->name('view.kasie');

    Route::get('/', function () {
        $data = App\Keluar::all();

        return view('kasie.index', compact('data'));
    })->name('kasie.index');
    Route::get('/spbspk', 'SpbSpkController@all')->name('spbspk');
});


Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




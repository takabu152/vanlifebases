<?php

//これ忘れがち… ここで利用するModelを指定しないとエラーになる。
use App\Task;
use App\Store;
use Illuminate\Http\Request;

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

    //Welcomeページで施設（コンテンツ）を一覧表示するため、データを取得する。
    //$tasks = Task::orderBy('id', 'asc')->get();

    $stores = DB::table('stores')
        ->join('storeimages', 'stores.storeid', '=', 'storeimages.storeid')
        ->join('storeservices', 'stores.storeid', '=', 'storeservices.storeid')
        ->join('services', 'storeservices.serviceid', '=', 'services.serviceid')
        ->where('storeimages.imagedivision', '=', '1')
        ->get();

    //$stores = Store::orderBy('storeid', 'asc')->get();
    return view('welcome', ['stores' => $stores]);
    //return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 施設一覧の作成
Route::get('/dispstores', function () {
    return view('dispstores');
});

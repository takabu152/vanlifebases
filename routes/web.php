<?php

//これ忘れがち… ここで利用するModelを指定しないとエラーになる。
use App\Task;
use App\Store;
use App\storeservice;
use App\Service;
use Illuminate\Http\Request;
use App\Booking;
use App\Hostbooking;
use App\Mail;

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

Route::get('/storeslist', function () {

    //Welcomeページで施設（コンテンツ）を一覧表示するため、データを取得する。
    //$tasks = Task::orderBy('id', 'asc')->get();

    $stores = DB::table('stores')
        ->get();

    $storeimages = DB::table('storeimages')
        ->get();

    $storeservices = DB::table('storeservices')
        ->get();

    $services = DB::table('services')
        ->get();

    //$stores = Store::orderBy('storeid', 'asc')->get();
    return view('welcome', ['stores' => $stores, 'storeimages' => $storeimages, 'storeservices' => $storeservices, 'services' => $services]);
    //return view('welcome');
});

// 各施設の詳細画面表示
Route::get('/storedetail/{id}', function ($id) {

    //Welcomeページで施設（コンテンツ）を一覧表示するため、データを取得する。
    //$tasks = Task::orderBy('id', 'asc')->get();
    // dd($id);
    $store = DB::table('stores')->where('storeid', $id)->first();

    $storeimages = DB::table('storeimages')
        ->get();

    $storeservices = DB::table('storeservices')
        ->get();

    $services = DB::table('services')
        ->get();

    return view('storedetail', ['store' => $store, 'storeimages' => $storeimages, 'storeservices' => $storeservices, 'services' => $services]);
    //return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// TOP画面の表示（仮）
Route::get('/', function () {
    return view('top');
});

// 施設一覧の作成
Route::get('/dispstores', function () {
    return view('dispstores');
});

// 予約一覧の作成
Route::get('/booking', 'BookingController@index');

// 各施設の詳細画面から
Route::post('/booking/cancelreq', 'BookingController@cancelreq');

// ホスティング資料請求メール送信
Route::post('/affiliate', 'MailController@affiliaterequest');
// Route::post('/affiliaterequest', function () {
//     return Input::all();
// });

// 予約登録処理
Route::post('/storedetail', 'BookingController@store');

// 一般ユーザーでログインした場合
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    Route::get('/booking', 'BookingController@index');
});

// ホストでログインした場合
Route::group(['middleware' => ['auth', 'can:host-higher']], function () {
    Route::get('/hostbooking', 'HostbookingController@index');
    Route::post('/hostbooking/bookingok', 'HostbookingController@bookingok');
    Route::post('/hostbooking/bookingng', 'HostbookingController@bookingng');
});

// システム管理者でログインした場合
Route::group(['middleware' => ['auth', 'can:system-only']], function () {
});

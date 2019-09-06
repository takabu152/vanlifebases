<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Task;
use App\Store;
use App\storeservice;
use App\Service;
use App\Booking;
use Validator;

class BookingController extends Controller
{
    //クラスが呼ばれたら最初に実行する処理
    public function __construct()
    {
        $this->middleware('auth');
    }
    //表示処理
    public function index()
    {
        $bookings = DB::table('bookings')
    ->where('guestid', Auth::id())
        ->get();
        $stores = DB::table('stores')
        ->get();

        return view('booking', ['bookings' => $bookings, 'stores' => $stores]);
    }
}

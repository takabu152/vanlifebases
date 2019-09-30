<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Task;
use App\Store;
use App\storeservice;
use App\Service;
use App\Hostbooking;
use App\Booking;
use Validator;

class HostbookingController extends Controller
{
    //クラスが呼ばれたら最初に実行する処理
    public function __construct()
    {
        $this->middleware('auth');
    }
    //ホストの施設予約一覧表示処理
    public function index()
    {
        $hostbookings = DB::table('bookings')
        ->leftJoin('users', 'bookings.guestid', '=', 'users.id')
        ->leftJoin('stores', 'bookings.storeid', '=', 'stores.storeid')
        ->where('stores.hostid', '=', Auth::id())
        ->leftJoin('storeimages', 'bookings.storeid', '=', 'storeimages.storeid')
        ->where('storeimages.imagedivision', '=', '1')
        ->orderBy('bookings.storeid', 'asc')
        ->orderBy('bookings.id', 'asc')
        ->select('bookings.id as bookings_id', 'bookings.guestid', 'bookings.storeid', 'bookings.checkinday', 'bookings.checkoutday', 'bookings.paymentmoney', 'bookings.bookingstatus', 'bookings.checkinstatus', 'name', 'storename')
        ->get();

        return view('hostbooking', ['hostbookings' => $hostbookings]);
    }

    //空室確認OKの場合の更新表示
    public function bookingok(Request $request)
    {
        //bookingテーブルのbookingstatusをURL発行に変更
        $hostbookingcheck = Booking::find($request->bookingid);
        $hostbookingcheck->bookingstatus = '1';
        $hostbookingcheck->save();
        //リダイレクト
        return redirect('/hostbooking');
    }
    
    //空室確認NGの場合の更新表示
    public function bookingng(Request $request)
    {
        //bookingテーブルのbookingstatusをキャンセルに変更
        $hostbookingcheck = Booking::find($request->bookingid);
        $hostbookingcheck->bookingstatus = '7';
        $hostbookingcheck->save();
        //リダイレクト
        return redirect('/hostbooking');
    }
}

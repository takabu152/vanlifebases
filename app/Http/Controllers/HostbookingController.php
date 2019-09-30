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
        $hostbookings = DB::table('stores')->where('hostid', Auth::id())
        ->leftJoin('bookings', 'stores.storeid', '=', 'bookings.storeid')
        ->get();

        $users = DB::table('users')
        ->leftJoin('bookings', 'users.id', '=', 'bookings.guestid')
        ->get();

        return view('hostbooking', ['hostbookings' => $hostbookings, 'users' => $users]);
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

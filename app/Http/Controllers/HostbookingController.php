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

use Illuminate\Support\Facades\Mail; // Import Mail Facade
use App\Mail\VacancyConfirmation; // 追加

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

        // ホストによる予約承諾を関係者にメール通知 
        // ホスト側のメールアドレス取得
        $store = DB::table('stores')
            ->where('storeid', $hostbookingcheck->storeid)
            ->first();
        // dd($store->emai1);

        // ゲスト側のメールアドレス取得
        $guest = DB::table('users')
            ->where('id', $hostbookingcheck->guestid)
            ->first();

        // 予約ステータス（この場合は整数1）取得
        $bookingstatus = $hostbookingcheck->bookingstatus;

        Mail::to($guest->email)
            ->cc('connect@vanlifebases.com')
            ->bcc($store->emai1)
            ->send(new VacancyConfirmation($hostbookingcheck, $guest, $store, $bookingstatus));

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

        // ホストによる予約承諾を関係者にメール通知 
        // ホスト側のメールアドレス取得
        $store = DB::table('stores')
            ->where('storeid', $hostbookingcheck->storeid)
            ->first();

        // ゲスト側のメールアドレス取得
        $guest = DB::table('users')
            ->where('id', $hostbookingcheck->guestid)
            ->first();

        // 予約ステータス（この場合は整数7）取得
        $bookingstatus = $hostbookingcheck->bookingstatus;

        Mail::to($guest->email)
            ->cc('connect@vanlifebases.com')
            ->bcc($store->emai1)
            ->send(new VacancyConfirmation($hostbookingcheck, $guest, $store, $bookingstatus));

        //リダイレクト
        return redirect('/hostbooking');
    }
}

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

// Import Mail Facade
use Illuminate\Support\Facades\Mail;
use App\Mail\PostSend;
use App\Mail\CancelReqMail;

class BookingController extends Controller
{
    //クラスが呼ばれたら最初に実行する処理
    public function __construct()
    {
        $this->middleware('auth');
    }

    //表示処理関数
    public function index()
    {
        $bookings = DB::table('bookings')
            ->where('guestid', Auth::id())
            ->get();
        $stores = DB::table('stores')
            ->get();

        return view('booking', ['bookings' => $bookings, 'stores' => $stores]);
    }

    //登録処理関数
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'storename' => 'required',
            'checkinday' => 'required',
            'checkoutday' => 'required',
            'paymentmoney' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('/storedetail/{id}')
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquentモデル
        $book = new Booking;
        $book->guestid = $request->guestid;
        $book->storeid = $request->storeid;
        $book->checkinday = $request->checkinday;
        $book->checkoutday = $request->checkoutday;
        $book->paymentmoney = $request->paymentmoney;
        $book->save();

        // メール送信
        $user = Auth::user();
        $storename = $request->storename;
        $storeemail1 = $request->storeemail1;
        // $storeemail2 = $request->storeemail2;

        Mail::to($user->email)
            ->cc('connect@vanlifebases.com')
            ->bcc([$storeemail1])
            // ->bcc([$storeemail1, $storeemail2])
            ->send(new PostSend($user, $book, $storename));

        //「/」ルートにリダイレクト
        return redirect('/booking');
    }

    // 予約キャンセル関数
    public function cancelreq(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'bookingid' => 'required',
            'storeid' => 'required',
            'guestid' => 'required'
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //データ更新処理
        // bookingsテーブルのbookingstatusカラムに整数4（キャンセル依頼）を入れる
        $cancelnum = '4';
        $bookingid = $request->bookingid;
        $book = Booking::find($bookingid);
        $book->bookingstatus = $cancelnum;
        $book->save();

        // ゲストのメールアドレスを取得
        $user = Auth::user();
        // dd($user);

        // 施設のメールアドレスを取得
        $store = DB::table('stores')
            ->where('storeid', $request->storeid)
            ->first();
        $storename = $store->storename;
        $storeemail1 = $store->emai1;
        // $storeemail2 = $store->email2;

        Mail::to($user->email)
            ->cc('connect@vanlifebases.com')
            ->bcc([$storeemail1])
            // ->bcc([$storeemail1, $storeemail2])
            ->send(new CancelReqMail($user, $book, $storename));

        //リダイレクト
        return redirect('/booking');
    }
}

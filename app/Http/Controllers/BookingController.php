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
        $storeemail2 = $request->storeemail2;

        Mail::to($user->email)
            ->cc('connect@vanlifebases.com')
            ->bcc([$storeemail1, $storeemail2])
            // ->bcc($store_address)
            ->send(new PostSend($user, $book, $storename));

        //「/」ルートにリダイレクト
        return redirect('/booking');
    }

    // 予約キャンセル関数-gimoto
    public function cancel(Request $request)
    {
        dd($request->bookingstatus);

        //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'bookingstatus' => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/booking')
                ->withInput()
                ->withErrors($validator);
        }

        //bookingsテーブルbookingstatusデータ更新処理
        $booking = Booking::find($request->id);
        $booking->bookingstatus = $request->bookingstatus;
        $booking->save();

        // メール通知機能
        // Mail::send(
        //     // どんな内容を？テンプレートのファイル指定
        //     'emails.cancelrequest',
        //     [
        //         // "message"がview/emails/cancelrequest.blade.phpへ渡る
        //         "message" => "予約のキャンセルが申し込まれました。"

        //     ],
        //     function ($message) {
        //         $user = Auth::user();
        //         $message
        //             ->to($user->email)
        //             ->subject("お知らせ")
        //             ->from('connect@vanlifebases.com');
        //     }
        // );

        return redirect('/booking');
    }
}

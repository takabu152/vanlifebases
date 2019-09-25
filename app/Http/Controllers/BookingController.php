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
        $storeemail2 = $request->storeemail2;

        Mail::to($user->email)
            ->cc('connect@vanlifebases.com')
            ->bcc([$storeemail1, $storeemail2])
            // ->bcc($store_address)
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

        // 文字列を直接そのままメールしたい場合は、rawメソッドを使う。
        Mail::raw(
            'キャンセルリクエストがありました。',
            function ($message) {
                $message
                    ->to('yanagimotoaki@gmail.com')
                    // ->cc()
                    // ->bcc()
                    ->subject("キャンセルリクエストがありました。")
                    ->from('VanlifeBases');
            }
        );


        // メール通知機能
        // Mail::send(
        //     // メールの文章。テンプレートとなるviewファイル指定
        //     'emails.cancelrequestmail',
        //     [
        //         // viewに渡す配列 "message"がview/emails/cancelrequestmail.blade.phpへ渡る
        //         "message" => "キャンセルリクエストがありました。"
        //     ],
        //     function ($message) {
        //         // $user = Auth::user();
        //         $message
        //             ->to("yanagimotoaki@gmail.com")
        //             ->subject("お知らせ")
        //             ->from('connect@vanlifebases.com');
        //     }
        // );

        // ゲストのメールアドレスを取得
        // $user = Auth::user();

        // // 施設のメールアドレスを取得
        // $store = DB::table('stores')
        //     ->where('storeid', $request->storeid)
        //     ->get();
        // // $storeemail1 = $store->emai1;
        // // $storeemail2 = $store->email2;

        // Mail::to($user->email)
        //     ->cc('connect@vanlifebases.com')
        //     // ->bcc([$storeemail1, $storeemail2])
        //     ->send(new CancelReqMail($user, $book, $store));

        //リダイレクト
        return redirect('/booking');
    }
}

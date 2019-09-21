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
use Validator;

class HostbookingController extends Controller
{
    //クラスが呼ばれたら最初に実行する処理
    public function __construct()
    {
        $this->middleware('auth');
    }
    //表示処理
    public function index()
    {
        $stores = DB::table('stores')
    ->where('hostid', Auth::id())
        ->get();
        $bookings = DB::table('bookings')
        ->get();

        return view('hostbooking', ['bookings' => $bookings, 'stores' => $stores]);
    }
}

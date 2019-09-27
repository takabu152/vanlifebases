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
        $hostbookings = DB::table('stores')->where('hostid', Auth::id())
        ->leftJoin('bookings', 'stores.storeid', '=', 'bookings.storeid')
        ->get();

        $users = DB::table('users')
        ->leftJoin('bookings', 'users.id', '=', 'bookings.guestid')
        ->get();

        return view('hostbooking', ['hostbookings' => $hostbookings, 'users' => $users]);
    }
}

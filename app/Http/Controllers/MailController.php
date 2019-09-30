<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator; // 追加

use Illuminate\Support\Facades\Mail; // Import Mail Facade
use App\Mail\AffiliateRequest; // 追加

class MailController extends Controller
{
    public function affiliaterequest(Request $request)
    {
        // dd($request);
        //バリデーション
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // メール送信
        $name = $request->name;
        $email =  $request->email;
        $message = $request->message;

        Mail::to($email)
            ->cc('connect@vanlifebases.com')
            ->send(new AffiliateRequest($name, $email, $message));

        $request->session()->regenerateToken();

        // Mail::send(
        //     'emails.affiliaterequest',
        //     [
        //         "name" => "ホスティングに関する資料請求" // text to send
        //     ],
        //     function ($message) {
        //         $message
        //             ->to($user->email)
        //             ->cc('connect@vanlifebases.com')
        //             ->subject("VanlifeBases ホスティングに関する資料請求")
        //             ->from('connect@vanlifebases.com');
        //     }
        // );

        //「/」ルートにリダイレクト
        return redirect('/');
    }
}

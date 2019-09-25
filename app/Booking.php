<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // dates（formatメソッドを使用できるようにする）
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'checkinday',
        'checkoutday',
        '$booking->checkinday',
        '$booking->checkoutday'
    ];

    // /** カテゴリ一覧を取得するメソッド
    //  * カテゴリリストを取得する
    //  *
    //  * @param int    $num_per_page 1ページ当たりの表示件数
    //  * @param string $order        並び順の基準となるカラム
    //  * @param string $direction    並び順の向き asc or desc
    //  * @return mixed
    //  */
    // public function getCategoryList(int $num_per_page = 20, string $order = 'display_order', string $direction = 'asc')
    // {
    //     $query = $this->orderBy($order, $direction);
    //     if ($num_per_page) {
    //         return $query->paginate($num_per_page);
    //     }
    //     return $query->get();
    // }
}

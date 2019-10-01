<div>
  
    @if ($bookingstatus == 1)
        {{$GuestName}}さん、下記の予約リクエストについて、施設の空き状況が確認できました。
        Bookingid: {{$BookingId}}、
        施設名: {{$StoreName}}、
        チェックイン: {{$Checkinday}}、
        チェックアウト: {{$Checkoutday}}。
        お支払いに関するご案内をお待ちください。
    @elseif ($bookingstatus == 7)
        {{$GuestName}}さん、下記の予約リクエストについて、残念ながら施設に空きがありませんでした。
        Bookingid: {{$BookingId}}、
        施設名: {{$StoreName}}、
        チェックイン: {{$Checkinday}}、
        チェックアウト: {{$Checkoutday}}。
        お手数ですが、日程を変更するか、別の施設にて予約リクエストをお願いいたします。
    @endif
                
</div>

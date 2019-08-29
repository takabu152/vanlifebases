<!-- ここからコンテンツの表示を行う。 -->
        <!-- 表示領域 -->
        @if (count($stores) > 0)
        <!-- 施設一覧のループ（メインループ） -->
        @foreach ($stores as $store)

        <!-- 施設提供サービスの取得 -->
        @php
        $selectstoreservices = $storeservices
        ->where('storeid',$store->storeid);
        @endphp
        @endforeach
        
        <!-- 施設写真の取得(トップ画像のみ取得) -->
        @php
        $selectstoreimages = $storeimages
        ->where('storeid',$store->storeid)
        ->where('imagedivision',1);
        @endphp
        
        <div class="card" style="width: 40rem;">

            @foreach($selectstoreimages as $storeimage)

            <form action="{{ url('storedetail/'.$store->storeid) }}" method="GET">
                <a href="{{ url('storedetail/'.$store->storeid) }}.submit()">
                <img class="card-img-top" src="{{ $storeimage->imageurl
                }}" alt="カードの画像">
                <div class="card-body">
                    <h2><strong>{{ $store->storename }}</strong>【{{$store->storeaddress01}}】</h2>
                    <h3 class="sub-message"><strong>Welcom message:</strong>{{$store->forusermessage}}</h3>
                    <div class="sub-message"><a>{{$store->websiteurl}}</a></div>
                </div>
                @endforeach
               
                <!-- 施設サービスのループ -->
                @foreach($selectstoreservices as $storeservice)

                <!-- アイコン画像の取得 -->
                @php
                $selectservices = $services
                ->where('serviceid',$storeservice->serviceid);
                @endphp

                @foreach($selectservices as $service)
                <div class="icon-img">
                    <ul>
                        <li>
                            <img  class="icon-img-contents" src="{{$service->serviceiconimageurl}}">
                        </li>
                    </ul>
                </div>

                @endforeach
                @endforeach
                @endif
                
            </a>
            </form>
        </div>
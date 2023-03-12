@php
    $segment1 = \Illuminate\Support\Facades\Request::segment(2);
@endphp
@include('front.header')
        <div class="container mt-3">
            @if(!empty($customization->before_content_script))
                <div class="row p-3 m-3">
                    {!! html_entity_decode($customization->before_content_script) !!}
                </div>
            @endif
            <div class="row flex-nowrap">
                @include('front.desktop-sidebar')
                <div class="container-rightside">
                    <div class="p-3 main_card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="wishing-card" style="border-radius:5px; margin: auto;max-width: 550px;min-height: 200px;padding: 10px;background-color: #000;background-image:url({{asset('storage/backgroundsImages/'.$card->back_image)}});background-repeat: no-repeat;
  background-position: center; background-size: cover;">
                                    <div>
                                        <figure style="animation: wobble 5s ease-in-out infinite; transform-origin: center center;
                                    transform-style: preserve-3d;
                                    margin: 0;
                                    margin-top: 10px !important;
                                    margin-bottom: 10px !important;height: 70px;
                                    word-break: break-all;
                                    }">
                                            <h2 class="wisherName" style="display: block; width: 100%; line-height: 1.5; text-align: CENTER; font: 900 35px concert one, sans-serif; position: absolute; color: #fff;animation: glow 10s ease-in-out infinite;font-family: cursive;">
                                                {{$name!=null ? $name : "Your Name"}}</h2>
                                        </figure>
                                    </div>
                                    <div class="wishingyou" style="text-align: center">
                                        @if($card->wishing_title=='wish_you')
                                            <img src="{{asset('card-elements/wish.png')}}" alt="Wish You" style="width: 60%">
                                        @else
                                            <img src="{{asset('card-elements/wishing.gif')}}" alt="Wish You" style="width: 60%">
                                            @endif
                                    </div>
                                    @if(!empty($card->center_image))
                                    <div class="mainimg mt-1">
                                        <p class="animated infinite pulse" style="text-align: center">
                                            <img src="{{asset('storage/centerImages/'.$card->center_image)}}" alt="Valentine's Day Wishes" style="width: 90%;">
                                        </p>
                                    </div>
                                    @endif
                                    @if($card->bottom_image)
                                    <div class="sliderimagescontainer mt-1">
                                        <ul id="fade-images" class="sliderimages">
                                            <li style=""><img src="{{asset('storage/bottomImages/'.$card->bottom_image)}}" alt="Valentine's Day Wishes" class=" my-4 m-auto">
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                    @if(!empty($card->bottom_contents))
                                <div>
                                    {!! $card->bottom_contents !!}
                                </div>
                                    @endif
{{--                                    <div class="childimages">--}}
{{--                                        <div class="childimg1">--}}
{{--                                            <img src="https://see-me.co/ImG/md/momunder2.gif" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="childimg2">--}}
{{--                                            <img src="https://see-me.co/ImG/md/momunder2.gif" alt="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    @if(!empty($card->content))
                                    <div class="cardinnertext max-w-2xl mt-10 px-5">
                                        <p style="color:{{$card->content_color}}; font-size: 23px;" >
                                            <b><marquee behavior="" direction="">{{$card->content}}</marquee></b></p>
                                    </div>
                                    @endif

                                    <input type="hidden" name="card_id" value="{{$card->id}}">
                                    @if($name==null)
                                        <div class="wisher_name_form_parent" style="margin: auto;padding: 10px 0;display: flex;max-width: 550px;justify-content: space-between;">
                                            <input type="text" class="form-control" name="wisher_name" placeholder="👉 Type name here">
                                            <button class="btn create" style="background: #274472;">Create</button>
                                        </div>
                                    @endif
                                    @if($name!=null)
                                    <div class="share_card" style="max-width: 550px;text-align: center;">
                                        <div class="desk-share">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{\Illuminate\Support\Facades\Request::url()}}" target="_blank" ><img src="https://see-me.co/img/desk-fb.png"></a>
                                            <a href="https://api.whatsapp.com/send?text={{\Illuminate\Support\Facades\Request::url()}}" target="_blank" ><img src="https://see-me.co/img/desk-wp.png"></a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(!empty($card->seo_content))
                        <div class="bg-white rounded-sm boxshadow mt-4" style="max-width: 550px;margin: 0 auto;">
                            <br>
                            <h1 class="text-2xl text-center mt-2">{{$card->title}}</h1>
                            <div class="flex justify-center items-center py-5 mx-4">
                                {{$card->seo_content}}
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="p-3 related_cards">
                        <div class="related_cards_inner">
                            <div class="card border-0 mx-auto" style="max-width: 400px;margin-bottom:60px;">
                                <div class="card-header bg-white">
                                    <p class="text-center">Recent Wish Cards</p>
                                </div>
                                <div class="card-body">
                                    @foreach($recentCards as $card)
                                        <a href="{{route('card.specific',$card->id)}}">
                                            <div class="input-group p-2">
                                                <img src="{{asset('storage/coverImages/'.$card->cover_image)}}"  alt="{{$card->title}}" class="n-tmb">
                                                <p class="n-tmb-txt pl-2">{{$card->title}}<br><small>Make wish card with your name</small></p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($name!=null)
                    <div class="mobshare">
                        <center>
                            <a class="footerbtn" href="#">
                                <img width="25px" height="25px" src="https://see-me.co/img/wtsp.png">
                                <b style="font-size: 15px;"> SHARE ON WHATSAPP </b>
                                <img width="25px" height="25px" src="https://see-me.co/img/wtsp.png">
                            </a>
                        </center>
                    </div>
            @endif
        </div>
@include('front.footer')




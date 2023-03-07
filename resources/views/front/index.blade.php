@php
    $segment1 = \Illuminate\Support\Facades\Request::segment(2);
@endphp
@include('front.header')
<div class="container mt-2" style="min-height: -webkit-fill-available; ">
    @if(!empty($customization->before_content_script))
        <div class="row p-3 m-3">
            {!! html_entity_decode($customization->before_content_script) !!}
        </div>
    @endif
    <div class="row flex-nowrap">
        @include('front.desktop-sidebar')

        <div class="container-rightside">
            <div class="col p-3">
                <div class="row ml-4 card-listing" style="justify-content: space-evenly;">
                    @foreach($cards->items() as $card)
                        <div class="col-lg-4 py-2 single-card">
                            <div class="card">
                                <a href="{{route('card.specific',$card->id)}}" style="text-decoration: none; color: #000000;text-align: center">
                                    <div class="card-body">
                                        <img src="{{asset('storage/coverImages/'.$card->cover_image)}}" class="card-img-top" alt="{{$card->title}}" style="min-height: 300px">
                                        <h4 class="card-title pt-2">{{$card->title}}</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$cards->links('vendor.pagination.custom')}}
        </div>
    </div>
</div>
</div>
@include('front.footer')

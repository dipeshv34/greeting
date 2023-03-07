<div class="container-leftside">
    <div class="px-0 bg-light desktop-sidebar mt-3" style="height: fit-content;">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 py-4 text-black">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                @foreach($categories as $category)
                    <li class="nav-item">
                        <a href="{{route('front.view',$category->id)}}" class="nav-link align-middle text-decoration-none text-black {{$segment1==$category->id ? 'active' : ''}}">
                            <i class="fs-4 bi-house"></i> <span class="">{{$category->title}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            @if(!empty($customization->desktop_content_script))
                {!! html_entity_decode($customization->desktop_sidebar_script) !!}
            @endif
        </div>
    </div>
</div>

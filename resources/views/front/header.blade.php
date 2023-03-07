<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{asset('css/style2.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    @if(!empty($customization->header_script))
        {!! html_entity_decode($customization->header_script) !!}
    @endif
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-transparent p-3">
        <div class="brand-parent">
            <a class="navbar-brand" href="{{route('front.view')}}">
                <img src="{{asset('storage/logo/'.$customization->logo)}}" width="50" height="50" class="d-inline-block align-top" alt="">
            </a>
            <div>
                <h3>{{$customization->header_text}}</h3>
            </div>
        </div>
        <a href="#" class="hamburger-menu" data-drawer-trigger="" aria-controls="drawer-name" aria-expanded="false">
            <div class="menucontainer flex text-white items-center">
                <h3>Menu</h3>
                <svg class="w-7" style="min-width: 50px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </div>
        </a>
    </nav>

</header>

<div class="mobile-sidebar">
    <div class="mobile-sidebar-inner">
        <div class="sidebar-header">
            <span class="sidebar-heading">Menu</span>
            <span class="sidebar-close">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="black" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/> </svg>
            </span>
        </div>
        <div class="sidebar-menu">
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
    </div>
    @if($customization->desktop_content_script)
        {!! html_entity_decode($customization->mobile_content_script) !!}
    @endif
</div>

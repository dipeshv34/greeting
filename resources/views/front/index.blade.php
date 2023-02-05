<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body style="background: #43a047 linear-gradient( 0deg,#3949ab 0,#43a047) no-repeat 0 0">
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Greetings</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a href="{{route('front.view',$category->id)}}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">{{$category->title}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col p-3">
            <div class="row p-4 ml-4" style="justify-content: space-evenly;">
            @foreach($cards as $card)
                    <div class="card col-lg-3">
                        <a href="{{route('card.specific',$card->id)}}" style="text-decoration: none; color: #000000;text-align: center">
                            <div class="card-body">
                                <img src="{{asset('storage/coverImages/'.$card->cover_image)}}" class="card-img-top" alt="{{$card->title}}" style="min-height: 300px">
                                <h4 class="card-title pt-2">{{$card->title}}</h4>
                            </div>
                        </a>
                    </div>
            @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>

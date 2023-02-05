<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <style>
        @-webkit-keyframes wobble {
            0% {
                -webkit-transform: none;
                transform: none;
            }
            15% {
                -webkit-transform: translate3d(-25%, 0, 0) rotate(-5deg);
                transform: translate3d(-25%, 0, 0) rotate(-5deg);
            }
            30% {
                -webkit-transform: translate3d(20%, 0, 0) rotate(3deg);
                transform: translate3d(20%, 0, 0) rotate(3deg);
            }
            45% {
                -webkit-transform: translate3d(-15%, 0, 0) rotate(-3deg);
                transform: translate3d(-15%, 0, 0) rotate(-3deg);
            }
            60% {
                -webkit-transform: translate3d(10%, 0, 0) rotate(2deg);
                transform: translate3d(10%, 0, 0) rotate(2deg);
            }
            75% {
                -webkit-transform: translate3d(-5%, 0, 0) rotate(-1deg);
                transform: translate3d(-5%, 0, 0) rotate(-1deg);
            }
            to {
                -webkit-transform: none;
                transform: none;
            }
        }
        @keyframes wobble {
            0% {
                -webkit-transform: none;
                transform: none;
            }
            15% {
                -webkit-transform: translate3d(-25%, 0, 0) rotate(-5deg);
                transform: translate3d(-25%, 0, 0) rotate(-5deg);
            }
            30% {
                -webkit-transform: translate3d(20%, 0, 0) rotate(3deg);
                transform: translate3d(20%, 0, 0) rotate(3deg);
            }
            45% {
                -webkit-transform: translate3d(-15%, 0, 0) rotate(-3deg);
                transform: translate3d(-15%, 0, 0) rotate(-3deg);
            }
            60% {
                -webkit-transform: translate3d(10%, 0, 0) rotate(2deg);
                transform: translate3d(10%, 0, 0) rotate(2deg);
            }
            75% {
                -webkit-transform: translate3d(-5%, 0, 0) rotate(-1deg);
                transform: translate3d(-5%, 0, 0) rotate(-1deg);
            }
            to {
                -webkit-transform: none;
                transform: none;
            }
        }
        @keyframes glow {
            0%,
            100% {
                text-shadow: 0 0 10px #c62828
            }
            25% {
                text-shadow: 0 0 10px #ef6c00
            }
            50% {
                text-shadow: 0 0 10px #2e7d32
            }
            75% {
                text-shadow: 0 0 10px #4527a0
            }
        }
        .wobble {
            -webkit-animation-name: wobble;
            animation-name: wobble;
        }
        .animated{
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        .animated.infinite {
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
        }
        @-webkit-keyframes pulse {
            0% {
                -webkit-transform: scaleX(1);
                transform: scaleX(1);
            }
            50% {
                -webkit-transform: scale3d(1.05, 1.05, 1.05);
                transform: scale3d(1.05, 1.05, 1.05);
            }
            to {
                -webkit-transform: scaleX(1);
                transform: scaleX(1);
            }
        }
        @keyframes pulse {
            0% {
                -webkit-transform: scaleX(1);
                transform: scaleX(1);
            }
            50% {
                -webkit-transform: scale3d(1.05, 1.05, 1.05);
                transform: scale3d(1.05, 1.05, 1.05);
            }
            to {
                -webkit-transform: scaleX(1);
                transform: scaleX(1);
            }
        }
        .pulse {
            -webkit-animation-name: pulse;
            animation-name: pulse;
        }
        .sliderimages img{
            width: 90%;
            padding-left:10px;
            padding-right: 10px;
        }

    </style>
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
            <div class="row">
                <div class="col-lg-12">
                    <div style="background-size:auto; margin: auto;width: 50%;padding: 10px;background-image:url({{$card->back_image!=null ? asset('storage/backgroundsImages/'.$card->back_image) : ''}}">
                        <div>
                            <figure style="animation: wobble 5s ease-in-out infinite;
transform-origin: center center;
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
                            <img src="{{asset('card-elements/wishing.gif')}}" alt="Wish You" style="width: 60%">
                        </div>

                        <div class="mainimg mt-1">
                            <p class="animated infinite pulse">
                                <img src="{{asset('storage/centerImages/'.$card->center_image)}}" alt="Valentine's Day Wishes" style="width: 100%;">
                            </p>
                        </div>
                        <div class="sliderimagescontainer mt-1">
                            <ul id="fade-images" class="sliderimages">
                                <li style=""><img src="{{asset('storage/bottomImages/'.$card->bottom_image)}}" alt="Valentine's Day Wishes" class=" my-4 m-auto">
                                </li>
                            </ul>
                        </div>
                        <div class="cardinnertext max-w-2xl mt-10 px-5">
                            <p>{{$card->content}}</p>
                        </div>
                    </div>
                    <input type="hidden" name="card_id" value="{{$card->id}}">
                    <div style="margin: auto;width: 50%;padding: 10px; display: flex">
                        <input type="text" class="form-control" name="wisher_name" placeholder="Type name here">
                        <button class="btn btn-primary create">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function (){
        $(".create").click(function (){
        let name=$('input[name=wisher_name]').val();
        if(name==''){
            alert('Please enter name to create Card');
        }
        let cardId=$('input[name=card_id]').val();
        window.location.href='/wish-card/'+cardId+'/'+name;
        });
    });
</script>
</body>
</html>





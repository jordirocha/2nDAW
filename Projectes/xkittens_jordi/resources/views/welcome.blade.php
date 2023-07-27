<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('partials.seo-tags.meta-tags')

    <title>{{$title_name}} | Exploding Kittens</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">
    @include('partials.css-styles.styles')

    <style>
        .bg-orange-style1 {
            background-color: #F28627;
        }

        .bg-red-style1 {
            background-color: #590B0B;
        }


        .bg-red-style2 {
            background-color: #A61C28;
        }

        .bg-article {
            background-image: url("{{ asset('img/game/game-article-bg-image.png') }}");
            background-position: center center;
            background-size: cover;
        }

        ul {
            list-style-type: none;
            list-style-position: unset;
            padding-left: 0;
        }

        .background-img {
            background-image: url("{{ asset('img/home/home-background.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .img_gsap {
            perspective: 1000px;
        }

        .cat-boxes {
            animation: catGranade .5s ease-in alternate infinite;
        }

        @keyframes catGranade {
            0% {
                transform: translateY(0)
            }

            to {
                transform: translateY(10px)
            }
        }

        #scroll {
            position: absolute;
            bottom: 20px;
            left: 50%;
            z-index: 2;
            display: inline-block;
            -webkit-transform: translate(0, -50%);
            transform: translate(0, -50%);
            color: #fff;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
            transition: opacity .3s;
        }

        #scroll {
            animation: scroll .50s ease-in alternate infinite;
        }

        @keyframes scroll {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(10px);
            }
        }

        #getWindows {
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
            bottom: 100px;
            transition: opacity .3s;
        }

        @media only screen and (max-width: 1268px) {
            #getWindows {
                bottom: 50px;
                height: 60px;
            }
        }

        .cat-boxes {
            animation: catGranade .5s ease-in alternate infinite;
        }

        @keyframes catGranade {
            0% {
                transform: translateY(0)
            }

            to {
                transform: translateY(10px)
            }
        }
    </style>

    <!-- Scripts -->
    <script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"
            integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/gsap.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.addEventListener("mousemove", function (e) {
                var width = window.innerWidth,
                    height = window.innerHeight,
                    positionX = (e.clientX / width) - 0.55,
                    positionY = (e.clientY / height) - 0.55;

                gsap.to(".img_gsap", {
                    rotationY: positionX * 90,
                    rotationX: positionY * 90,
                    ease: "none"
                });
            });

            if (window.location.pathname.includes("/comentarios")) {
                var splide = new Splide('.splide', {
                    perPage: 4,
                    wheel: true,
                });
                splide.mount();
            }
        });
    </script>
</head>

<body>

@if(!str_contains(url()->full(), 'login') && !str_contains(url()->full(), 'register'))
    @include('partials.home.header')
@endif

<main>
    @yield('content')
</main>

@if(!str_contains(url()->full(), 'login') && !str_contains(url()->full(), 'register'))
    @include('partials.home.footer')
@endif

</body>

</html>

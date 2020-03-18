<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
{{-- ヘッダー --}}
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#" style="border: solid; padding: 2px"><i class="fas fa-headphones"></i> <strong>アニラジおすすめ</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">ホーム<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">リアルタイム掲示板</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">特集</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">サイトについて</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">検索</button>
            </form>
        </div>
    </nav>
</header>

<main role="main">
    <div class="popular-radio mt-4">
        <div class="container">
            <div class="__title1 py-3">
                <h2 class="hs__headline"><i class="fas fas fa-burn faa-horizontal animated my-base-color"></i> 人気の番組</h2>
            </div>
            <ul class="slider">
                <li><a href="#"><img src="https://picsum.photos/id/112/300/300" alt="image01"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/122/300/300" alt="image02"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/132/300/300" alt="image03"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/142/300/300" alt="image03"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/152/300/300" alt="image03"></a></li>
            </ul>
        </div>
    </div>
    <div class="on-air-radio py-5">
        <div class="container">
            <div class="__title1 py-3">
                <h2 class="hs__headline"><i class="fas fa-broadcast-tower faa-bounce animated my-base-color"></i> On Air（文化放送、A&G、ラジオ大阪、音泉）</h2>
            </div>
            <ul class="slider">
                <li><a href="#"><img src="https://picsum.photos/id/112/300/300" alt="image01"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/122/300/300" alt="image02"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/132/300/300" alt="image03"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/142/300/300" alt="image03"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/152/300/300" alt="image03"></a></li>
            </ul>
        </div>
    </div>
    <div class="award-radio py-5">
        <div class="container">
            <div class="__title1 py-3">
                <h2 class="hs__headline"><i class="fas fa-crown faa-bounce animated my-base-color"></i> 2020年アニラジアワード受賞作品</h2>
            </div>
            <ul class="slider">
                <li><a href="#"><img src="https://picsum.photos/id/112/300/300" alt="image01"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/122/300/300" alt="image02"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/132/300/300" alt="image03"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/142/300/300" alt="image03"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/152/300/300" alt="image03"></a></li>
            </ul>
        </div>
    </div>
    <div class="new-radio py-5">
        <div class="container">
            <div class="__title1 py-3">
                <h2 class="hs__headline"><i class="fas fa-child faa-bounce animated my-base-color"></i> 最近放送開始した番組</h2>
            </div>
            <ul class="slider">
                <li><a href="#"><img src="https://picsum.photos/id/112/300/300" alt="image01"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/122/300/300" alt="image02"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/132/300/300" alt="image03"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/142/300/300" alt="image03"></a></li>
                <li><a href="#"><img src="https://picsum.photos/id/152/300/300" alt="image03"></a></li>
            </ul>
        </div>
    </div>


    <style>

    </style>
</main>

<!-- フッター -->
<footer class="text-muted">
    <div class="container">
        <div class="row">
            <div class="c">
                <p>アニラジおすすめ &copy; blue</p>
            </div>
        </div>
    </div>
</footer>

<script>
	$('.slider').slick({
		centerMode: true,
		centerPadding: '80px',
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		dots: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: false,
					slidesToShow: 1,
					variableWidth: true,
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: false,
					slidesToShow: 1
				}
			}
		]
	});
</script>
</body>
</html>

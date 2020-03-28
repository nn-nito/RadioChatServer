@extends('base.common')

{{-- タイトル --}}
@section('title')
    ホーム
@endsection

{{-- ヘッダー --}}
@section('header')
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
                    <a class="nav-link" href="#popular-radio">人気の番組</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#on-air-radio">On Air</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#award-radio">2020年アニラジアワード受賞作品</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#new-radio">最近放送開始した番組</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">リアルタイム掲示板</a>
                </li>
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="#">特集</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="#">サイトについて</a>--}}
                {{--                </li>--}}
            </ul>
        </div>
    </nav>
@endsection

{{-- メイン --}}
@section('main')
    <div class="top-content" style="margin-top: 7%">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="d-flex flex-column">
                    <p style="text-align: center; font-weight: bold; font-size: 120%">声優ラジオ検索</p>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" id="search_box" type="text" placeholder="声優さんの名前フルネームで入れてね">
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">検索</button>
                    </form>
                    <div class="d-flex justify-content-center my-2">
                        <a href="#" class="btn-border-bottom">
                            <span>番組一覧</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center py-4">
            <a href="#" class="text-decoration-none">
                <div class="button2" style="text-align: center">
                    リアルタイム掲示板
                </div>
            </a>
        </div>
    </div>

    <div class="popular-radio py-4" id="popular-radio">
        <div class="container">
            <div class="__title1 py-3">
                <h2 class="hs__headline"><i class="fas fas fa-burn faa-horizontal animated my-base-color"></i> 人気の番組</h2>
            </div>
            <ul class="slider">
                @foreach($popular_programs as $popular_program)
                    <li>
                        <div class="card mb-3">
                            <img style="width:auto; height:auto; max-width:100%; max-height:100%;display: block; object-fit: cover" src="{{ $popular_program->url }}" alt="image01">
                            <div class="card-body">
                                <p class="card-text" style="color: #EB6864">
                                    <i class="fas fa-tv"></i> {{ $popular_program->name }}
                                </p>
                                <p class="card-text" style="color: #EB6864">
                                    <i class="fas fa-info-circle"></i> {{ $popular_program->info }}
                                </p>
                                <p class="card-text">
                                    <a href="{{ $popular_program->account }}">
                                        <i class="fab fa-twitter"></i><span>  公式Twitterアカウント</span>
                                    </a>
                                </p>
                                <p class="card-text" style="text-align: center">
                                    <i class="fas fa-user-circle"></i>
                                    @foreach($performers[$popular_program->id] as $performer)
                                        <a href="https://twitter.com/hjsakusen?lang=ja">#{{ $performer }}</a>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="on-air-radio py-5" id="on-air-radio">
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
    <div class="award-radio py-5" id="award-radio">
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
    <div class="new-radio py-5" id="new-radio">
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

    <script>
		// カルーセル
		$('.slider').slick({
			centerMode: true,
			centerPadding: '80px',
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 6000,
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

		// スムーズスクロール
		$(function () {
			// #で始まるアンカーをクリックした場合に処理
			$('a[href^="#"]').click(function () {
				// スクロールの速度
				var speed = 500; // ミリ秒
				// アンカーの値取得
				var href = $(this).attr("href");
				// 移動先を取得
				var target = $(href == "#" || href == "" ? 'html' : href);
				// 移動先を数値で取得
				var position = target.offset().top;
				// スムーススクロール
				$('body,html').animate({scrollTop: position}, speed, 'swing');
				return false;
			});
		});
    </script>
@endsection

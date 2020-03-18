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
        <a class="navbar-brand" href="#">アニラジおすすめ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
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
    <div class="container py-4">
        <ul class="slider">
            <li><a href="#"><img src="https://picsum.photos/id/112/300/300" alt="image01"></a></li>
            <li><a href="#"><img src="https://picsum.photos/id/122/300/300" alt="image02"></a></li>
            <li><a href="#"><img src="https://picsum.photos/id/132/300/300" alt="image03"></a></li>
            <li><a href="#"><img src="https://picsum.photos/id/142/300/300" alt="image03"></a></li>
            <li><a href="#"><img src="https://picsum.photos/id/152/300/300" alt="image03"></a></li>
        </ul>
    </div>
    <style>
        .slider {
            max-width: 100%;
        }
        .slider img {
            box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.25);
        }
        /*.slider{*/
        /*    margin: 100px auto;*/
        /*    width: 80%;*/
        /*}*/
        /*.slider img{*/
        /*    height: auto;*/
        /*    width: 100%;*/
        /*}*/
        /*!*slick setting*!*/
        /*.slick-prev:before,*/
        /*.slick-next:before {*/
        /*    color: #000;*/
        /*}*/
    </style>
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
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 3
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: 1
					}
				}
			]
		});
    </script>



    <div class="container">
        <div class="hs__wrapper py-4">
            <div class="hs__header py-2">
                <div class="__title1">
                    <h2 class="hs__headline"><i class="fas fa-broadcast-tower faa-bounce animated my-base-color"></i>  On Air</h2>
                </div>
            </div>
            <ul class="hs">
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/112/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 1</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/122/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 2</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/132/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 3</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/142/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 4</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/152/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 5</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/162/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 6</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/172/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 7</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/182/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 8</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
            </ul>
            <div class="hs__arrows">
                <a class="arrow disabled arrow-prev fa-3x mx-2"></a><a class="arrow arrow-next fa-3x mx-2"></a>
            </div>
        </div>
        <div class="hs__wrapper py-4">
            <div class="hs__header py-2">
                <div class="__title1">
                    <h2 class="hs__headline"><i class="fas fa-broadcast-tower faa-bounce animated my-base-color"></i>  On Air</h2>
                </div>
            </div>
            <ul class="hs">
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/103/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 0</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/113/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 1</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/123/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 2</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/133/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 3</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/143/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 4</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/153/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 5</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/163/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 6</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/173/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 7</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/183/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 8</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
            </ul>
            <div class="hs__arrows">
                <a class="arrow disabled arrow-prev fa-3x mx-2"></a><a class="arrow arrow-next fa-3x mx-2"></a>
            </div>
        </div>
        <div class="hs__wrapper py-4">
            <div class="hs__header py-2">
                <div class="__title1">
                    <h2 class="hs__headline"><i class="fas fa-broadcast-tower faa-bounce animated my-base-color"></i>  On Air</h2>
                </div>
            </div>
            <ul class="hs">
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/104/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 0</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/114/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 1</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/124/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 2</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/134/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 3</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/144/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 4</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/154/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 5</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/164/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 6</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/174/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 7</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
                <li class="hs__item">
                    <div class="hs__item__image__wrapper">
                        <!--img.hs__item__image(src="https://source.unsplash.com/random/300×300/?album&sig"+[n]+[i], alt="")--><img class="hs__item__image" src="https://picsum.photos/id/184/300/300" alt=""/>
                    </div>
                    <div class="hs__item__description"><span class="hs__item__title">Amazing title 8</span><span class="hs__item__subtitle">some subtitle</span></div>
                </li>
            </ul>
            <div class="hs__arrows">
                <a class="arrow disabled arrow-prev fa-3x mx-2"></a><a class="arrow arrow-next fa-3x mx-2"></a>
            </div>
        </div>
    </div>
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
	var instance = $(".hs__wrapper");
	$.each(instance, function (key, value) {
		var arrows = $(instance[key]).find(".arrow"),
			prevArrow = arrows.filter('.arrow-prev'),
			nextArrow = arrows.filter('.arrow-next'),
			box = $(instance[key]).find(".hs"),
			x = 0,
			mx = 0,
			maxScrollWidth = box[0].scrollWidth - (box[0].clientWidth / 2) - (box.width() / 2);

		$(arrows).on('click', function () {
			if ($(this).hasClass("arrow-next")) {
				x = ((box.width() / 2)) + box.scrollLeft() - 10;
				box.animate({
					scrollLeft: x,
				})
			} else {
				x = ((box.width() / 2)) - box.scrollLeft() - 10;
				box.animate({
					scrollLeft: -x,
				})
			}

		});

		$(box).on({
			mousemove: function (e) {
				var mx2 = e.pageX - this.offsetLeft;
				if (mx) this.scrollLeft = this.sx + mx - mx2;
			},
			mousedown: function (e) {
				this.sx = this.scrollLeft;
				mx = e.pageX - this.offsetLeft;
			},
			scroll: function () {
				toggleArrows();
			}
		});

		$(document).on("mouseup", function () {
			mx = 0;
		});

		function toggleArrows() {
			if (box.scrollLeft() > maxScrollWidth - 10) {
				// disable next button when right end has reached
				nextArrow.addClass('disabled');
			} else if (box.scrollLeft() < 10) {
				// disable prev button when left end has reached
				prevArrow.addClass('disabled')
			} else {
				// both are enabled
				nextArrow.removeClass('disabled');
				prevArrow.removeClass('disabled');
			}
		}
	});
</script>
</body>
</html>

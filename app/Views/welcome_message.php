<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, viewport-fit=cover">
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!-- Page Title -->
	<title>BANK SAMPAH — SATAHI</title>

	<!-- Compressed Styles -->
	<link href="<?= base_url(); ?>/css/slides.min.css" rel="stylesheet" type="text/css">

	<!-- Custom Styles -->
	<!-- <link href="css/custom.css" rel="stylesheet" type="text/css"> -->

	<!-- jQuery 3.3.1 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Compressed Scripts -->
	<script src="<?= base_url(); ?>/js/slides.min.js" type="text/javascript"></script>

	<!-- Custom Scripts -->
	<!-- <script src="js/custom.js" type="text/javascript"></script> -->

	<!-- Fonts and Material Icons -->
	<link rel="stylesheet" as="font" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,600,700|Material+Icons" />

</head>

<body class="slides horizontal simplifiedMobile animated">

	<!-- SVG Library -->
	<svg xmlns="http://www.w3.org/2000/svg" style="display:none">

		<symbol id="logo" viewBox="0 0 106 31">
			<title>Slides Framework</title>
			<path d="M17.413 14.04c-.56-5.84-5.6-7-8.52-7-4.6 0-8.6 2.92-8.6 7.52 0 3 2.4 4.88 5.28 5.8 4.24 1.64 5.88 1.84 5.88 3.36 0 1.08-1.2 1.72-2.32 1.72-.28 0-2.24 0-2.52-2.04h-6.6c.6 5.84 5.68 7.36 9.04 7.36 4.92 0 9.04-2.88 9.04-7.76 0-4.8-4-5.92-7.76-6.96-1.76-.52-3.4-1.2-3.4-2.2 0-.6.48-1.48 1.88-1.48 1.96 0 2.04 1.2 2.08 1.68h6.52zm2.222 15.96h6.64v-29.6h-6.64v29.6zm9.662-24.56h6.64v-5.04h-6.64v5.04zm0 24.56h6.64v-22.2h-6.64v22.2zm32.782-29.6h-6.64v9.28c-.72-.72-2.6-2.64-6.52-2.64-5.64 0-11 4.28-11 11.8 0 6.68 4.4 11.88 11.12 11.88 4.48 0 6.08-2.2 6.72-3.12v2.4h6.32v-29.6zm-17.52 18.4c0-2.56 1.8-5.56 5.64-5.56 1.56 0 2.96.56 3.96 1.56 1 .96 1.64 2.32 1.64 3.92.08 1.64-.52 3.08-1.56 4.12s-2.52 1.68-4.12 1.68c-3.12 0-5.56-2.28-5.56-5.68v-.04zm42.502 2.4c.52-4.08-.32-7.64-3.12-10.64-2.08-2.2-5-3.52-8.4-3.52-6.76 0-11.64 5.72-11.64 11.92 0 6.6 5.4 11.76 11.76 11.76 2.28 0 4.48-.68 6.32-2 1.88-1.28 3.44-3.2 4.52-5.68h-6.8c-.8 1.16-1.92 2.08-4.04 2.08-2.6 0-4.84-1.56-5.12-3.92h16.52zm-16.44-5.04c.16-1.04 1.52-3.52 4.96-3.52s4.8 2.48 4.96 3.52h-9.92zm34.502-2.12c-.56-5.84-5.6-7-8.52-7-4.6 0-8.6 2.92-8.6 7.52 0 3 2.4 4.88 5.28 5.8 4.24 1.64 5.88 1.84 5.88 3.36 0 1.08-1.2 1.72-2.32 1.72-.28 0-2.24 0-2.52-2.04h-6.6c.6 5.84 5.68 7.36 9.04 7.36 4.92 0 9.04-2.88 9.04-7.76 0-4.8-4-5.92-7.76-6.96-1.76-.52-3.4-1.2-3.4-2.2 0-.6.48-1.48 1.88-1.48 1.96 0 2.04 1.2 2.08 1.68h6.52z" />
		</symbol>

		<symbol id="logo-icon" viewBox="0 0 50 41">
			<title>Slides Framework</title>
			<path d="M4,12h42c2.2,0,4,1.8,4,4v21c0,2.2-1.8,4-4,4H4c-2.2,0-4-1.8-4-4V16C0,13.8,1.8,12,4,12z" />
			<path opacity="0.6" d="M45.5,9h-41C3.7,9,3,8.3,3,7.5v0C3,6.7,3.7,6,4.5,6h41C46.3,6,47,6.7,47,7.5v0C47,8.3,46.3,9,45.5,9z" />
			<path opacity="0.4" d="M7.5,0h35C43.3,0,44,0.7,44,1.5v0C44,2.3,43.3,3,42.5,3h-35C6.7,3,6,2.3,6,1.5v0C6,0.7,6.7,0,7.5,0z" />
		</symbol>

		<symbol id="close" viewBox="0 0 30 30">
			<path d="M15 0c-8.3 0-15 6.7-15 15s6.7 15 15 15 15-6.7 15-15-6.7-15-15-15zm5.7 19.3c.4.4.4 1 0 1.4-.2.2-.4.3-.7.3s-.5-.1-.7-.3l-4.3-4.3-4.3 4.3c-.2.2-.4.3-.7.3s-.5-.1-.7-.3c-.4-.4-.4-1 0-1.4l4.3-4.3-4.3-4.3c-.4-.4-.4-1 0-1.4s1-.4 1.4 0l4.3 4.3 4.3-4.3c.4-.4 1-.4 1.4 0s.4 1 0 1.4l-4.3 4.3 4.3 4.3z" />
		</symbol>

		<symbol id="close-small" viewBox="0 0 11 11">
			<path d="M6.914 5.5l3.793-3.793c.391-.391.391-1.023 0-1.414s-1.023-.391-1.414 0l-3.793 3.793-3.793-3.793c-.391-.391-1.023-.391-1.414 0s-.391 1.023 0 1.414l3.793 3.793-3.793 3.793c-.391.391-.391 1.023 0 1.414.195.195.451.293.707.293s.512-.098.707-.293l3.793-3.793 3.793 3.793c.195.195.451.293.707.293s.512-.098.707-.293c.391-.391.391-1.023 0-1.414l-3.793-3.793z" />
		</symbol>

		<symbol id="arrow-left" viewBox="0 0 29 56">
			<path d="M28.7.3c.4.4.4 1 0 1.4l-26.3 26.3 26.3 26.3c.4.4.4 1 0 1.4-.4.4-1 .4-1.4 0l-27-27c-.4-.4-.4-1 0-1.4l27-27c.3-.3 1-.4 1.4 0z" />
		</symbol>

		<symbol id="arrow-right" viewBox="0 0 29 56">
			<path d="M.3 55.7c-.4-.4-.4-1 0-1.4l26.3-26.3-26.3-26.3c-.4-.4-.4-1 0-1.4.4-.4 1-.4 1.4 0l27 27c.4.4.4 1 0 1.4l-27 27c-.3.3-1 .4-1.4 0z" />
		</symbol>

		<symbol id="back" viewBox="0 0 20 20">
			<path d="M2.3 10.7l5 5c.4.4 1 .4 1.4 0s.4-1 0-1.4l-3.3-3.3h11.6c.6 0 1-.4 1-1s-.4-1-1-1h-11.6l3.3-3.3c.4-.4.4-1 0-1.4-.2-.2-.4-.3-.7-.3s-.5.1-.7.3l-5 5c-.2.2-.3.5-.3.7 0 .2.1.5.3.7z" />
		</symbol>

		<symbol id="menu" viewBox="0 0 18 18">
			<path d="M16 5h-14c-.6 0-1-.4-1-1 0-.5.4-1 1-1h14c.5 0 1 .4 1 1s-.4 1-1 1zm-14 5h14c.5 0 1-.4 1-1 0-.5-.4-1-1-1h-14c-.6 0-1 .4-1 1s.4 1 1 1zm14 3h-14c-.5 0-1 .4-1 1 0 .5.4 1 1 1h14c.5 0 1-.4 1-1s-.4-1-1-1z" />
		</symbol>

		<symbol id="share" viewBox="0 0 18 18">
			<path d="M16 8c-.6 0-1 .4-1 1v6h-12v-6c0-.6-.4-1-1-1s-1 .4-1 1v6c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-6c0-.6-.4-1-1-1zm-2.3-2.3c.4-.4.4-1 0-1.4l-4-4c-.4-.4-1-.4-1.4 0l-4 4c-.4.4-.4 1 0 1.4s1 .4 1.4 0l2.3-2.3v7.6c0 .6.4 1 1 1s1-.4 1-1v-7.6l2.3 2.3c.4.4 1 .4 1.4 0z" />
		</symbol>

		<symbol id="arrow-down" viewBox="0 0 24 24">
			<path d="M12 18c-.2 0-.5-.1-.7-.3l-11-10c-.4-.4-.4-1-.1-1.4.4-.4 1-.4 1.4-.1l10.4 9.4 10.3-9.4c.4-.4 1-.3 1.4.1.4.4.3 1-.1 1.4l-11 10c-.1.2-.4.3-.6.3z" />
		</symbol>

		<symbol id="arrow-up" viewBox="0 0 24 24">
			<path d="M11.9 5.9c.2 0 .5.1.7.3l11 10c.4.4.4 1 .1 1.4-.4.4-1 .4-1.4.1l-10.4-9.4-10.3 9.4c-.4.4-1 .3-1.4-.1-.4-.4-.3-1 .1-1.4l11-10c.1-.2.4-.3.6-.3z" />
		</symbol>

		<symbol id="arrow-top" viewBox="0 0 18 18">
			<path d="M15.7 7.3l-6-6c-.4-.4-1-.4-1.4 0l-6 6c-.4.4-.4 1 0 1.4.4.4 1 .4 1.4 0l4.3-4.3v11.6c0 .6.4 1 1 1s1-.4 1-1v-11.6l4.3 4.3c.2.2.4.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4z" />
		</symbol>

		<symbol id="play" viewBox="0 0 30 30">
			<path d="M7 30v-30l22 15z" />
		</symbol>

		<symbol id="chat" viewBox="0 0 18 18">
			<path d="M5,17c-0.2,0-0.3,0-0.4-0.1C4.2,16.7,4,16.4,4,16v-2H2c-1.1,0-2-0.9-2-2V3c0-1.1,0.9-2,2-2h14c1.1,0,2,0.9,2,2v9 c0,1.1-0.9,2-2,2H9.3l-3.7,2.8C5.4,16.9,5.2,17,5,17z M2,12h3.5C5.8,12,6,12.2,6,12.5V14l2.4-1.8C8.6,12.1,8.8,12,9,12h7V3H2V12z M13,7H5C4.4,7,4,6.6,4,6s0.4-1,1-1h8c0.6,0,1,0.4,1,1S13.6,7,13,7z M13,10H5c-0.6,0-1-0.4-1-1s0.4-1,1-1h8c0.6,0,1,0.4,1,1 S13.6,10,13,10z" />
		</symbol>

		<symbol id="mail" viewBox="0 0 18 18">
			<path d="M16 2h-14c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-10c0-1.1-.9-2-2-2zm0 2v.5l-7 4.3-7-4.4v-.4h14zm-14 10v-7.2l6.5 4c.1.1.3.2.5.2s.4-.1.5-.2l6.5-4v7.2h-14z" />
		</symbol>

		<symbol id="sound-on" viewBox="0 0 18 18">
			<path d="M8.5,0.1C8.1-0.1,7.7,0,7.4,0.2L3.7,3H2C0.9,3,0,3.9,0,5v6c0,1.1,0.9,2,2,2h1.7l3.7,2.8C7.6,15.9,7.8,16,8,16 c0.2,0,0.3,0,0.4-0.1C8.8,15.7,9,15.4,9,15V1C9,0.6,8.8,0.3,8.5,0.1z M7,13l-2.4-1.8C4.4,11.1,4.2,11,4,11l-2,0l0-6h2 c0.2,0,0.4-0.1,0.6-0.2L7,3V13z M11.7,9.9l0.7,1.9C13.9,11.2,15,9.7,15,8c0-1.7-1.1-3.2-2.7-3.8l-0.7,1.9C12.5,6.4,13,7.2,13,8C13,8.9,12.5,9.6,11.7,9.9z M12.2,1.1l-0.3,2C14.3,3.5,16,5.6,16,8s-1.8,4.5-4.2,4.9l0.3,2C15.6,14.3,18,11.4,18,8C18,4.6,15.6,1.7,12.2,1.1z" />
		</symbol>

		<symbol id="sound-off" viewBox="0 0 18 18">
			<path d="M15.9,8l1.8-1.8c0.4-0.4,0.4-1,0-1.4s-1-0.4-1.4,0l-1.8,1.8l-1.8-1.8c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4L13.1,8l-1.8,1.8 c-0.4,0.4-0.4,1,0,1.4c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.8-1.8l1.8,1.8c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L15.9,8z M8.5,0.1C8.1-0.1,7.7,0,7.4,0.2L3.7,3H2C0.9,3,0,3.9,0,5v6c0,1.1,0.9,2,2,2h1.7l3.7,2.8C7.6,15.9,7.8,16,8,16 c0.2,0,0.3,0,0.4-0.1C8.8,15.7,9,15.4,9,15V1C9,0.6,8.8,0.3,8.5,0.1z M7,13l-2.4-1.8C4.4,11.1,4.2,11,4,11l-2,0l0-6h2 c0.2,0,0.4-0.1,0.6-0.2L7,3V13z" />
		</symbol>


	</svg>

	<!-- Panel Top #05 -->
	<nav class="panel top">
		<div class="sections desktop">
			<div class="left"><a href="#" title="Slides Framework">
					<h1>SATAHI</h1>
				</a></div>

			<div class="right"><a class="button blue gradient" href="#">Dokumentasi</a><a class="button green gradient" href="<?= base_url(); ?>/tambah-permintaan">Permintaan</a></div>
		</div>
		<div class="sections compact hidden">
			<div class="left"><a href="#" title="Slides Framework"><svg style="width:82px;height:24px">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo"></use>
					</svg></a></div>
			<div class="right"><span class="button actionButton sidebarTrigger" data-sidebar-id="1"><svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu"></use>
					</svg></span</div>
			</div>
	</nav>

	<!-- Sidebar -->
	<nav class="sidebar" data-sidebar-id="1">
		<div class="close"><svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close"></use>
			</svg></div>
		<div class="content">
			<a href="#" class="logo"><svg width="37" height="30">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo-icon"></use>
				</svg></a>
			<ul class="mainMenu margin-top-3">
				<li><a href="#">All Goods</a></li>
				<li><a href="#">UI Kits</a></li>
				<li><a href="#">Icons</a></li>
				<li><a href="#">Mockups</a></li>
				<li><a href="#">Toolkit</a></li>
			</ul>
			<ul class="subMenu small opacity-8">
				<li><a href="#">Submit Product</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">License</a></li>
				<li><a href="#">Terms & Conditions</a></li>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			<ul class="social opacity-8">
				<li><a href="#"><svg>
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#facebook"></use>
						</svg></a></li>
				<li><a href="#"><svg>
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#twitter"></use>
						</svg></a></li>
				<li><a href="#"><svg>
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#instagram"></use>
						</svg></a></li>
			</ul>
		</div>
	</nav>

	<!-- Slide 1 (#34) -->
	<section class="slide fade-6 kenBurns">
		<div class="content">
			<div class="container">
				<div class="wrap">
					<div class="fix-12-12">
						<ul class="flex fixedSpaces verticalCenter reverse">
							<li class="col-6-12 left middle">
								<h1 class="ae-1 fromLeft">Bank Sampah </h1>
								<p class="ae-2 fromLeft"><span class="opacity-8">Peraturan Menteri Lingkungan Hidup dan Kehutanan Republik Indonesia Nomor 6 tahun 2022 Tentang Sistem Informasi Pengelolaan Sampah Nasional.</span></p>
								<p class="ae-3 fromLeft"><span class="opacity-8">Peraturan Bupati Tapanuli Selatan Nomor 14 Tahun 2020 Tentang Kebijakan dan Strategi kabupaten Kabupaten Tapanuli Selatan dalam Pengelolaan Sampah Rumah Tangga dan Sampah Sejenis Sampah Rumah Tangga</span></p>
								<a class="button blue gradient ae-3 fromCenter cropLeft" href="<?= base_url(); ?>/masuk">MASUK</a><a class="button white ae-4 fromCenter">Kontak</a>
							</li>
							<li class="col-6-12">
								<img class="ae-4" width="605" src="<?= base_url(); ?>/assets/img/iphones-34.png" alt="iPhones Thumbnail" data-action="zoom" />
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
		<div class="background" style="background-image:url(<?= base_url(); ?>/assets/img/background/img-34.jpg)"></div>
	</section>

	<!-- Slide 2 (#60) -->
	<section class="slide fade-6 kenBurns">
		<div class="content">
			<div class="container">
				<div class="wrap">

					<div class="fix-12-12">
						<ul class="grid">
							<li class="col-6-12 left">
								<h1 class="ae-2 fromLeft">Apa itu Bank Sampah ?</h1>
								<p class="ae-3 fromLeft"><span class="opacity-8">Bank sampah adalah suatu tempat yang digunakan untuk mengumpulkan sampah yang sudah dipilah-pilah. Hasil dari pengumpulan sampah yang sudah dipilah akan disetorkan ke tempat pembuatan kerajinan dari sampah atau ke tempat pengepul sampah.</span></p>
								<ul class="tabs controller uppercase bold ae-4 fromCenter" data-slider-id="60-1">
									<li class="selected">Penjelasan</li>
									<li>Kecamatan Batang Toru </li>

								</ul>
							</li>
							<li class="col-6-12 left ae-5 fromCenter">
								<ul class="slider animated margin-top-4" data-slider-id="60-1">
									<li class="selected fromCenter">
										<div class="popupTrigger videoThumbnail shadow rounded" data-popup-id="60-1">
											<img class="wide" src="<?= base_url(); ?>/assets/img/gallery-60-1.jpg" alt="Video Thumbnail" />
										</div>
									</li>
									<li class="fromCenter">
										<div class="popupTrigger videoThumbnail shadow rounded" data-popup-id="60-2">
											<img class="wide" src="<?= base_url(); ?>/assets/img/gallery-60-2.jpg" alt="Video Thumbnail" />
										</div>
									</li>

								</ul>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
		<div class="background" style="background-image:url(<?= base_url(); ?>/assets/img/background/img-60.jpg)"></div>
	</section>


	<!-- Popup Video -->
	<div class="popup autoplay" data-popup-id="60-1">
		<div class="close"><svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close"></use>
			</svg></div>
		<div class="content">
			<div class="container">
				<div class="wrap">
					<div class="fix-10-12">
						<div class="embedVideo popupContent">
							<iframe width="924" height="520" src="https://www.youtube.com/embed/ApuDawJmYdw" title="Sistem Bank Sampah - Persembahan Unilever" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Popup Video -->
	<div class="popup autoplay" data-popup-id="60-2">
		<div class="close"><svg>
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close"></use>
			</svg></div>
		<div class="content">
			<div class="container">
				<div class="wrap">
					<div class="fix-10-12">
						<div class="embedVideo popupContent">
							<iframe width="924" height="520" src="https://www.youtube.com/embed/25IDoGhI5RE" title="KECAMATAN BATANG TORU KAB. TAPANULI SELATAN" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Popup Video -->



	<!-- Slide 3 (#27) -->
	<section class="slide fade-6 kenBurns">
		<div class="content">
			<div class="container">
				<div class="wrap">

					<div class="fix-12-12">
						<ul class="flex verticalCenter">
							<li class="col-5-12 cell-27">
								<div class="fix-4-12">
									<ul class="slider clickable ae-1 fromAbove" data-slider-id="27-2">
										<li class="selected"><img src="<?= base_url(); ?>/assets/img/watch-26-2.png" alt="Apple Watch Thumbnail" /></li>
										<li><img src="<?= base_url(); ?>/assets/img/watch-26-1.png" alt="Apple Watch Thumbnail" /></li>
										<li><img src="<?= base_url(); ?>/assets/img/watch-26-2.png" alt="Apple Watch Thumbnail" /></li>
										<li><img src="<?= base_url(); ?>/assets/img/watch-26-3.png" alt="Apple Watch Thumbnail" /></li>
									</ul>
									<ul class="controller dots ae-2 fromCenter margin-top-3" data-slider-id="27-2">
										<li class="dot selected"></li>
										<li class="dot"></li>
										<li class="dot"></li>
										<li class="dot"></li>
									</ul>
								</div>
							</li>
							<li class="col-7-12 left">
								<h1 class="ae-2 fromRight">Jenis Sampah</h1>
								<div class="ae-3 fromRight">
									<p class="opacity-8">1. Sampah Organik &nbsp;adalah barang yang sudah tidak terpakai dan dibuang oleh pemilik atau pemakai sebelumnya. Sampah organik masih bisa dipakai jika dikelola dengan prosedur yang benar.</p>
									<p class="opacity-8">1. Sampah Anorganik &nbsp;adalah sampah yang dihasilkan dari bahan-bahan non-hayati, baik berupa produk sintetik maupun hasil proses teknologi pengolahan bahan tambang.</p>
									<p class="opacity-8">1. Sampah B3 &nbsp;adalah Secara umum yang disebut limbah adalah bahan sisa yang dihasilkan dari suatu kegiatan dan proses produksi, baik pada skala rumah tangga, industri, pertambangan, dan sebagainya. Bentuk limbah tersebut dapat berupa gas dan debu, cair atau padat.</p>


								</div>

							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
		<div class="background" style="background-image:url(<?= base_url(); ?>/assets/img/background/img-27.jpg)"></div>
	</section>




	<!-- Slide 6 (#83) -->
	<section class="slide fade-6 kenBurns">
		<div class="content">
			<div class="container">
				<div class="wrap">

					<div class="fix-10-12">
						<h1 class="ae-1">Harga</h1>
						<ul class="grid grid-83 noSpaces equal ae-2 fadeIn">
							<li class="col-4-12 ae-3" style="background: #F5FBFE">
								<h3>Sampah 1</h3>
								<div class="price ae-5"><span class="currency">
										<h2>Rp
									</span>1.000</h2>
								</div>
								<div class="ae-5">
									<h6 class="uppercase bold small opacity-4">Harga dalam 1 KG</h6>
								</div>

							</li>
							<li class="col-4-12 ae-4">
								<h3>Sampah 2</h3>
								<div class="price ae-6"><span class="currency">
										<h2>Rp
									</span>1.000</h2>
								</div>
								<div class="ae-6">
									<h6 class="uppercase bold small opacity-4">Harga dalam 1 KG</h6>
								</div>


							</li>
							<li class="col-4-12 ae-5">
								<h3>Sampah 3</h3>
								<div class="price ae-7"><span class="currency">
										<h2>Rp
									</span>1.000</h2>
								</div>
								<h6 class="uppercase bold small opacity-4">Harga dalam 1 KG</h6>
					</div>

					</li>
					</ul>
				</div>

			</div>
		</div>
		</div>
		<div class="background" style="background-image:url(<?= base_url(); ?>/assets/img/background/img-83.jpg)"></div>
	</section>



	<!-- Panel Bottom #01 -->
	<nav class="panel bottom forceMobileView">
		<div class="sections desktop">
			<div class="left"><a href="https://kec.batangtoru.id/" class="opacity-8">Kecamatan Batang Toru</a></div>
			<div class="center"><span class="nextSlide"><svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-down"></use>
					</svg></span></div>
			<div class="right"><a href="https://satahi.batangtoru.id/" class="opacity-8">SATAHI Bank Sampah</a></div>
		</div>

	</nav>



	<!-- Loading Progress Bar -->
	<div class="progress-bar blue"></div>

</body>

</html>
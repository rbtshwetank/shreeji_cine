
    <?php include 'header.php';?>


			<div role="main" class="main">
				<?php if(!empty( $slider_images_json ) && is_array( $slider_images_json )){ ?>
				<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover nav-inside nav-inside-plus nav-dark nav-md nav-font-size-md show-nav-hover mb-0" data-plugin-options="{'autoplayTimeout': 7000}" data-dynamic-height="['670px','670px','670px','550px','500px']" style="height: 670px;">
					<div class="owl-stage-outer">
						<div class="owl-stage">
							<?php foreach ($slider_images_json as $key => $value) {
								$image_url = 'img/back_images/'.$value;
								?>
								<!-- Carousel Slide 1 -->
								<div class="owl-item position-relative" style="background-image: url(<?= $image_url  ?>); background-color: #2E3136; background-size: cover; background-position: center;">
									<div class="container position-relative z-index-1 h-100">
										<!--<div class="d-flex flex-column align-items-center justify-content-center h-100">-->
										<!--	<h3 class="position-relative text-color-light text-5 line-height-5 font-weight-medium px-4 mb-2 appear-animation" data-appear-animation="fadeInDownShorter" data-plugin-options="{'minWindowWidth': 0}">-->
										<!--		<span class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-3">-->
										<!--			<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />-->
										<!--		</span>-->
										<!--	DEMO <span class="position-relative">NEW <span class="position-absolute left-50pct transform3dx-n50 top-0 mt-4"><img src="img/slides/slide-blue-line.png" class="w-auto appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}" alt="" /></span></span>-->
										<!--		<span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-3">-->
										<!--			<img src="img/slides/slide-title-border.png" class="w-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />-->
										<!--		</span>-->
										<!--	</h3>-->
										<!--	<h1 class="text-color-light font-weight-extra-bold text-12 mb-3 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">ROADTEK</h1>-->
										<!--	<p class="text-4 text-color-light font-weight-light opacity-7 mb-0" data-plugin-animated-letters data-plugin-options="{'startDelay': 1000, 'minWindowWidth': 0}">Check out our options and features</p>-->
										<!--</div>-->
									</div> 
								</div>
							<?php } ?>

						</div>
					</div>
					<div class="owl-nav">
						<button type="button" role="presentation" class="owl-prev"></button>
						<button type="button" role="presentation" class="owl-next"></button>
					</div>
					<div class="owl-dots mb-5">
						<?php foreach ($slider_images_json as $key => $value) { ?>
						<button role="button" class="owl-dot <?= $key == 0 ? 'active' : '' ?>"><span></span></button>
						<?php } ?>
					</div>
				</div>
				<?php } ?>

			

				<div class="container">

					<div class="row text-center pt-3">
						<div class="col-md-10 mx-md-auto">
							<h1 class="word-rotator slide font-weight-bold text-8 mb-3 appear-animation" data-appear-animation="fadeInUpShorter">
								<span>Imperial Infrastructure & Dredging Private Limited</span>
							</h1>
							<p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
							We Imperial Infrastructure & Dredging Private Limited from 2008 are famous amongst the esteemed manufacturer of an exceptional quality assortment of Roofing Sheet and Road Safety Products.  
						
							</p>
						</div>
					</div>

				</div>

                <section class="section section-height-3 bg-color-grey-scale-1 m-0 border-0">
					<div class="container">
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-6 pb-sm-4 pb-lg-0 pe-lg-5 mb-sm-5 mb-lg-0">
								<h2 class="text-color-dark font-weight-normal text-6 mb-2">About <strong class="font-weight-extra-bold">II&DPL</strong></h2>
								<p>IIDPL is in Pre- Engineered Steel Building ( PEB ) & Colour Coated Roofing Sheet (PPGL ) manufacturing, having State - Of - Art 60,000/- Sq. feet manufacturing facility in howrah at West Bengal, under a Group of Company since 1940 in Eastern India. We are pleased to introduce ourselves as one of the leading and promising manufacturer of Pre- Engineered Steel Building ( PEB ) & Arch She, Profiler of Colour Coated Steel Galvalume (PPGL), PPGL Tiles Profile, PPGL Curve Sheet, Polycarbonate Profile Sheet, Ridge, Gutter, Gable, Corner, Down Pipe  e.t.c Flashing  & Accessories manufacturing & Trading of Z & C Purlins, GI Plain & Corrugated Sheet, FRP Sheet, Steel Deck Sheet, 3M Retro

Reflective Tape, LED Screen,  MS Black Pipe, W Beam / Crash Barrier, and many more from eastern India. </p>
								<a href="#" class="btn btn-dark font-weight-semibold btn-px-4 btn-py-2 text-2" style="background-color: #151C47;color: #DDCDC6;">LEARN MORE</a>
							</div>
							<div class="col-lg-6 pb-sm-4 pb-lg-0 pe-lg-5 mb-sm-5 mb-lg-0">
<!-- 								<img src="img/generic/generic-corporate-3-1.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation animated expandIn appear-animation-visible" data-appear-animation="expandIn" data-appear-animation-delay="300" style="top: 10%; left: -50%; animation-delay: 300ms;" alt="">
								<img src="img/generic/generic-corporate-3-2.jpg" class="img-fluid position-absolute d-none d-sm-block appear-animation animated expandIn appear-animation-visible" data-appear-animation="expandIn" style="top: -33%; left: -29%; animation-delay: 100ms;" alt=""> -->
								<?php if(!empty( $home_about_json ) && is_array( $home_about_json )){ ?>
									<?php foreach ($home_about_json as $key => $value) {
									$image_url = 'img/back_images/'.$value;
									?>
									<img alt="" class="img-fluid" src="<?= $image_url ?>" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" style="animation-delay: 600ms;">
									<!-- <img src="?= $image_url ?>" class="img-fluid position-relative appear-animation mb-2 animated expandIn appear-animation-visible" data-appear-animation="expandIn" data-appear-animation-delay="600" alt="" style="animation-delay: 600ms;"> -->
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
				</section>

<!-- 
				<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
					<div class="home-concept mt-5">
						<div class="container">

							<div class="row text-center">
								<span class="sun"></span>
								<span class="cloud"></span>
								<div class="col-lg-2 ms-lg-auto">
									<div class="process-image">
										<img src="<?= $home_about_one_img  ?>" alt="" />
										<strong>Strategy</strong>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="process-image process-image-on-middle">
										<img src="<?= $home_about_two_img  ?>" alt="" />
										<strong>Planning</strong>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="process-image">
										<img src="<?= $home_about_three_img  ?>" alt="" />
										<strong>Build</strong>
									</div>
								</div>
								<div class="col-lg-4 ms-lg-auto">
									<div class="project-image">
										<div id="fcSlideshow" class="fc-slideshow">
											<ul class="fc-slides">
												<li><a href="portfolio-single-wide-slider.html"><img class="img-fluid" src="<?= $home_about_four_img  ?>" alt="" /></a></li>
											</ul>
										</div>
										<strong class="our-work">Our Work</strong>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div> -->

                <div class="home-intro bg-primary" id="home-intro" style="margin-bottom: 0px">
					<div class="container">

						<div class="row align-items-center">
							<div class="col-lg-8">
								<p>
									For More Information about our company Download our Catalog. 
									<!-- <span class="highlighted-word">Technology</span> -->
									<span>Imperial Infrastructure & Dredging Private Limited</span>
								</p>
							</div>
							<div class="col-lg-4">
								<div class="get-started text-start text-lg-end">
									<a href="imperial-infrastructure-dredging-private-limited.pdf" target="_blank"class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3" style="background-color: #DDCDC6;color: #151C47;">Download Our Catalog</a>
									<!-- <div class="learn-more">or <a href="index.html">learn more.</a></div> -->
								</div>
							</div>
						</div>

					</div>
				</div>
				
				<?php include 'dredging.php';?>

				<div class="home-intro bg-primary" id="home-intro" style="margin-bottom: 0px">
					<div class="container">

						<div class="row align-items-center">
							<div class="col-lg-8">
								<p>
								KOMW MORE ABOUR OUR IMPERIAL DREDGING, DOWNLOAD OUR PRESENTATION
									<!-- <span class="highlighted-word">Technology</span> -->
									<span>Imperial Infrastructure & Dredging Private Limited</span>
								</p>
							</div>
							<div class="col-lg-4">
								<div class="get-started text-start text-lg-end">
									<a href="IMPERIAL DREDGING PRESENTATION.pdf" target="_blank"class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3" style="background-color: #DDCDC6;color: #151C47;">Download Presentation</a>
									<!-- <div class="learn-more">or <a href="index.html">learn more.</a></div> -->
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="container mb-5 mt-5 pb-4">

				<h2 class="font-weight-normal text-6 pb-2 mb-4">Our <strong class="font-weight-extra-bold">Products</strong></h2>
				

                    <?php include 'product_layout.php';?>


				</div>

  <!--Client code to be past, which is prent in text-->

        

			</div>

    <?php include 'footer.php';?>
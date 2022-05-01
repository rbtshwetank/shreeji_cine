<?php include 'header.php';
	$single_prod_data = $mysqli->query("select proid, name,price,detail,single_img,AddedOn,mul_img from products where proid = '".$_GET['pid']."' limit 1  ");
	if ($single_prod_data->num_rows == 1) 
	{
		$single_row = $single_prod_data->fetch_assoc();
		$pro_id = $single_row['proid'];
		$mul_img = json_decode($single_row['mul_img'],true);
		 $image_url = 'img/products/backend_img/'.$single_row['single_img'];
		if (file_exists($image_url) && !empty($single_row['single_img'])) 
		{
			 $image_name = $base_url.'/'.$image_url; 
		}
		if (!empty($mul_img) && is_array($mul_img)) {
			foreach ($mul_img as $key => $mul_img) 
			{
				$mul_image_url = 'img/products/backend_img/'.$mul_img;
				if (file_exists($mul_image_url)) {
					$multiple_images[] = $base_url.'/'.$mul_image_url;
				}
			}
		}
	}

	$rel_prod_data = $mysqli->query("select proid, name,price,detail,single_img,AddedOn from products where proid != '".$_GET['pid']."' order by proid desc limit 4  ");
?>
<section class="page-header page-header-classic page-header-sm">
					<div class="container">
						<div class="row">
							<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
								<span class="page-header-title-border visible" style="width: 131.859px;"></span><h1 data-title-border=""><?= $single_row ['name'] ?></h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb d-block text-md-end">
									<li><a href="#">Home</a></li>
									<li class="active">Products</li>
                                    <li class="active"><?= $single_row ['name'] ?></li>
								</ul>
							</div>
						</div>
					</div>
				</section>
<!-- product images  -->
<div class="container py-4">
					<div class="row">
						<div class="col" style="min-height: 250px;">
							<div class="row portfolio-list lightbox" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
								<?php if (!empty($multiple_images) && is_array($multiple_images)) { ?>
									<?php foreach ($multiple_images as $key => $value) { ?>
										<div class="col-12 col-sm-6 col-lg-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="200">
											<div class="portfolio-item">
												<span class="thumb-info thumb-info-lighten thumb-info-centered-icons border-radius-0">
													<span class="thumb-info-wrapper border-radius-0">
														<img src="<?= $value ?>" class="img-fluid border-radius-0" alt="">
														<span class="thumb-info-action">
															<a href="<?= $value ?>" class="lightbox-portfolio">
																<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fas fa-search text-dark"></i></span>
															</a>
														</span>
													</span>
												</span>
											</div>
										</div>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
    <!-- product images ends -->
    <!-- product deatils start -->
    <div class="row pt-4 mt-2 mb-5">
						<div class="col-md-12 mb-4 mb-md-0">
							<div class="overflow-hidden mb-2">
								<h2 class="text-color-dark font-weight-normal text-5 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="800">Product <strong class="font-weight-extra-bold">Description</strong></h2>
							</div>
							<p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000"><?= html_entity_decode($single_row ['detail']) ?></p>
							<hr class="solid my-5">
							<strong class="text-uppercase text-1 me-3 text-dark float-start position-relative top-2">Share</strong>
							<ul class="social-icons">
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
<!-- product deatils ends-->
</div>
<!-- realted products start -->
<section class="section section-height-3 bg-color-grey m-0 border-0">
				<div class="container py-4">
					<h4 class="mb-3 text-4 text-uppercase">Related <strong class="font-weight-extra-bold">Products</strong></h4>
					<div class="row">
						<?php if ($rel_prod_data->num_rows > 0) {?>
							<?php $i = 0; for (; $value = $rel_prod_data->fetch_assoc();)  {
								$pro_image_url = 'img/products/backend_img/'.$value['single_img'];
								$pro_url = $base_url.'/product_details.php?pid='.$value['proid']; 
								if (file_exists($pro_image_url) && !empty($value['single_img'])) 
								{
									$image_name = $base_url.'/'.$pro_image_url; 
								}

								?>
						<div class="col-12 col-sm-6 col-lg-3 mb-4">
							<div class="portfolio-item">
								<a href="<?= $pro_url ?>">
									<span class="thumb-info thumb-info-lighten thumb-info-no-borders border-radius-0">
										<span class="thumb-info-wrapper border-radius-0">
											<img src="<?= $image_name ?>" class="img-fluid border-radius-0" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner"><?= $value['name'] ?></span>
												<!-- <span class="thumb-info-type">Brand</span> -->
											</span>
											<span class="thumb-info-action">
												<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
											</span>
										</span>
									</span>
								</a>
							</div>
						</div>
						<?php $i  = $i+300; } ?>
					<?php } ?>
					</div>
				</div>
			</section>
<!-- realted products end -->
<?php include 'footer.php';?>
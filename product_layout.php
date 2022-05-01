<div class="container py-2">
					<!-- <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
						<li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
						<li class="nav-item" data-option-value=".websites"><a class="nav-link text-1 text-uppercase" href="#">Websites</a></li>
						<li class="nav-item" data-option-value=".logos"><a class="nav-link text-1 text-uppercase" href="#">Logos</a></li>
						<li class="nav-item" data-option-value=".brands"><a class="nav-link text-1 text-uppercase" href="#">Brands</a></li>
						<li class="nav-item" data-option-value=".medias"><a class="nav-link text-1 text-uppercase" href="#">Medias</a></li>
					</ul> -->
					<div class="sort-destination-loader mt-4 pt-2 sort-destination-loader-loaded">
						<div class="row portfolio-list sort-destination" data-sort-id="portfolio" data-filter="*" style="position: relative; ">
							<?php if ($prod_data->num_rows > 0) {?>
								<?php $i = 0; for (; $value = $prod_data->fetch_assoc();)  {
									$pro_image_url = 'img/products/backend_img/'.$value['single_img'];
									$pro_url = $base_url.'/product_details.php?pid='.$value['proid']; 
									if (file_exists($pro_image_url) && !empty($value['single_img'])) 
									{
										$image_name = $base_url.'/'.$pro_image_url; 
									}

									?>
									<div class="col-sm-6 col-lg-3 " >
										<div class="portfolio-item">
											<a href="<?= $pro_url ?>">
												<span class="thumb-info thumb-info-lighten border-radius-0">
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
					<div class="bounce-loader"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>
				</div>
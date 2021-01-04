				<!-- Search -->
				<div class="search">

					<!-- Search Contents -->
					<div class="container fill_height">
						<div class="row fill_height">
							<div class="col fill_height">

								<!-- Search Tabs -->
								<div class="search_tabs_container">
									<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
										<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="<?= base_url('assets/') ?>images/bus.png" alt="">Cari Travel</div>
									</div>
								</div>

								<!-- Search Panel -->
								<div class="search_panel active">

									<form id="form-cari" action="<?= base_url('main/daftar_trayek/') ?>" method="post" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
										<div class="form-group search_item">
											<div>Dari</div>
											<select class="custom-select dropdown_item_select search_input" id="rute_dari" name="rute_dari" required>
												<option disabled value="" selected>-- Pilih Rute --</option>
												<?php foreach ($daftar_rute as $d) : ?>
													<option value="<?= $d['rute_dari'] ?>"><?= $d['rute_dari'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group search_item">
											<div>Ke</div>
											<select class="custom-select dropdown_item_select search_input" id="rute_ke" name="rute_ke" required>
												<option disabled value="" selected>-- Pilih Rute --</option>
												<?php foreach ($daftar_rute as $d) : ?>
													<option value="<?= $d['rute_dari'] ?>"><?= $d['rute_dari'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group search_item">
											<div>Tanggal</div>
											<input id="tanggal" value="<?= set_value('tanggal'); ?>" class="form-control datepicker search_input" name="tanggal" placeholder="YYYY-MM-DD">
										</div>
										<div class="form-group search_item">
											<div>Waktu</div>
											<select class="custom-select dropdown_item_select search_input" id="waktu" name="waktu">
												<option value="Semua" selected>Semua</option>
												<option value="Pagi">Pagi</option>
												<option value="Siang">Siang</option>
												<option value="Malam">Malam</option>
											</select>
										</div>
										<div class="search_item">
											<button type="submit" class="button search_button">Cari</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro -->

				<div class="cta">
					<!-- Image by https://unsplash.com/@thanni -->
					<div class="cta_background" style="background-image:url(<?= base_url('assets/') ?>images/cta.jpg)"></div>

					<div class="container">
						<div class="row">
							<div class="col">

								<!-- CTA Slider -->

								<div class="cta_slider_container">
									<div class="owl-carousel owl-theme cta_slider">

										<!-- CTA Slider Item -->
										<div class="owl-item cta_item text-center">
											<div class="cta_title">maldives deluxe package</div>
											<div class="rating_r rating_r_4">
												<i></i>
												<i></i>
												<i></i>
												<i></i>
												<i></i>
											</div>
											<p class="cta_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. Proin bibendum, augue faucibus tincidunt ultrices, tortor augue gravida lectus, et efficitur enim justo vel ligula.</p>
											<div class="button cta_button">
												<div class="button_bcg"></div><a href="#">book now<span></span><span></span><span></span></a>
											</div>
										</div>

										<!-- CTA Slider Item -->
										<div class="owl-item cta_item text-center">
											<div class="cta_title">maldives deluxe package</div>
											<div class="rating_r rating_r_4">
												<i></i>
												<i></i>
												<i></i>
												<i></i>
												<i></i>
											</div>
											<p class="cta_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. Proin bibendum, augue faucibus tincidunt ultrices, tortor augue gravida lectus, et efficitur enim justo vel ligula.</p>
											<div class="button cta_button">
												<div class="button_bcg"></div><a href="#">book now<span></span><span></span><span></span></a>
											</div>
										</div>

										<!-- CTA Slider Item -->
										<div class="owl-item cta_item text-center">
											<div class="cta_title">maldives deluxe package</div>
											<div class="rating_r rating_r_4">
												<i></i>
												<i></i>
												<i></i>
												<i></i>
												<i></i>
											</div>
											<p class="cta_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec. Proin bibendum, augue faucibus tincidunt ultrices, tortor augue gravida lectus, et efficitur enim justo vel ligula.</p>
											<div class="button cta_button">
												<div class="button_bcg"></div><a href="#">book now<span></span><span></span><span></span></a>
											</div>
										</div>

									</div>

									<!-- CTA Slider Nav - Prev -->
									<div class="cta_slider_nav cta_slider_prev">
										<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='cta_grad_prev'>
													<stop offset='0%' stop-color='#fa9e1b' />
													<stop offset='100%' stop-color='#8d4fff' />
												</linearGradient>
											</defs>
											<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
								M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
								C22.545,2,26,5.541,26,9.909V23.091z" />
											<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
								11.042,18.219 " />
										</svg>
									</div>

									<!-- CTA Slider Nav - Next -->
									<div class="cta_slider_nav cta_slider_next">
										<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='cta_grad_next'>
													<stop offset='0%' stop-color='#fa9e1b' />
													<stop offset='100%' stop-color='#8d4fff' />
												</linearGradient>
											</defs>
											<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
							M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
							C22.545,2,26,5.541,26,9.909V23.091z" />
											<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
							17.046,15.554 " />
										</svg>
									</div>

								</div>

							</div>
						</div>
					</div>

				</div>

				<!-- Testimonials -->

				<div class="testimonials">
					<div class="test_border"></div>
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<h2 class="section_title">what our clients say about us</h2>
							</div>
						</div>
						<div class="row">
							<div class="col">

								<!-- Testimonials Slider -->

								<div class="test_slider_container">
									<div class="owl-carousel owl-theme test_slider">

										<!-- Testimonial Item -->
										<div class="owl-item">
											<div class="test_item">
												<div class="test_image"><img src="<?= base_url('assets/') ?>images/test_1.jpg" alt="https://unsplash.com/@anniegray"></div>
												<div class="test_icon"><img src="<?= base_url('assets/') ?>images/backpack.png" alt=""></div>
												<div class="test_content_container">
													<div class="test_content">
														<div class="test_item_info">
															<div class="test_name">carla smith</div>
															<div class="test_date">May 24, 2017</div>
														</div>
														<div class="test_quote_title">" Best holliday ever "</div>
														<p class="test_quote_text">Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec.</p>
													</div>
												</div>
											</div>
										</div>

										<!-- Testimonial Item -->
										<div class="owl-item">
											<div class="test_item">
												<div class="test_image"><img src="<?= base_url('assets/') ?>images/test_2.jpg" alt="https://unsplash.com/@tschax"></div>
												<div class="test_icon"><img src="<?= base_url('assets/') ?>images/island_t.png" alt=""></div>
												<div class="test_content_container">
													<div class="test_content">
														<div class="test_item_info">
															<div class="test_name">carla smith</div>
															<div class="test_date">May 24, 2017</div>
														</div>
														<div class="test_quote_title">" Best holliday ever "</div>
														<p class="test_quote_text">Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec.</p>
													</div>
												</div>
											</div>
										</div>

										<!-- Testimonial Item -->
										<div class="owl-item">
											<div class="test_item">
												<div class="test_image"><img src="<?= base_url('assets/') ?>images/test_3.jpg" alt="https://unsplash.com/@seefromthesky"></div>
												<div class="test_icon"><img src="<?= base_url('assets/') ?>images/kayak.png" alt=""></div>
												<div class="test_content_container">
													<div class="test_content">
														<div class="test_item_info">
															<div class="test_name">carla smith</div>
															<div class="test_date">May 24, 2017</div>
														</div>
														<div class="test_quote_title">" Best holliday ever "</div>
														<p class="test_quote_text">Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec.</p>
													</div>
												</div>
											</div>
										</div>

										<!-- Testimonial Item -->
										<div class="owl-item">
											<div class="test_item">
												<div class="test_image"><img src="<?= base_url('assets/') ?>images/test_2.jpg" alt=""></div>
												<div class="test_icon"><img src="<?= base_url('assets/') ?>images/island_t.png" alt=""></div>
												<div class="test_content_container">
													<div class="test_content">
														<div class="test_item_info">
															<div class="test_name">carla smith</div>
															<div class="test_date">May 24, 2017</div>
														</div>
														<div class="test_quote_title">" Best holliday ever "</div>
														<p class="test_quote_text">Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec.</p>
													</div>
												</div>
											</div>
										</div>

										<!-- Testimonial Item -->
										<div class="owl-item">
											<div class="test_item">
												<div class="test_image"><img src="<?= base_url('assets/') ?>images/test_1.jpg" alt=""></div>
												<div class="test_icon"><img src="<?= base_url('assets/') ?>images/backpack.png" alt=""></div>
												<div class="test_content_container">
													<div class="test_content">
														<div class="test_item_info">
															<div class="test_name">carla smith</div>
															<div class="test_date">May 24, 2017</div>
														</div>
														<div class="test_quote_title">" Best holliday ever "</div>
														<p class="test_quote_text">Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec.</p>
													</div>
												</div>
											</div>
										</div>

										<!-- Testimonial Item -->
										<div class="owl-item">
											<div class="test_item">
												<div class="test_image"><img src="<?= base_url('assets/') ?>images/test_3.jpg" alt=""></div>
												<div class="test_icon"><img src="<?= base_url('assets/') ?>images/kayak.png" alt=""></div>
												<div class="test_content_container">
													<div class="test_content">
														<div class="test_item_info">
															<div class="test_name">carla smith</div>
															<div class="test_date">May 24, 2017</div>
														</div>
														<div class="test_quote_title">" Best holliday ever "</div>
														<p class="test_quote_text">Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec.</p>
													</div>
												</div>
											</div>
										</div>

									</div>

									<!-- Testimonials Slider Nav - Prev -->
									<div class="test_slider_nav test_slider_prev">
										<svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='test_grad_prev'>
													<stop offset='0%' stop-color='#fa9e1b' />
													<stop offset='100%' stop-color='#8d4fff' />
												</linearGradient>
											</defs>
											<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
								M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
								C22.545,2,26,5.541,26,9.909V23.091z" />
											<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
								11.042,18.219 " />
										</svg>
									</div>

									<!-- Testimonials Slider Nav - Next -->
									<div class="test_slider_nav test_slider_next">
										<svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='test_grad_next'>
													<stop offset='0%' stop-color='#fa9e1b' />
													<stop offset='100%' stop-color='#8d4fff' />
												</linearGradient>
											</defs>
											<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
							M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
							C22.545,2,26,5.541,26,9.909V23.091z" />
											<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
							17.046,15.554 " />
										</svg>
									</div>

								</div>

							</div>
						</div>

					</div>
				</div>

				<div class="trending">
					<div class="container">
						<div class="row">
							<div class="col text-center">
								<h2 class="section_title">trending now</h2>
							</div>
						</div>
						<div class="row trending_container">

							<!-- Trending Item -->
							<div class="col-lg-3 col-sm-6">
								<div class="trending_item clearfix">
									<div class="trending_image"><img src="<?= base_url('assets/') ?>images/trend_1.png" alt="https://unsplash.com/@fransaraco"></div>
									<div class="trending_content">
										<div class="trending_title"><a href="#">grand hotel</a></div>
										<div class="trending_price">From $182</div>
										<div class="trending_location">madrid, spain</div>
									</div>
								</div>
							</div>

							<!-- Trending Item -->
							<div class="col-lg-3 col-sm-6">
								<div class="trending_item clearfix">
									<div class="trending_image"><img src="<?= base_url('assets/') ?>images/trend_2.png" alt="https://unsplash.com/@grovemade"></div>
									<div class="trending_content">
										<div class="trending_title"><a href="#">mars hotel</a></div>
										<div class="trending_price">From $182</div>
										<div class="trending_location">madrid, spain</div>
									</div>
								</div>
							</div>

							<!-- Trending Item -->
							<div class="col-lg-3 col-sm-6">
								<div class="trending_item clearfix">
									<div class="trending_image"><img src="<?= base_url('assets/') ?>images/trend_3.png" alt="https://unsplash.com/@jbriscoe"></div>
									<div class="trending_content">
										<div class="trending_title"><a href="#">queen hotel</a></div>
										<div class="trending_price">From $182</div>
										<div class="trending_location">madrid, spain</div>
									</div>
								</div>
							</div>

							<!-- Trending Item -->
							<div class="col-lg-3 col-sm-6">
								<div class="trending_item clearfix">
									<div class="trending_image"><img src="<?= base_url('assets/') ?>images/trend_4.png" alt="https://unsplash.com/@oowgnuj"></div>
									<div class="trending_content">
										<div class="trending_title"><a href="#">mars hotel</a></div>
										<div class="trending_price">From $182</div>
										<div class="trending_location">madrid, spain</div>
									</div>
								</div>
							</div>

							<!-- Trending Item -->
							<div class="col-lg-3 col-sm-6">
								<div class="trending_item clearfix">
									<div class="trending_image"><img src="<?= base_url('assets/') ?>images/trend_5.png" alt="https://unsplash.com/@mindaugas"></div>
									<div class="trending_content">
										<div class="trending_title"><a href="#">grand hotel</a></div>
										<div class="trending_price">From $182</div>
										<div class="trending_location">madrid, spain</div>
									</div>
								</div>
							</div>

							<!-- Trending Item -->
							<div class="col-lg-3 col-sm-6">
								<div class="trending_item clearfix">
									<div class="trending_image"><img src="<?= base_url('assets/') ?>images/trend_6.png" alt="https://unsplash.com/@itsnwa"></div>
									<div class="trending_content">
										<div class="trending_title"><a href="#">mars hotel</a></div>
										<div class="trending_price">From $182</div>
										<div class="trending_location">madrid, spain</div>
									</div>
								</div>
							</div>

							<!-- Trending Item -->
							<div class="col-lg-3 col-sm-6">
								<div class="trending_item clearfix">
									<div class="trending_image"><img src="<?= base_url('assets/') ?>images/trend_7.png" alt="https://unsplash.com/@rktkn"></div>
									<div class="trending_content">
										<div class="trending_title"><a href="#">queen hotel</a></div>
										<div class="trending_price">From $182</div>
										<div class="trending_location">madrid, spain</div>
									</div>
								</div>
							</div>

							<!-- Trending Item -->
							<div class="col-lg-3 col-sm-6">
								<div class="trending_item clearfix">
									<div class="trending_image"><img src="<?= base_url('assets/') ?>images/trend_8.png" alt="https://unsplash.com/@thoughtcatalog"></div>
									<div class="trending_content">
										<div class="trending_title"><a href="#">mars hotel</a></div>
										<div class="trending_price">From $182</div>
										<div class="trending_location">madrid, spain</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
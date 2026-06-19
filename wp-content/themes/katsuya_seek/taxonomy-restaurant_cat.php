<?php
/**
 * Taxonomy: Restaurant Category
 *
 * @package Katsu-ya
 */

get_header();
$term = get_queried_object();

?>
<main id="main" class="pages restaurants">
	<div class="pages-header restaurants-header">
		<h1 class="pages-header__title">Restaurants &amp; Menu</h1>
	</div>
	<div id="<?php echo $term->slug; ?>-body" class="restaurants-body py-md bg-d-gray">
		<section class="restaurants-cat mb-lg" aria-labelledby="<?php echo $term->slug; ?>-body__logo">
			<div class="container">
				<div class="row align-items-stretch">
					<div class="col-lg-8 offset-lg-2 d-lg-block d-none">
						<img src="<?php echo get_field('cat_thumb', $term); ?>" class="restaurants-cat__thumb" alt="" aria-hidden="true">
					</div>
					<div class="col-lg-11 offset-lg-1">
						<h2 id="<?php echo $term->slug; ?>-body__logo" class="restaurants-cat__logo mb-5">
							<img src="<?php echo get_field('cat_logo', $term); ?>"  alt="<?php echo $term->name; ?>">
						</h2>
						<div class="d-lg-none d-block mb-5">
							<div class="row gx-3 align-items-stretch">
								<div class="col-14">
									<img src="<?php echo get_field('cat_thumb', $term); ?>" class="restaurants-cat__thumb" alt="<?php echo $term->name; ?>">
								</div>
								<div class="col-10">
									<img src="<?php echo get_field('cat_img1', $term); ?>"  alt="" aria-hidden="true" class="restaurants-cat__gallery d-block mb-2">
									<img src="<?php echo get_field('cat_img2', $term); ?>"  alt="" aria-hidden="true" class="restaurants-cat__gallery">
								</div>
							</div>
						</div>
						<h3 class="restaurants-cat__title mb-3 text-white"><?php echo get_field('cat_title', $term); ?></h3>
						<p class="mb-lg-5 mb-0 text-white"><?php echo get_field('cat_desc', $term); ?></p>
						<div class="d-lg-block d-none">
							<div class="row gx-lg-5">
								<div class="col-12"><img src="<?php echo get_field('cat_img1', $term); ?>" alt="" aria-hidden="true" class="restaurants-cat__gallery"></div>
								<div class="col-12"><img src="<?php echo get_field('cat_img2', $term); ?>" alt="" aria-hidden="true" class="restaurants-cat__gallery"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="restaurants-list" aria-labelledby="<?php echo $term->slug; ?>-list-title">
			<h2 id="<?php echo $term->slug; ?>-list-title" class="restaurants-list__title mb-4 text-white korenan">LOCATIONS</h2>
			<?php
			$args = array(
				'posts_per_page' => -1,
				'post_type' => 'restaurants',
				'tax_query' => array(
					array(
						'taxonomy' => 'restaurant_cat',
						'field' => 'term_id',
						'terms' => $term->term_id,
						'operator' => 'IN'
					)
				)
			);
			$query = new WP_Query($args);
			?>
			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			<article class="restaurants-wrap mb-5">
				<div class="container">
					<div class="row">
						<div class="col-lg-22 offset-lg-1">
							<div class="restaurants-wrap__thumb"><?php the_post_thumbnail(); ?></div>
							<div class="restaurants-wrap-info">
								<h3 class="restaurants-wrap-info__title"><?php the_title(); ?></h3>
								<div class="row gy-4 flex-row-reverse">
									<div class="col-lg-6 col-md-7">
										<ul class="restaurants-wrap-info__btns list-style-none">
											<li><a href="<?php echo get_field('restaurant_menu'); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php the_title(); ?> Menu(PDF, opens in new tab)">Menu</a></li>
											<li><a href="<?php echo get_field('restaurant_online'); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php the_title(); ?> Order Online (opens in new tab)">Order Online</a></li>
										</ul>
									</div>
									<div class="col-lg-18 col-md-17">
										<div class="row gy-3">
											<div class="col-lg-11">
												<ul class="restaurants-wrap-info__info list-style-none mt-md-3">
													<li class="wrap">
														<div class="wrap__icon wrap__icon--map"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon-map.svg" alt="Address"></div>
														<div class="wrap__txt"><?php echo get_field('restaurant_address'); ?></div>
													</li>
													<li class="wrap">
														<div class="wrap__icon wrap__icon--map"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon-phone.svg" alt="Phone"></div>
														<div class="wrap__txt"><?php echo get_field('restaurant_phone'); ?></div>
													</li>
													<li class="wrap">
														<div class="wrap__icon wrap__icon--map"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon-direction.svg" alt="Directions"></div>
														<a href="<?php echo get_field('restaurant_direction'); ?>" class="wrap__txt" target="_blank" rel="noopener noreferrer" aria-label="<?php the_title(); ?> on Google Map (opens in new tab)">Get Directions</a>
													</li>
												</ul>
											</div>
											<div class="col-lg-13">
												<ul class="restaurants-wrap-info__hour list-style-none mb-0">
													<?php if (have_rows('restaurant_hour')) : while (have_rows('restaurant_hour')) : the_row(); ?>
													<li class="wrap">
														<span>Sunday</span>
														<?php echo get_sub_field('restaurant_hour_sunday'); ?>
													</li>
													<li class="wrap">
														<span>Monday - Thursday</span>
														<?php echo get_sub_field('restaurant_hour_mon'); ?>
													</li>
													<li class="wrap">
														<span>Friday</span>
														<?php echo get_sub_field('restaurant_hour_fri'); ?>
													</li>
													<li class="wrap">
														<span>Saturday</span>
														<?php echo get_sub_field('restaurant_hour_sat'); ?>
													</li>
													<?php endwhile; endif; ?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<?php endwhile; endif; ?>
			<?php wp_reset_postdata(); ?>
		</section>
	</div>
</main>
<?php
get_footer();
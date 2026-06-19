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
			<?php
			$thumb = get_field('cat_thumb2', $term);
			$img1 = get_field('cat_img1', $term); 
			$img2 = get_field('cat_img2', $term); 
			?>
			<div class="container">
				<div class="row align-items-stretch">
					<div class="col-lg-8 offset-lg-2 d-lg-block d-none">
						<?php if($thumb): ?>
						<img src="<?php echo $thumb; ?>" class="restaurants-cat__thumb" alt="" aria-hidden="true">
						<?php else: ?>
						<img src="<?php echo get_field('cat_thumb', $term); ?>" class="restaurants-cat__thumb" alt="" aria-hidden="true">
						<?php endif; ?>
					</div>
					<div class="col-lg-11 offset-lg-1">
						<h2 id="<?php echo $term->slug; ?>-body__logo" class="restaurants-cat__logo mb-5">
							<img src="<?php echo get_field('cat_logo', $term); ?>"  alt="<?php echo $term->name; ?>">
						</h2>
						<div class="d-lg-none d-block mb-5">
							<div class="row gx-3 align-items-stretch">
								<?php if($img1): ?>
								<div class="col-14">
									<img src="<?php echo get_field('cat_thumb', $term); ?>" class="restaurants-cat__thumb" alt="<?php echo $term->name; ?>">
								</div>
								<div class="col-10">
									<img src="<?php echo get_field('cat_img1', $term); ?>"  alt="" aria-hidden="true" class="restaurants-cat__gallery d-block mb-2">
									<img src="<?php echo get_field('cat_img2', $term); ?>"  alt="" aria-hidden="true" class="restaurants-cat__gallery">
								</div>
								<?php else: ?>
								<div class="col-24">
									<img src="<?php echo get_field('cat_thumb', $term); ?>" class="restaurants-cat__thumb" alt="<?php echo $term->name; ?>">
								</div>
								<?php endif; ?>
							</div>
						</div>
						<h3 class="restaurants-cat__title mb-3 text-white"><?php echo get_field('cat_title', $term); ?></h3>
						<p class="mb-lg-5 mb-0 text-white"><?php echo get_field('cat_desc', $term); ?></p>
						<?php if($img1): ?>
						<div class="d-lg-block d-none">
							<div class="row gx-lg-5">
								<div class="col-12"><img src="<?php echo get_field('cat_img1', $term); ?>" alt="" aria-hidden="true" class="restaurants-cat__gallery"></div>
								<div class="col-12"><img src="<?php echo get_field('cat_img2', $term); ?>" alt="" aria-hidden="true" class="restaurants-cat__gallery"></div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<section class="restaurants-list" aria-labelledby="<?php echo $term->slug; ?>-list-title">
			<h2 id="<?php echo $term->slug; ?>-list-title" class="restaurants-list__title mb-4 text-white">LOCATIONS</h2>
			<?php
			$args = array(
				'posts_per_page' => -1,
				'post_type' => 'locations',
				// Keep the same order as the header dropdown so anchor links line up.
				'orderby' => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
				'tax_query' => array(
					array(
						'taxonomy' => 'restaurants',
						'field' => 'term_id',
						'terms' => $term->term_id,
						'operator' => 'IN'
					)
				)
			);
			$query = new WP_Query($args);
			?>
			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			<?php
      get_template_part(
        'template-parts/restaurant',
        'info',
        array(
          'terms' => $term->slug,
        )
			);
      ?>
			<?php endwhile; endif; ?>
			<?php wp_reset_postdata(); ?>
		</section>
	</div>
</main>
<?php
get_footer();
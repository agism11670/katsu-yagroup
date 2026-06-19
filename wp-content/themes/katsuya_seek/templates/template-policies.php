<?php
/**
 * Template Name: Policiy
 *
 * @package Katsu-ya
 */

get_header();
?>
<?php if(have_posts()): while(have_posts()):the_post(); ?>
<?php
global $post; // Get the current page info
$slug = $post->post_name;
?>
<main id="main" class="pages policies">
	<div class="pages-header policies-header">
		<h1 class="pages-header__title policies-header__title"><?php the_title(); ?></h1>
	</div>
	<div id="<?php $slug; ?>-body" class="py-md policies-body">
		<div class="container">
			<div class="row">
				<div class="col-lg-20 offset-lg-2">
					<?php remove_filter ('the_content', 'wpautop'); ?>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php endwhile; endif; ?>
<?php
get_footer();
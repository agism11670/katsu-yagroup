<?php
/**
 * Template Name: Catering
 * @package Katsu-ya
 */

get_header();
?>

<?php if(have_posts()): while(have_posts()):the_post(); ?>
<?php
global $post; // Get the current page info
$slug = $post->post_name;
$thumb = get_the_post_thumbnail_url(); // サムネイル
?>
<style>
	#<?php echo $slug; ?>-header {
		background-image: url('<?php echo $thumb; ?>');
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>
<main id="main" class="pages catering">
	<div id="<?php echo $slug; ?>-header" class="pages-header">
		<h1 class="pages-header__title"><?php the_title(); ?></h1>
	</div>
	<div id="<?php echo $slug; ?>-body" class="py-md catering-body">
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
<script src="<?php echo get_template_directory_uri(); ?>/catering_new/js/catering_validation.js"></script>
<?php
get_footer();

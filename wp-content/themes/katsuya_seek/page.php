<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
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
<main id="main" class="pages">
	<div id="<?php echo $slug; ?>-header" class="pages-header">
		<h1 class="pages-header__title"><?php the_title(); ?></h1>
	</div>
	<div id="<?php echo $slug; ?>-body" class="py-md">
		<div class="container">
			<?php remove_filter ('the_content', 'wpautop'); ?>
			<?php the_content(); ?>
		</div>
	</div>
</main>
<?php endwhile; endif; ?>
<?php
get_footer();

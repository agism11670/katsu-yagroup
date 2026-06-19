<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Katsu-ya
 */

?>

</div>


<footer id="footer" class="py-md bg-d-gray">
	<div class="container">
		<div class="row gy-4">
			<div class="col-lg-3 offset-lg-1 col-24">
				<a href="<?php echo home_url(); ?>" id="footer-logo" class="mb-lg-0 mb-3">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.svg" alt="Katsu-Ya Group">
				</a>
			</div>
			<div class="col-lg-5 col-md-8 col-12">
				<nav class="footer-nav" aria-label="Restaurants & menu">
					<h3 class="footer-nav__title">Restaurants &amp; menu</h3>
					<ul class="footer-nav__menu-child list-style-none mb-0">
						<?php
						$terms = get_terms([
							'taxonomy'   => 'restaurants',
							'hide_empty' => false,
						]);
						foreach($terms as $term) {
							$termLink = get_term_link($term);
							echo '<li><a href="'.$termLink.'">'.$term->name.'</a></li>';
						}
						?>
					</ul>
				</nav>
			</div>
			<div class="col-lg-4 col-md-8 col-12">
				<nav class="footer-nav" aria-label="Order online">
					<h3 class="footer-nav__title">Order online</h3>
					<ul class="footer-nav__menu-child list-style-none mb-0">
						<?php get_template_part('template-parts/list', 'catering-nocode'); ?>
					</ul>
				</nav>
			</div>
			<div class="col-lg-3 col-md-8 col-12">
				<nav class="footer-nav" aria-label="Other contents">
					<h3 class="footer-nav__title mb-4"><a href="<?php echo home_url('catering'); ?>">Catering</a></h3>
					<h3 class="footer-nav__title d-lg-none d-block"><a href="<?php echo home_url(); ?>#home-contact">Contact</a></h3>
				</nav>
			</div>
			<div class="col-lg-3 col-md-8 col-12">
				<nav class="footer-nav" aria-label="Shop">
					<h3 class="footer-nav__title">Shop</h3>
					<ul class="footer-nav__menu-child list-style-none mb-0">
						<li><a href="https://merchandise.katsu-yagroup.com/?_gl=1*2p2ew1*_ga*MTgzMDk5NTY2LjE3NTEyNzI1Mjc.*_ga_S5W3VFDYBF*czE3NTE5NTMyMTEkbzQkZzEkdDE3NTE5NTMyNjMkajgkbDAkaDA." target="_blank"  rel="noopener noreferrer" aria-label="Merchandise (opens in new tab)">Merchandise</a></li>
						<li><a href="https://katsu-yagroup.cardfoundry.com/giftcards" target="_blank" rel="noopener noreferrer" aria-label="Gift Cards (opens in new tab)">Gift Cards</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-3 col-md-8 col-12 d-lg-block d-none">
				<nav class="footer-nav" aria-label="Contact">
					<h3 class="footer-nav__title"><a href="<?php echo home_url(); ?>#home-contact">Contact</a></h3>
				</nav>
			</div>
		</div>
		<nav id="footer-sns" aria-label="Social media links" class="mt-md-0 mt-5">
			<h3 class="visually-hidden">SNS Details</h3>
			<ul id="footer-sns__list" class="list-style-inline mb-0">
				<li><a href="https://www.facebook.com/katsuyagroup" target="_blank" rel="noopener noreferrer" aria-label="Facebook (opens in new tab)"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon-fb.svg" alt="Facebook"></a></li>
				<li><a href="https://www.instagram.com/katsuyagroup/" target="_blank" rel="noopener noreferrer" aria-label="Instagram (opens in new tab)"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon-insta.svg" alt="Instagram"></a></li>
			</ul>
		</nav>
		<nav id="footer-policies" aria-label="Policies">
			<h3 class="visually-hidden">Policies</h3>
			<ul id="footer-policies__list" class="list-style-none mb-0">
				<li><a href="<?php echo home_url('accessibility-statement'); ?>">Accessibility Statement</a></li>
				<li><a href="<?php echo home_url('terms-of-use'); ?>">Terms of Use</a></li>
				<li><a href="<?php echo home_url('privacy-policy'); ?>">General Privacy Policy</a></li>
				<li><a href="<?php echo home_url('privacy-notice-for-california-residents'); ?>">Privacy Notice for California Residents</a></li>
				<li><button title="Manage Cookie Preferences" class="ot-sdk-show-settings">Manage Cookie Preferences</button></li>
			</ul>
		</nav>
		<div id="footer-copyright" class="text-center mt-4 text-white">Copyright KATSU-YA GROUP, INC. All Rights Reserved.</div>
	</div>
</footer>

<!-- 外部リンクの際に表示 -->
<div id="external-link-modal" role="dialog" aria-modal="true" aria-labelledby="external-link-title" hidden>
	<div class="modal-overlay"></div>
	<div class="modal-content" tabindex="-1">
		<h2 id="external-link-title" class="mb-0">Do you want to continue?</h2>
		<div class="modal-content__inner">
			<p class="mb-3">You are about to visit a website that operates under a separate privacy policy and other terms. Do you want to continue?</p>
			<div class="modal-buttons d-flex justify-content-center">
				<button id="external-link-yes" class="btn">Yes</button>
				<button id="external-link-no" class="btn">No</button>
			</div>
		</div>
	</div>
</div>

<!-- JS -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js?2"></script>

<?php wp_footer(); ?>

</body>
</html>

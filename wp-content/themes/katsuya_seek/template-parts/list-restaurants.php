<?php
/**
 * Header dropdown list: "Restaurants & Menu"
 *
 * Outputs every "restaurants" taxonomy term (= restaurant brand) and, beneath it,
 * the "locations" posts that belong to that brand. Each location is an anchor link
 * that jumps to the matching section on the restaurant (taxonomy) page.
 *
 * Accessibility:
 * - The brand name is a non-focusable label (aria-hidden), so the Tab key skips it
 *   and only stops on the location links.
 * - Each location link carries aria-label "<Brand>, <Location>" so screen readers
 *   announce both the restaurant category and the location post name.
 * - When a brand has no locations, the brand name itself becomes the link so the
 *   restaurant page stays reachable.
 *
 * Shared by both the PC (#submenu-restaurants) and SP (#submenu-restaurants-sp) menus.
 *
 * @package Katsu-ya
 */

$kt_terms = get_terms(
	array(
		'taxonomy'   => 'restaurants',
		'hide_empty' => false,
	)
);

if ( is_wp_error( $kt_terms ) || empty( $kt_terms ) ) {
	return;
}

foreach ( $kt_terms as $kt_term ) :
	$kt_term_link = get_term_link( $kt_term );
	if ( is_wp_error( $kt_term_link ) ) {
		continue;
	}

	// Locations that belong to this restaurant brand.
	// Order is controlled by each location post's "Order" value (menu_order),
	// then alphabetically by title as a fallback.
	$kt_locations = new WP_Query(
		array(
			'post_type'      => 'locations',
			'posts_per_page' => -1,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
			'no_found_rows'  => true,
			'tax_query'      => array(
				array(
					'taxonomy' => 'restaurants',
					'field'    => 'term_id',
					'terms'    => $kt_term->term_id,
				),
			),
		)
	);

	if ( $kt_locations->have_posts() ) :
		?>
		<li role="none" class="dropdown__group">
			<span class="dropdown__group-title" aria-hidden="true"><?php echo esc_html( $kt_term->name ); ?></span>
			<ul role="none" class="dropdown__sublist list-style-none mb-0">
				<?php
				while ( $kt_locations->have_posts() ) :
					$kt_locations->the_post();
					$kt_loc_title = get_the_title();
					$kt_loc_slug  = get_post_field( 'post_name', get_the_ID() );
					?>
					<li role="none">
						<a href="<?php echo esc_url( $kt_term_link . '#' . $kt_loc_slug ); ?>" role="menuitem" aria-label="<?php echo esc_attr( $kt_term->name . ', ' . $kt_loc_title ); ?>"><?php echo esc_html( $kt_loc_title ); ?></a>
					</li>
					<?php
				endwhile;
				?>
			</ul>
		</li>
		<?php
	else :
		// No locations registered: keep the brand reachable via its own page.
		?>
		<li role="none" class="dropdown__group dropdown__group--single">
			<a href="<?php echo esc_url( $kt_term_link ); ?>" role="menuitem"><?php echo esc_html( $kt_term->name ); ?></a>
		</li>
		<?php
	endif;

	wp_reset_postdata();
endforeach;

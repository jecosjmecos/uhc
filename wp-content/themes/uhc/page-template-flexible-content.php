<?php

/**
 * Template name: Flexible content
 * Template Post Type: post, page
 */

get_header();
?>

<main class="main">
	<?php
	/**
	 * Please create ACF Flexible Content setting
	 * for pages with slug 'flexible_content'.
	 *
	 * Then set names of sections templates files
	 * the same as ACF Flexible Content sections slugs.
	 *
	 * For example:
	 * 'hero_section' in ACF Flexible Content sections
	 * will use template from 'UHC/includes/sections/hero_section.php'
	 */
	if( have_rows( 'flexible_content' ) ){
		while( have_rows( 'flexible_content' ) ){
			the_row();
			get_template_part( 'includes/sections/' . get_row_layout() );
		}
	}
	?>
</main>

<?php
get_footer();


<?php

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
	exit;
}

get_header();
?>

<?php if (astra_page_layout() === 'left-sidebar'): ?>
    <?php get_sidebar(); ?>
<?php endif; ?>

<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php
	if (have_posts()):
		while (have_posts()):
			the_post();

			the_title('<h1 class="entry-title">', '</h1>');

			// Display post publish and updated dates
			$published = get_the_date('M d, Y');
			$modified_timestamp = get_the_modified_time('U');
			$published_timestamp = get_the_time('U');

			echo '<div class="post-dates">';
			if ($modified_timestamp > $published_timestamp) {
				echo '<span class="updated-date">Updated: ' . esc_html(get_the_modified_date('M d, Y')) . '</span> | ';
			}
			echo '<span class="published-date">Published: ' . esc_html($published) . '</span>';
			echo '</div>';

			the_content();
		endwhile;
	endif;
	?>

    <?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if (astra_page_layout() === 'right-sidebar'): ?>
    <?php get_sidebar(); ?>
<?php endif; ?>

<?php get_footer(); ?>
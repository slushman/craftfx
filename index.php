<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package The Craft
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main"><?php

		if ( have_posts() ) {

			/* Start the Loop */

			while ( have_posts() ) { 

				the_post();

				/* Include the Post-Format-specific template for the content.
				 * If you want to overload this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			}

		} else {

			$args['posts_per_page'] = 1;
	        $args['post_status'] 	= 'future';

	        $posts = new WP_Query( $args );

	        get_template_part( ( $posts->post_count > 0 ? 'upcoming' : 'no-results' ), 'index' );

		} // End of have_posts check ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
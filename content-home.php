<?php
/**
 * Template Name: Craft Home Page
 * 
 * The homepage template file
 *
 * @package The Craft
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main"><?php

			$query['category_name'] = 'Podcast';
			$query['posts_per_page'] = 5;

			query_posts( $query );

			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;

			else :

				wp_reset_query();

				$args['posts_per_page']   = 1;
		        $args['post_status']      = 'future';

		        $posts = new WP_Query( $args );

		        get_template_part( ( $posts->post_count > 0 ? 'upcoming' : 'no-results' ), 'index' );

			endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
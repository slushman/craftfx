<?php
/**
 * The Template for displaying all single posts.
 *
 * @package The Craft
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content single-file" role="main">

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'content', ( !get_post_format() ? 'single' : get_post_format() ) );

			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) {

				comments_template();

			}

		endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
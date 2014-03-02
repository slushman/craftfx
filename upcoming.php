<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package The Craft
 */
?>

<section class="upcoming-only h2">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Coming up next', 'the-craft' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<div class="upcoming_post">
			<div class="upcoming_image"><?php
				echo get_the_post_thumbnail( $posts->posts[0]->ID, 'large', array( 'class' => 'upcoming_pic' ) );
			?></div><!-- End of .upcoming_image -->

			<div class="upcoming_title">
				<?php echo $posts->posts[0]->post_title; ?>
			</div><!-- End of .upcoming_title -->

			<div class="upcoming_date"><?php
				echo date( 'm.d.y', $posts->posts[0]->post_date );
			?></div><!-- End of .upcoming_date -->

		</div><!-- End of .upcoming_post -->
	</div><!-- .page-content -->
</section><!-- .no-results -->

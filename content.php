<?php
/**
 * @package The Craft
 */
?>

<article id="post-<?php the_ID(); ?>" <?php $latest = latest_post_class( get_the_ID() ); post_class( $latest ); ?>>
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php else : ?>
	
		<div class="entry-content">
			<div class="entry-featured-image">
				<?php the_post_thumbnail( 'home_thumb' );
				if ( $latest == 'latest_post' ) {
					echo '<span class="latest_new h4">Latest</span>';
				}
			?></div><!-- .entry-featured-image -->
			<header class="entry-header">
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" class="entry-title-link"><?php the_title(); ?></a>
				<span class="entry-meta">
					<?php the_craft_custom_posted_on(); ?>
				</span><!-- .entry-meta -->
			</h1>
		
	<?php endif; ?>
	
	</header><!-- .entry-header --><?php
		
		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'the-craft' ) );
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'the-craft' ),
			'after'  => '</div>',
		) ); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->

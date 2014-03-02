<?php
/**
 * @package The Craft
 */
?>

<article id="post-<?php the_ID(); ?>" <?php $latest = latest_post_class( get_the_ID() ); post_class( $latest ); ?>>
	<div class="entry-content"><?php

		if ( is_single() ) { ?>

			<header class="entry-header">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" class="entry-title-link"><?php the_title(); ?></a>
					<span class="entry-meta">
						<?php the_craft_custom_posted_on(); ?>
					</span><!-- .entry-meta -->
				</h1>
			</header><!-- .entry-header --><?php

			echo '<div class="entry-featured-image">';
			the_post_thumbnail( 'home_thumb' );
			echo '</div><!-- .entry-featured-image -->';

			the_content();

		} else {

			echo '<div class="entry-featured-image">';
			the_post_thumbnail( 'home_thumb' );
			if ( $latest == 'latest_post' ) {
				echo '<span class="latest_new h4">Latest</span>';
			}
			echo '</div><!-- .entry-featured-image -->'; ?>

			<header class="entry-header">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" class="entry-title-link"><?php the_title(); ?></a>
					<span class="entry-meta">
						<?php the_craft_custom_posted_on(); ?>
					</span><!-- .entry-meta -->
				</h1>
			</header><!-- .entry-header --><?php

			the_excerpt();

			// craft_excerpt( 150 );

			//the_advanced_excerpt( 'length=150&use_words=0' );

		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'the-craft' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content --><?php

	if ( is_single() ) { ?>

	<footer class="entry-meta h7">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'the-craft' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'the-craft' ) );

			if ( ! the_craft_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'the-craft' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'the-craft' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'the-craft' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'the-craft' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'the-craft' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta --><?php

	} // End of is_home() check ?>

</article><!-- #post-## -->

<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package The Craft
 */
?>

<section class="no-results not-found">
	<div class="page-content"><?php

		if ( is_search() ) :

			echo '<p>' .  _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'the-craft' ) . '</p>';
			get_search_form();

		else :

			echo '<img class="size-full wp-image-5 aligncenter" alt="The Craft Logo" src="http://craftfx.dev:8888/wp-content/uploads/2013/10/TheCraftLogo-Final-Color-e1382387868751.png" />';

		endif; ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * For centering the middle box:
 * http://stackoverflow.com/a/4130592/1269315
 *
 * @package slushman_starter
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-wrap">

			<div class="footer_left"><?php

				do_action( 'footer_left' );

			?></div><!-- .footer_left -->
			<div class="site-credits"><?php

				do_action( 'site_credits' );

			?></div><!-- .site-info -->
			<div class="site-info"><?php

				do_action( 'site_info' );

			?></div><!-- .site-info -->
		
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
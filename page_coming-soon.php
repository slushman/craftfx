<?php
/**
 * Template Name: Coming Soon
 * 
 * Description: The template for displaying the Coming Soon page.
 *
 * @package The Craft
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">

		<div id="main" class="site-main">

			<div id="primary" class="content-area">
				<div id="content" class="site-content coming-soon" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</div><!-- #content -->
			</div><!-- #primary -->

<?php get_footer(); ?>
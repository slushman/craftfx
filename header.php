<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package The Craft
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<div class="branding-wrap">
					<div class="site-logo"></div>
					<div class="host-photo"></div>
					<div class="site-description">
						<span class="description-text">From the cabin studio in Nashville, Tennessee</span>
					</div>
				</div>
			</div>
			

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'the-craft' ); ?></h1>
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'the-craft' ); ?></a>

				<div class="craft_navs">

					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					<?php get_template_part( 'menu', 'social' ); ?>

				</div><!-- .craft_navs -->

			</nav><!-- #site-navigation -->
			
		</header><!-- #masthead -->

		<div id="main" class="site-main">

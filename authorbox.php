<?php
/**
 * The template for displaying Author bios.
 *
 * @package     WordPress
 * @subpackage  slushman_starter
 * 
 * @since       Slushman Starter Theme 1.0
 */
?>

<div class="author_box">
 
    <div class="author_avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), '150' ); ?></div>

    <h4 class="author_name"><?php printf( esc_attr__( 'About %s', 'cemb-careers' ), get_the_author() );?></h4>
 
    <div class="author_bio"><?php echo wp_kses( get_the_author_meta( 'talktome' ), null ); ?></div>

    <ul class="author_links"><?php

        $links = get_social_links();

        foreach ( $links as $name => $link ) {

            echo '<li class="author_link"><a class="author_icons h3 icon-' . $name . '" href="' . $link . '"></a></li>';

        } // End of $services foreach loop
 
    ?></ul>

    <div class="author_blog_link">

        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
            <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'cemb-careers' ), get_the_author() ); ?>
        </a>

    </div>
 
</div>
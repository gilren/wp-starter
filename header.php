<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>


  <header id="masthead" class="site-header">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) )?>"><img
            src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.jpg" alt></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarWrapper"
          aria-controls="navbarWrapper" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar top-bar"></span>
          <span class="icon-bar middle-bar"></span>
          <span class="icon-bar bottom-bar"></span>
          <span class="sr-only">Toggle navigation</span>
        </button>


        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu( array(
              'theme_location'	=> 'primary_navigation',
              'depth'				=> 2,
              'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
              'container_id'      => 'navbarWrapper',
              'menu_class'		=> 'navbar-nav',
              'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
              'walker'			=> new WP_Bootstrap_Navwalker()
              ) );
            endif;
            ?>

      </div>
    </nav>
  </header><!-- #masthead -->

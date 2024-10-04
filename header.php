<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lionheart_s
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

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'lionheart_s' ); ?></a>

	<section class="header">
    <nav class="navbar container px-3" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <h1 class="is-size-4"><a class="navbar-item" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <a role="button" class="menu-toggle navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
				<!-- <button class="menu-toggle navbar-burger" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'lionheart_s' ); ?></button> -->
      </div>
      <div class="navbar-menu" id="navMenu">
        <div class="navbar-start"></div>
        <div class="navbar-end">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => '',     // ignored
							'container'      => '',     // ignored
							'menu_class'     => '',     // ignored
							'items_wrap'     => '%3$s', // NOT ignored
							'walker'         => new Bulma_Nav_Menu()
						)
					);
					?>
        </div>
      </div>
    </nav>
  </section>
	
	

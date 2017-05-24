<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header">
<div id="branding">
<div id="site-title">
<?php
if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; }
echo '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name' ) ).'" rel="home">';
if ( get_header_image() ) {
echo '<img src="'.get_header_image().'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" />';
} else {
bloginfo( 'name' );
}
echo '</a>';
if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; }
?>
</div>
<div id="site-description"><?php bloginfo( 'description' ); ?></div>
</div>
<nav id="menu">
<div id="search">
<?php get_search_form(); ?>
</div>
<label class="toggle" for="toggle">&#9776; Menu</label>
<input id="toggle" class="toggle" type="checkbox" />
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</nav>
<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
<aside id="header-sidebar" role="complementary">
<div id="hsidebar" class="widget-area">
<ul class="xoxo">
<?php dynamic_sidebar( 'header-widget-area' ); ?>
</ul>
<div class="clear"></div>
</div>
</aside>
<?php endif; ?>
</header>
<div id="container">
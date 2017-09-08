<?php
add_action( 'admin_menu', 'stripes_add_page' );
function stripes_add_page()
{
global $stripes_theme_page;
$stripes_theme_page = add_theme_page( esc_html__( 'Stripes', 'stripes' ), esc_html__( 'Stripes', 'stripes' ), 'edit_theme_options', 'theme_options', 'stripes_options_do_page' );
}
function stripes_options_do_page()
{
?>
<div class="wrap">
<?php global $stripes_theme_page; ?>
<?php $current_theme = wp_get_theme(); ?>
<h1><?php printf( esc_html__( 'Stripes', 'stripes' ) ); ?></h1>
<p><?php printf( esc_html__( 'Thank you for choosing Stripes.', 'stripes' ) ); ?></p>
<p><?php printf( esc_html__( 'You can customize Stripes under %1$sAppearance%2$s > %1$sCustomize%2$s.', 'stripes' ), '<em>', '</em>' ); ?></p>
<p><?php printf( esc_html__( 'Find the companion plugin for the Layers feature %1$shere%2$s.', 'stripes' ), '<a href="https://wordpress.org/plugins/layers/" target="_blank">', '</a>' ); ?></p>
<p><?php printf( esc_html__( 'If at any point you need assistance with Stripes, please visit the %1$ssupport page%2$s.', 'stripes' ), '<a href="https://github.com/stripeswp/stripes/issues" target="_blank">', '</a>' ); ?></p>
</div>
<?php
}
<?php
add_action( 'admin_menu', 'stripes_add_page' );
function stripes_add_page()
{
global $stripes_theme_page;
$stripes_theme_page = add_theme_page( __( 'Stripes', 'stripes' ), __( 'Stripes', 'stripes' ), 'edit_theme_options', 'theme_options', 'stripes_options_do_page' );
}
function stripes_options_do_page()
{
?>
<div class="wrap">
<?php global $stripes_theme_page; ?>
<?php $current_theme = wp_get_theme(); ?>
<?php echo "<h1>" . sprintf( __( '%s', 'stripes' ), $current_theme->Name ) . "</h1>"; ?>
<p><?php printf( __( 'Thank you for choosing Stripes.', 'stripes' ) ); ?></p>
<p><?php printf( __( 'You can customize Stripes under <em>Appearance</em> > <em>Customize</em>.', 'stripes' ) ); ?></p>
<p><?php printf( __( 'If at any point you need assistance with Stripes, please visit our <a href="https://github.com/stripeswp/stripes/issues" target="_blank">support page</a>.', 'stripes' ) ); ?></p>
</div>
<?php
}
</div>
<footer id="footer" role="contentinfo">
<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
<aside id="footer-sidebar" role="complementary">
<div id="fsidebar" class="widget-area">
<ul class="xoxo">
<?php dynamic_sidebar( 'footer-widget-area' ); ?>
</ul>
<div class="clear"></div>
</div>
</aside>
<?php endif; ?>
<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
<nav id="fmenu" role="navigation"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'depth' => '1' ) ); ?></nav>
<?php endif; ?>
<div id="copyright">
&copy; <?php echo esc_html( date_i18n( __( 'Y', 'stripes' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
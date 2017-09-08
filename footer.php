</div>
<footer id="footer">
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
<div id="fmenu"><?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'depth' => '1' ) ); ?></div>
<?php endif; ?>
<div id="copyright">
&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
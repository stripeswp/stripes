<?php
add_action( 'after_setup_theme', 'stripes_setup' );
function stripes_setup() {
load_theme_textdomain( 'stripes', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
$defaults = array( 'header-text' => false );
add_theme_support( 'custom-header', $defaults );
add_theme_support( 'custom-background' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;
if ( !isset( $content_width ) ) $content_width = 1920;
register_nav_menus(
array( 'main-menu' => esc_html__( 'Main Menu', 'stripes' ), 'footer-menu' => esc_html__( 'Footer Menu', 'stripes' ) )
);
}
add_action( 'after_setup_theme', 'stripes_woocommerce_support' );
function stripes_woocommerce_support() {
add_theme_support( 'woocommerce' );
}
require_once ( get_template_directory() . '/about.php' );
add_action( 'wp_enqueue_scripts', 'stripes_load_scripts' );
function stripes_load_scripts() {
wp_enqueue_style( 'stripes-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
wp_register_script( 'stripes-videos', get_template_directory_uri() . '/js/videos.js' );
wp_enqueue_script( 'stripes-videos' );
wp_add_inline_script( 'stripes-videos', 'jQuery(document).ready(function($){$("#wrapper").vids();});' );
}
add_action( 'wp_footer', 'stripes_footer_scripts' );
function stripes_footer_scripts() {
?>
<script>
jQuery(document).ready(function ($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
$(".menu-icon").on("click", function () {
$("#menu").toggleClass("toggled");
});
$(".menu-toggle").on("keypress", function(e) {
if(e.which == 13) {
$("#menu").toggleClass("toggled");
}
});
});
</script>
<?php
}
add_action( 'wp_footer', 'stripes_bbpress_inline_script' );
function stripes_bbpress_inline_script() {
if ( class_exists( 'bbPress' ) && bbp_is_single_forum() ) {
?>
<script>
jQuery(document).ready(function($){
if(!$('#new-post').length > 0){
$('#new-topic').hide();
}
});
</script>
<?php
}
}
add_filter( 'document_title_separator', 'stripes_document_title_separator' );
function stripes_document_title_separator( $sep ) {
$sep = "|";
return $sep;
}
add_filter( 'the_title', 'stripes_title' );
function stripes_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
if ( !function_exists( 'stripes_wp_body_open' ) ) {
function stripes_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'stripes_skip_link', 5 );
function stripes_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'stripes' ) . '</a>';
}
function stripes_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
}
}
add_filter( 'the_content_more_link', 'stripes_read_more_link' );
function stripes_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
}
}
add_filter( 'excerpt_more', 'stripes_excerpt_read_more_link' );
add_action( 'widgets_init', 'stripes_widgets_init' );
function stripes_widgets_init() {
register_sidebar( array (
'name' => esc_html__( 'Header Widget Area', 'stripes' ),
'id' => 'header-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => esc_html__( 'Footer Widget Area', 'stripes' ),
'id' => 'footer-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array (
'name' => esc_html__( 'Sidebar Widget Area', 'stripes' ),
'description' => esc_html__( 'Does not display for single posts.', 'stripes' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'stripes_pingback_header' );
function stripes_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'stripes_enqueue_comment_reply_script' );
function stripes_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
function stripes_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'stripes_comment_count', 0 );
function stripes_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
function stripes_customizer( $wp_customize ) {
$wp_customize->add_setting(
'stripes_link_color',
array(
'default' => '#ff0000',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'postMessage'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'link_color',
array(
'label' => esc_html__( 'Link Color', 'stripes' ),
'section' => 'colors',
'settings' => 'stripes_link_color'
)
)
);
$wp_customize->add_setting(
'stripes_header_color',
array(
'default' => '#ff0000',
'sanitize_callback' => 'sanitize_hex_color',
'transport' => 'postMessage'
)
);
$wp_customize->add_control(
new WP_Customize_Color_Control(
$wp_customize,
'header_color',
array(
'label' => esc_html__( 'Header Text Color', 'stripes' ),
'section' => 'colors',
'settings' => 'stripes_header_color'
)
)
);
$wp_customize->add_section(
'stripes_fonts',
array(
'title' => 'Fonts',
'priority' => 25
)
);
$wp_customize->add_setting(
'stripes_header_font',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport' => 'postMessage'
)
);
$wp_customize->add_control(
new WP_Customize_Control(
$wp_customize,
'header_font',
array(
'label' => esc_html__( 'Header Text Font', 'stripes' ),
'description' => esc_html__( 'If adding a Google font, make sure to capitalize all words, save, and then refresh to preview.', 'stripes' ),
'section' => 'stripes_fonts',
'settings' => 'stripes_header_font'
)
)
);
}
add_action( 'customize_register', 'stripes_customizer', 20 );
function stripes_customizer_css() {
?>
<style type="text/css">
a{color:<?php echo esc_html( get_theme_mod( 'stripes_link_color' ) ); ?>}
h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{font-family:"<?php echo esc_html( str_replace( '+', ' ', get_theme_mod( 'stripes_header_font' ) ) ); ?>";color:<?php echo esc_html( get_theme_mod( 'stripes_header_color' ) ); ?>}
</style>
<?php
}
add_action( 'wp_head', 'stripes_customizer_css' );
function stripes_customizer_preview() {
wp_enqueue_script(
'stripes-theme-customizer',
get_template_directory_uri() . '/js/customizer.js',
array( 'jquery', 'customize-preview' ),
'0.3.0',
true
);
}
add_action( 'customize_preview_init', 'stripes_customizer_preview' );
function stripes_customizer_fonts_preview() {
wp_enqueue_style( 'stripes-google-fonts', 'https://fonts.googleapis.com/css?family=' . esc_html( ucwords( str_replace( ' ', '+', get_theme_mod( 'stripes_header_font' ) ) ) ) . '' );
}
add_action( 'customize_preview_init', 'stripes_customizer_fonts_preview' );
add_action( 'wp_enqueue_scripts', 'stripes_customizer_fonts_preview' );
require_once( get_template_directory() . '/plugins/plugin-activation.php' );
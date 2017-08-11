<?php get_header(); ?>
<main id="content" class="content-bbpress">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<?php if ( class_exists( 'bbPress' ) && bbp_is_single_forum() ) { echo '<a href="#new-post" id="new-topic" class="button">' . esc_html_e( 'New Topic', 'stripes' ) . '</a>'; } ?>
<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
</header>
<div class="entry-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
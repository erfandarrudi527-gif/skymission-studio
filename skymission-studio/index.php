<?php
/**
 * Main template fallback. Page content is stored in WordPress/Elementor.
 */
get_header();
?>
<main id="primary" class="site-main">
<?php
while ( have_posts() ) : the_post();
    the_content();
endwhile;
?>
</main>
<?php get_footer(); ?>

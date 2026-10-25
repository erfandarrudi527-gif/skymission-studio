<!doctype html>
<html lang="<?php echo get_bloginfo( 'language' ); ?>">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'header' ) ) : ?>
<?php else : ?>
  <header class="site-header">
    <nav class="navbar" aria-label="Primary">
      <div class="navbar__inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar__logo">
          <span class="navbar__logo-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none">
              <path d="M2 16L11 3L15 10L22 8L12 21L9 14L2 16Z" fill="currentColor" />
            </svg>
          </span>
          <span class="navbar__logo-text">
            SkyMission
            <span class="navbar__logo-sub">STUDIO</span>
          </span>
        </a>

        <?php
        if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '<ul class="navbar__links" id="navLinks">%3$s</ul>',
          ) );
        } else {
          ?>
          <ul class="navbar__links" id="navLinks">
            <li><a href="#">Blog</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Aerial</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#" class="is-active">About Us</a></li>
          </ul>
          <?php
        }
        ?>

        <a href="#contact" class="btn btn--outline navbar__cta">Contact Us</a>

        <button class="navbar__burger" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="navLinks">
          <span></span><span></span><span></span>
        </button>
      </div>
    </nav>
  </header>

<?php endif; ?>

<?php if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'footer' ) ) : ?>
<?php else : ?>
  <footer class="site-footer">
    <div class="site-footer__wrap">
      <div class="site-footer__grid">
        <div class="site-footer__brand">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-footer__logo">
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
          <p class="site-footer__desc">
            Professional aerial imaging and media production for commercial
            and construction projects across South East Queensland. CASA
            certified and fully insured.
          </p>
          <div class="site-footer__social">
            <a href="#" class="social-icon" aria-label="Instagram">
              <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.6"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
            </a>
            <a href="#" class="social-icon" aria-label="LinkedIn">
              <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="3" stroke="currentColor" stroke-width="1.6"/><path d="M7.5 10v6.5M7.5 7.5v.01M11.5 16.5V10M11.5 12.7c0-1.5 1.1-2.7 2.6-2.7 1.5 0 2.4 1 2.4 2.9v3.6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
            </a>
            <a href="#" class="social-icon" aria-label="YouTube">
              <svg viewBox="0 0 24 24" fill="none"><rect x="2.5" y="6" width="19" height="12" rx="4" stroke="currentColor" stroke-width="1.6"/><path d="M10.5 9.75l5 2.25-5 2.25v-4.5z" fill="currentColor"/></svg>
            </a>
          </div>
        </div>

        <div class="site-footer__col">
          <h5>Services</h5>
          <ul>
            <li><a href="#">Aerial Photography</a></li>
            <li><a href="#">Property Media</a></li>
            <li><a href="#">Brand Content</a></li>
            <li><a href="#">Construction Time-Lapse</a></li>
            <li><a href="#">Aerial Inspection</a></li>
          </ul>
        </div>

        <div class="site-footer__col">
          <h5>Company</h5>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">CASA Certification</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>

        <div class="site-footer__col">
          <h5>Coverage</h5>
          <ul>
            <li><a href="#">Brisbane</a></li>
            <li><a href="#">Gold Coast</a></li>
            <li><a href="#">Sunshine Coast</a></li>
            <li class="site-footer__legal-item"><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
      </div>

      <div class="site-footer__bottom">
        <p class="site-footer__copy">
          &copy; <?php echo esc_html( date( 'Y' ) ); ?> Sky Mission Studio Pty Ltd &mdash; ABN 00 000 000 000 &mdash; All rights reserved.
        </p>
        <div class="site-footer__certs">
          <span class="cert-badge"><span class="cert-badge__dot"></span>CASA Certified</span>
          <span class="cert-badge"><span class="cert-badge__dot"></span>Fully Insured</span>
        </div>
      </div>
    </div>
  </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>

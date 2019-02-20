<footer id="colophon" class="site-footer navbar-expand-lg navbar-light bg-light"" role="contentinfo">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'footer-menu',
      'depth' => 1, // 1 = no dropdowns, 2 = with dropdowns.
      'container' => 'div',
      'container_class' => 'footer-menu-class',
      'container_id' => 'bs-example-navbar-collapse-1',
      'menu_class' => 'navbar-nav mr-auto',
      'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
      'walker' => new WP_Bootstrap_Navwalker(),
    ));
    ?>
    <div class="site-info">
        <?php
			do_action( 'mytheme_credits' );
		?>
        <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?></a></span>
        <?php
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
		}
		?>
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mytheme' ) ); ?>" class="imprint">
            <?php printf( __( 'Proudly powered by %s', 'mytheme' ), 'WordPress' ); ?>
        </a>
    </div><!-- .site-info -->

</footer>
<?php wp_footer();?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>
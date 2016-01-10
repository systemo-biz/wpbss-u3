<header id="masthead" class="site-header site-branding" role="banner">

    <div class="container">
        <div class="row">
            <div id="header-widgets-1" class="col-md-4">
              <?php if ( get_theme_mod('logo')) : ?>
                 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                     <img src="<?php echo get_theme_mod('logo'); ?>"  class="img-responsive" alt="" />
                 </a>
              <?php else: // End header image check. ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <strong class="site-description"><?php bloginfo( 'description' ); ?></strong>
              <?php endif; // End header image check. ?>
            </div>
            <div id="header-widgets-2" class="col-md-4">
                <?php
                    if ( ! dynamic_sidebar( 'header-widgets-2' ) ) :
                        do_action( 'wpbss-header-widgets-2' );
                    endif; // end sidebar widget area
                ?>
            </div>
            <div id="header-widgets-3" class="col-md-4">
                <?php
                    if ( ! dynamic_sidebar( 'header-widgets-3' ) ) :
                        do_action( 'wpbss-header-widgets-3' );
                    endif; // end sidebar widget area
                ?>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</header><!-- #masthead -->
<?php get_template_part( 'inc/template-parts/menu', 'fullwidth' ); ?>

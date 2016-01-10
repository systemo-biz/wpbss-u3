<div id="footer-s3">
  <div class="container">
    <div class="row">
        <div id="footer-widgets-1" class="col-md-6">
            <?php
                if ( ! dynamic_sidebar( 'footer-s3-p1' ) ) :
                    do_action( 'wpbss-footer-s3-p1' );
                endif; // end sidebar widget area
            ?>
        </div>
        <div id="footer-widgets-2" class="col-md-6">
            <?php
                if ( ! dynamic_sidebar( 'footer-s3-p2' ) ) :
                    do_action( 'wpbss-footer-s3-p2' );
                endif; // end sidebar widget area
            ?>
        </div>
    </div><!-- .row -->
  </div><!-- .container -->
</div><!-- .site-info -->

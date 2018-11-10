<?php
/**
 * The theme footer
 *
 * @package bootstrap-basic
 */
?>


<?php full_below_content_area(); ?>

<footer>
    <div class="footer-section pad-40">
        <div class="container">
            <div id="footer-row" class="row site-footer">
                <?php get_sidebar('footerone'); ?>
                <?php get_sidebar('footertwo'); ?>
                <?php get_sidebar('footerthree'); ?>
                <?php get_sidebar('footerfour'); ?>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <?php
                $fms_copyright = get_theme_mod( 'copyright_textbox', '' );
                if($fms_copyright) { ?>
                    <small>&copy; <?php echo date('Y'); ?> <?php echo $fms_copyright; ?></small>
                <?php } else { ?>
                    <small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></small>
                <?php } ?>
            </div>
        </div>

    </div>
</div>


<!--wordpress footer-->
<?php wp_footer(); ?>
</body>
</html>
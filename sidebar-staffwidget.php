<?php if (is_active_sidebar('sidebar-staffwidget')) { ?>
    <div class="col-md-12" id="sidebar-staffwidget">
        <?php do_action('before_sidebar'); ?>
        <?php dynamic_sidebar('sidebar-staffwidget'); ?>
    </div>
<?php } ?> 
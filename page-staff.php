<?php /* Template Name: Page Staff */  ?>
<?php
/**
 * Template for displaying pages
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<?php get_sidebar('left'); ?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main padtop-40" role="main">
						<div id="staff-wrap" class="">

							<?php
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
								'paged' => $paged,
								'posts_per_page' => 10,
								'post_type' => 'staff',
								'orderby'=>'title',
								'order'=>'ASC'
							);
							query_posts($args);
							if ( have_posts() ) : while ( have_posts() ) : the_post();
								$do_not_duplicate[] = $post->ID; //This is the magic line
								if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>



								<?php get_template_part('content', 'staff'); ?>

							<?php endwhile; ?>

						</div>

						<?php endif; ?>
					</main>
				</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?> 
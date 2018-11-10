<?php 
/**
 * Displaying archive page (category, tag, archives post, author's post)
 * 
 * @package bootstrap-basic
 */

get_header();


?>
<?php get_sidebar('staffwidget'); ?>
	<div class="col-md-12 content-area" id="main-column">

					<main id="main" class="site-main" role="main">
						<?php if (have_posts()) { ?>

							<h1><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h1>
							<div id="staff-wrap" class="">
							<?php
							/* Start the Loop */
							while (have_posts()) {
								the_post();

								/* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
								get_template_part('content', 'staff');
							} //endwhile;
							?>
							<div class="cleared"></div>

						<?php } else { ?>

							<?php get_template_part('no-results', 'archive'); ?>

						<?php } //endif; ?>
						</div>
						<?php bootstrapBasicPagination(); ?>
					</main>
	</div>
<?php get_footer(); ?>
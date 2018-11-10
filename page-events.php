<?php /* Template Name: Page Events */  ?>
<?php
/**
 * Template for displaying pages
 *
 * @package bootstrap-basic
 */

get_header('events');


?>
	<div class="container">

		<?php
		while (have_posts()) {
			the_post();

			get_template_part('content', 'events');

			echo "\n\n";

			// If comments are open or we have at least one comment, load up the comment template
			if (comments_open() || '0' != get_comments_number()) {
				comments_template();
			}

			echo "\n\n";

		} //endwhile;
		?>
	</div>
<?php get_footer('events'); ?>
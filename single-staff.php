<?php
/**
 * Template for dispalying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header();


?>

	<div class="col-md-3 staff-margintop-50">

		<?php if( get_field('staff_photo') ): ?>
			<?php

			$image = get_field('staff_photo');

			if( !empty($image) ): ?>

				<img class="rounded padbot-20" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

			<?php endif; ?>
		<?php endif; ?>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Contact</h3>
			</div>
			<div class="panel-body">

				<?php if( get_field('staff_building') ): ?>
					<p><?php the_field('staff_building'); ?></p>
				<?php endif; ?>

				<?php if( get_field('staff_room_number') ): ?>
					<p><?php the_field('staff_room_number'); ?></p>
				<?php endif; ?>

				<?php if( get_field('staff_street_address') ): ?>
					<p><?php the_field('staff_street_address'); ?></p>
				<?php endif; ?>

				<?php if( get_field('staff_secondary_address') ): ?>
					<p><?php the_field('staff_secondary_address'); ?></p>
				<?php endif; ?>

				<?php if( get_field('staff_city_state_zip') ): ?>
					<p><?php the_field('staff_city_state_zip'); ?></p>
				<?php endif; ?>


				<?php if( get_field('staff_email') ): ?>
					<p><?php the_field('staff_email'); ?></p>
				<?php endif; ?>

				<?php if( get_field('staff_phone_number') ): ?>
					<p>O: <?php the_field('staff_phone_number'); ?></p>
				<?php endif; ?>

				<?php if( get_field('staff_fax_number') ): ?>
					<p>F: <?php the_field('staff_fax_number'); ?></p>
				<?php endif; ?>



				<?php

				$link = get_field('staff_personal_website');

				if( $link ): ?>

					<p><a class="button" href="<?php echo $link; ?>">Website</a></p>

				<?php endif; ?>


				<?php if( get_field('staff_download_cv') ): ?>

					<p><a class="btn btn-white rounded" href="<?php the_field('staff_download_cv'); ?>" >Download File</a></p>

				<?php endif; ?>

			</div>
		</div>
		<?php
		$gtcc_register = get_theme_mod( 'registration_textbox', '' );
		if($gtcc_register) { ?>
			<a href="<?php echo $gtcc_register; ?>" class="btn btn-yellow btn-lg btn-block marginbot-15" target="_blank">Register <i class="fa fa-chevron-right"></i></a>
		<?php } else { ?>

		<?php } ?>

	</div>

				<div class="col-md-9 content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php 
						while (have_posts()) {
							the_post();

							get_template_part('content', 'singlestaff');

							echo "\n\n";
							
							bootstrapBasicPagination();

							echo "\n\n";
							
							// If comments are open or we have at least one comment, load up the comment template
							if (comments_open() || '0' != get_comments_number()) {
								comments_template();
							}

							echo "\n\n";

						} //endwhile;
						?>







						<?php
						// check if the repeater field has rows of data
						if( have_rows('degrees_and_licenses') ):
							?>
							<h3 class="text-lightblue">Degrees and Licenses</h3>
									<?php
									// loop through the rows of data
									while ( have_rows('degrees_and_licenses') ) : the_row();
										// display a sub field value
										?>
										<?php the_sub_field('staff_degrees_and_licenses'); ?>
										<?php
									endwhile;
									?>
							<?php
						else :
							// no rows found
						endif;
						?>


						<?php
						// check if the repeater field has rows of data
						if( have_rows('primary_program') ):
							?>
							<h3 class="text-lightblue">Primary Program</h3>
							<?php
							// loop through the rows of data
							while ( have_rows('primary_program') ) : the_row();
								// display a sub field value
								?>
								<?php the_sub_field('staff_primary_program'); ?>
								<?php
							endwhile;
							?>
							<?php
						else :
							// no rows found
						endif;
						?>


						<?php
						// check if the repeater field has rows of data
						if( have_rows('certifications') ):
							?>
							<h3 class="text-lightblue">Certifications</h3>
							<?php
							// loop through the rows of data
							while ( have_rows('certifications') ) : the_row();
								// display a sub field value
								?>
								<?php the_sub_field('staff_certifications'); ?>
								<?php
							endwhile;
							?>
							<?php
						else :
							// no rows found
						endif;
						?>


						<?php
						// check if the repeater field has rows of data
						if( have_rows('research_and_professional_interests') ):
							?>
							<h3 class="text-lightblue">Research and Professional Interest</h3>
							<?php
							// loop through the rows of data
							while ( have_rows('research_and_professional_interests') ) : the_row();
								// display a sub field value
								?>
								<?php the_sub_field('staff_research_and_professional_interests'); ?>
								<?php
							endwhile;
							?>
							<?php
						else :
							// no rows found
						endif;
						?>


						<?php
						// check if the repeater field has rows of data
						if( have_rows('principal_investigator') ):
							?>
							<h3 class="text-lightblue">Principal Investigator</h3>
							<?php
							// loop through the rows of data
							while ( have_rows('principal_investigator') ) : the_row();
								// display a sub field value
								?>
								<?php the_sub_field('staff_principal_investigator'); ?>
								<?php
							endwhile;
							?>
							<?php
						else :
							// no rows found
						endif;
						?>


						<?php
						// check if the repeater field has rows of data
						if( have_rows('co_investigator') ):
							?>
							<h3 class="text-lightblue">Co-Investigator</h3>
							<?php
							// loop through the rows of data
							while ( have_rows('co_investigator') ) : the_row();
								// display a sub field value
								?>
								<?php the_sub_field('staff_co_investigator'); ?>
								<?php
							endwhile;
							?>
							<?php
						else :
							// no rows found
						endif;
						?>


						<?php
						// check if the repeater field has rows of data
						if( have_rows('other_projects') ):
							?>
							<h3 class="text-lightblue">Other Projects</h3>
							<?php
							// loop through the rows of data
							while ( have_rows('other_projects') ) : the_row();
								// display a sub field value
								?>
								<?php the_sub_field('staff_other_projects'); ?>
								<?php
							endwhile;
							?>
							<?php
						else :
							// no rows found
						endif;
						?>


						<?php
						// check if the repeater field has rows of data
						if( have_rows('recent_publications') ):
							?>
							<h3 class="text-lightblue">Recent Publications</h3>
							<?php
							// loop through the rows of data
							while ( have_rows('recent_publications') ) : the_row();
								// display a sub field value
								?>
								<?php the_sub_field('staff_recent_publications'); ?>
								<?php
							endwhile;
							?>
							<?php
						else :
							// no rows found
						endif;
						?>


						<?php
						// check if the repeater field has rows of data
						if( have_rows('presentations_workshops_and_media') ):
							?>
							<h3 class="text-lightblue">Presentations, Workshops and Media</h3>
							<?php
							// loop through the rows of data
							while ( have_rows('presentations_workshops_and_media') ) : the_row();
								// display a sub field value
								?>
								<?php the_sub_field('staff_presentations_workshops_and_media'); ?>
								<?php
							endwhile;
							?>
							<?php
						else :
							// no rows found
						endif;
						?>





						<?php

						// check if the repeater field has rows of data
						if( have_rows('staff_courses') ):
							?>

							<h3>Courses</h3>
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<tbody>

							<?php
							// loop through the rows of data
							while ( have_rows('staff_courses') ) : the_row();


								// display a sub field value

								?>

								<tr>
									<td>
										<p><?php the_sub_field('course_number'); ?></p>
										<p><?php the_sub_field('course_name'); ?></p>
									</td>
									<td>
										<p><?php the_sub_field('course_semester'); ?></p>
										<p><?php the_sub_field('course_program'); ?></p>
									</td>
								</tr>
								<?php

							endwhile;

							?>
								</tbody>
							</table>
						</div>

							<?php

						else :

							// no rows found

						endif;

						?>


					</main>
				</div>

<?php get_footer(); ?>
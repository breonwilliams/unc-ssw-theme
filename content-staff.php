

<div class="pad-20 staff-loop">
	<div class="row">
		<div class="col-md-3">
			<?php if( get_field('staff_photo') ): ?>
				<?php

				$image = get_field('staff_photo');

				if( !empty($image) ): ?>
					<a href="<?php the_permalink(); ?>">
						<img class="rounded" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					</a>

				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="col-md-9">
			<h1>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
			<p class="staff-category"><span><?php global $post; $terms_as_text = get_the_term_list( $post->ID,'staff_category', ' ', ', '); if (!empty($terms_as_text)) echo '
            ', strip_tags($terms_as_text) ,''; ?></span></p>
			<p><?php the_field( 'staff_email' ); ?></p>
			<p><?php the_field( 'staff_phone_number' ); ?></p>

		</div>
	</div>
</div>
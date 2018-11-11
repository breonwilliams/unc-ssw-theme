<?php
/**
 * List View Title Template
 * The title template for the list view of events.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/title-bar.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 * @since   4.6.19
 *
 */
?>
<!-- feature event -->

<?php if ( get_theme_mod( 'ftEvent_bg' ) ) : ?>

	<div class="featuredEvent-hero" style="background-image: url('<?php echo get_theme_mod( 'ftEvent_bg' ); ?>');">
		<div class="ftEvent-overlay overlay-blue">

			<?php
			$ft_event_title = get_theme_mod( 'eventTitle_textbox', '' );
			if($ft_event_title) { ?>
				<h1 class="text-white"><?php echo $ft_event_title; ?><span></span></h1>
			<?php } else { ?>

			<?php } ?>


			<?php
			$ft_event_date = get_theme_mod( 'eventDate_textbox', '' );
			if($ft_event_date) { ?>
				<p class="lead"><?php echo $ft_event_date; ?></p>
			<?php } else { ?>

			<?php } ?>



			<?php
			$ft_event_url = get_theme_mod( 'eventURL_textbox', '' );
			if($ft_event_url) { ?>
				<div class="padtop-50">
					<a href="<?php echo $ft_event_url; ?>" class="btn rounded btn-white">View Details</a>
				</div>
			<?php } else { ?>

			<?php } ?>


		</div>

	</div>

<?php else : ?>


<?php endif; ?>
<div class="tribe-events-title-bar">

	<!-- List Title -->
	<?php do_action( 'tribe_events_before_the_title' ); ?>
	<h1 class="entry-title page-header padtop-40"><?php echo tribe_get_events_title() ?></h1>
	<?php do_action( 'tribe_events_after_the_title' ); ?>

</div>

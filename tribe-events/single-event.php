<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>
<!-- Event featured background image link -->
<?php $wpblog_fetrdimg = wp_get_attachment_url( get_post_thumbnail_id($event_id) ); ?>
<?php if( $wpblog_fetrdimg ) : ?>
	<div class="wpblog-featured-image"style="background-image: url(<?php echo $wpblog_fetrdimg; ?>);"></div>

	<div class="tier-header t2-header tier-events">
		<div class="img-container background-image" style="background-image: url( <?php echo $wpblog_fetrdimg; ?> );">

		</div>
	</div>

<?php endif; ?>

<?php the_title( '<h1 class="entry-title page-header tribe-events-single-event-title padtop-40">', '</h1>' ); ?>

<div class="event-calendar">
	<div class="tribe-event-post pad-40">
		<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" rel="bookmark"><div class="event-date"><time><?php $event_id = NULL; echo tribe_get_start_time ( $event_id, 'M'); ?><span><?php $event_id = NULL; echo tribe_get_start_time ( $event_id, 'd'); ?></span></time></div></a>
		<div class="row">
			<div class="col-md-offset-2 col-md-10">

				<div id="tribe-events-content" class="tribe-events-single">

					<p class="tribe-events-back">
						<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), $events_label_plural ); ?></a>
					</p>

					<!-- Notices -->
					<?php tribe_the_notices() ?>


					<div class="tribe-events-schedule tribe-clearfix">
						<?php echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
						<?php if ( tribe_get_cost() ) : ?>
							<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
						<?php endif; ?>
					</div>

					<!-- Event header -->
					<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>

					</div>
					<!-- #tribe-events-header -->

					<?php while ( have_posts() ) :  the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<!-- Event meta -->
							<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
							<?php tribe_get_template_part( 'modules/meta' ); ?>
							<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

							<!-- Event content -->
							<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
							<div class="tribe-events-single-event-description tribe-events-content">
								<?php the_content(); ?>
							</div>
							<!-- .tribe-events-single-event-description -->
							<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>


						</div> <!-- #post-x -->
						<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
					<?php endwhile; ?>

					<!-- Event footer -->
					<div id="tribe-events-footer">
						<!-- Navigation -->
						<nav class="tribe-events-nav-pagination" aria-label="<?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?>">
							<ul class="tribe-events-sub-nav">
								<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
								<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
							</ul>
							<!-- .tribe-events-sub-nav -->
						</nav>
					</div>
					<!-- #tribe-events-footer -->

				</div><!-- #tribe-events-content -->

			</div>
		</div>

	</div>
</div>




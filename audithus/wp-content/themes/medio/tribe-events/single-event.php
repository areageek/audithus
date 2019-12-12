<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date(); 
 
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format ); 
$start_ts = tribe_get_start_date( null, false, 'd F Y');

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetimed = tribe_get_end_date(null,true,'Y-m-j');

$end_datetitle = tribe_get_end_date(null,true,'j M');
$venue_id = get_the_ID();

?>

	<div id="tribe-events-content" class="tribe-events-single">
	<!-- Notices -->
	<!-- #tribe-events-header -->
	<?php tribe_the_notices() ?>

		<?php while ( have_posts() ) :  the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- Event featured image, but exclude link -->
				<div class='event_content'>
					<div class="feature_image">
						<ul class="metadate">
							<li class="mount"><?php echo esc_html( $end_datetitle ) ?></li>
							<li class="date"><?php echo esc_html( $start_time ) ?> <?php echo esc_html( $time_range_separator ) ?><?php echo esc_html( $end_time ) ?></li>
						</ul>
						<?php if( has_post_thumbnail() ){
						    echo tribe_event_featured_image( $event_id, 'full', false );
						} ?>
					</div>

					<?php the_title( '<h2 class="tribe-events-single-event-title pr8 pl8 pt2">', '</h2>' ); ?>
					<!-- Event content -->
					<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
					<div class=" tribe-events-single-event-description tribe-events-content">
						<?php the_content(); ?>
					</div>
					<!-- .tribe-events-single-event-description -->
				</div>

				<!-- Event meta -->
				
					<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
					<?php tribe_get_template_part( 'modules/meta' ); ?>
					<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			</div> <!-- #post-x -->
			<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
			<?php endwhile; ?>

		<!-- Event footer -->
		<div id="tribe-events-footer" class=' uk-position-relative'>
		<div  class="uk-grid event-footer" >
				<div class='uk-width-auto@m uk-width-1-1@s' >
					<div data-uk-countdown="date: <?php echo esc_html( $end_datetimed ) ?>" class='countdown'>
						<ul>
							<li><span class="uk-countdown-number uk-countdown-days"></span><i>day</i></li>
							<li><span class="uk-countdown-number uk-countdown-hours"></span><i>hours</i></li>
							<li><span class="uk-countdown-number uk-countdown-minutes"></span><i>minuts</i></li>
							<li><span class="uk-countdown-number uk-countdown-seconds"></span><i>seconds</i></li>
						</ul>
					</div>
				</div>
				<div class="uk-width-expand@m uk-width-1-1@s uk-flex-middle uk-flex uk-flex-right pr4">
					<a href="javascript:;" class="uk-button-default uk-button">buy ticket</a>
				</div>
			</div>
			<!-- .tribe-events-sub-nav -->
		</div>
		<!-- #tribe-events-footer -->

	</div><!-- #tribe-events-content -->
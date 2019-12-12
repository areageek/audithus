<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$time_formatted = null;
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( $start_time );
} else {
	$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
}

$end_datetimeve = tribe_get_end_date(null,true,'j M Y');

?>

<div class="event_meta uk-width-expand@m uk-width-1-1@s tribe-events-meta-group tribe-events-meta-group-venue">
	<div class='meta_time'>
		<h4 class="tribe-events-single-section-title"> 
			<?php esc_html_e( 'Date & time', 'medio' ) ?> 
		</h4>
		<span class="tribe-events-date" title="<?php echo esc_attr( $end_datetimeve ) ?>">
		 <?php echo esc_html( $end_datetimeve ) ?> , <?php echo esc_html( $time_formatted ) ?>
		</span>
	</div>
	<div class="meta_address">
		<h4 class="tribe-events-single-section-title add"> 
			<?php esc_html_e( 'Address', 'medio' ) ?> 
		</h4>
		<dl>
			<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

			<?php if ( tribe_address_exists() ) : ?>
				<dt></dt>
				<dd class="tribe-venue-location">
					<address class="tribe-events-address">
						<?php echo tribe_get_full_address(); ?>

						<?php if ( tribe_show_google_map_link() ) : ?>
							<?php echo tribe_get_map_link_html(); ?>
						<?php endif; ?>
					</address>
				</dd>
			<?php endif; ?>

		</dl>
	</div>
	<?php if ( ! empty( $phone ) ): ?>
		<div class='meta_time fa-phone'>
			<h4 class="tribe-events-single-section-title add"><?php esc_html_e( 'Phone:', 'medio' ) ?></h4>
			<div class="tribe-venue-tel"> <?php echo esc_html($phone); ?> </div>
		</div>
	<?php endif ?>

	<?php if ( ! empty( tribe_get_venue_website_link() ) ): ?>
		<div class='meta_time fa-website'>
			<h4 class="tribe-events-single-section-title add"><?php esc_html_e( 'Website:', 'medio' ) ?></h4>
			<div class="url"> <?php echo tribe_get_venue_website_link(); ?> </div>
		</div>
	<?php endif ?>

	<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>

</div>
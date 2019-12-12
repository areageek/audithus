<?php
/**
 * Single Event Meta (Map) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/map.php
 *
 * @package TribeEventsCalendar
 * @version 4.4
 */

if ( empty( tribe_get_embedded_map() ) ) {
	return;
}
?>
<div class="uk-grid uk-width-2-3@m uk-width-1-1@s">
	
	<div class="tribe-events-venue-map">
		<?php
		// Display the map.
		do_action( 'tribe_events_single_meta_map_section_start' );
		echo tribe_get_embedded_map();
		do_action( 'tribe_events_single_meta_map_section_end' );
		?>
	</div>
</div>
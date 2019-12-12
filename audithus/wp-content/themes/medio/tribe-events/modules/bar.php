<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/Bar.php
 *
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/modules/bar.php
 *
 * @package  TribeEventsCalendar
 * @version  4.3.5
 */ 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();


$current_url = tribe_events_get_current_filter_url();

do_action( 'tribe_events_bar_before_template' ); 
$content = '';
$content .= '<div id="tribe-events-bar" class="uk-grid uk-child-width-1-2@m uk-child-width-1-1@s uk-visible@m">';
$content .='<div class="bar">';
	$content .='<h3>'.esc_attr('Upcoming events').' &nbsp; <span class="finish">'.esc_attr('finished events').'</span></h3>';
	$content .='</div>';
	$content .='<div>';
		$content .='<form id="tribe-bar-form" class="tribe-clearfix " name="tribe-bar-form" method="post" action="'.esc_attr( $current_url ).'">';
			//<!-- Mobile Filters Toggle -->
			if ( ! empty( $filters ) ) {
				$content .='<div class="tribe-bar-filters">';
					$content .='<div class="tribe-bar-filters-inner tribe-clearfix">';
						foreach ( $filters as $filter ) :
							$content .='<div class="'.esc_attr( $filter['name'] ).'-filter">';
								$content .=$filter['html'];
							$content .='</div>';
						endforeach;
						$content .='<div class="tribe-bar-submit">';
							$var = sprintf('%s',esc_attr__( "Search ", 'medio' ), tribe_get_event_label_plural() );
							$content .='<input class="tribe-events-button tribe-no-param" type="submit" name="submit-bar" value="'.$var.'" />';
						$content.='</div>';
						//<!-- .tribe-bar-submit -->
					$content.='</div>';
					//<!-- .tribe-bar-filters-inner -->
				$content.='</div>';//<!-- .tribe-bar-filters -->
			} // if ( !empty( $filters ) )
		$content .='</form>';
	$content.='</div>';
	//<!-- #tribe-bar-form -->
$content .='</div>';
return $content;

//<!-- #tribe-events-bar -->
do_action( 'tribe_events_bar_after_template' );

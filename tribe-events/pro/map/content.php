<?php
/**
 * Map View Content
 * The content template for the map view of events. This template is also used for
 * the response that is returned on map view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/map/content.php
 *
 * @package TribeEventsCalendar
 * 
 * 
 * @cmsms_package 	Pet Rescue
 * @cmsms_version 	1.1.2
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-list tribe-events-map">
	
	<!-- List Header -->
    <?php do_action( 'tribe_events_before_header' ); ?>
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		
		<!-- List Title -->
		<?php do_action( 'tribe_events_before_the_title' ); ?>
		<h1 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h1>
		<?php do_action( 'tribe_events_after_the_title' ); ?>
		
		<!-- Header Navigation -->
		<?php do_action( 'tribe_events_before_header_nav' ); ?>
		<?php tribe_get_template_part('pro/map/nav', 'header'); ?>
		<?php do_action( 'tribe_events_after_header_nav' ); ?>
		
	</div>
	<?php do_action( 'tribe_events_after_header' ); ?>
	
	<!-- Notices -->
	<?php tribe_the_notices() ?>
	
	<!-- Events Loop -->
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'tribe_events_before_loop' ); ?>
		<div id="tribe-geo-results" class="tribe-events-loop hfeed vcalendar">
		<?php tribe_get_template_part( 'pro/map/loop' ) ?>
		</div> <!-- #tribe-geo-results -->
		<?php do_action( 'tribe_events_after_loop' ); ?>
	<?php endif; ?>
	
	<!-- List Footer -->
	<div id="tribe-events-footer">
		<?php do_action( 'tribe_events_before_footer' ); ?>
		<?php do_action( 'tribe_events_after_footer' ) ?>
	</div>
	
</div><!-- #tribe-events-content -->

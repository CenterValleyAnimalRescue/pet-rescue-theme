<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 * 
 * 
 * @cmsms_package 	Pet Rescue
 * @cmsms_version 	1.1.7
 */


$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-organizer">
	<h2 class="tribe-events-single-section-title"><?php echo tribe_get_organizer_label( ! $multiple ); ?></h2>
	<div class="cmsms_event_meta_info">
		<?php
		do_action( 'tribe_events_single_meta_organizer_section_start' );

		foreach ( $organizer_ids as $organizer ) {
			if ( ! $organizer ) {
				continue;
			}

			?>
			<div class="cmsms_event_meta_info_item">
				<span class="cmsms_event_meta_info_item_title"><?php _e('Organizer Name:', 'pet-rescue'); ?></span>
				<span class="cmsms_event_meta_info_item_descr fn org"><?php echo tribe_get_organizer( $organizer ) ?></span>
			</div>
			<?php
		}

		if ( ! $multiple ) { // only show organizer details if there is one
			if ( ! empty( $phone ) ) {
				?>
				<div class="cmsms_event_meta_info_item">
					<span class="cmsms_event_meta_info_item_title"><?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?></span>
					<span class="cmsms_event_meta_info_item_descr tel"><?php echo esc_html( $phone ); ?></span>
				</div>
				<?php
			}//end if

			if ( ! empty( $email ) ) {
				?>
				<div class="cmsms_event_meta_info_item">
					<span class="cmsms_event_meta_info_item_title"><?php esc_html_e( 'Email:', 'the-events-calendar' ) ?></span>
					<span class="cmsms_event_meta_info_item_descr email"><?php echo esc_html( $email ); ?></span>
				</div>
				<?php
			}//end if

			if ( ! empty( $website ) ) {
				?>
				<div class="cmsms_event_meta_info_item">
					<span class="cmsms_event_meta_info_item_title"><?php esc_html_e( 'Website:', 'the-events-calendar' ) ?></span>
					<span class="cmsms_event_meta_info_item_descr url"><?php echo $website; ?></span>
				</div>
				<?php
			}//end if
		}//end if

		do_action( 'tribe_events_single_meta_organizer_section_end' );
		?>
	</div>
</div>
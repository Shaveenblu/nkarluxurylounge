<?php
/**
 * The template for displaying account page.
 *
 * This template can be overridden by copying it to yourtheme/wp-hotel-booking/account/account.php.
 *
 * @author  ThimPress, leehld
 * @package WP-Hotel-Booking/Templates
 * @version 1.6
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit; ?>

<div class="hb-booking-account">
	<?php
	if ( ! is_user_logged_in() ) {
		printf( esc_html__('You must %1$sLogin%2$s.','herittage'), '<strong><a href="'.esc_url( wp_login_url( hb_get_account_url() ) ).'">', '</a></strong>'  );
		return;
	}

	// list orders
	hb_get_template( 'account/bookings.php' );
	?>
</div>
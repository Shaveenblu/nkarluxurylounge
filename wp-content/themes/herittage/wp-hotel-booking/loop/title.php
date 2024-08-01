<?php
/**
 * The template for displaying loop room title in archive room page.
 *
 * This template can be overridden by copying it to yourtheme/wp-hotel-booking/loop/title.php.
 *
 * @author  ThimPress, leehld
 * @package WP-Hotel-Booking/Templates
 * @version 1.6
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();
global $hb_room;
?>

<div class="title">
    <h4>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h4>
    <?php do_action( 'hotel_booking_loop_room_price' ); ?>
</div>

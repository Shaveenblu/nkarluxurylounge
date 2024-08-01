<?php
/**
 * The template for displaying loop room thumbnail in archive room page.
 *
 * This template can be overridden by copying it to yourtheme/wp-hotel-booking/loop/thumbnail.php.
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
/**
 * @var $hb_room WPHB_Room
 */
?>

<div class="media">
    <a href="<?php the_permalink(); ?>"><?php $hb_room->getImage( 'catalog' ); ?></a>
    <div class="dt-sc-facility-container">
    <a class="dt-sc-button filled large" title="<?php esc_attr_e('Book Now', 'herittage'); ?>" href="<?php the_permalink(); ?>"><?php esc_html_e('View Details', 'herittage'); ?></a>
    <?php do_action( 'hotel_booking_loop_room_facilities' );?>
    </div>
    <?php do_action( 'hotel_booking_loop_room_price' ); ?>
</div>
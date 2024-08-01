<?php

if( ! function_exists('herittage_event_breadcrumb_title') ) {
    function herittage_event_breadcrumb_title($title) {
        if( get_post_type() == 'tribe_events' && is_single()) {
            $etitle = esc_html__( 'Event Detail', 'herittage' );
            return '<h1>'.$etitle.'</h1>';
        } else {
            return $title;
        }
    }

    add_filter( 'herittage_breadcrumb_title', 'herittage_event_breadcrumb_title', 20, 1 );
}

?>
<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$room    = get_the_ID();
$out  = '';
$facilities = '';
$facilities = get_categories('taxonomy=hb_room_facility&hide_empty=1');
        $out .= '<div class="room-facilities">';
            $out .= "<ul class='dt-sc-hb-room-facilities'>";
                foreach( $facilities as $facility ):
                    $out .= '<li class="facility-item">';
    
                        $term_id = $facility->term_id;
    
                        $term_meta = get_term_meta( $term_id, '_room_facilities', false );
                        $img_id = !empty($term_meta[0]['facility_icon']) ? $term_meta[0]['facility_icon'] : '';
    
                        if( !empty ( $img_id ) ):
                            $image = wp_get_attachment_image_src( $img_id, 'full' );
                            $image = '<img src="'.$image[0].'" alt="'.esc_html__( 'Rooms facility icon', 'herittage' ).'"/>';
                            $out .= '<span>'.$image.'</span>';
                        endif;
                    $out .= '</li>';
                endforeach;
            $out .= '</ul>';
        $out .= '</div>';
        echo "$out";
?>



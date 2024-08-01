<?php
add_action( 'herittage_after_main_css', 'pagination_style' );
function pagination_style() {
    wp_enqueue_style( 'herittage-pagination', get_theme_file_uri('/modules/pagination/assets/css/pagination.css'), false, HERITTAGE_THEME_VERSION, 'all');
}

if( !function_exists( 'after_single_page_content_wp_link_pages' ) ) {

    function after_single_page_content_wp_link_pages() {
        wp_link_pages(array(
            'before'         => '<div class="page-link">',
            'after'          => '</div>',
            'link_before'    => '<span>',
            'link_after'     => '</span>',
            'next_or_number' => 'number',
            'pagelink'       => '%',
        ));

        edit_post_link( esc_html__( ' Edit ','herittage' ) );
    }

    add_action( 'herittage_after_single_page_content', 'after_single_page_content_wp_link_pages' );
}

if( !function_exists( 'herittage_pagination' ) ) {
    function herittage_pagination( $query = false, $load_more = false ) {

        global $wp_query;
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );

        // default $wp_query
        if( $query ) {
            $custom_query = $query;
        } else {
            $custom_query = $wp_query;
        }

        $custom_query->query_vars['paged'] > 1 ? $current = $custom_query->query_vars['paged'] : $current = 1;

        if( empty( $paged ) ) $paged = 1;
        $prev = $paged - 1;
        $next = $paged + 1;

        $end_size = 1;
        $mid_size = 2;
        #$show_all = herittage_get_option( 'showall-pagination' );
        $dots = false;

        if( ! $total = $custom_query->max_num_pages ) $total = 1;

        $output = '';
        if( $total > 1 )
        {
            if( $load_more ){
                // ajax load more -------------------------------------------------
                if( $paged < $total ){
                    $output .= '<div class="column one pager_wrapper pager_lm">';
                        $output .= '<a class="pager_load_more button button_js" href="'. get_pagenum_link( $next ) .'">';
                            $output .= '<span class="button_icon"><i class="icon-layout"></i></span>';
                            $output .= '<span class="button_label">'. esc_html__('Load more', 'herittage') .'</span>';
                        $output .= '</a>';
                    $output .= '</div>';
                }

            } else {
                add_filter( 'number_format_i18n', 'herittage_zero_prefix_pagination' );
                // default --------------------------------------------------------
                $output .= '<div class="column one pager_wrapper">';

                    $big = 999999999; // need an unlikely integer
                    $args = array(
                        'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'total'              => $custom_query->max_num_pages,
                        'current'            => max( 1, get_query_var('paged') ),
                        #'show_all'           => $show_all,
                        'end_size'           => $end_size,
                        'mid_size'           => $mid_size,
                        'prev_next'          => true,
                        'prev_text'          => '<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="19.093" viewBox="0 0 15 19.093">
                        <defs>
                          <clipPath id="arrow-clip-path">
                            <rect data-name="Rectangle 8635" width="15" height="19.093" fill="currentcolor"/>
                          </clipPath>
                        </defs>
                        <g data-name="Group 129833" transform="translate(0)">
                          <g data-name="Group 24901" transform="translate(0)" clip-path="url(#arrow-clip-path)">
                            <path data-name="Path 50414" d="M1.513.16A.981.981,0,0,0,.163,1.519L4.936,8.932a1.136,1.136,0,0,1,0,1.23L.163,17.574a.981.981,0,0,0,1.35,1.359L14.3,10.814a1.5,1.5,0,0,0,0-2.536Z" transform="translate(0 0)" fill="currentcolor"/>
                          </g>
                        </g>
                      </svg></span>'.esc_html__('Previous', 'herittage'),
                        'next_text'          => esc_html__('Next', 'herittage').'<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="19.093" viewBox="0 0 15 19.093">
                        <defs>
                          <clipPath id="arrow-clip-path">
                            <rect data-name="Rectangle 8635" width="15" height="19.093" fill="currentcolor"/>
                          </clipPath>
                        </defs>
                        <g data-name="Group 129833" transform="translate(0)">
                          <g data-name="Group 24901" transform="translate(0)" clip-path="url(#arrow-clip-path)">
                            <path data-name="Path 50414" d="M1.513.16A.981.981,0,0,0,.163,1.519L4.936,8.932a1.136,1.136,0,0,1,0,1.23L.163,17.574a.981.981,0,0,0,1.35,1.359L14.3,10.814a1.5,1.5,0,0,0,0-2.536Z" transform="translate(0 0)" fill="currentcolor"/>
                          </g>
                        </g>
                      </svg></span>',
                        'type'               => 'list'
                    );
                    $output .= paginate_links( $args );

                $output .= '</div>'."\n";
            }
        }
        return $output;
    }
}


if( ! function_exists( 'herittage_zero_prefix_pagination' ) ) :
    function herittage_zero_prefix_pagination( $format ) {
        $number = intval( $format );
        if( intval( $number / 10 ) > 0 ) {
            return $format;
        }
        return '0' . $format;
    }
endif;
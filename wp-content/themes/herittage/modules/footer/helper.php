<?php
add_action( 'herittage_after_main_css', 'footer_style' );
function footer_style() {
    wp_enqueue_style( 'herittage-footer', get_theme_file_uri('/modules/footer/assets/css/footer.css'), false, HERITTAGE_THEME_VERSION, 'all');
}

add_action( 'herittage_footer', 'footer_content' );
function footer_content() {
    herittage_template_part( 'content', 'content', 'footer' );
}
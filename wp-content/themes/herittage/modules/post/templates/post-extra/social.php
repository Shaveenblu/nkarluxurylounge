<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<!-- Entry Social Share -->
<div class="single-entry-social-share"><?php
	$output = '<div class="share">';

		$title = get_the_title( $post_ID );
		$title = urlencode($title);

		$link = get_permalink( $post_ID );
		$link = rawurlencode( $link );

		$output .= '<i class="wdticon-share-alt-square"></i>';
		$output .= '<ul class="wdt-share-list">';
			$output .= '<li><a href="http://www.facebook.com/sharer.php?u='.esc_attr($link).'&amp;t='.esc_attr($title).'" class="wdticon-facebook" target="_blank"></a></li>';
			$output .= '<li><a href="http://twitter.com/share?text='.esc_attr($title).'&amp;url='.esc_attr($link).'" class="wdticon-twitter" target="_blank"></a></li>';
			$output .= '<li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;title='.esc_attr($title).'&amp;url='.esc_attr( $link ).'" class="wdticon-linkedin" target="_blank"></a></li>';
			$output .= '<li><a href="https://www.youtube.com/'.esc_attr($title).'" class="wdticon-youtube" target="_blank"></a></li>';
		$output .= '</ul>';

	$output .= '</div>';
	echo herittage_html_output($output); ?></div><!-- Entry Social Share -->
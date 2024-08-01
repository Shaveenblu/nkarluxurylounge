<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<!-- Entry Navigation -->
<div class="entry-post-navigation"><?php
	if( ! is_attachment() ) :
		$prev_post = get_previous_post();
		if( !empty( $prev_post ) ):	?>

			<div class="post-prev-link"><?php
				if( has_post_thumbnail( $prev_post->ID ) ):
					$entry_bg = '';
					$url = get_the_post_thumbnail_url( $prev_post->ID, 'full' );
					$entry_bg = "style=background-image:url(".$url.")"; ?>

					<a href="<?php echo get_permalink( $prev_post->ID ); ?>" <?php echo esc_attr($entry_bg);?> class="prev-post-bgimg"></a><?php
				endif; ?>

				<div class="nav-title-wrap">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="19.093" viewBox="0 0 15 19.093"><defs><clipPath id="arrow-clip-path"><rect data-name="Rectangle 8635" width="15" height="19.093" fill="currentcolor"/></clipPath></defs><g data-name="Group 129833" transform="translate(0)"><g data-name="Group 24901" transform="translate(0)" clip-path="url(#arrow-clip-path)"><path data-name="Path 50414" d="M1.513.16A.981.981,0,0,0,.163,1.519L4.936,8.932a1.136,1.136,0,0,1,0,1.23L.163,17.574a.981.981,0,0,0,1.35,1.359L14.3,10.814a1.5,1.5,0,0,0,0-2.536Z" transform="translate(0 0)" fill="currentcolor"/></g></g></svg>
					<p><a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo esc_attr($prev_post->post_title); ?>"><?php esc_html_e('Previous Story','herittage'); ?></a></p>
					<span class="zmdi zmdi-long-arrow-left zmdi-hc-fw"></span>
					<h3><a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo esc_attr($prev_post->post_title); ?>"><?php
						if( get_the_title( $prev_post->ID ) == '') {
							echo esc_html__('Previous Post', 'herittage');
						} else {
							echo "$prev_post->post_title";
						} ?></a>
					</h3>
				</div>

			</div>
			<?php
		else: ?>
			<div class="post-prev-link no-post">
                <a href="#" style="background-image:url(<?php echo esc_url(HERITTAGE_ROOT_URI.'/assets/images/no-post.jpg') ?>);" class="prev-post-bgimg"></a>
				<div class="nav-title-wrap">
					<span class="zmdi zmdi-long-arrow-left zmdi-hc-fw"></span>
					<h3><?php echo esc_html__('No previous story to show!', 'herittage'); ?></h3>
				</div>
			</div>
			<?php
		endif;

		$next_post = get_next_post();
		if( !empty( $next_post ) ):	?>
			<div class="post-next-link"><?php

				if( has_post_thumbnail( $next_post->ID ) ):
					$entry_bg = '';
					$url = get_the_post_thumbnail_url( $next_post->ID, 'full' );
					$entry_bg = "style=background-image:url(".$url.")"; ?>

					<a href="<?php echo get_permalink( $next_post->ID ); ?>" <?php echo esc_attr($entry_bg);?> class="next-post-bgimg"></a><?php
				endif; ?>

				<div class="nav-title-wrap">
					<p><a href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo esc_attr($next_post->post_title); ?>"><?php esc_html_e('Next Story','herittage'); ?></a></p>
					<span class="zmdi zmdi-long-arrow-right zmdi-hc-fw"></span></span>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="19.093" viewBox="0 0 15 19.093"><defs><clipPath id="arrow-clip-path"><rect data-name="Rectangle 8635" width="15" height="19.093" fill="currentcolor"/></clipPath></defs><g data-name="Group 129833" transform="translate(0)"><g data-name="Group 24901" transform="translate(0)" clip-path="url(#arrow-clip-path)"><path data-name="Path 50414" d="M1.513.16A.981.981,0,0,0,.163,1.519L4.936,8.932a1.136,1.136,0,0,1,0,1.23L.163,17.574a.981.981,0,0,0,1.35,1.359L14.3,10.814a1.5,1.5,0,0,0,0-2.536Z" transform="translate(0 0)" fill="currentcolor"/></g></g></svg>
					<h3><a href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo esc_attr($next_post->post_title); ?>"><?php
						if(get_the_title( $next_post->ID ) == '') {
							echo esc_html__('Next Post', 'herittage');
						} else {
							echo "$next_post->post_title";
						} ?></a>
					</h3>
				</div>

			</div>
			<?php
		else: ?>
			<div class="post-next-link no-post">
                <a href="#" style="background-image:url(<?php echo esc_url(HERITTAGE_ROOT_URI.'/assets/images/no-post.jpg') ?>);" class="next-post-bgimg"></a>
				<div class="nav-title-wrap">
					<span class="zmdi zmdi-long-arrow-right zmdi-hc-fw"></span>
					<h3><?php echo esc_html__('No next story to show!', 'herittage'); ?></h3>
				</div>
			</div>
			<?php
		endif;
	endif; ?></div><!-- Entry Navigation -->
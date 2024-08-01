<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php
if(  ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
	<!-- Entry Comment -->
		<div class="single-entry-comments">
		<div class="comment-wrap"><?php
			comments_popup_link(
				esc_html__('No Comments', 'herittage'),
				esc_html__('1 Comment', 'herittage'),
				esc_html__('% Comments', 'herittage'),
				'',
				esc_html__('Comments Off', 'herittage')
			); ?>
		</div>
	</div><!-- Entry Comment --><?php
}
?>
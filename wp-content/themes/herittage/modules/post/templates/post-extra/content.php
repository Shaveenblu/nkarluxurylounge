<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<!-- Entry Content -->
<div class="single-entry-body">
	<?php the_content();?>
	<?php wp_link_pages( array( 'before'=>'<div class="page-link">', 'after'=>'</div>', 'link_before'=>'<span>', 'link_after'=>'</span>', 'next_or_number'=>'number', 'pagelink' => '%', 'echo' => 1 ) );?>
	<?php edit_post_link( esc_html__( ' Edit ','herittage' ) ); ?>
</div><!-- Entry Content -->

<!-- Post footer Content Start-->
<div class="post-footer">
	<?php herittage_template_part( 'post', 'templates/post-extra/social', '', $template_args ); ?>
	<!-- Entry tags -->
	<div class="single-entry-tags"><?php the_tags(' '); ?></div><!-- Entry Categories -->
</div>
<!-- Post footer Content End-->
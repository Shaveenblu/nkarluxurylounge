<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<!-- Entry Author -->
<div class="single-entry-author">
	<div class="meta-author-date">
		<?php echo '<p>'.get_the_date('d').' '.get_the_date('M').' '.get_the_date('Y').'</p>';?>
	</div>
	<div class="meta-author-info">
		<a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php esc_attr_e('View all posts by ', 'herittage'); echo get_the_author();?>"><?php echo get_the_author();?></a>
    </div>
</div><!-- Entry Author -->
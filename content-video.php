<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<!--this class make title is displayed-->
	<div class="entry-header">
		<?php ngothuong_entry_header();?>
	</div>
	<!--this class make content is displayed-->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php (is_single() ? ngothuong_entry_tag() : '') ?>
	</div>
</article>
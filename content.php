<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<!--this class help image is displayed-->
	<div class="entry-thumbnail">
		<?php ngothuong_thumbnail('thumbnail');  ?>
	</div>
	<!--this class make title is displayed-->
	<div class="entry-header">
		<?php ngothuong_entry_header();?>
		<?php ngothuong_entry_meta();?>
	</div>
	<!--this class make content is displayed-->
	<div class="entry-content">
		<?php ngothuong_entry_content(); ?>
		<?php (is_single() ? ngothuong_entry_tag() : '') ?>
	</div>
</article>
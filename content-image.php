<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<!--this class help image is displayed-->
	<div class="entry-thumbnail">
		<?php ngothuong_thumbnail('large');  ?>
	</div>
	<!--this class make title is displayed-->
	<div class="entry-header">
		<?php ngothuong_entry_header();?>
		<?php
		/*
		* Đếm số lượng attachment có trong post
		*/
		   $attachments = get_children( array( 'post_parent'=>$post->ID ) );
		   $attachment_number = count($attachments);
		   printf( __('This image post contains %1$s photos', 'thachpham'), $attachment_number );
		?>
	</div>
	<!--this class make content is displayed-->
	<div class="entry-content">
		<?php ngothuong_entry_content(); ?>
		<?php (is_single() ? ngothuong_entry_tag() : '') ?>
	</div>
</article>
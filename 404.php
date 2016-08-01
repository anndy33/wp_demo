<?php get_header();?>
<div class="content">
	<div id="main-content">
		<?php
            _e('<h2>404 NOT FOUND</h2>', 'ngothuong');
            _e('<p>The article you were looking for was not found, but maybe try looking again!</p>', 'thachpham');

            get_search_form();

            _e('<h3>Content categories</h3>', 'ngothuong');
            echo '<div class="404-catlist">';
            wp_list_categories( array( 'title_li' => '' ) );
            echo '</div>';

            _e('<h3>Tag Cloud</h3>', 'ngothuong');
            wp_tag_cloud();
        ?>
	</div>
	<!--sidebar here-->
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer();?>
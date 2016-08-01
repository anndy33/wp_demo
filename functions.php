<?php
/*
@Declare constant 
	@THEME_URL : lay dan thu muc theme
	@CORE : lay duong dan thu muc core
*/
	define( 'THEME_URL', get_stylesheet_directory() );
	define( 'CORE', THEME_URL . '/core' );
/*
	@Nhung file 
	@ Load file /core/init.php
	@ Đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này.
*/
require_once( CORE . '/init.php' );
/*
 @ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
 **/
 if ( ! isset( $content_width ) ) {
       /*
        * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
        */
       $content_width = 620;
  }
  /*
  Khai bao chuc nang theme
  */
  if(!function_exists('ngothuong_theme_setup')){
  	function ngothuong_theme_setup(){
  		//thiet lap textdomain
  		$language_folder = THEME_URL .'/languages';
  		load_theme_textdomain('ngothuong', $language_folder);
  		//tu dong them link RSS len <head>
  		add_theme_support('automatic-feed-links');
  		//them post thumbnail cho phan post khi set image feature
  		add_theme_support('post-thumbnails');
  		//post format trong post
  		add_theme_support('post-formats', array(
  			'image',
  			'video',
  			'gallery',
  			'quote',
  			'link'
  		));
  		//add title-tag, it help automatic add title for website
  		add_theme_support('title-tag');
  		//add custom background
  		$default_background = array(
  			'default-color'=> '#e8e8e8'

  		);
  		add_theme_support('custom-background', $default_background);
  		//add menu 
  		register_nav_menu('primary-menu', __('Primary Menu', 'ngothuong'));
  		//add sidebar
  		$sidebar = array(
  			'name'=> __('Main Sidebar', 'ngothuong'),
  			'id'=> 'main-sidebar',
  			'description'=> __('Default sidebar'),
  			'class'=> 'main-sidebar',
  			'before_title'=> '<h3 class="widgettitle">',
  			'after_title'=>'</h3>'
  		);
  		register_sidebar($sidebar);
  	}
  	add_action('init','ngothuong_theme_setup');
  }
  /*
@ Thiết lập hàm hiển thị logo
@ ngothuong_logo()
**/
if (!function_exists( 'ngothuong_logo' )) {
  function ngothuong_logo() {?>
    <div class="logo">
      <div class="site-name">
        <?php if (is_home()) {
          printf(
            '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
            get_bloginfo( 'url' ),
            get_bloginfo( 'description' ),
            get_bloginfo( 'sitename' )
          );
        } else {
          printf(
            '</p><a href="%1$s" title="%2$s">%3$s</a></p>',
            get_bloginfo( 'url' ),
            get_bloginfo( 'description' ),
            get_bloginfo( 'sitename' )
          );
        } // endif ?>
      </div>
      <div class="site-description"><?php bloginfo( 'description' ); ?></div>
    </div>
  <?php }
}
/*
@ Thiết lập hàm hiển thị menu
@ ngothuong_menu( $menu )
**/
if ( !function_exists('ngothuong_menu')) {
  function ngothuong_menu($menu) {
    $menu = array(
      'theme_location' => $menu,
      'container' => 'nav',
      'container_class' => $menu,
      'items_wrap'=> '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>'
    );
    wp_nav_menu($menu);
  }
}
//ham tao phan trang don gian
if(!function_exists('ngothuong_pagination')){
  function ngothuong_pagination(){
    if($GLOBALS['wp_query']->max_num_pages < 2){
      return '';
    }?>
    <nav class="pagination" role="navigation">
      <?php  if(get_next_posts_link()) :?>
        <div class="prev"><?php next_posts_link(__('Older Posts', 'ngothuong'));?></div>
      <?php endif;?>
      <?php if(get_previous_posts_link()):?>
        <div class="next"><?php previous_posts_link(__('Newest Posts', 'ngothuong'));?></div>
      <?php endif; ?>
    </nav>
    <?php }
  }
  /*function used to display thumbnail of content*/
  if(!function_exists('ngothuong_thumbnail')){
    function ngothuong_thumbnail($size){
      if( !is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image') ): ?>
        <figure class="post-thumbnail"><?php the_post_thumbnail($size);?></figure>
        <?php endif; ?>
    <?php }
  }
  /*
  ngothuong_entry_header: display title of post
  */
  if ( ! function_exists( 'ngothuong_entry_header' ) ) {
  function ngothuong_entry_header() {
    if ( is_single() ) : ?> 
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
    <?php else : ?>
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2><?php
    endif;
  }
}
/*ngothuong_entry_meta: lay du lieu post*/
if( ! function_exists( 'ngothuong_entry_meta' ) ) {
  function ngothuong_entry_meta() {
    if ( ! is_page() ) :
      echo '<div class="entry-meta">';
 
        // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
        printf( __('<span class="author">Posted by %1$s</span>', 'ngothuong'),
          get_the_author() );
 
        printf( __('<span class="date-published"> at %1$s</span>', 'ngothuong'),
          get_the_date() );
 
        printf( __('<span class="category"> in %1$s</span>', 'ngothuong'),
          get_the_category_list( ', ' ) );
 
        // Hiển thị số đếm lượt bình luận
        if ( comments_open() ) :
          echo ' <span class="meta-reply">';
            comments_popup_link(
              __('Leave a comment', 'ngothuong'),
              __('One comment', 'ngothuong'),
              __('% comments', 'ngothuong'),
              __('Read all comments', 'ngothuong')
             );
          echo '</span>';
        endif;
      echo '</div>';
    endif;
  }
}
/*
 * Thêm chữ Read More vào excerpt
 */
function thachpham_readmore() {
  return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'thachpham') . '</a>';
}
add_filter( 'excerpt_more', 'thachpham_readmore' );
 
/*
@ Hàm hiển thị nội dung của post type
@ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
@ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
@ thachpham_entry_content()
**/
if ( ! function_exists( 'ngothuong_entry_content' ) ) {
  function ngothuong_entry_content() {
 
    if ( ! is_single() && ! is_page() ) :
      the_excerpt();
    else :
      the_content();
 
      /*
       * Code hiển thị phân trang trong post type
       */
      $link_pages = array(
        'before' => __('<p>Page:', 'ngothuong'),
        'after' => '</p>',
        'nextpagelink'     => __( 'Next page', 'ngothuong' ),
        'previouspagelink' => __( 'Previous page', 'ngothuong' )
      );
      wp_link_pages( $link_pages );
    endif;
 
  }
}
/*
@ Hàm hiển thị tag của post
@ thachpham_entry_tag()
**/
if ( ! function_exists( 'ngothuong_entry_tag' ) ) {
  function ngothuong_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __('Tagged in %1$s', 'ngothuong'), get_the_tag_list( '', ', ' ) );
      echo '</div>';
    endif;
  }
}
/*
nhung file style css
*/
function ngothuong_style(){
    wp_register_style('main-style', get_template_directory_uri(). "/css/style.css", 'all');
    wp_enqueue_style('main-style');

    wp_register_style('reset-style', get_template_directory_uri(). "/css/reset.css", 'all');
    wp_enqueue_style('reset-style');
      /*
    * Chèn các file CSS của SuperFish Menu
    */
    wp_register_style( 'superfish-css', get_template_directory_uri() . '/css/superfish.css', 'all' );
    wp_enqueue_style( 'superfish-css' );
         
    /*
    * Chèn file JS của SuperFish Menu
    */
    wp_register_script( 'superfish-js', get_template_directory_uri() . '/js/superfish.js', array('jquery') );
    wp_enqueue_script( 'superfish-js' );
      /*
     * Chèn file JS custom.js
     */
    wp_register_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery') );
    wp_enqueue_script( 'custom-js' );
    /*adding the bootstrap file*/
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
    wp_enqueue_script( 'bootstrap-js' );
    /*adding bootstrap hover dropdown*/
    wp_register_script( 'bootstrap-hover-dropdown-js', get_template_directory_uri() . '/js/bootstrap-hover-dropdown.js', array('jquery') );
    wp_enqueue_script( 'bootstrap-hover-dropdown-js' );
    /*adding carousel  for footer*/
    wp_register_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery') );
    wp_enqueue_script( 'owl-carousel-js' );
}
add_action('wp_enqueue_scripts','ngothuong_style');

/*
this function using to add the favoicon for website
*/
function add_my_favicon() {
   $favicon_path = get_template_directory_uri() . '/images/favicon.ico';

   echo '<link rel="shortcut icon" href="' . $favicon_path . '" />';
}

add_action( 'wp_head', 'add_my_favicon' ); //front end
add_action( 'admin_head', 'add_my_favicon' ); //admin end


<?php
show_admin_bar(false);
if ( ! function_exists( 'booking_setup' ) ) :

function booking_setup() {
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'image-thumbnails', 700, 466, array('left','top'));
    add_image_size( 'image-icon', 100, 81, true );
    add_image_size( 'image-single', 800, 533, true );
    add_image_size( 'image-slide', 1920, 1011, true );
    
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'booking' ),
		'footer' => esc_html__('Footer Menu', 'booking')
    ) );
}
endif;

add_action( 'after_setup_theme', 'booking_setup' );



function booking_scripts() {
	wp_enqueue_style( 'booking-style', get_stylesheet_uri() );
    wp_enqueue_style( 'custom-css', get_template_directory_uri().'/assets/css/custom.min.css' );
		wp_enqueue_style( 'lightslider-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css');
		
    
	wp_enqueue_script('jquery','',array(),'',false);
    wp_enqueue_script( 'custom-js', get_template_directory_uri().'/assets/js/custom.min.js', array(), '20151022', true );
     wp_enqueue_script( 'lightslider-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js', array(), '20151022', true );
    if (!is_404()) {
       wp_enqueue_style ( 'booking-b2hengine', 'https://www.booking2hotels.com/Frontengine/css/b2h.engine.v3.min.css');

       wp_enqueue_script ( 'booking-b2h-engine-js', 'https://www.booking2hotels.com/Frontengine/pickadate/b2h.engine.v3.min.js', array(), '28052016', true );
       wp_enqueue_script( 'jqueryCookie', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js', array(), '20161013', true );
    }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if(is_page('booking2hotels_reset_password')){
		wp_enqueue_style( 'booking-resetpassword', 'https://www.booking2hotels.com/Frontengine/css/resetpassword.css' );
		wp_enqueue_script( 'booking-b2h-activate', 'https://www.booking2hotels.com/Frontengine/js/b2h-activate.js', array(), '20151022', true );
	}
	if(is_page('booking2hotels_activate')){
			wp_enqueue_style( 'booking-activate', 'https://www.booking2hotels.com/Frontengine/css/activate.css' );
			wp_enqueue_script( 'booking-b2h-activate', 'https://www.booking2hotels.com/Frontengine/js/b2h-activate.js', array(), '20151022', true );
	}
	if(is_page('booking2hotels_thankyou')){
			wp_enqueue_script( 'booking-b2h-thankyou', 'https://www.booking2hotels.com/Frontengine/js/thankyou_content.js', array(), '20151022', true );
	}
}
add_action( 'wp_enqueue_scripts', 'booking_scripts' );

//require_once('wp_bootstrap_navwalker.php');
//add_filter('show_admin_bar', '__return_false');

if(!function_exists('breadcrumb_bht')) {

	function breadcrumb_bht() {
		global $post;

		if( !is_home() &&  !is_front_page() ) {

			$before = '<ol class="breadcrumb">';
			$after = '</ol>';

			echo $before;

			if( is_page() || is_page_template() || is_archive() || is_single()) {

				echo '<li><a title="Go to home page" href="'.home_url().'">'.__('Home','booking').'</a></li>';
			}

			if(is_page() && !$post->post_parent) {
				printf('<li>%1$s</li>', get_the_title());
			} elseif(is_page() && $post->post_parent) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while($parent_id) {
					$page = get_page( $parent_id );
					$breadcrumbs[] = sprintf('<li><a title="Go to %1$s" href="%2$s">%3$s</a></li>', get_the_title($page->ID), get_permalink($page->ID), get_the_title($page->ID));
					$parent_id  = $page->post_parent;
				}

				$breadcrumbs = array_reverse( $breadcrumbs );

				foreach ( $breadcrumbs as $crumb ) {
					echo $crumb;
				}

				printf('<li>%1$s</li>', get_the_title());

			}


			if(is_archive() && !is_single()) {
				echo '<li>'.post_type_archive_title().'</li>';
			} elseif(is_single()) {
				$post_type = get_post_type_object($post->post_type);
				echo '<li><a href="'. get_post_type_archive_link($post->post_type) .'">'.$post_type->name.'</a></li>';

				echo '<li>'.get_the_title().'</li>';

			}

			echo $after;
		}

	}

}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'General',
        'parent_slug'	=> 'theme-general-settings',

    ));
    if(current_user_can('edit_b2h_setting')){
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme booking Settings',
            'menu_title'	=> 'Booking Engine',
            'parent_slug'	=> 'theme-general-settings',
        ));
    }
}
if(!function_exists('search_init()')){
	function search_init(){
        if(get_bloginfo("language") == 'ja') { 
            $langID =  3;
        } else if (get_bloginfo("language") == 'zh-CN'){
            $langID =  4;
        } else if (get_bloginfo("language") == 'ar'){
            $langID =  6;
        } else if (get_bloginfo("language") == 'ko-KR'){
            $langID =  5;
        } 
        else {
            $langID = 1;
        }
		printf('<script>
			var d1 = $("#frmCheckRate").b2hPicker({
				defaultdate:%1$s,
				UrgentBooking: %2$s,
				PromoCode :%3$s ,
				selectMonths: %4$s,
				selectYears: %5$s,
				module_member :%6$s,
				member_page:%7$s,
				CrossDomain :%8$s,
				PID:%9$s,
				RateExchangeId:%10$s,
                Version:%11$s,                
                Promotion:%12$s,
                Review:%13s,
                lang:%14$s
			});
            $("#memberLinkPan #lbLogin a").text("Login");
                $("#memberLinkPan #lbWelcome").text("Hi: Member");
                $("#lbSignUp a").text("Sign up");
                $("#lbSignOut a").text("Sign out");
		</script>',
		get_field('default_date','options')?'true':'false',
		get_field('urgent_booking','options')?'true':'false',
		get_field('promotion_code','options')?'true':'false',
		get_field('select_month','options')?'true':'false',
		get_field('select_year','options')?'true':'false',
		get_field('member_system','options')?'true':'false',
		get_field('member_page','options')?'true':'false',
		get_field('cross_domain','options')?'true':'false',
		get_field('product_id','options'),
		get_field('hotel_currency','options'),
        get_field('version','options'),        
        get_field('promotion','options')?'true':'false',
        get_field('review','options')?'true':'false',
        $langID
		);
	}
}
if(!function_exists('get_booking_page')){
	function get_booking_page(){
        //echo get_permalink(get_page_by_path('booking2hotels_book'));
		$page_action = array(
			"booking"=>get_permalink(get_page_by_path('booking2hotels_book')),
			"promotion"=>get_permalink(get_page_by_path('booking2hotels_promotion')),
			"review"=>get_permalink(get_page_by_path('booking2hotels_review')),
			"review_write"=>get_permalink(get_page_by_path('booking2hotels_review_write')),
			"map"=>get_permalink(get_page_by_path('booking2hotels_map')),
			"thankyou"=>get_permalink(get_page_by_path('booking2hotels_thankyou'))
			);
        //var_dump($page_action);
        //break;
		return $page_action;
	}
}

if(!function_exists('getFeatureImage')){
	function getFeatureImage(){
		global $post;
		if ( has_post_thumbnail() ) {

			the_post_thumbnail('large',array( 'class' => 'img-responsive' ));

		}else{
			//$image=get_template_directory_uri().'/images/img404.jpg';
			echo '<img src="https://dummyimage.com/600x400/000/fff" width="900" height="600" class="img-responsive">';
		}
	}
}


function include_header_script(){
	if(get_field('header_script','options')){
		echo get_field('header_script','options');
	}
}
add_action('wp_head','include_header_script',100);
//
//
//
function include_footer_script(){
	if(get_field('footer_script','options')){
		echo get_field('footer_script','options');
	}
}
add_action('wp_footer','include_footer_script',100);


function include_body_script(){
	if(get_field('body_script','options')){

		echo get_field('body_script','options');
	}
}
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}

function getRelatePost($post_type_slug,$maxRow){
    $getRelatePost=new WP_Query(array(
        'post_type'=>$post_type_slug,
        'post_status' => 'publish',
        'post__not_in' => array($post->ID)
    ));
    return $getRelatePost;
}

function getPostFromSlug($post_type_slug,$maxRow){
    $getPostFromSlug=new WP_Query(array(
        'post_type'=>$post_type_slug,
        'posts_per_page'=> $maxRow,
        'post_status' => 'publish'
    ));
    return $getPostFromSlug;
}

add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
require get_template_directory().'/inc/shortcode/b2hrate.php';
require get_template_directory().'/wp_bootstrap_navwalker.php';


if(!function_exists('get_copyright')){
	function get_copyright(){
		printf(get_field('copyright','options'));
	}
}
function getFavicon(){
	if(get_field('favicon','options')){
		$favicon=get_field('favicon','options');
        printf('<link rel="shortcut icon" href="%1$s">',$favicon ['url']);
	}
}
if ( ! defined( 'WPCF7_AUTOP' ) )
 define( 'WPCF7_AUTOP', false );

function remove_cssjs_ver($src) {
 if (strpos($src, '?ver='))
  $src = remove_query_arg('ver', $src);


 $url = parse_url(site_url());
 $path = '';
 if ($url['path'])
  $path = $url['path'];


 if (is_admin()) return $src;
 return str_replace(site_url(), $path, $src);
}
add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);


if(!function_exists('get_social_media')) {
	function get_social_media(){
		$facebook=get_field('facebook','options');
		$twitter = get_field('twitter', 'options');
		$line = get_field('line', 'options');
		$instagram=get_field('instagram','options');
		if($facebook){
			printf('<li class="facebook"><a href="%1$s" title="facebook"><i class="fab fa-facebook-f"></i></a></li>', $facebook);
		}
		if ($twitter) {
			printf('<li class="twitter"><a href="%1$s" title="twitter"><i class="fab fa-twitter"></i></a></li>', $twitter);
		}
		if ($line) {
			printf('<li class="twitter"><a href="%1$s" title="line"><i class="fab fa-line"></i></a></li>', $line);
		}
		if($instagram){
			printf('<li class="instagram"><a href="%1$s" title="instagram"><i class="fab fa-instagram"></i></a></li>', $instagram);
		}
	}
}

if(!function_exists('textexcerpt')) {
    function textexcerpt($Details,$length){
         if(strlen($Details) > 120) {
                  return mb_substr($Details,0,$length,'utf-8') . "...";
              } else {
                 return $Details;
              }
     }
}


function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
         echo "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>";
        echo "<div class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</div>";
      echo"</div>";
  }

}
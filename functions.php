<?php 

require_once "inc/libs/Mobile_Detect.php";
global $detect;
$detect = new Mobile_Detect;

/* ========================================================================================================================

Wrap Wordpress Video Shortcode in Responsive Wrapper

======================================================================================================================== */

// function lookupIDfromURL($image_url) {

// 	// basic lookup from DB to match media URL with media URL
// 	global $wpdb;
// 	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
//         return $attachment[0]; 

// }

// add_filter( 'wp_video_shortcode', function( $output ) {

// 	// get SRC 
// 	// this is a bit hacky

// 	preg_match( '@src="([^"]+)"@' , $output, $match );
// 	$src = array_pop($match);
// 	$src = preg_replace('/\?.*/', '', $src);

// 	// get ID

// 	$postid = lookupIDfromURL( $src );
// 	$meta = wp_get_attachment_metadata($postid);

// 	// let it autoplay 
// 	// and include playsinline to fix issues on iOS

// 	$output = str_replace( "<video", "<video", $output );
// 	$output = str_replace( "controls=", "data-controls=", $output );
	
// 	// wrap it all up

// 	$str = preg_replace('/\<[\/]{0,1}div[^\>]*\>/i', '', $output);
// 	// $padding = ($meta['height']/$meta['width'])*100;
// 	$padding = '56.25';
// 	$wrap = "<div class='flex-video' style='padding-bottom:".$padding."%'>".$str."</div>";
    
// 	$output = $wrap;
// 	return $output;

// } );

// add_filter( 'loop_shop_columns', 'wc_loop_shop_columns', 1, 10 );
// function wc_loop_shop_columns( $number_columns ) {
// 	return 2;
// }

// function WOO_account_menu_items($items) {
//     unset($items['dashboard']);
//     return $items;            
// }
// add_filter('woocommerce_account_menu_items', 'WOO_account_menu_items');

/**
 * Exclude products from a particular category on the shop page
 */




// function save_variation_settings_fields( $variation_id, $loop ) {
//     $text_field = $_POST['my_text_field'][ $loop ];

//     if ( ! empty( $text_field ) ) {
//         update_post_meta( $variation_id, 'my_text_field', esc_attr( $text_field ));
//     }
// }

// function load_variation_settings_fields( $variation ) {     
//     $variation['my_text_field'] = get_post_meta( $variation[ 'variation_id' ], 'my_text_field', true );

//     return $variation;
// }


add_theme_support( 'post-thumbnails' );

function my_filter_head() {
   remove_action('wp_head', '_admin_bar_bump_cb');
}

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

add_action('wp_enqueue_scripts', 'hu_frontend_enqueue');

function hu_frontend_enqueue() {

	// CSS
	wp_enqueue_style('hu_fonts', 'https://fonts.googleapis.com/css?family=Cormorant+Garamond|Questrial&display=swap');
	wp_enqueue_style('hu_fonts_awesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');

	// Conditional scripts

	// Javascript Files
	wp_enqueue_script('jquery');

	wp_enqueue_script('waypoint_js', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js', array(), false);

	wp_enqueue_script('sticky_js', 'https://cdn.jsdelivr.net/npm/sticky-sidebar@3.3.1/dist/sticky-sidebar.min.js', array(), false);

	wp_enqueue_script('loopcounter_js', get_template_directory_uri() . '/assets/js/loopcounter.js', array(), false);

	wp_enqueue_script('anime_js', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), false);
	wp_enqueue_script('lining_js', 'https://cdn.jsdelivr.net/npm/lining.js@0.3.2/build/lining.min.js', array(), false);
	wp_enqueue_script('lining_effect_js', 'https://cdn.jsdelivr.net/npm/lining.js@0.3.2/build/lining.effect.min.js', array(), false);

	// wp_enqueue_script('lazy_js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js', array(), false);

	wp_enqueue_style('selectic_css', 'https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/selectric.min.css');
	wp_enqueue_script('selectic_js', 'https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/jquery.selectric.min.js', array(), false);

	// wp_enqueue_style('plyr_css', 'https://cdn.plyr.io/3.4.8/plyr.css');
	// wp_enqueue_script('plyr_js', 'https://cdn.plyr.io/3.4.8/plyr.js', array(), false);

	wp_enqueue_style('slick_css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
	wp_enqueue_script('slick_js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), false);

		// wp_enqueue_script('map_js', 'https://davidlynch.org/projects/maphilight/jquery.maphilight.js', array(), false);
		// wp_enqueue_script('map_resize_js', 'https://mattstow.com/experiment/responsive-image-maps/jquery.rwdImageMaps.min.js', array(), false);



	// if (is_page_template('homepage.php')) {

	// 	wp_enqueue_script('gsap_js', get_template_directory_uri() . '/assets/js/gsap.min.js', array(), false);
	// 	wp_enqueue_script('MorphSVGPlugin_js', get_template_directory_uri() . '/assets/js/MorphSVGPlugin.min.js', array(), false);

	// }

	// if (is_product()) {
	// 	wp_enqueue_style('mCustomScrollbar_css', 'https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css');
	// 	wp_enqueue_script('mCustomScrollbar_js', 'https://cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js', array(), false);
	// }

	// wp_enqueue_style('izimodal_css', 'https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css');
	// wp_enqueue_script('izimodal_js', 'https://cdn.jsdelivr.net/npm/izimodal-1.6.0@1.6.1/js/iziModal.min.js', array(), false);

	wp_enqueue_style('hu_css', get_template_directory_uri() . '/assets/style.css');

	global $wp_query;

	wp_register_script('main_js', get_template_directory_uri() . '/assets/js/main.js', array(), false);
	wp_localize_script( 'main_js', 'hu_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
		'posts' => serialize( $wp_query->query_vars ),
		'sort' => 'newness',
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages,
		'page_url' => get_site_url(),
		'home_url' => get_home_url(),
		'page_name' => get_the_title(),
		'page_id' => $wp_query->post->ID,
		'user_id' => get_current_user_id(),
		'template_path' => get_template_directory_uri(),
		'blog_url' => get_post_type_archive_link( 'post' )
	) );

	wp_enqueue_script( 'main_js' );

}

add_action('acf/init', 'hu_theme_options');
function hu_theme_options() {
	if( function_exists('acf_add_options_page') ) {
 
		$option_page = acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title' 	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability' 	=> 'edit_posts',
			'redirect' 	=> false
		));
	 
	}
}

function hu_menu($placement) {
	
	if ($placement === 'header-menu') {
		wp_nav_menu(array(
			'theme_location'  => 'header-menu',
			'menu'            => '', 
			'container'       => '', 
			'container_class' => '', 
			'container_id'    => '',
			'menu_class'      => '', 
			'menu_id'         => '',
			'echo'            => 1,
			'fallback_cb'     => '__return_false',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0
		));
	}
	else if ($placement === 'footer-menu-1') {
		wp_nav_menu(array(
			'theme_location'  => 'footer-menu-1',
			'menu'            => '', 
			'container'       => '', 
			'container_class' => '', 
			'container_id'    => '',
			'menu_class'      => '', 
			'menu_id'         => '',
			'echo'            => 1,
			'fallback_cb'     => '__return_false',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0
		));
	}
	else if ($placement === 'footer-menu-2') {
		wp_nav_menu(array(
			'theme_location'  => 'footer-menu-2',
			'menu'            => '', 
			'container'       => '', 
			'container_class' => '', 
			'container_id'    => '',
			'menu_class'      => '', 
			'menu_id'         => '',
			'echo'            => 1,
			'fallback_cb'     => '__return_false',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0
		));
	}
	else if ($placement === 'footer-menu-3') {
		wp_nav_menu(array(
			'theme_location'  => 'footer-menu-3',
			'menu'            => '', 
			'container'       => '', 
			'container_class' => '', 
			'container_id'    => '',
			'menu_class'      => '', 
			'menu_id'         => '',
			'echo'            => 1,
			'fallback_cb'     => '__return_false',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0
		));
	}
	else if ($placement === 'header-drop-1') {
		wp_nav_menu(array(
			'theme_location'  => 'header-drop-1',
			'menu'            => '', 
			'container'       => '', 
			'container_class' => '', 
			'container_id'    => '',
			'menu_class'      => '', 
			'menu_id'         => '',
			'echo'            => 1,
			'fallback_cb'     => '__return_false',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0
		));
	}
	else if ($placement === 'header-drop-2') {
		wp_nav_menu(array(
			'theme_location'  => 'header-drop-2',
			'menu'            => '', 
			'container'       => '', 
			'container_class' => '', 
			'container_id'    => '',
			'menu_class'      => '', 
			'menu_id'         => '',
			'echo'            => 1,
			'fallback_cb'     => '__return_false',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0
		));
	}
	else if ($placement === 'header-menu-mob') {
		wp_nav_menu(array(
			'theme_location'  => 'header-menu-mob',
			'menu'            => '', 
			'container'       => '', 
			'container_class' => '', 
			'container_id'    => '',
			'menu_class'      => '', 
			'menu_id'         => '',
			'echo'            => 1,
			'fallback_cb'     => '__return_false',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0
		));
	}

}

add_action('init', 'ae_register_theme_menus');
function ae_register_theme_menus() {
	register_nav_menus(array(
		'header-menu' => 'Header Menu',
		'header-menu-mob' => 'Header Menu Mobile',
		'footer-menu-1' => 'Footer Menu #1',
		'footer-menu-2' => 'Footer Menu #2',
		'footer-menu-3' => 'Footer Menu #3',
		'header-drop-1' => 'Header Dropdown Menu #1',
		'header-drop-2' => 'Header Dropdown Menu #2'
	));
}

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

function hu_prefix_setup() {

	add_theme_support( 'custom-logo', array(
		'height' => 48,
		'width' => 97,
		'flex-width' => true,
		'flex-height' => true
	) );

}
add_action( 'after_setup_theme', 'hu_prefix_setup' );

function theme_prefix_the_custom_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}

function hu_svg_file_support($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter('upload_mimes', 'hu_svg_file_support');

function current_url()
{
	global $wp;
	$current_url = home_url( add_query_arg( array(), $wp->request ) );
	echo $current_url;
}

function pp_getPostViews($postID){
   $count_key = 'post_views_count';
   $count = get_post_meta($postID, $count_key, true);
   if($count==''){
     delete_post_meta($postID, $count_key);
     add_post_meta($postID, $count_key, '0');
     return "0 View";
   }
   return $count.' Views';
}
function pp_setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
     $count = 0;
   delete_post_meta($postID, $count_key);
   add_post_meta($postID, $count_key, '0');
  }
 else{
   $count++;
 update_post_meta($postID, $count_key, $count);
 }
}

?>
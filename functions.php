<?php
require get_template_directory() . '/functions/navbar_generator.php';
require get_template_directory() . '/vendor/autoload.php';

use eftec\bladeone\BladeOne;
define("BLADEONE_MODE",2);
$blade = new BladeOne(get_template_directory().'/views', get_template_directory() .'/cache');


function theme_styles() {

	// wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	// wp_enqueue_style( 'main_css', get_template_directory_uri() . '/css/clean-blog.css' );
	 wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css' );
	// wp_enqueue_style( 'smartmenus_css', get_template_directory_uri() . '/css/jquery.smartmenus.bootstrap.css' );

	wp_enqueue_style( 'basic_style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'materialize', get_template_directory_uri() . '/css/materialize.css' );
	wp_enqueue_style( 'google_font', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
}

add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;

	wp_enqueue_script( 'jquerry', get_template_directory_uri() . '/js/jquery.min.js', array(), false, true);
	wp_enqueue_script( 'materialize_js', get_template_directory_uri() . '/js/materialize.js', array(), false, true);
	wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array(), false, true);
	wp_enqueue_script( 'side_nav', get_template_directory_uri() . '/js/side_nav.js', array(), false, true);

	// wp_enqueue_script( 'jquerry', get_template_directory_uri() . '/vendor/jquery/jquery.min.js', array(), false, true);
	// wp_enqueue_script( 'popper_js', get_template_directory_uri() . '/vendor/popper/popper.min.js', array(), false, true);
	// wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array(), false, true);
	// wp_enqueue_script( 'blog_js', get_template_directory_uri() . '/js/clean-blog.js', array(), false, true);
	// wp_enqueue_script( 'jqBootstrapValidation_js', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array(), false, true);
	// wp_enqueue_script( 'smartmenus_js', get_template_directory_uri() . '/js/jquery.smartmenus.min.js', array(), false, true);
	// wp_enqueue_script( 'smartmenus_js', get_template_directory_uri() . '/js/jquery.smartmenus.min.js', array(), false, true);
	// wp_enqueue_script( 'smartmenus_boostrap_js', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.min.js', array(), false, true);
}

add_action( 'wp_enqueue_scripts', 'theme_js');

function get_post_thumb_url($post){
	$url = get_the_post_thumbnail_url($post);
	if(!$url){
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$image_url = $matches [1] [0];
		if(empty($image_url)){
			$url = get_template_directory_uri()."/image/about-bg.jpg";
		}else{
			$url = $image_url;
		}
	}
	return $url;
}

if(function_exists('register_nav_menu')){
    register_nav_menu('header_menu', 'Header Menu');
}

add_theme_support( 'post-thumbnails' );

if ( function_exists('register_sidebar') ){
	register_sidebar(array(
		'name' => 'SideBar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title">',
		'after_title' => '</div>',
	));

	register_sidebar(array(
        'name' => 'Footer Left',
        'id'   => 'footer-left-widget',
        'description'   => 'Left Footer widget position.',
        'before_widget' => '<div class="footer_text" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="footer_title">',
        'after_title'   => '</div>'
    ));

    register_sidebar(array(
        'name' => 'Footer Center',
        'id'   => 'footer-center-widget',
        'description'   => 'Centre Footer widget position.',
        'before_widget' => '<div class="footer_text" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="footer_title">',
        'after_title'   => '</div>'
    ));

    register_sidebar(array(
        'name' => 'Footer Right',
        'id'   => 'footer-right-widget',
        'description'   => 'Right Footer widget position.',
        'before_widget' => '<div class="footer_text" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="footer_title">',
        'after_title'   => '</div>'
	));
	
	register_sidebar(array(
        'name' => 'Footer Copyright',
        'id'   => 'footer-copyright',
        'description'   => 'The copyright.',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<span style="display:none;">',
        'after_title'   => '</span>'
    ));
}

/*
 * Display Image from the_post_thumbnail or the first image of a post else display a default Image
 * Chose the size from "thumbnail", "medium", "large", "full" or your own defined size using filters.
 * USAGE: <?php echo my_image_display(); ?>
 */

 function my_image_display($size = 'full') {
	$cover_img_id = esc_attr( get_option('index_cover_image_path'));
    if($cover_img_id != ""){
      $cover_img_url = wp_get_attachment_image_src($cover_img_id, 'full')[0];
    }else{
      $cover_img_url = get_template_directory_uri() . "/image/home-bg.jpg";
	}
	
	if (has_post_thumbnail()) {
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id, $size);
		$image_url = $image_url[0];
	} else {
		global $post, $posts;
		$image_url = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$image_url = $matches [1] [0];
		
		//Defines a default image
		if(empty($image_url)){
			$image_url = $cover_img_url;
		}
	}
	return $image_url;
}

get_template_part( 'admin/setting_init');

?>
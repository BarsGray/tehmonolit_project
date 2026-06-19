<?php
/* Plugin Name: My Custom Functions */

if (!defined('ABSPATH')) {
	exit;
}

if (!defined('_S_VERSION')) {
	define('_S_VERSION', '0.0.1');
}

if (!defined('FRONT_PAGE')) {
	define('FRONT_PAGE', get_option('page_on_front'));
}

add_theme_support('post-thumbnails');

register_nav_menus();

add_action('wp_enqueue_scripts', 'tehmonolit_th_scripts_style');
function tehmonolit_th_scripts_style()
{
	wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/js/fancybox.js', array('jquery'), null, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true);

	wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), null, 'all');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/css/fancybox.css', array(), null, 'all');
	wp_enqueue_style('tehmonolit_th-style', get_stylesheet_uri(), array(), _S_VERSION);
}

add_filter('site_transient_update_plugins','filter_plugin_updates');
function filter_plugin_updates($value){
	unset($value->response['all-in-one-seo-pack/all_in_one_seo_pack.php']);
	return $value;
}

add_action('admin_head','admin_head');
function admin_head(){
	echo '<style type="text/css">#wpwrap #edittag{max-width:100%;}.term-description-wrap{display:none;}</style>';
}

function breadcrumbs($sep = ' • ', $args = array(), $l10n = array())
{
	static $inst;
	if (!$inst)
		$inst = new Breadcrumbs();
	if (is_array($sep)) {
		$args = $sep;
		$sep = isset($args['sep']) ? $args['sep'] : ' • ';
	}
	echo $inst->get_crumbs($sep, $l10n, $args);
}


function merge_numbers($num)
{
	return str_replace([' ', '-', '(', ')'], '', $num);
}
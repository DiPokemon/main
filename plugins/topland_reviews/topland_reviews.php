<?php
/*
Plugin Name: TopLand Отзывы
Description: Отзывы на сайте topland.ru
Version: 1.0
*/

global $wpdb;

if ( ! defined( 'ABSPATH' ) ) exit;

/**************
 * Константы
 **************/
define( 'TOPLAND_REVIEWS_PLUGIN_DB_VERSION', '1.1' );
define( 'TOPLAND_REVIEWS_PLUGIN_NAME',       'topland_reviews' );
define( 'TOPLAND_REVIEWS_PLUGIN_NAME_RU',    'Отзывы' );
define( 'TOPLAND_REVIEWS_DB_TABLE_NAME',     $wpdb->prefix . TOPLAND_REVIEWS_PLUGIN_NAME );
define( 'TOPLAND_REVIEWS_PLUGIN_DIR',        plugin_dir_path( __FILE__ ) );
define( 'TOPLAND_REVIEWS_PLUGIN_ADMIN_URL',  admin_url('?page=' . TOPLAND_REVIEWS_PLUGIN_NAME) );

/**************
 * Class
 **************/
require_once dirname(__FILE__) . '/inc/class-main.php';
require_once dirname(__FILE__) . '/inc/class-model.php';
$topland_main_class = new ToplandReviews( __FILE__ );

/**************
 * Run
 **************/

// Правила активации:
// register_activation_hook() должен вызываться из основного файла плагина, из того где расположена директива Plugin Name
register_activation_hook(__FILE__, array($topland_main_class, 'activate'));
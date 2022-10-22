<?php
/*
Plugin Name: TopLand Яндекс карта
Plugin URI: https://topland-rnd.ru
Description: Плагин - Добавление Яндекс.Карты из Конструктора карт
Version: 1.0
Author: Николенко Димитрий
*/

global $wpdb;

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'TOPLAND_YMAP_PLUGIN_DB_VERSION', '1.0' );
define( 'TOPLAND_YMAP_PLUGIN_NAME',       'topland_ymap' );
define( 'TOPLAND_YMAP_PLUGIN_NAME_RU',    'Яндек.Карта' );
define( 'TOPLAND_YMAP_DB_TABLE_NAME',     $wpdb->prefix . TOPLAND_YMAP_PLUGIN_NAME );
define( 'TOPLAND_YMAP_PLUGIN_DIR',        plugin_dir_path( __FILE__ ) );
define( 'TOPLAND_YMAP_PLUGIN_ADMIN_URL',  admin_url('?page=' . TOPLAND_YMAP_PLUGIN_NAME) );

require_once dirname(__FILE__) . '/inc/class-main.php';
require_once dirname(__FILE__) . '/inc/class-model.php';
$topland_ymap_main_class = new ToplandYmap( __FILE__ );

register_activation_hook(__FILE__, array($topland_ymap_main_class, 'activate'));
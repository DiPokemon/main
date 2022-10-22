<?php
/*
Plugin Name: Управление
Plugin URI: http://raxee.ru
Description: Плагин - менеджмент для сайта handball161rus.ru
Version: 1.0
Author: Творческое объединение веб разработчиков raxee.ru
Author URI: http://raxee.ru
*/

global $wpdb;

if ( ! defined( 'ABSPATH' ) ) exit;



/**************
 * Константы
 **************/
define( 'UFKS_MANAGEMENT_PLUGIN_DB_VERSION', '1.0' );
define( 'UFKS_MANAGEMENT_PLUGIN_NAME',     'ufks_management' );
define( 'UFKS_MANAGEMENT_PLUGIN_NAME_RU',  'Управление' );
define( 'UFKS_MANAGEMENT_DB_TABLE_NAME',    $wpdb->prefix . UFKS_MANAGEMENT_PLUGIN_NAME );
define( 'UFKS_MANAGEMENT_PLUGIN_DIR',       plugin_dir_path( __FILE__ ) );
define( 'UFKS_MANAGEMENT_PLUGIN_ADMIN_URL', admin_url('?page=' . UFKS_MANAGEMENT_PLUGIN_NAME) );



/**************
 * Class
 **************/
require_once dirname(__FILE__) . '/inc/class-main.php';
require_once dirname(__FILE__) . '/inc/class-model.php';
$ufks_main_class = new UfksManagement( __FILE__ );



/**************
 * Run
 **************/

// Правила активации:
// register_activation_hook() должен вызываться из основного файла плагина, из того где расположена директива Plugin Name
register_activation_hook(__FILE__, array($ufks_main_class, 'activate'));
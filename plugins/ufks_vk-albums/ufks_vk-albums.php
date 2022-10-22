<?php
/*
Plugin Name: Фотоальбомы ВКонтакте
Plugin URI: http://raxee.ru
Description: Плагин - синхронизация с фотоальбомом vk.com для сайта handball161rus.ru
Version: 1.0
Author: Творческое объединение веб разработчиков raxee.ru
Author URI: http://raxee.ru
*/

global $wpdb;

if ( ! defined( 'ABSPATH' ) ) exit;

/**************
 * Константы
 **************/
define( 'UFKS_VKALBUMS_PLUGIN_DB_VERSION', '1.0' );
define( 'UFKS_VKALBUMS_PLUGIN_NAME',       'ufks_sportsfacilities' );
define( 'UFKS_VKALBUMS_PLUGIN_NAME_RU',    'Фотоальбомы ВКонтакте' );
define( 'UFKS_VKALBUMS_DB_TABLE_NAME',     $wpdb->prefix . UFKS_VKALBUMS_PLUGIN_NAME );
define( 'UFKS_VKALBUMS_PLUGIN_DIR',        plugin_dir_path( __FILE__ ) );
define( 'UFKS_VKALBUMS_PLUGIN_ADMIN_URL',  admin_url('?page=' . UFKS_VKALBUMS_PLUGIN_NAME) );

# Сервисный ключ доступа к API VK
define( 'UFKS_VKALBUMS_VK_API_ACCESS_TOKEN', 'c0c35ba9c0c35ba9c0732d592bc099a0f0cc0c3c0c35ba9982216ec98f125efd3f2c00b');
define( 'UFKS_VKALBUMS_VK_API_VERSION', '5.130');


/**************
 * Class
 **************/
require_once dirname(__FILE__) . '/inc/class-main.php';
require_once dirname(__FILE__) . '/inc/class-model.php';
$ufks_main_class = new UfksVKAlbums( __FILE__ );



/**************
 * Run
 **************/
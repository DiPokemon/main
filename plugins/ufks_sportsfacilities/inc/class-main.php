<?php
class UfksSportsFacilities {

private static $plugin_url;
protected static $plugin_basename;

protected static $file;
protected static $model;

/**
 * Run
 */
public function __construct( $file ){

	// Vars
	self::$plugin_url = plugins_url( '/', $file );
	self::$plugin_basename = plugin_basename( $file );
	self::$file = $file;

	// Model
	self::$model = new UfksSportsFacilitiesModel();

	// Подключаем в админке
	if (is_admin()) {
		// Hooks
		add_action('admin_menu', array(__CLASS__, 'register_plugin_button_in_admin_menu'));

		// Подключаем в админке текущего плагина
		if (self::is_this_plugin_admin_page()) {
		  	// Handlers (add, edit, delete)
			$this->routing_handlers();
		}
	}

	// Shortcodes
    add_shortcode('handball161rus_sportsfacilities', array(__CLASS__, 'replace_shortcode') );
}



/**
 * Активация плагина
 */
function activate(){
	// Добавить таблицу в БД при активации плагина
	// Источник: https://wp-kama.ru/function/register_activation_hook
	global $wpdb;

	if ($wpdb->get_var("SHOW TABLES LIKE '" . UFKS_SPORTSFACILITIES_DB_TABLE_NAME . "'") != UFKS_SPORTSFACILITIES_DB_TABLE_NAME)
	{
		$sql = "CREATE TABLE " . UFKS_SPORTSFACILITIES_DB_TABLE_NAME . " (
			id int(11) NOT NULL AUTO_INCREMENT,
			title tinytext NULL,
			address tinytext NULL,
			phone tinytext NULL,
			lat double(16, 6) NOT NULL,
			lng double(16, 6) NOT NULL,
			UNIQUE KEY id (id)
		);";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		// dbDelta содержится в ABSPATH . 'wp-admin/includes/upgrade.php'
		// Назначение dbDelta: создание и обновление таблицы
      	dbDelta($sql);

      	// Добавить в таблицу options инфу о версии таблицы бд
      	add_option(UFKS_SPORTSFACILITIES_PLUGIN_NAME . "_db_version", UFKS_SPORTSFACILITIES_PLUGIN_DB_VERSION);
	}
}



/**
 * Добавить кнопку в меню админки
 */
static function register_plugin_button_in_admin_menu(){
	// Источник 1: https://wp-kama.ru/function/add_menu_page
	// Источник 2: https://truemisha.ru/blog/wordpress/administration-menus.html
	add_menu_page(
		UFKS_SPORTSFACILITIES_PLUGIN_NAME_RU, 							// содержимое <title>
		UFKS_SPORTSFACILITIES_PLUGIN_NAME_RU,							// название пункта в меню
		'manage_options',												// уровень доступа (взял из примера)
		UFKS_SPORTSFACILITIES_PLUGIN_NAME,								// URL страницы с плагином
		array(__CLASS__, 'render_admin_page'), 							// функция, генерирующая страницу
		plugins_url( UFKS_SPORTSFACILITIES_PLUGIN_NAME . '/static/images/admin_menu_button.png' ) // адрес иконки
	);
}



/**
 * Генерация админской страницы
 */
static function render_admin_page(){
	if (is_admin()) {
		if ( (isset($_GET['page'])) && ($_GET['page'] == UFKS_SPORTSFACILITIES_PLUGIN_NAME) ) {
			switch ((isset($_GET['view']) ? $_GET['view'] : '')) {
				case 'add':
				    include dirname(self::$file) . '/views/form.php';
				    break;

				case 'edit':
					if (isset($_GET['data_id'])) {
						self::$model->get( $_GET['data_id'] );
						include dirname(self::$file) . '/views/form.php';
					}
				    break;

				default:
				    include dirname(self::$file) . '/views/index.php';
			}
		}
	}
}



/**
 * Обработчик событий (add, edit, delete)
 */
function routing_handlers(){
	if (is_admin()) {
		if ( (isset($_GET['page'])) && ($_GET['page'] == UFKS_SPORTSFACILITIES_PLUGIN_NAME) ) {
			// Начальные данные
			$id = null;
			$title = null;
			$address = null;
			$phone  = null;
			$lat    = null;
			$lng 	= null;

			// Обработка $_POST и $_GET
			if (isset($_GET['data_id']))
				$id = $_GET['data_id'];

			if (isset($_POST['data_id']))
				$id = $_POST['data_id'];

			if (isset($_POST['data_title']))
				$title = $_POST['data_title'];

			if (isset($_POST['data_address']))
				$address = $_POST['data_address'];

			if (isset($_POST['data_phone']))
				$phone = $_POST['data_phone'];

			if (isset($_POST['data_lat']))
				$lat = $_POST['data_lat'];

			if (isset($_POST['data_lng']))
				$lng = $_POST['data_lng'];

			// Понять какое событие и выполнить его
			switch ((isset($_GET['action']) ? $_GET['action'] : '')) {
			case 'add':
				self::$model->title   = $title;
				self::$model->address = $address;
				self::$model->phone   = $phone;
				self::$model->lat     = $lat;
				self::$model->lng     = $lng;
				self::$model->save();
				print('<script>window.location = "' . UFKS_SPORTSFACILITIES_PLUGIN_NAME . '"</script>');
				break;
			case 'edit':
				self::$model->get( $id );
				self::$model->title   = $title;
				self::$model->address = $address;
				self::$model->phone   = $phone;
				self::$model->lat     = $lat;
				self::$model->lng     = $lng;
				self::$model->save();
				print('<script>window.location = "' . UFKS_SPORTSFACILITIES_PLUGIN_NAME . '"</script>');
				break;
			case 'delete':
				self::$model->delete( $id );
				print('<script>window.location = "' . UFKS_SPORTSFACILITIES_PLUGIN_NAME . '"</script>');
				break;
			}

		}
	}
}

/**
 * Заменить шорткод
 */
static function replace_shortcode() {
	include dirname(self::$file) . '/views/replace_shortcode.php';
}



/**
 * Вспомогательная функция: пользователь в панели управления и в текущем плагине?
 */
static function is_this_plugin_admin_page() {
	return is_admin() && ((isset($_GET['page'])) && ($_GET['page'] == UFKS_SPORTSFACILITIES_PLUGIN_NAME));
}

}

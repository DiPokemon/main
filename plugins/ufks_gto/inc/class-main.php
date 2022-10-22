<?php
class UfksGto {

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
	self::$model = new UfksGtoModel();

	// Hooks
	add_action('admin_menu', array(__CLASS__, 'register_plugin_button_in_admin_menu'));
	add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueue_static'));

	// Подключаем в админке текущего плагина
	if (self::is_this_plugin_admin_page()) {
		// Hooks
		add_action('admin_footer', array(__CLASS__, 'media_selector_print_scripts'));
	}

	// Filters
	// add_filter('mce_external_plugins', array(__CLASS__, 'enqueue_plugin_scripts'));
	// add_filter("mce_buttons", array(__CLASS__, 'register_buttons_editor'));

	// Ajax
	// подключаем AJAX обработчики, только когда в этом есть смысл
	// if( defined('DOING_AJAX') && DOING_AJAX ){
	// 	// wp_ajax_(action_name)
	// 	add_action('wp_ajax_list_for_tiny_mce', array(__CLASS__, 'ajax_list_for_tiny_mce_callback'));
	// }

	// Shortcodes
    add_shortcode('handball161rus_gto', array(__CLASS__, 'list_for_frontend') );

	// Handlers (add, edit, delete)
	$this->routing_handlers();
}



/**
 * Активация плагина
 */
function activate(){
	// Добавить таблицу в БД при активации плагина
	// Источник: https://wp-kama.ru/function/register_activation_hook
	global $wpdb;

    if ($wpdb->get_var("SHOW TABLES LIKE '" . UFKS_GTO_DB_TABLE_NAME . "'") != UFKS_GTO_DB_TABLE_NAME)
    {
        $sql = "CREATE TABLE " . UFKS_GTO_DB_TABLE_NAME . " (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			attachment_id mediumint(9) NOT NULL,
			UNIQUE KEY id (id)
		);";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        // dbDelta содержится в ABSPATH . 'wp-admin/includes/upgrade.php'
        // Назначение dbDelta: создание и обновление таблицы
        dbDelta($sql);

        // Добавить в таблицу options инфу о версии таблицы бд
        add_option(UFKS_GTO_PLUGIN_NAME . "_db_version", UFKS_GTO_PLUGIN_DB_VERSION);
    }
}



/**
 * Добавить кнопку в меню админки
 */
static function register_plugin_button_in_admin_menu(){
	// Источник 1: https://wp-kama.ru/function/add_menu_page
	// Источник 2: https://truemisha.ru/blog/wordpress/administration-menus.html
	add_menu_page(
		UFKS_GTO_PLUGIN_NAME_RU, 								// содержимое <title>
		UFKS_GTO_PLUGIN_NAME_RU,								// название пункта в меню
		'manage_options',										// уровень доступа (взял из примера)
		UFKS_GTO_PLUGIN_NAME,									// URL страницы с плагином
		array(__CLASS__, 'render_admin_page'), 					// функция, генерирующая страницу
		plugins_url( UFKS_GTO_PLUGIN_NAME . '/static/images/admin_menu_button.png' ) // адрес иконки
	);
}

/**
 * Генерация админской страницы
 */
static function render_admin_page(){
	if (is_admin()) {
		if ( (isset($_GET['page'])) && ($_GET['page'] == UFKS_GTO_PLUGIN_NAME) ) {
			include dirname(self::$file) . '/views/index.php';
		}
	}
}



/**
 * Обработчик событий (add, edit, delete)
 */
function routing_handlers(){
	if (is_admin()) {
        if ( (isset($_GET['page'])) && ($_GET['page'] == UFKS_GTO_PLUGIN_NAME) ) {
            // Начальные данные
            $id = null;
            $attachment_id = null;


            // Обработка $_POST и $_GET
            if (isset($_GET['data_id']))
                $id = $_GET['data_id'];

            if (isset($_POST['data_id']))
                $id = $_POST['data_id'];

            if (isset($_POST['data_attachment_id']))
                $attachment_id = $_POST['data_attachment_id'];

            // Понять какое событие и выполнить его
            switch ((isset($_GET['action']) ? $_GET['action'] : '')) {
                case 'add':
                    self::$model->attachment_id = $attachment_id;
                    self::$model->save();
                    print('<script>window.location = "' . UFKS_GTO_PLUGIN_ADMIN_URL . '"</script>');
                    break;
                case 'delete':
                    self::$model->delete( $id );
                    print('<script>window.location = "' . UFKS_GTO_PLUGIN_ADMIN_URL . '"</script>');
                    break;
            }
        }
	}
}



static function enqueue_static() {
	wp_enqueue_style(UFKS_GTO_PLUGIN_NAME . '_style', plugins_url( UFKS_GTO_PLUGIN_NAME . '/static/css/style.css' ));
}



/**
 * TinyMCE
 */
// Подключить скрипты
static function enqueue_plugin_scripts($plugin_array) {
    // Enqueue TinyMCE plugin script with its ID.
    $plugin_array["gto_button_plugin"] = plugins_url( UFKS_GTO_PLUGIN_NAME . '/static/js/modify_tiny_mce.js' );
    return $plugin_array;
}
// Добавить user кнопку в TinyMCE
static function register_buttons_editor($buttons) {
    // Источник: http://qnimate.com/adding-buttons-to-wordpress-visual-editor/

    // Register buttons with their id.
    array_push($buttons, "gto_tinymce_button");
    return $buttons;
}



/**
 * Окно для прикрепления медиа файлов
 */
static function media_selector_print_scripts() {
    $my_saved_attachment_post_id = get_option( UFKS_GTO_PLUGIN_NAME.'media_selector_attachment_id', 0 );
    ?><script>
        // if (window.location.search === '?page=<?= UFKS_GTO_PLUGIN_NAME ?>') {
            jQuery(function ($) {
                var uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Выберите документ',
                    multiple: false,
                });

                uploader.on('select', function () {
                    var attachment = uploader.state().get('selection').first().toJSON();
                    $('#data_attachment_id').val(attachment.id);
                    $('#upload-form').submit();
                });

                $('.upload-button').click(function (event) {
                    event.preventDefault();
                    uploader.open();
                });
            });
        // }
    </script><?php
}



/**
 * Not-ajax callback
 */
static function list_for_frontend() {
	include dirname(self::$file) . '/views/list_for_tinymce.php';
}



/**
 * Ajax callback
 */
static function ajax_list_for_tiny_mce_callback() {
	// источник: https://wp-kama.ru/id_2018/ajax-v-wordpress.html#ajax-v-admin-paneli-wordpress

	include dirname(self::$file) . '/views/list_for_tinymce.php';

	wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
}



/**
 * Вспомогательная функция: пользователь в панели управления и в текущем плагине?
 */
static function is_this_plugin_admin_page() {
	return is_admin() && ((isset($_GET['page'])) && ($_GET['page'] == UFKS_GTO_PLUGIN_NAME));
}

}

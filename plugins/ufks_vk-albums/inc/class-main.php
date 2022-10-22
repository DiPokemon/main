<?php
class UfksVKAlbums {

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
	self::$model = new UfksVkAlbumModel();

	// Подключаем на клиенте 
	if (!is_admin()) {
		// Hooks
		// add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueue_static'));

		// Shortcodes
    	add_shortcode('handball161rus_vk_albums', array(__CLASS__, 'replace_shortcode') );
	}

	// Вызов функций для создания виртуальной страницы WordPress
	add_action( 'init', 		 array(__CLASS__, 'virtualpage_init_internal') );
	add_filter( 'query_vars', 	 array(__CLASS__, 'virtualpage_query_vars') );
	add_action( 'parse_request', array(__CLASS__, 'virtualpage_parse_request') );
}



/**
 * Статика
 */
static function enqueue_static() {
	wp_enqueue_style(UFKS_VKALBUMS_PLUGIN_NAME . '_style', plugins_url( UFKS_VKALBUMS_PLUGIN_NAME . '/static/css/style.css' ));
}



/**
 * Замена shortcode
 */
static function replace_shortcode() {
	include dirname(self::$file) . '/views/replace_shortcode.php';
}



//
// Функции для создания виртуальной страницы WordPress
// http://wordpress.stackexchange.com/questions/9870/how-do-you-create-a-virtual-page-in-wordpress
//

static function virtualpage_init_internal(){ // create_new_url_querystring
	// Правило перезаписи
	add_rewrite_rule( '^photo-album-detail/([^/]*)/?', 'index.php?photo-album-detail=$matches[1]', 'top' );
	flush_rewrite_rules();
}

static function virtualpage_query_vars( $query_vars ){
	$query_vars[] = 'photo-album-detail';
	return $query_vars;
}

static function virtualpage_parse_request( &$wp ){
    // return;
    if ( array_key_exists( 'photo-album-detail', $wp->query_vars ) ) {
    	include dirname(self::$file) . '/views/frontend-detail.php';
    	exit();
    }
}

}

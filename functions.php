<?php
// Удаляем category из УРЛа категорий (лучше No Category Base (WPML))
// add_filter('category_link', create_function('$a', 'return str_replace("category/", "", $a);'), 9999);

//Разрешить HTML теги в описаниях категорийgi
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
	}
	foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
	}

// function remove_block_library_css()
// {
// 	wp_dequeue_style( 'wp-block-library' );
// }
// 	add_action( 'wp_enqueue_scripts', 'remove_block_library_css' );

//включаем поддержку кастомного лога из настроек
add_theme_support( 'custom-logo' );

/* Load Styles */
function topland_load_styles()
{
  //wp_enqueue_style('style-zero', get_template_directory_uri().'/static/css/style-zero-min.css');
  wp_enqueue_style('new-style', get_template_directory_uri().'/static/css/new_style.css');
  //wp_enqueue_style('style-adaptive', get_template_directory_uri().'/static/css/style-adaptive-min.css');
  wp_enqueue_style('slick', get_template_directory_uri().'/static/js/slick/slick.css');
  wp_enqueue_style('slick-theme', get_template_directory_uri().'/static/js/slick/slick-theme.css');
  //wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('fontawesome', get_template_directory_uri().'/static/css/fontawesome.all.css');
  //wp_enqueue_style('newyear', get_template_directory_uri().'/static/newyear/style.css');
}; 
add_action('wp_enqueue_scripts', 'topland_load_styles', 10);

/* Load Scripts */
function topland_load_scripts()
{
  
  wp_enqueue_script('script', get_template_directory_uri() . '/static/js/script.js', array(), NULL, true);
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.1.min.js');
  wp_enqueue_script( 'jquery' , array(), NULL, true);
  wp_enqueue_script('slick', get_template_directory_uri() . '/static/js/slick/slick.min.js', array('jquery'), NULL, true);
  wp_enqueue_script('init_main_slider', get_template_directory_uri().'/static/js/init_main_slider.js', array('slick'), NULL, true);
  wp_enqueue_script('loadmore', get_template_directory_uri().'/static/js/loadmore.js', array(), NULL, true);
  wp_enqueue_script('maskedinput', get_template_directory_uri().'/static/js/maskedinput.js', array('jquery'), NULL, true);
  //wp_enqueue_script('newyear_js', get_template_directory_uri().'/static/newyear/script.js', array(), NULL, true);
//   wp_enqueue_script('loadmore', get_template_directory_uri().'/static/js/loadmore.js', array(), NULL, true);
} 
add_action('wp_enqueue_scripts', 'topland_load_scripts', 10);

//инициализация слайдера только на главной
// function init_slider_script() {
//   if ( is_page_template('index.php') ) {
//     wp_enqueue_script( 'init_main_slider', get_template_directory_uri().'/static/js/init_main_slider.js', array( 'jquery' ), false, true );
//   }
// }
// add_action( 'template_redirect', 'init_slider_script' );

// загрузка SVG в медиабиблиотеку
add_filter( 'upload_mimes', 'svg_upload_allow' );
# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}
	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){
		// разрешим
		if( current_user_can('manage_options') ){
			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}
	}
	return $data;
}
add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );
# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library( $response ) {
	if ( $response['mime'] === 'image/svg+xml' ) {
		// С выводом названия файла
		$response['image'] = [
			'src' => $response['url'],
		];
	}
	return $response;
}
// конец загрузки SVG в медиабиблиотеку

// Добавить поддержку миниатюр
add_theme_support('post-thumbnails');

// set_post_thumbnail_size(150, 150, false);

// Зарегистрировать меню 
register_nav_menus([
    'main_menu' => 'Main menu',
    'footer_menu' => 'Footer menu'
]);

//добавление класса к li в меню
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

//добавление класса к <a> в меню
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

// добавление класса к логотипу
add_filter( 'get_custom_logo', 'change_logo_class' );
function change_logo_class( $html ) {
       $html = str_replace( 'custom-logo-link', 'header__logo_img', $html );
    return $html;
};

// Вывод анонса с заданным количеством слов
add_filter( 'excerpt_length', function($length) {
    return 10;
} );

// function new_excerpt_length($length) {
//   return 10;
// }
// add_filter('excerpt_length', 'new_excerpt_length');

// Удаление конструкции [...] в конце
add_filter('excerpt_more', function($more) {
    return '...';
});

function single_category($single) {
    foreach ((array) get_the_category() as $category) {
        $slugPath = TEMPLATEPATH . '/single-category-' . $category->slug . '.php';
        $termIDPath = TEMPLATEPATH . '/single-category-' . $category->term_id . '.php';

        if (file_exists($slugPath)) return $slugPath;
        elseif (file_exists($termIDPath)) return $termIDPath;
    } 
    return $single;
}
add_filter('single_template', 'single_category');

// Переопределить шаблон для wp pagination
// CHECK: admin
add_filter('navigation_markup_template', 'theme_navigation_template', 10, 2 );
function theme_navigation_template( $template, $class ) {
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    // %3$s содержит ссылки на страницы
    return '
    <nav class="navigation %1$s" role="navigation">
        <div class="nav-links">%3$s</div>
    </nav>
    ';
}

// Добавляем url pagination в category-news.php
// Источник: http://stackoverflow.com/questions/21195780/adding-an-offset-to-a-category-loop-in-wordpress
add_action( 'pre_get_posts', 'theme_pre_get_posts' );
function theme_pre_get_posts( $query ) {
    if ( ! $query->is_main_query() || $query->is_admin() )
        return false; 

    if ( $query->is_category('news') ) {
        $query->set( 'category_name', 'news' );
        $query->set( 'posts_per_page', 1 ); // TODO: убрать этот костыль (без него url pagination не работает)
    }
    return $query;
}

// Добавить новые типы для медиа-файлов
// add_filter('upload_mimes', 'custom_upload_mimes');
// function custom_upload_mimes( $existing_mimes = [] ) {
//     // EXAMPLE: $existing_mimes['extension'] = 'mime/type';
//     // Mime types: https://paulund.co.uk/change-wordpress-upload-mime-types

//     // PDF
//     $existing_mimes['pdf']  = 'application/pdf';

//     // MS Word
//     $existing_mimes['doc']  = 'application/msword';
//     $existing_mimes['docx'] = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
//     $existing_mimes['dotx'] = 'application/vnd.openxmlformats-officedocument.wordprocessingml.template';

//     // MS Excel
//     $existing_mimes['xlam'] = 'application/vnd.ms-excel.addin.macroEnabled.12';
//     $existing_mimes['xls']  = 'application/vnd.ms-excel';
//     $existing_mimes['xlsb'] = 'application/vnd.ms-excel.sheet.binary.macroEnabled.12';
//     $existing_mimes['xlsx'] = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
//     $existing_mimes['xltx'] = 'application/vnd.openxmlformats-officedocument.spreadsheetml.template';

//     // MS Power Point
//     $existing_mimes['potx'] = 'application/vnd.openxmlformats-officedocument.presentationml.template';
//     $existing_mimes['ppsx'] = 'application/vnd.openxmlformats-officedocument.presentationml.slideshow';
//     $existing_mimes['pptx'] = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
     
//     return $existing_mimes;
// }

//LOAD MORE BTN
function load_more() {
  $ajaxposts = new WP_Query([
    'post_type'      => 'post', 
    'post_status'    => 'publish', 
    'posts_per_page' => 3, 
	'cat'            => 23,
    'paged' 		 => $_POST['paged'],
  ]);
  $response = '';
  if($ajaxposts->have_posts()) {
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $response .= get_template_part('template_parts/blog-item');
    endwhile;
  } else {
    $response = '';
  }
  echo $response;
  exit;
}
add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');

/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2019.03.03
 * лицензия: MIT
*/
function topland_breadcrumbs() {
	/* === ОПЦИИ === */
	$text['home']     = 'Главная'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search']   = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag']      = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author']   = 'Статьи автора %s'; // текст для страницы автора
	$text['404']      = 'Ошибка 404'; // текст для страницы 404
	$text['page']     = 'Страница %s'; // текст 'Страница N'
	$text['cpage']    = 'Страница комментариев %s'; // текст 'Страница комментариев N'
	$wrap_before    = '<div class="page-header__breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
	$wrap_after     = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
	$sep            = '<span class="breadcrumbs__separator"> / </span>'; // разделитель между "крошками"
	$before         = '<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"
	$after          = '</span>'; // тег после текущей "крошки"
	$show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
	/* === КОНЕЦ ОПЦИЙ === */
	global $post;
	$home_url       = home_url('/');
	$link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	$link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
	$link          .= '<meta itemprop="position" content="%3$s" />';
	$link          .= '</span>';
	$parent_id      = ( $post ) ? $post->post_parent : '';
	$home_link      = sprintf( $link, $home_url, $text['home'], 1 );

	if ( is_home() || is_front_page() ) {
		if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;
	} else {
		$position = 0;
		echo $wrap_before;
		if ( $show_home_link ) {
			$position += 1;
			echo $home_link;
		}
		if ( is_category() ) {
			$parents = get_ancestors( get_query_var('cat'), 'category' );
			foreach ( array_reverse( $parents ) as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$cat = get_query_var('cat');
				echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}
		} elseif ( is_search() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $show_home_link ) echo $sep;
				echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_current ) {
					if ( $position >= 1 ) echo $sep;
					echo $before . sprintf( $text['search'], get_search_query() ) . $after;
				} elseif ( $show_last_sep ) echo $sep;
			}
		} elseif ( is_year() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_time('Y') . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;
		} elseif ( is_month() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_day() ) {
			if ( $show_home_link ) echo $sep;
			$position += 1;
			echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
			$position += 1;
			echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
			if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_single() && ! is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$position += 1;
				$post_type = get_post_type_object( get_post_type() );
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
				if ( $show_current ) echo $sep . $before . get_the_title() . $after;
				elseif ( $show_last_sep ) echo $sep;
			} else {
				$cat = get_the_category(); $catID = $cat[0]->cat_ID;
				$parents = get_ancestors( $catID, 'category' );
				$parents = array_reverse( $parents );
				$parents[] = $catID;
				foreach ( $parents as $cat ) {
					$position += 1;
					if ( $position > 1 ) echo $sep;
					echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
				}
				if ( get_query_var( 'cpage' ) ) {
					$position += 1;
					echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
					echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
				} else {
					if ( $show_current ) echo $sep . $before . get_the_title() . $after;
					elseif ( $show_last_sep ) echo $sep;
				}
			}
		} elseif ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_post_type() );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . $post_type->label . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}
		} elseif ( is_attachment() ) {
			$parent = get_post( $parent_id );
			$cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
			$parents = get_ancestors( $catID, 'category' );
			$parents = array_reverse( $parents );
			$parents[] = $catID;
			foreach ( $parents as $cat ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
			}
			$position += 1;
			echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_page() && ! $parent_id ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . get_the_title() . $after;
			elseif ( $show_home_link && $show_last_sep ) echo $sep;
		} elseif ( is_page() && $parent_id ) {
			$parents = get_post_ancestors( get_the_ID() );
			foreach ( array_reverse( $parents ) as $pageID ) {
				$position += 1;
				if ( $position > 1 ) echo $sep;
				echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
			}
			if ( $show_current ) echo $sep . $before . get_the_title() . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( is_tag() ) {
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				$tagID = get_query_var( 'tag_id' );
				echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}
		} elseif ( is_author() ) {
			$author = get_userdata( get_query_var( 'author' ) );
			if ( get_query_var( 'paged' ) ) {
				$position += 1;
				echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
				echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
			} else {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
				elseif ( $show_home_link && $show_last_sep ) echo $sep;
			}
		} elseif ( is_404() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			if ( $show_current ) echo $before . $text['404'] . $after;
			elseif ( $show_last_sep ) echo $sep;
		} elseif ( has_post_format() && ! is_singular() ) {
			if ( $show_home_link && $show_current ) echo $sep;
			echo get_post_format_string( get_post_format() );
		}
		echo $wrap_after;
	}
} 

// подключаем функцию активации мета блока (service_price)
// add_action('add_meta_boxes', 'topland_service_price', 1);

// function topland_service_price() {
// 	add_meta_box( 'service_price', 'Цена услуги', 'service_price_box_func', 'post', 'normal', 'high'  );
// }


// код блока
function service_price_box_func( $post ){
	?>
	<p style="display:flex;">
		<label><input placeholder="Нижняя цена" type="number" min="0" name="price[low_price]" value="<?php echo get_post_meta($post->ID, 'low_price', 1); ?>" /></label>
		<!-- <label><input placeholder="Верхняя цена" type="number" min="0" name="price[high_price]" value="<?php echo get_post_meta($post->ID, 'high_price', 1); ?>" /></label> -->
	</p>
	<input type="hidden" name="service_price_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<?php
}

// включаем обновление полей при сохранении
add_action( 'save_post', 'topland_service_price_update', 0 );

## Сохраняем данные, при сохранении поста
function topland_service_price_update( $post_id ){
	// базовая проверка
	if (
		   empty( $_POST['price'] )
		|| ! wp_verify_nonce( $_POST['service_price_nonce'], __FILE__ )
		|| wp_is_post_autosave( $post_id )
		|| wp_is_post_revision( $post_id )
	)
		return false;

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['price'] = array_map( 'sanitize_text_field', $_POST['price'] ); // чистим все данные от пробелов по краям
	foreach( $_POST['price'] as $key => $value ){
		if( empty($value) ){
			delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
			continue;
		}
		update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
	}
	return $post_id;
}

add_action('wp_footer', 'wpmidia_activate_masked_input');
	function wpmidia_activate_masked_input(){
?>
<script type="text/javascript">
	jQuery( function($){
	$(".tel").mask("+7 999 999-9999");
	});
</script>
<?php
}
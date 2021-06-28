<?php
function PR($var, $all = false, $die = false) {
	$bt = debug_backtrace();
	$bt = $bt[0];
	$dRoot = $_SERVER["DOCUMENT_ROOT"];
	$dRoot = str_replace("/", "\\", $dRoot);
	$bt["file"] = str_replace($dRoot, "", $bt["file"]);
	$dRoot = str_replace("\\", "/", $dRoot);
	$bt["file"] = str_replace($dRoot, "", $bt["file"]);
	?>
		<div style='position:absolute;font-size:9pt; color:#000; background:#fff; border:1px dashed #000;z-index: 999999'>
		<div style='padding:3px 5px; background:#99CCFF; font-weight:bold;'>File: <?=$bt["file"]?> [<?=$bt["line"]?>]</div>
		<pre style='padding:10px;'><?print_r($var)?></pre>
		</div>
		<?
	if ($die) {
		die;
	}
}
// внешние ссылки в новом окне
function autoblank($text) {
    $return = str_replace('href=', 'target="_blank" href=', $text);
    $return = str_replace('target="_blank" href="/', 'href="/', $return);
    $return = str_replace('target="_blank" href="#', 'href="#', $return);
    $return = str_replace(' target = "_blank">', '>', $return);
    return $return;
}
add_filter('the_content', 'autoblank');
add_filter('comment_text', 'autoblank');
/**
 * vladgzeta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vladgzeta
 */

if ( ! function_exists( 'vladgzeta_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vladgzeta_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on vladgzeta, use a find and replace
	 * to change 'vladgzeta' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vladgzeta', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-top' => esc_html__( 'Верхнее меню', 'vladgzeta' ),
       ) );

	register_nav_menus( array(
		'menu-side' => esc_html__( 'Боковое меню', 'vladgzeta' ),
       ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
       ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vladgzeta_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
       ) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'vladgzeta_setup' );
// архив газет
function my_custom_post_type_archive_where($where,$args){  
    $post_type  = isset($args['post_type'])  ? $args['post_type']  : 'post';  
    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
    return $where;  
}
add_filter( 'getarchives_where','my_custom_post_type_archive_where',10,2);
	// Кастомный логотип
add_theme_support( 'custom-logo' );
	//Уберает лишние теги
	remove_filter( 'the_content', 'wpautop' );// для контента
	remove_filter( 'the_excerpt', 'wpautop' );// для анонсов
	remove_filter( 'comment_text', 'wpautop' );// для комментарий
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vladgzeta_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'vladgzeta_content_width', 640 );
}
add_action( 'after_setup_theme', 'vladgzeta_content_width', 0 );
//pagination
function wp_corenavi() {
    global $wp_query, $wp_rewrite;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size'] = 5; //сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
    $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

    if ($max > 1) echo '<li>';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</li>';
}
//исключение рубрики с главной
function exclude_cat($query) {
    if ($query->is_home){$query->set('cat','-22');} // id категории
    return $query; 
}
add_filter('pre_get_posts','exclude_cat');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vladgzeta_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vladgzeta' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vladgzeta' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3><span>',
		'after_title'   => '</span></h3></div>',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Sidebar2', 'vladgzeta' ),
    'id'            => 'sidebar-2',
    'description'   => esc_html__( 'Add widgets here.', 'vladgzeta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title"><h3><span>',
    'after_title'   => '</span></h3></div>',
    ) );

    register_sidebar( array(
      'name'          => esc_html__( 'top-bar', 'vladgzeta' ),
      'id'            => 'top-bar',
      'description'   => esc_html__( 'Add widgets here.', 'vladgzeta' ),
      'before_widget' => '<div id="%1$s" class="col-md-2">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="">', 
      'after_title'   => '</div>',
      ) );
    register_sidebar( array(
      'name'          => esc_html__( 'spec-v', 'vladgzeta' ),
      'id'            => 'spec-v',
      'description'   => esc_html__( 'Add widgets here.', 'vladgzeta' ),
      'before_widget' => '<div id="spec-v">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="">', 
      'after_title'   => '</div>',
      ) );
    register_sidebar( array(
      'name'          => esc_html__( 'language', 'vladgzeta' ),
      'id'            => 'language',
      'description'   => esc_html__( 'Add widgets here.', 'vladgzeta' ),
      'before_widget' => '<div id="language">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="">', 
      'after_title'   => '</div>',
      ) );

    register_sidebar( array(
      'name'          => esc_html__( 'header', 'vladgzeta' ),
      'id'            => 'header',
      'description'   => esc_html__( 'Add widgets here.', 'vladgzeta' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s col-sm-6">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="">', 
      'after_title'   => '</div>',
      ) );
    register_sidebar( array(
        'name'          => esc_html__( 'archive-g', 'vladgzeta' ),
        'id'            => 'archive-g',
        'description'   => esc_html__( 'Add widgets here.', 'vladgzeta' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
        ) );
    register_sidebar( array(
        'name'          => esc_html__( 'footer', 'vladgzeta' ),
        'id'            => 'footer',
        'description'   => esc_html__( 'Add widgets here.', 'vladgzeta' ),
        'before_widget' => '<div id="%1$s" class="col-12 col-sm-12 col-xl-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="footer-widget"><h4>',
        'after_title'   => '</h4></div>',
        ) );
}
add_action( 'widgets_init', 'vladgzeta_widgets_init' );
//php code for widget
function mayak_widget_php($widget_content) {
    if (strpos($widget_content, '<' . '?') !== false) {
        ob_start();
        eval('?' . '>' . $widget_content);
        $widget_content = ob_get_contents();
        ob_end_clean();
    }
    return $widget_content;
}
add_filter('widget_text', 'mayak_widget_php', 99);
/**
 * Enqueue scripts and styles.
 */
function vladgzeta_scripts() {
	wp_enqueue_style( 'vladgzeta-style', get_stylesheet_uri() );

	wp_enqueue_style( 'vladgzeta-bootstrap.min', get_template_directory_uri() . '/css/main.min.css');

    wp_enqueue_script( 'vladgzeta-app', get_template_directory_uri() . '/js/app.min.js');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vladgzeta_scripts' );

## Добавляет миниатюры записи в таблицу записей в админке
add_action('init', 'add_post_thumbs_in_post_list_table', 20 );
function add_post_thumbs_in_post_list_table(){
    // проверим какие записи поддерживают миниатюры
    $supports = get_theme_support('post-thumbnails');

    // $ptype_names = array('post','page'); // указывает типы для которых нужна колонка отдельно

    // Определяем типы записей автоматически
    if( ! isset($ptype_names) ){
        if( $supports === true ){
            $ptype_names = get_post_types(array( 'public'=>true ), 'names');
            $ptype_names = array_diff( $ptype_names, array('attachment') );
        }
        // для отдельных типов записей
        elseif( is_array($supports) ){
            $ptype_names = $supports[0];
        }
    }

    // добавляем фильтры для всех найденных типов записей
    foreach( $ptype_names as $ptype ){
        add_filter( "manage_{$ptype}_posts_columns", 'add_thumb_column' );
        add_action( "manage_{$ptype}_posts_custom_column", 'add_thumb_value', 10, 2 );
    }
}

// добавим колонку
function add_thumb_column( $columns ){
    // подправим ширину колонки через css
    add_action('admin_notices', function(){
        echo '
        <style>
            .column-thumbnail{ width:80px; text-align:center; }
        </style>';
    });

    $num = 1; // после какой по счету колонки вставлять новые

    $new_columns = array( 'thumbnail' => __('Thumbnail') );

    return array_slice( $columns, 0, $num ) + $new_columns + array_slice( $columns, $num );
}

// заполним колонку
function add_thumb_value( $colname, $post_id ){
    if( 'thumbnail' == $colname ){
        $width  = $height = 45;

        // миниатюра
        if( $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true ) ){
            $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
        }
            // из галереи...
            elseif( $attachments = get_children( array(
                'post_parent'    => $post_id,
                'post_mime_type' => 'image',
                'post_type'      => 'attachment',
                'numberposts'    => 1,
                'order'          => 'DESC',
                ) ) ){
                $attach = array_shift( $attachments );
            $thumb = wp_get_attachment_image( $attach->ID, array($width, $height), true );
        }

        echo empty($thumb) ? ' ' : $thumb;
    }
}

// ПОДГРУЗКА ПРИ ПРОКРУТКЕ
function true_load_posts(){
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';
    $q = new WP_Query($args);
    if( $q->have_posts() ):
        while($q->have_posts()): $q->the_post(); 
    ?>
    <a class="article-item" href="<?php the_permalink(); ?>">
        <div class="article-item-photo" style='background-image: url(<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0]; ?>)'></div>
        <div class="article-item-content">
            <div class="article-item-head">
                <span class="article-item-cat"><?php $cat = get_the_category(); echo $cat[0]->name; ?></span>
                <span class="article-item-date"><?php the_time('j.m.Y в H:i') ?></span>
            </div>
            <h4 class="article-item-title"><?//php title_limit(30, '...'); ?><?php the_title(); ?></h4>
            <div class="article-item-text">
                <p class="short_an"><? the_excerpt(); ?></p>
            </div>
        </div>
    </a>
    <?php
    endwhile; endif;
    wp_reset_postdata();
    die();
}
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts'); 
/*
*Функция для пункта меню в админеке
*/
add_action( 'init', 'register_gazet_post_type' );
function register_gazet_post_type() {
    // Раздел фильма - gazetcat
    register_taxonomy('gazetcat', array('widget-title'), array(
        'label'                 => 'Раздел Газеты', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Разделы Газет',
            'singular_name'     => 'Раздел Газет',
            'search_items'      => 'Искать Раздел Газеты',
            'all_items'         => 'Все Разделы Газет',
            'parent_item'       => 'Родит. раздел Газеты',
            'parent_item_colon' => 'Родит. раздел Газеты:',
            'edit_item'         => 'Ред. Раздел Газеты',
            'update_item'       => 'Обновить Раздел Газеты',
            'add_new_item'      => 'Добавить Раздел Газеты',
            'new_item_name'     => 'Новый Раздел Газеты',
            'menu_name'         => 'Раздел Газеты',
            ),
        'description'           => 'Рубрики для раздела Газеты', // описание таксономии
        'public'                => true,
        'show_in_nav_menus'     => false, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'rewrite'               => array('slug'=>'gazet-page', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
        'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        ) );
    // Раздел фильма - gazettag
    // тип записи - фильмы - gazet
    register_post_type('gazet', array(
        'label'               => 'Газеты',
        'labels'              => array(
            'name'          => 'Газеты',
            'singular_name' => 'Газета',
            'menu_name'     => 'Архив Газет',
            'all_items'     => 'Все Газеты',
            'add_new'       => 'Добавить Газету',
            'add_new_item'  => 'Добавить новый Газету',
            'edit'          => 'Редактировать',
            'edit_item'     => 'Редактировать Газету',
            'new_item'      => 'Новый Газета',
            ),
        'description'         => '',
        'public'              => true,
        'menu_position'       => 4,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => false,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug'=>'gazet-page/%gazetcat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => 'gazet',
        'query_var'           => true,
        'supports'            => array( 'title', 'editor' ),
        'taxonomies'          => array( 'gazettag', 'gazetcat' ),
        'supports'                      => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' ),
        ) );

}


## Отфильтруем ЧПУ произвольного типа
// фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
add_filter('post_type_link', 'gazet_permalink', 1, 2);
function gazet_permalink( $permalink, $post ){
    // выходим если это не наш тип записи: без холдера %products%
    if( strpos($permalink, '%gazetcat%') === false )
        return $permalink;

    // Получаем элементы таксы
    $terms = get_the_terms($post, 'gazetcat');
    // если есть элемент заменим холдер
    if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) )
        $term_slug = array_pop($terms)->slug;
    // элемента нет, а должен быть...
    else
        $term_slug = 'no-gazetcat';

    return str_replace('%gazetcat%', $term_slug, $permalink );
}
// Популярные посты
function setPostViews( $postID ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count ++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function getPostViews( $postID ) {
    $count_key = 'post_views_count';
    $count     = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );

        return "0";
    }

    return $count;
}

/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function rd_duplicate_post_as_draft(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
        wp_die('No post to duplicate has been supplied!');
    }

    /*
     * Nonce verification
     */
    if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
        return;

    /*
     * get the original post id
     */
    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    /*
     * and all the original post data then
     */
    $post = get_post( $post_id );

    /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    /*
     * if post data exists, create the post duplicate
     */
    if (isset( $post ) && $post != null) {

        /*
         * new post data array
         */
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title,
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
            );

        /*
         * insert the post by wp_insert_post() function
         */
        $new_post_id = wp_insert_post( $args );

        /*
         * get all current post terms ad set them to the new post draft
         */
        $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        /*
         * duplicate all post meta just in two SQL queries
         */
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos)!=0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if( $meta_key == '_wp_old_slug' ) continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query.= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }


        /*
         * finally, redirect to the edit post screen for the new draft
         */
        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );

/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Копировать</a>';
    }
    return $actions;
}
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

function show_thumbnails_list(){
    global $post;
    $image = get_post_meta($post->ID, '_link', true);
    $image = explode(",", $image);
    echo '<div class="more-img">';
    foreach ($image as $images) {
        $url = wp_get_attachment_image_src($images, 1, 1)[0];
        if(!stripos($url, '/media/default.png'))
            echo '<a class="more-img-item" style="background-image: url('.$url.')" href="'.$url.'" data-lightbox="roadtrip"></a>';
    }
    echo '</div>';
}
// upload pdf
add_action("admin_init", "pdf_init");
add_action('save_post', 'save_pdf_link');
function pdf_init(){
        add_meta_box("my-pdf", "PDF Document", "pdf_link", "gazet", "normal", "low");
        }
function pdf_link(){
        global $post;
        $custom  = get_post_custom($post->ID);
        $link    = $custom["link"][0];
        $count   = 0;
        echo '<div class="link_header">';
        $query_pdf_args = array(
                'post_type' => 'attachment',
                'post_mime_type' =>'application/pdf',
                'post_status' => 'inherit',
                'posts_per_page' => -1,
                );
        $query_pdf = new WP_Query( $query_pdf_args );
        $pdf = array();
        echo '<select name="link">';
        echo '<option class="pdf_select">SELECT pdf FILE</option>';
        foreach ( $query_pdf->posts as $file) {
           if($link == $pdf[]= $file->guid){
              echo '<option value="'.$pdf[]= $file->guid.'" selected="true">'.$pdf[]= $file->guid.'</option>';
                 }else{
              echo '<option value="'.$pdf[]= $file->guid.'">'.$pdf[]= $file->guid.'</option>';
                 }
                $count++;
        }
        echo '</select><br /></div>';
        echo '<p>Selecting a pdf file from the above list to attach to this post.</p>';
        echo '<div class="pdf_count"><span>Files:</span> <b>'.$count.'</b></div>';
}
function save_pdf_link(){
        global $post;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){ return $post->ID; }
        update_post_meta($post->ID, "link", $_POST["link"]);
}
function pdf_file_url(){
        global $post;
        $custom = get_post_custom($wp_query->post->ID);
        echo $custom['link'][0];
}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 *	Кастомный тип записи Баннеры
 */
require get_template_directory() . '/inc/banner.php';


/**
 *	Кастомный виджет
 */
require get_template_directory() . '/inc/customWidget.php';


//ограничить количество символов в заголовке
function title_limit($count, $after) {
    $title = get_the_title();
    if (mb_strlen($title) & $count) $title = mb_substr($title,0,$count);
    else $after = '';
    echo $title . $after;
}
//ограничить количество символов в превю
// function new_excerpt_length($length) {
//   return 15;
// }
// add_filter('excerpt_length', 'new_excerpt_length');

// add_filter('excerpt_more', 'new_excerpt_more');
// function new_excerpt_more($more) {
//     global $post;
//     return '<br><a href="'. get_permalink($post->ID) . '"> Подробнее...</a>';
// }
// Исключить категорию
function exclude_category($query) {
    if ( $query->is_home ) {
        $query->set('category__not_in', array(15, 1, 10));
    }
    return $query;
}
add_filter('pre_get_posts', 'exclude_category');



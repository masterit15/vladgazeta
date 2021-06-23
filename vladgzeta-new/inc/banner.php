<?php
/**
 * vladgzeta Theme banner fields
 *
 * @package vladgzeta
 */

/**
 * Add postMessage support for site title and description for the Theme banner fields.
 *
 * @param WP_Customize_Manager $wp_customize Theme banner fields object.
 */
// require get_template_directory() . '/vendor/autoload.php';
// use ColorThief\ColorThief;
// Добавляем кастомный тип записи Продукты
$post_types = get_post_types();
add_action( 'init', 'register_banner_post_type' );
function register_banner_post_type() {
    // Раздел фильма - gazetcat
    register_taxonomy('bannercat', array('banner-title'), array(
        'label'                 => 'Раздел Баннеры', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Разделы Баннеров',
            'singular_name'     => 'Раздел Баннеров',
            'search_items'      => 'Искать Раздел Баннеров',
            'all_items'         => 'Все Разделы Баннеров',
            'parent_item'       => 'Родит. раздел Баннера',
            'parent_item_colon' => 'Родит. раздел Баннера:',
            'edit_item'         => 'Ред. Раздел Баннера',
            'update_item'       => 'Обновить Раздел Баннеров',
            'add_new_item'      => 'Добавить Раздел Баннеров',
            'new_item_name'     => 'Новый Раздел Баннера',
            'menu_name'         => 'Раздел Баннера',
            ),
        'description'           => 'Рубрики для раздела Баннеров', // описание таксономии
        'public'                => true,
        'show_in_nav_menus'     => false, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'rewrite'               => array('slug'=>'banner-page', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
        'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        ) );
    // Раздел фильма - gazettag
    // тип записи - фильмы - gazet
    register_post_type('banner', array(
        'label'               => 'Баннеры',
        'labels'              => array(
            'name'          => 'Баннеры',
            'singular_name' => 'Баннер',
            'menu_name'     => 'Архив Баннеров',
            'all_items'     => 'Все Баннеры',
            'add_new'       => 'Добавить Баннер',
            'add_new_item'  => 'Добавить новуые Баннеры',
            'edit'          => 'Редактировать',
            'edit_item'     => 'Редактировать Баннер',
            'new_item'      => 'Новый Баннер',
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
        'rewrite'             => array( 'slug'=>'banner-page/%bannercat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => 'banner',
        'query_var'           => true,
        'supports'            => array( 'title', 'editor' ),
        'taxonomies'          => array( 'bannertag', 'bannercat' ),
        'supports'                      => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' ),
        ) );

}

//Дополнительные поля продукта
add_action("admin_init", "banner_field_init");
add_action('save_post', 'save_banner_field');
function banner_field_init() {
	foreach ($post_types as $post_type) {
		add_meta_box("banner_field", "Дополнительные поля", "banner_field", 'banner', "normal", "low");
	}
}
if($post_types == 'post'){
  function admin_style() {
    wp_enqueue_style('spectrum-styles', get_template_directory_uri().'/libs/spectrum/spectrum.min.css');
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
  }
  add_action('admin_enqueue_scripts', 'admin_style');
  function admin_js() {
    wp_enqueue_script( 'jquery-script', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' );
    wp_enqueue_script( 'spectrum-script', get_template_directory_uri() . '/libs/spectrum/spectrum.min.js' );
    wp_enqueue_script( 'admin-script', get_template_directory_uri() . '/admin.js' );
    
  }
  add_action('admin_enqueue_scripts', 'admin_js');
}
//Дополнительные поля продукта html
function banner_field() {
	global $post;
	$custom = get_post_custom($post->ID);
	?>
  <div class="banner_fields">
    <?if (isset($custom['banner_bgcolor'])) {?>
      <div class="group">
        <label for="">Цвет фона</label>
        <input class="banner_bgcolor" name="bgcolor" value="<?=$custom['banner_bgcolor'][0]?>">
      </div>
    <?} else {?>
      <div class="group">
        <label for="">Цвет фона</label>
        <input class="banner_bgcolor" name="bgcolor" value="#ffffff" placeholder="Цвет фона">
      </div>
    <?}?>
    <?if (isset($custom['banner_titlecolor'])) {?>
      <div class="group">
        <label for="">Цвет заголовка</label>
        <input class="banner_titlecolor" name="titlecolor" value="<?=$custom['banner_titlecolor'][0]?>">
      </div>
    <?} else {?>
      <div class="group">
        <label for="">Цвет заголовка</label>
        <input class="banner_titlecolor" name="titlecolor" value="#ffffff">
      </div>
    <?}?>
    <?if (isset($custom['banner_time'])) {?>
      <div class="group">
        <label for="">Время баннера (в секундах)</label>
        <input class="banner_time" name="time" type="number" value="<?=$custom['banner_time'][0]?>">
      </div>
    <?} else {?>
      <div class="group">
        <label for="">Время баннера (в секундах)</label>
        <input class="banner_time" name="time" type="number" value="1">
      </div>
    <?}?>
		<script>
			// $('.banner_fields_price').mask('000.000.000.000.000.00', {reverse: true});
      $('.banner_bgcolor').spectrum({
        type: "component"
      });
      $('.banner_titlecolor').spectrum({
        type: "component"
      });
		</script>
  </div>
<?
}
// Функция сохранения полей продукта "Цена" и "Тираж"
function save_banner_field() {
	global $post;
	if ($post) {
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return $post->ID;}
		update_post_meta($post->ID, "banner_bgcolor", $_POST["bgcolor"]);
		update_post_meta($post->ID, "banner_titlecolor", $_POST["titlecolor"]);
		update_post_meta($post->ID, "banner_time", $_POST["time"]);
		// update_post_meta($post->ID, "banner_embossing_price", $_POST["embossingprice"]);
	}
}
// Добавляем js  для редактирования полей продукта
add_action('admin_head-post.php', 'banner_js');
add_action('admin_head-post-new.php', 'banner_js');
function banner_js() {?>
  <script type="text/javascript">
      jQuery(document).ready(function($){
        $('.banner_fields_price').on('input',function() {
          console.log($(this).val())
        });
        $('.banner_fields_edition').on('input',function() {
          console.log($(this).val())
        });
      });
  </script>
<?php }

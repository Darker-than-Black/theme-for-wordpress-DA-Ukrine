<?php 
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний

function da_scripts() {
	wp_enqueue_style( 'style-name1', get_template_directory_uri() . '/css/css/bootstrap.min.css');
	/*wp_enqueue_style( 'style-name2', get_template_directory_uri() . '/css/fonts.css');*/
	wp_enqueue_style( 'style-name2', get_template_directory_uri() . '/css/header.css');
	wp_enqueue_style( 'style-name5', get_template_directory_uri() . '/css/footer.css');
	wp_enqueue_style( 'style-name3', get_template_directory_uri() . '/css/menu.css');
	wp_enqueue_style( 'style-name9', get_template_directory_uri() . '/css/news.css');
	wp_enqueue_style( 'style-name4', get_template_directory_uri() . '/css/scrollbar.css');
	wp_enqueue_style( 'style-name6', get_template_directory_uri() . '/css/mobile.css');
	wp_enqueue_style( 'style-name7', get_template_directory_uri() . '/css/tag.css');
	wp_enqueue_style( 'style-name8', get_template_directory_uri() . '/css/search.css');
	wp_enqueue_style( 'style-name10', get_template_directory_uri() . '/css/404.css');
	

	wp_enqueue_style( 'style-css?14x', get_stylesheet_uri() );

	wp_enqueue_script( 'script-name1', get_template_directory_uri() . '/js/jquery-3.3.1.min.js?1');
	wp_enqueue_script( 'script-name2', get_template_directory_uri() . '/js/bootstrap.min.js');
	/*wp_enqueue_script( 'script-name3', get_template_directory_uri() . '/js/ajax.js');*/
	if(is_home( 'index.php')){
		wp_enqueue_script( 'script-name4', get_template_directory_uri() . '/loadmore.js');
	}
	
};

add_action( 'wp_enqueue_scripts', 'da_scripts' );
add_theme_support( 'post-thumbnails' ); // для всех типов постов
show_admin_bar( false );
register_nav_menus(array(
	'top'    => 'Верхнее меню',
	'bottom' => 'Нижнее меню'
));

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
function my_wp_nav_menu_args( $args='' ){
	$args['container'] = '';
	return $args;
};


function true_load_posts(){
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';
	// обычно лучше использовать WP_Query, но не здесь
	query_posts( $args );
	// если посты есть
	if( have_posts() ) :
		// запускаем цикл
		while( have_posts() ): the_post();
			get_template_part( 'post', get_post_format() );
		endwhile;
	endif;
	die();
} 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

?>
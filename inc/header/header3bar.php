<?php

/*###############################
Register 3 sidebars for header.php
*/


class wpbss_header_3_bar
{

	function __construct()
	{
		add_action( $tag = 'widgets_init', $function_to_add = array($this, 'wpbss_widgets_h3_init'), 20 );
		add_filter( $tag = 'wpbss_header_types', $function_to_add = array($this, 'wpbss_header_types_cb'), $priority = 10, $accepted_args = 1 );
		add_action( $tag = 'header_add_section', $function_to_add = array($this, 'header_add_tmpl_3widgets'), $priority = 20 );
		add_action( $tag = 'wpbss-header-widgets-1', $function_to_add = array($this,'wpbss_header_widgets_1_callback') );

	}

	//Загрузка шаблона с 3мя виджетами для шапки
	function header_add_tmpl_3widgets(){
		if(get_theme_mod('header_type') != '3p') return;
		get_template_part( 'inc/template-parts/header', '3widgets' );

	}


	/**
	 * Add block for header if no widgets 1
	 */
	function wpbss_header_widgets_1_callback(){
	    if ( get_theme_mod('logo')) : ?>
	        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	            <img src="<?php echo get_theme_mod('logo'); ?>"  class="img-responsive" alt="" />
	        </a>
	    <?php else: // End header image check. ?>
	       <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	       <strong class="site-description"><?php bloginfo( 'description' ); ?></strong>
	    <?php endif; // End header image check.
	}


	//Добавляем тип шапки в опции темы
	function wpbss_header_types_cb($header_types){
		$header_types = array_merge($header_types, array('3p' => '3 панели'));
		return $header_types;
	}


	//Регистрация трех виджетов
	function wpbss_widgets_h3_init() {

		if(get_theme_mod( $name = 'header_type' ) != '3p') return; //Если тип шапки не 3 панели, то пропуск

		register_sidebar(array(
			'name' => __('Header 1'),
			'id' => 'header-widgets-1',
			'description' => __('Header Widgets 1'),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => __('Header 2'),
			'id' => 'header-widgets-2',
			'description' => __('Header Widgets 2'),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => __('Header 3'),
			'id' => 'header-widgets-3',
			'description' => __('Header Widgets 3'),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
	}
}

$the_wpbss_header_3_bar = new wpbss_header_3_bar;

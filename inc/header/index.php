<?php

/**
 * Implement the Custom Header feature.
 */
 require 'header3bar.php';
 require 'top-bar.php';
 require 'menu-fullwidth.php';

 //на удаление
//require 'custom-header.php';


class wpbss_header
{

  function __construct()
  {
    add_action( 'customize_register', array($this, 'add_panel') );
    add_action( 'customize_register', array($this, 'add_section_header_type'));
    add_action( $tag = 'header_add_section', $function_to_add = array($this, 'load_simple_header_template'), $priority = 10 );
  }


  //Загрузка меню по умолчанию
  function load_simple_header_template(){
    if(get_theme_mod('header_type') != 'simple') return;

    get_template_part( 'inc/template-parts/header' );

  }

  //Add panel for settings bottom site
  function add_panel($wp_customize){

    $wp_customize->add_panel(
      'header_site',
      array(
        'title' => __( 'Шапка' ),
        'description' => __('Параметры верхней части сайта'), // Include html tags such as <p>.
        'priority' => 90, // Mixed with top-level-section hierarchy.
      )
    );

  }

  function add_section_header_type($wp_customize){
    //Новая секция
    $wp_customize->add_section(
      'section_header_settings',
        array(
          'title'     => 'Настройки шапки',
          'panel'     => 'header_site',
          'priority'  => 100,
        )
      );

    //Опция включения
    $wp_customize->add_setting(
      'header_type',
      array(
          'default' => 'simple',
          'capability' => 'edit_theme_options',
      )
    );

    $header_types = apply_filters('wpbss_header_types', array('simple' => "Простая"));

    $wp_customize->add_control(
      'header_type',
      array(
        'section' => 'section_header_settings', // Required, core or custom.
        'label' => __( 'Выбрать шаблон шапки сайта' ),
        'type'     => 'radio', // радио-кнопки
  			'choices'  => $header_types,
      )
    );

  }


}
$the_wpbss_header = new wpbss_header;




class wpbss_header_simple {
  function __construct() {

  }






} $the_wpbss_header_simple = new wpbss_header_simple;

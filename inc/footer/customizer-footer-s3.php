<?php

class footer_section_3_class {
  function __construct() {
    add_action( 'customize_register', array($this, 'wpbss_customizer'));
    add_action( 'footer_section_add', array($this,'footer_add_section'));
    add_action( 'after_switch_theme', array($this,'set_default_mod_wpbss'));
    add_action( 'wpbss-footer-widgets-1', array($this, 'wpbss_footer_widgets_1_callback' ));

    add_action( 'wp_head', array($this, 'print_style' )); // вешаем на wp_head

    add_action( 'widgets_init', array($this, 'wpbss_register_sidebar'), 20 );


  }



  /*###############################
  Sidebars for footer section 3
  */
  function wpbss_register_sidebar(){

    //Если секция отключена, то возврат
    if(! get_theme_mod( 'footer_section_3_enable')) return;

    		register_sidebar(array(
    			'name' => __('Footer S3P1'),
    			'id' => 'footer-s3-p1',
    			'before_widget' => '',
    			'after_widget' => '',
    			'before_title' => '<h3>',
    			'after_title' => '</h3>',
    		));
    		register_sidebar(array(
    			'name' => __('Footer S3P2'),
    			'id' => 'footer-s3-p2',
    			'before_widget' => '',
    			'after_widget' => '',
    			'before_title' => '<h3>',
    			'after_title' => '</h3>',
    		));

  }




  //Запускаем установку параметров темы по умолчанию при активации темы
  function set_default_mod_wpbss() {

    //проверяем есть ли настройка и если нет то назначаем
    if(! get_theme_mod( 'footer_section_3_enable' )){
      set_theme_mod( 'footer_section_3_enable', false);
    }
  }

  //Add CSS option on customizer
  function wpbss_customizer($wp_customize){

      //Новая секция
      $wp_customize->add_section(
    		'footer_section_3',
      		array(
      			'title'     => 'Секция 3',
            'panel'     => 'footer_site',
      			'priority'  => 300,
      			'description' => 'Параметры 3 секции подвала'
          )
        );

      //Опция включения
      $wp_customize->add_setting(
        'footer_section_3_enable',
        array(
            'default' => true,
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
        'footer_section_3_enable_control',
        array(
          'type' => 'checkbox',
          'priority' => 10, // Within the section.
          'section' => 'footer_section_3', // Required, core or custom.
          'label' => __( 'Включить секцию' ),
          'settings'     => 'footer_section_3_enable'

        )
      );

      //Цвет фона
      $wp_customize->add_setting(
        'footer_section_3_bg_color',
        array(
            'default' => get_theme_mod( 'default_color' ),
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              'footer_section_3_bg_color_control',
              array(
                  'section'  => 'footer_section_3',
                  'label'    => 'Основной цвет',
                  'settings'     => 'footer_section_3_bg_color'
              )
          )
      );

      //Цвет текста
      $wp_customize->add_setting(
        'footer_section_3_color',
        array(
            'default' => get_theme_mod( 'default_color_text' ),
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              'footer_section_3_color_control',
              array(
                  'section'  => 'footer_section_3',
                  'label'    => 'Основной цвет элементов',
                  'settings'     => 'footer_section_3_color'
              )
          )
      );

  }

  //Вывод стилей для данной секции подвала
  function print_style() {
    //Если отключена секция, то возврат
		if(! get_theme_mod( 'footer_section_3_enable')) return;

    ?>
      <style id="wpbss-style-footer-s3" type="text/css">
        #footer-s3 {
          padding: 10px;
          background-color: <?php echo get_theme_mod( 'footer_section_3_bg_color' ); ?>;
          color: <?php echo get_theme_mod( 'footer_section_3_color' ); ?>;
        }
      </style>
    <?php
  }

	function footer_add_section(){

    //Если отключена секция, то возврат
		if(! get_theme_mod( 'footer_section_3_enable')) return;

    get_template_part( 'inc/template-parts/footer', 's3' );

	}


} $the_footer_section_3_class = new footer_section_3_class;

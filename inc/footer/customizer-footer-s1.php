<?php

class footer_section_1_class {
  function __construct() {
    add_action( 'customize_register', array($this, 'wpbss_customizer'));
    add_action( 'footer_section_add', array($this,'footer_add_section_1'));
    add_action( 'wp_head', array($this, 'print_style'));
    add_action( 'widgets_init', array($this, 'wpbss_register_sidebar'), 20 );
    add_action( 'after_switch_theme', array($this,'set_default_mod_wpbss'));


  }


  //Запускаем установку параметров темы по умолчанию при активации темы
  function set_default_mod_wpbss() {

    //проверяем есть ли настройка и если нет то назначаем
    if(! get_theme_mod( 'footer_section_1_bg_color' )){
      set_theme_mod( 'footer_section_1_bg_color', get_theme_mod('first_color_bg'));
    }

    if(! get_theme_mod( 'footer_section_1_color' )){
      set_theme_mod( 'footer_section_1_color', get_theme_mod('first_color'));

    }
  }


  /*###############################
  Sidebars register
  */
  function wpbss_register_sidebar(){

    //Если секция отключена, то возврат
    if(! get_theme_mod( 'footer_section_1_enable')) return;

    register_sidebar(array(
    	'name' => __('Footer S1'),
    	'id' => 'footer-s1',
    	'before_widget' => '',
    	'after_widget' => '',
    	'before_title' => '<h3>',
    	'after_title' => '</h3>',
    ));

  }



  //Add CSS option on customizer
  function wpbss_customizer($wp_customize){



      //Новая секция
      $wp_customize->add_section(
    		'footer_section_1',
      		array(
      			'title'     => 'Секция 1',
            'panel'     => 'footer_site',
      			'priority'  => 100,
      			'description' => 'Параметры 1 секции подвала'
          )
        );

      //Опция включения
      $wp_customize->add_setting(
        'footer_section_1_enable',
        array(
            'default' => false,
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
        'footer_section_1_enable_control',
        array(
          'type' => 'checkbox',
          'priority' => 10, // Within the section.
          'section' => 'footer_section_1', // Required, core or custom.
          'label' => __( 'Включить секцию' ),
          'settings'     => 'footer_section_1_enable'

        )
      );

      //Цвет фона
      $wp_customize->add_setting(
        'footer_section_1_bg_color',
        array(
            'default' => get_theme_mod( 'default_color' ),
            'capability' => 'edit_theme_options',
        )
      );
      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              'footer_section_1_bg_color_control',
              array(
                  'section'  => 'footer_section_1',
                  'label'    => 'Основной цвет',
                  'settings'     => 'footer_section_1_bg_color'
              )
          )
      );

      //Цвет текста
      $wp_customize->add_setting(
        'footer_section_1_color',
        array(
            'default' => get_theme_mod( 'default_color_text' ),
            'capability' => 'edit_theme_options',
        )
      );

      $wp_customize->add_control(
     		new WP_Customize_Color_Control(
              $wp_customize,
              'footer_section_1_color_control',
              array(
                  'section'  => 'footer_section_1',
                  'label'    => 'Основной цвет элементов',
                  'settings'     => 'footer_section_1_color'
              )
          )
      );

  }

  //Вывод стилей для перовй секции подвала
  function print_style() {

    //Если секция отключена, то возврат
    if(! get_theme_mod( 'footer_section_1_enable')) return;

      ?>
      <style id="wpbss-style-footer-s1" type="text/css">

        #footer-s1 {
            background-color: <?php echo get_theme_mod( 'footer_section_1_bg_color' ); ?>;
            color: <?php echo get_theme_mod( 'footer_section_1_color' ); ?>;
        }

        #footer-s1 a {
          color: <?php echo get_theme_mod( 'footer_section_1_color' ) ?>;
        }

      </style>

      <?php

      ?>

      <?php
  }

  function footer_add_section_1(){

    if(get_theme_mod( 'footer_section_1_enable')):
      ?>
        <div id="footer-s1">
          <div class="container">
            <?php
                if ( ! dynamic_sidebar( 'footer-s1' ) ) :
                    do_action( 'wpbss-footer-s1' );
                endif; // end sidebar widget area
            ?>
          </div><!-- .container -->
        </div>
      <?php
    endif;
  }


} $the_footer_section_1_class = new footer_section_1_class;

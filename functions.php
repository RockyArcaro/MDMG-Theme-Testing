<?php

function theme_enqueue_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('menu-js', get_template_directory_uri() . '/js/menu.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

function register_theme_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'your-theme-textdomain'),
    ));
}
add_action('after_setup_theme', 'register_theme_menus');



//////// Home Page Highlight Code /////////

function mdmg_customize_register($wp_customize) {
    // Banner section
    $wp_customize->add_section('mdmg_banner_section', array(
      'title'    => __('Homepage Banner', 'mdmg'),
      'priority' => 30,
    ));
  
    // Background Image
    $wp_customize->add_setting('mdmg_banner_bg');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mdmg_banner_bg', array(
      'label'    => __('Background Image', 'mdmg'),
      'section'  => 'mdmg_banner_section',
      'settings' => 'mdmg_banner_bg',
    )));
  
    // Title
    $wp_customize->add_setting('mdmg_banner_title', array('default' => 'Your Banner Title'));
    $wp_customize->add_control('mdmg_banner_title', array(
      'label'    => __('Banner Title', 'mdmg'),
      'section'  => 'mdmg_banner_section',
      'type'     => 'text',
    ));
    
    $wp_customize->add_section('mdmg_banner_section', array(
      'title'       => __('Homepage Highlight Banner', 'mdmg'),
      'priority'    => 30,
    ));
  
    // Banner Date Setting
    $wp_customize->add_setting('mdmg_banner_date', array(
      'default'           => '',
      'sanitize_callback' => 'sanitize_text_field',
    ));
  
    $wp_customize->add_control('mdmg_banner_date', array(
      'label'    => __('Highlight Date', 'mdmg'),
      'section'  => 'mdmg_banner_section',
      'settings' => 'mdmg_banner_date',
      'type'     => 'text',
    ));
    // Description
    $wp_customize->add_setting('mdmg_banner_desc', array('default' => 'This is your banner description.'));
    $wp_customize->add_control('mdmg_banner_desc', array(
      'label'    => __('Banner Description', 'mdmg'),
      'section'  => 'mdmg_banner_section',
      'type'     => 'textarea',
    ));
  
    // Link/Button
    $wp_customize->add_setting('mdmg_banner_link', array('default' => '#'));
    $wp_customize->add_control('mdmg_banner_link', array(
      'label'    => __('Banner Link URL', 'mdmg'),
      'section'  => 'mdmg_banner_section',
      'type'     => 'url',
    ));
  
    $wp_customize->add_setting('mdmg_banner_button_text', array('default' => 'Learn More'));
    $wp_customize->add_control('mdmg_banner_button_text', array(
      'label'    => __('Button Text', 'mdmg'),
      'section'  => 'mdmg_banner_section',
      'type'     => 'text',
    ));
  }
  add_action('customize_register', 'mdmg_customize_register');



  ///// Artist Page Code //////
  add_theme_support('post-thumbnails');

  function mdmg_register_artist_post_type() {
    register_post_type('artist', array(
      'labels' => array(
          'name' => 'Artists',
          'singular_name' => 'Artist',
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'artists'),
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-microphone',
      'supports' => array('title', 'editor', 'thumbnail'), // <- important!
  ));
}
add_action('init', 'mdmg_register_artist_post_type');


////// Store Code ///////

function create_store_item_post_type() {
  register_post_type('store_item',
      array(
          'labels' => array(
              'name' => __('Store Items'),
              'singular_name' => __('Store Item')
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'store'),
          'show_in_rest' => true,
          'supports' => array('title', 'thumbnail', 'editor'),
      )
  );
}
add_action('init', 'create_store_item_post_type');



//////// More Stories Scroller ///////////

add_action('wp_enqueue_scripts', function(){
  wp_add_inline_script(
    'main-style', // replace with the handle you used in wp_enqueue_script()
    <<<'JS'
document.addEventListener('DOMContentLoaded', function(){
  const wrapper = document.querySelector('.more-stories .stories-wrapper');
  const prevBtn = document.querySelector('.more-stories .stories-nav.prev');
  const nextBtn = document.querySelector('.more-stories .stories-nav.next');
  if (!wrapper || !prevBtn || !nextBtn) return;

  // grab one card and the gap
  const card  = wrapper.querySelector('.card');
  const style = getComputedStyle(wrapper);
  const gap   = parseFloat(style.getPropertyValue('gap')) || 0;
  const width = card.getBoundingClientRect().width;
  const scrollAmount = Math.round(width + gap);

  prevBtn.addEventListener('click', () => {
    wrapper.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
  });
  nextBtn.addEventListener('click', () => {
    wrapper.scrollBy({ left:  scrollAmount, behavior: 'smooth' });
  });
});
JS
  );
});
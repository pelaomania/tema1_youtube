<?php

function register_navwalker(){
	require_once get_template_directory() . '/template-parts/navbar.php';
}

add_action( 'after_setup_theme', 'register_navwalker' );

function tema1_agregar_css_javascript(){

    wp_enqueue_style('style', get_stylesheet_uri() );
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',
    array ( 'jquery' ), '1.14', true);
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array ( 'popper' ), '4.3', true);
    wp_enqueue_script('app-js',  get_template_directory_uri() . '/js/app.js', array ( 'bootstrap-js' ), '1.0', true);

   
}
add_action( 'wp_enqueue_scripts', 'tema1_agregar_css_javascript' );

function tema1_agregar_setup(){
    // Soporte para imágenes destacadas
    if ( function_exists( 'add_theme_support' ) ) {
        add_theme_support( 'post-thumbnails' );
    }

    add_theme_support('title-tag');   
}

add_action( 'after_setup_theme', 'tema1_agregar_setup' );

 //Agregar Widgets al tema 

 function tema1_agregar_widgets(){

    register_sidebar( array(

        'id' => 'widgets-derecha',
        'name' => __( 'Widget Derecha' ),
        'description'   => __( 'Arrastra lo que quieras' ),
        'before_widget' => '<div class="card-body bluu_wi">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4><hr>'

    ));


 }

 add_action('widgets_init','tema1_agregar_widgets');

 // AGREGAR MENUS  al Administrador de wordpress

 function tema1_registrar_menus() {
    register_nav_menus(
      array(
        'menu-principal' => __( 'Menú Cabecera' )
       )
     );
   }
add_action( 'init', 'tema1_registrar_menus' );
  
// Agrega el logo a la administración de wordpress 
function tema1_registrar_logo() {
  $defaults = array(
  'height'      => 150,
  'width'       => 250,
  'flex-height' => false, // <-- setting both flex-height and flex-width to false maintains an aspect ratio
  'flex-width'  => false
  );
  add_theme_support( 'custom-logo', $defaults );
 }
 // call the function in the hook
 add_action( 'after_setup_theme', 'tema1_registrar_logo' );
<?php

/* ----------------------------------------------------- */
/* -----------------    Theme setup    ----------------- */
/* ----------------------------------------------------- */

// fonction qui vérifie si le 'theme cigognedor' exixte déjà avant de l'initialiser
if ( ! function_exists( 'cigognedor_setup' ) ) {

	function cigognedor_setup() {

		// active le titre => important pour le réferencement
		add_theme_support( "title-tag" );

		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );								// abilité le feed rss

		// Enable featured image
		add_theme_support( 'post-thumbnails' );										// déclare le support pour les images de couverture

		// Custom menu areas
		register_nav_menus( array(
			'header' => esc_html__( 'Header', 'cigognedor' ),
		) );

	}

}
add_action( 'after_setup_theme', 'cigognedor_setup' );


/* ----------------------------------------------------- */
/* ----------    Include Styles and script    ---------- */
/* ----------------------------------------------------- */

// fonction qui vérifie si 'cigognedor_styles_scripts' exixte déjà avant de l'initialiser
if ( ! function_exists( 'cigognedor_styles_scripts' ) ) {

	function cigognedor_style_scripts() {

		/* --- SCRIPT --- */
		// wp_enqueue_script('jquery');
		//wp_enqueue_script( 'cigognedor-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true );

		wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', null, null, true );
		wp_enqueue_script('jQuery');

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array( 'jquery' ),'', true );

		// plugin
		wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/plugins/menu.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'animated', get_template_directory_uri() . '/js/plugins/animated.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'viewportChecker', get_template_directory_uri() . '/js/plugins/viewportChecker.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'tarifdeon', get_template_directory_uri() . '/js/plugins/tarifdeon.js', array( 'jquery' ),'', true );

		/* --- STYLE --- */

		// inclus
		wp_enqueue_style( 'style', get_template_directory_uri().'/style.min.css');
	}
}
add_action( 'wp_enqueue_scripts', 'cigognedor_style_scripts' );



/* ---------------------------------------------------- */
/* --------------    Hiden Version WP    -------------- */
/* ---------------------------------------------------- */

//	Securité : Cacher la verion du WordPress utilisé
//  @return {string} $src
//  @filter script_loader_src
//  @filter style_loader_src

function fb_remove_wp_version_strings( $src ) {
	global $wp_version;
	parse_str(parse_url($src, PHP_URL_QUERY), $query);
	if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter( 'script_loader_src', 'fb_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'fb_remove_wp_version_strings' );
/* Hide WP version strings from generator meta tag */
function fb_remove_version() {
	return '';
}
add_filter('the_generator', 'fb_remove_version');



/* ------------------------------------------------------------ */
/* -----    IMPORT CUSTIOM POST TYPE (et leur metabox)    ----- */
/* ------------------------------------------------------------ */

//  Personalisé la page de connection
//require get_template_directory() .'/functions/custom-admin.php';

//	Cacher tel ou tel element du dashboard du back-end
//require get_template_directory() .'/functions/custom-general.php';

// CPT : Intro
//require get_template_directory() .'/functions/custom-intro.php';

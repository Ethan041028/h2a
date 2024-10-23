<?php
/**
 * H2a functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package H2a
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function h2a_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on H2a, use a find and replace
		* to change 'h2a' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'h2a', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'h2a' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'h2a_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'h2a_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function h2a_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'h2a_content_width', 640 );
}
add_action( 'after_setup_theme', 'h2a_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function h2a_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'h2a' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'h2a' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'h2a_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function h2a_scripts() {
	wp_enqueue_style( 'h2a-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'h2a-style', 'rtl', 'replace' );

	wp_enqueue_script( 'h2a-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'h2a_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*------------------header----------------*/


function mon_theme_setup() {
    register_nav_menus(array(
        'main-menu' => 'Menu Principal',
    ));
}
add_action('after_setup_theme', 'mon_theme_setup');


// Enregistrement des styles
function mon_theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');


//-----------------formulaire-----------------//



function get_form() {
    include(locate_template('form.php'));  // Inclure form.php depuis le répertoire du thème
}

function handle_form_submission() {
    if (isset($_POST['submit_form'])) {
        // Sécuriser les données soumises
        $nom = sanitize_text_field($_POST['nom']);
        $prenom = sanitize_text_field($_POST['prenom']);
        $email = sanitize_email($_POST['email']);
        $telephone = sanitize_text_field($_POST['telephone']);
        $message = sanitize_textarea_field($_POST['message']);
        $autorisation = isset($_POST['autorisation']) ? 'Oui' : 'Non';
        $newsletter = isset($_POST['newsletter']) ? 'Oui' : 'Non';

        // Vous pouvez maintenant traiter ces données, les envoyer par e-mail ou les enregistrer
        // Par exemple, envoi par email
        $to = 'votre-email@exemple.com'; // Remplacez par votre adresse e-mail
        $subject = "Nouvelle demande de contact";
        $body = "Nom : $nom\nPrénom : $prenom\nE-mail : $email\nTéléphone : $telephone\nMessage : $message\nAutorisation : $autorisation\nNewsletter : $newsletter";
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        wp_mail($to, $subject, $body, $headers);

        // Message de succès ou redirection
        echo '<div class="form-success">Merci pour votre message. Nous vous répondrons sous peu.</div>';
    }
}
add_action('wp_head', 'handle_form_submission');







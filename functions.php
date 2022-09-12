<?php
/**
 * anahian functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package anahian
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
function anahian_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on anahian, use a find and replace
		* to change 'anahian' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'anahian', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'anahian' ),
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
			'anahian_custom_background_args',
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
add_action( 'after_setup_theme', 'anahian_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function anahian_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'anahian_content_width', 640 );
}
add_action( 'after_setup_theme', 'anahian_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function anahian_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'anahian' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'anahian' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'anahian_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function anahian_scripts() {
	// Google Font
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&amp;display=swap', _S_VERSION, 'all' );
	// Font Awesome CSS 
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), _S_VERSION, 'all' );
	// Elegent Font Icons
	wp_enqueue_style( 'elegant-font-icons', get_template_directory_uri() . '/assets/css/elegant-font-icons.css', array(), _S_VERSION, 'all' );
	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION, 'all' );
	// Style CSS
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION, 'all' );
	wp_enqueue_style( 'anahian-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'anahian-style', 'rtl', 'replace' );

	// Popper JS
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), _S_VERSION, true );
	// Bootstrap JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), _S_VERSION, true );
	// Main JS
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'anahian_scripts' );

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

function wpbeginner_numeric_posts_nav() {
  
    if( is_singular() )
        return;
  
    global $wp_query;
  
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
  
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
  
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
  
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
  
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
  
    echo '<div class="pagination mt--10"><ul class="list-inline">' . "\n";
  
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li><i class="arrow_carrot-2left"></i></li>' . "\n", get_previous_posts_link() );
  
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
  
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
  
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
  
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
  
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
  
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
  
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li><i class="arrow_carrot-2right"></i></li>' . "\n", get_next_posts_link() );
  
    echo '</ul></div>' . "\n";
  
}

function li_new_class($classes, $item, $args) {
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
	}
	add_filter('nav_menu_li_class', 'li_new_class', 1, 3);


	function wpb_posts_nav(){
		$next_post = get_next_post();
		$prev_post = get_previous_post();
		 
		if ( $next_post || $prev_post ) : ?>
		 

		 <div class="row">
		 			<?php if ( ! empty( $prev_post ) ) : ?>
						<div class="col-md-6">
                            <div class="widget">
                                <div class="widget-next-post">
                                    <div class="small-post">
                                        <div class="image">
                                            <a href="<?php echo get_permalink( $prev_post ); ?>">
												<?php echo get_the_post_thumbnail( $prev_post, [ 100, 100 ] ); ?>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div>
                                                <a class="link" href="<?php echo get_permalink( $prev_post ); ?>">
                                                    <i class="arrow_left"></i>Preview post</a>
                                            </div>
                                            <a href="<?php the_excerpt();?>"><?php the_title();?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
					<?php if ( ! empty( $next_post ) ) : ?>
                        <div class="col-md-6">
                            <div class="widget">
                                <div class="widget-previous-post">
                                    <div class="small-post">
                                        <div class="image">
                                            <a href="<?php echo get_permalink( $next_post ); ?>">
												<?php echo get_the_post_thumbnail( $next_post, [ 100, 100 ] ); ?>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div>
                                                <a class="link" href="<?php echo get_permalink( $next_post ); ?>">
                                                    <span> Next post</span>
                                                    <span class="arrow_right"></span>
                                                </a>
                                            </div>
                                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php endif; ?>
                    </div>
                    <!--/-->
		 
		<?php endif;
	}

	function mytheme_custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );
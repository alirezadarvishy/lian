<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package lian
 */
use Lian\DynamicCodes;
use Lian\Fonts;
use Lian\Import;

if ( ! function_exists( 'lian_setup' ) ){
	function lian_setup() {
		load_theme_textdomain( 'lian', LIAN_DIR . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		register_nav_menus(
			array(
				'primary' => __( 'Main Menu', 'lian' ),
			)
		);
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
		add_theme_support( 'custom-logo' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'breadcrumb-trail' );
		add_theme_support( 'woocommerce' );
		add_theme_support( "align-wide" );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "wp-block-styles" );
	}
}
add_action( 'after_setup_theme', 'lian_setup' );

/* Set content width */
if ( ! isset( $content_width ) ) $content_width = 1140;


add_editor_style();

/**
 * Fire first Setup if not exist
 */
function lian_active_theme_jobs(){

	// Set Default Options
	$options_path = LIAN_DIR . '/inc/options/demo-files/life-style/options.json';
	Import::import_options($options_path);

	// Generate CSS & JS file
	$css_codes = DynamicCodes::lian_dynamic_css();
	if(function_exists('lian_core_dynamic_css_create_file')){
	    lian_core_dynamic_css_create_file($css_codes);
	}

	$js_codes = DynamicCodes::lian_dynamic_js();
	if(function_exists('lian_core_dynamic_js_create_file')){
	    lian_core_dynamic_js_create_file($js_codes);
	}

}
add_action('after_switch_theme', 'lian_active_theme_jobs');


function lian_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'General Sidebar', 'lian' ),
			'id'            => 'primary',
			'description'   => __( 'Add a Widget', 'lian' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	if(lian_is_woocommerce_activated()){
		register_sidebar(
			array(
				'name'          => __( 'Shop Sidebar', 'lian' ),
				'id'            => 'shop-sidebar',
				'description'   => __( 'Add a Widget', 'lian' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}
add_action( 'widgets_init', 'lian_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lian_scripts() {

	// CSS Files
	wp_enqueue_style( 'lian-style', get_stylesheet_uri(), array(), LIAN_VERSION );
	wp_enqueue_style( 'lian-base-style', get_template_directory_uri() . '/assets/css/base.css', array(), LIAN_VERSION );

	// JS Files
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'lian-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), LIAN_VERSION, true );

	// Custom Codes
	$cssDirectory = LIAN_UPLOAD_DIR . "lian.css";
	if(file_exists($cssDirectory))
		wp_enqueue_style( 'lian-custom-style', LIAN_UPLOAD_URI . "lian.css", array(), LIAN_VERSION );

	$jsDirectory = LIAN_UPLOAD_DIR . "lian.js";
	if(file_exists($jsDirectory))
		wp_enqueue_script( 'lian-custom-js', LIAN_UPLOAD_URI . "lian.js", array(), LIAN_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lian_scripts' );

/**
 * Elementor Editor Enqueue scripts and styles.
 */
add_action('elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'lian-elementor-editor-css', get_template_directory_uri() . '/assets/css/elementor-editor.css', array(), LIAN_VERSION );
	wp_enqueue_script( 'lian-elementor-editor-js', get_template_directory_uri() . '/assets/js/elementor-editor.js', array(), LIAN_VERSION,true );
});


/**
 * Custom template tags for
 */
require LIAN_DIR . '/inc/template-tags.php';

/**
 * Options Panel
 */
require LIAN_DIR . '/inc/options/options.php';

/**
 * Options Functions
 */
require LIAN_DIR . '/inc/options/functions.php';

/**
 * TGM Plugin Activation
 */
//require LIAN_MODULE_DIR . 'plugins/helper.php';


/**
 * Classes
 */
require LIAN_DIR . '/inc/classes/fonts.php';
require LIAN_DIR . '/inc/classes/dynamic-codes.php';
require LIAN_DIR . '/inc/classes/import.php';
require LIAN_DIR . '/inc/classes/api_helper.php';

/**
 * Metaboxes 
 */
require LIAN_DIR . '/inc/metabox/page-settings.php';

/*
* Check is Woocommerce Enabeld
*/
function lian_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

/*
* Check is Elementor Enabeld
*/
function lian_is_elementor_activated() {
	return function_exists( 'elementor_load_plugin_textdomain' ) ? true : false;
}

/*
* Check is Lian Core Enabeld
*/
function lian_is_core_activated() {
	return function_exists( 'lian_core_enable_elementor' ) ? true : false;
}

/*
* Return MegaMenu
*/
function lian_megamenu_cs_field($item_id) {

	wp_nonce_field( 'lian_megamenu_nonce', '_lian_megamenu_nonce_name' );
	$lian_megamenu = get_post_meta( $item_id, '_lian_megamenu', true );

	$megaargs = array(
		'post_type'=> 'lian_megamenu',
		'order'    => 'DESC',
		'posts_per_page' => -1
	);


	$the_query = new WP_Query( $megaargs );
	if($the_query->have_posts() ) :
			?>
			<input type="hidden" class="nav-menu-id" value="<?php echo esc_attr($item_id) ;?>" />
			<label style="color: #1c1c1c;display: inline-block;width: 100%;margin-bottom: 20px;background: #fff0f0;padding: 13px;box-sizing: border-box;border-radius: 4px;margin-top: 20px;">
			<?php _e( 'Mega Menu', 'lian' ); ?>
			<select name="lian_megamenu[<?php echo esc_attr($item_id); ?>]">
			<option value="none" selected><?php _e('-- None --','lian'); ?></option>
			<?php
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				echo '<option value="'.esc_attr(get_the_ID()).'"'.selected($lian_megamenu,get_the_ID()).'>' . esc_html(get_the_title()) . '</option>';
			endwhile;
			wp_reset_postdata();
		?>
		</select>
		</label>
		<?php
	endif;
}

add_action( 'wp_nav_menu_item_custom_fields', 'lian_megamenu_cs_field' );

function lian_megamenu_cs_field_save( $menu_id, $menu_item_db_id ) {

	if ( ! isset( $_POST['_lian_megamenu_nonce_name'] ) || ! wp_verify_nonce( $_POST['_lian_megamenu_nonce_name'], 'lian_megamenu_nonce' ) ) {
		return $menu_id;
	}

	if ( isset( $_POST['lian_megamenu'][$menu_item_db_id]  ) ) {
		$sanitized_data = sanitize_text_field( $_POST['lian_megamenu'][$menu_item_db_id] );
		update_post_meta( $menu_item_db_id, '_lian_megamenu', $sanitized_data );
	} else {
		delete_post_meta( $menu_item_db_id, '_lian_megamenu' );
	}
}
add_action( 'wp_update_nav_menu_item', 'lian_megamenu_cs_field_save', 10, 2 );


function lian_get_menu_items_by_registered_slug($menu_slug) {
    $menu_items = array();
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_slug ] ) ) {
        $menu = get_term( $locations[ $menu_slug ] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
    }
    return $menu_items;
}

function lian_add_ajax(){ ?>
    <script type="text/javascript">
        var ajax_url = '<?php echo admin_url( "admin-ajax.php" ); ?>';
        var ajax_nonce = '<?php echo wp_create_nonce( "secure_nonce_main" ); ?>';
    </script><?php
}
add_action ( 'wp_head', 'lian_add_ajax' );
add_action ( 'admin_head', 'lian_add_ajax' );


if ( ! function_exists( 'lian_pagination_nav' ) ) {
	function lian_pagination_nav() {
   global $wp_query, $wp_rewrite;

   // Don't print empty markup if there's only one page.
   if ( $wp_query->max_num_pages < 2 ) {
   return;
   }

   $paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
   $pagenum_link = html_entity_decode( get_pagenum_link() );
   $query_args = array();
   $url_parts = explode( '?', $pagenum_link );

   if ( isset( $url_parts[1] ) ) {
   wp_parse_str( $url_parts[1], $query_args );
   }

   $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
   $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

   $format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
   $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

   // Set up paginated links.
	?>
	<nav class="navigation paging-navigation" role="navigation">
	<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'lian' ); ?></h1>
	<ul class="pagination loop-pagination">
	<?php 
		echo paginate_links( array(
			'base' => $pagenum_link,
			'format' => $format,
			'total' => $wp_query->max_num_pages,
			'current' => $paged,
			'mid_size' => 2,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '&laquo; Previous', 'lian' ),
			'next_text' => __( 'Next &raquo;', 'lian' ),
			'type' => 'list',
			) );
	?>
	</ul><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
  }
}

/**
 * Returns Limited String by Word
 * @param string $string
 * @param int $word_limit
 * @param boolean $three_dot
 * @return string
 */
function lian_limit_words($string, $word_limit, $three_dot)
{
    $words = explode(" ",$string);
    $string = implode(" ",array_splice($words,0,$word_limit));
	if ($three_dot)
		$string .= '...';
	return $string;
}

/**
 * Insert parm to Array
 * @param array      $array
 * @param int|string $position
 * @param mixed      $insert
 */
function lian_array_insert(&$array, $position, $insert)
{
    if (is_int($position)) {
        array_splice($array, $position, 0, $insert);
    } else {
        $pos   = array_search($position, array_keys($array));
        $array = array_merge(
            array_slice($array, 0, $pos),
            $insert,
            array_slice($array, $pos)
        );
    }
}


/**
 * Add Mega Menu to Menu
 * @param string $output
 * @param WP_Post  $menu_item
 */
function lian_fire_megamenu( $output, $menu_item ) {

	if( is_object( $menu_item ) && isset( $menu_item->ID ) ) {

		$lian_megamenu = get_post_meta( $menu_item->ID, '_lian_megamenu', true );

		if(! empty($lian_megamenu) && $lian_megamenu !== 'none'){
			$output .= '<ul class="lian-megamenu">' . \Elementor\Plugin::$instance->frontend->get_builder_content( $lian_megamenu ) . '</ul>';
		}

	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'lian_fire_megamenu', 10, 2 );


/**
 * Check Theme Version
 */
function lian_check_version() {
    if(defined( 'LIAN_VERSION' ) && !empty(get_option('lian_version'))){
		if(version_compare(get_option('lian_version'),LIAN_VERSION,'<')){
			update_option('lian_version',LIAN_VERSION);
		}
	}
}
add_action('init', 'lian_check_version');

/**
 * Generate breadcrumbs
 */
function lian_get_breadcrumb() {
    // Home link
    echo '<a href="'.esc_url(home_url()).'">Home</a>';

    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');

        if (is_single()) {
            // Get the current post's parent pages
            $post_id = get_the_ID();
            $ancestors = get_post_ancestors($post_id);
            $ancestors = array_reverse($ancestors);

            // Display parent pages in breadcrumb
            foreach ($ancestors as $ancestor_id) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                echo '<a href="' . esc_url(get_permalink($ancestor_id)) . '">' . get_the_title($ancestor_id) . '</a>';
            }

            // Current post title
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            the_title();
        }
    } elseif (is_page()) {
        // Get the current page's parent pages
        $post_id = get_the_ID();
        $ancestors = get_post_ancestors($post_id);
        $ancestors = array_reverse($ancestors);

        // Display parent pages in breadcrumb
        foreach ($ancestors as $ancestor_id) {
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            echo '<a href="' . esc_url(get_permalink($ancestor_id)) . '">' . get_the_title($ancestor_id) . '</a>';
        }

        // Current page title
        echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<span>';
        echo the_search_query();
        echo '</span>"';
    }
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lian_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	if ( ! is_active_sidebar( 'main-sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}
	if ( is_front_page() ) {
		$classes[] = 'home';
	}
	return $classes;
}
add_filter( 'body_class', 'lian_body_classes' );

function lian_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'lian_pingback_header' );


/**
* Add Assets - ADMIN Side
*/
function lian_settings_assets() {

		// Custom CSS - JS
		wp_enqueue_style( 'dashboardcss',  get_template_directory_uri() . '/inc/options/assets/css/style.css','',LIAN_VERSION );
		wp_enqueue_script( 'dashboardjs',  get_template_directory_uri() . '/inc/options/assets/js/dashboard.js','',LIAN_VERSION );
		wp_enqueue_style( 'dashboard-select2-css',  get_template_directory_uri() . '/inc/options/assets/css/select2.min.css','',LIAN_VERSION );
		wp_enqueue_script( 'dashboard-select2-js',  get_template_directory_uri() . '/inc/options/assets/js/select2.min.js','',LIAN_VERSION );
		wp_enqueue_style( 'dashboard-sweetalert2_css',  get_template_directory_uri() . '/inc/options/assets/css/sweetalert2.min.css','',LIAN_VERSION );
		wp_enqueue_script( 'dashboard-sweetalert2_js',  get_template_directory_uri() . '/inc/options/assets/js/sweetalert2.min.js','',LIAN_VERSION );

		// Color Picker
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');

		// Media
		wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'lian_settings_assets' );

/**
 * Disable requests to wp.org repository for this theme.
 */
function lian_disable_wporg_request( $r, $url ) {

	// If it's not a theme update request, bail.
	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
			return $r;
		}

		// Decode the JSON response
		$themes = json_decode( $r['body']['themes'] );

		// Remove the active parent and child themes from the check
		$parent = get_option( 'template' );
		$child = get_option( 'stylesheet' );
		unset( $themes->themes->$parent );
		unset( $themes->themes->$child );

		// Encode the updated JSON response
		$r['body']['themes'] = json_encode( $themes );

		return $r;
}
add_filter( 'http_request_args', 'lian_disable_wporg_request', 5, 2 );

/**
 * Modify Read More Text
 */
function lian_modify_read_more_link() {
    return '...';
}
add_filter( 'the_content_more_link', 'lian_modify_read_more_link', 999 );


function lian_enqueue_custom_fonts() {
		// Add Custom Fonts
		$system_fonts = Fonts::get_fonts_by_groups(['SYSTEM']);
		$fonts = DynamicCodes::lian_dynamic_fonts();
		$fonts = array_unique($fonts);
		if(!empty($fonts)){
			$font_url = 'https://fonts.googleapis.com/css?family=';
			$font_families = array();
			foreach ($fonts as $key => $font) {
				if (in_array($font, $system_fonts) === false) {
					$parts = explode(':', $font);
					$family = $parts[0];
			
					if (!isset($font_families[$family])) {
						$font_families[$family] = true;
					}
				}
			}
			$font_url .= implode('|', array_keys($font_families)) . ':100,300,400,700,900';
			wp_enqueue_style('lian-google-fonts', $font_url);
		}
}
add_action( 'wp_enqueue_scripts', 'lian_enqueue_custom_fonts' );

// Add inline Css and JS codes
function lian_add_inline_codes() {

	// Generate CSS & JS file
	$css_codes = DynamicCodes::lian_dynamic_css();
	if(!function_exists('lian_core_dynamic_css_create_file')){
        echo '<style>'. $css_codes . '</style>';
	}

	$js_codes = DynamicCodes::lian_dynamic_js();
	if(!function_exists('lian_core_dynamic_js_create_file')){
        echo '<style>'. $js_codes . '</style>';
	}
}
add_action( 'wp_head', 'lian_add_inline_codes' );
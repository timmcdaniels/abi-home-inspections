<?php

include 'includes/json-ld.php';

// get text domain but keep text domain in intl functions a string: theme-text-domain

$theme = wp_get_theme();
$theme_name = $theme->get( 'TextDomain' );

// licenses

define( 'ACF_PRO_LICENSE', 'b3JkZXJfaWQ9NjM2MjV8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTUtMDktMDYgMDA6NTc6MjM=' );
define( 'ALM_AJAX_LOAD_MORE_PRO_LICENSE_KEY', '0a9d60ecb18558a1f8117fd3e6936abf' );
define( 'ACP_LICENSE', 'e691d42d-e4ef-433f-b6fe-f0e5c5ad6e03' );
define( 'GF_LICENSE_KEY', 'f93b7d51b6508110943ef2f25065df0a' );

// title support

add_theme_support( 'title-tag' );

// feature image support

add_theme_support( 'post-thumbnails' );

// add figure to embedded images with captions

add_theme_support( 'html5', array( 'caption' ) );

// content width

if ( ! isset( $content_width ) ) { $content_width = 900; }

// remove emoji

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// disable pingback

add_filter( 'xmlrpc_methods', function( $methods ) { unset( $methods['pingback.ping'] ); return $methods; } );

// x-frame-options

add_action( 'send_headers', 'convoy_send_headers', 10, 0 );
function convoy_send_headers() {
	@header( 'X-Frame-Options: SAMEORIGIN' );
}

// feed links

add_theme_support( 'automatic-feed-links' );

// image sizes 

$image_sizes = array();
foreach ( $image_sizes as $size ) {
	add_image_size( $size[0], $size[1], $size[2], $size[3] );
}

// add image sizes to dropdown

add_filter( 'image_size_names_choose', 'theme_image_size_names_choose' );
function theme_image_size_names_choose( $sizes ) {
	global $image_sizes;
	$labels = array();
	foreach ( $image_sizes as $size ) {
		$labels[$size[0]] = $size[4];
	}
	return array_merge( $sizes, $labels );
}

// register menus

add_action( 'init', 'theme_register_menus' );
function theme_register_menus() {
	global $theme_name;
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu', $theme_name ),
			'footer-menu' => __( 'Footer Menu', $theme_name )
		)
	);
}

// enqueue css & js

add_action( 'wp_enqueue_scripts', 'theme_wp_enqueue_scripts' );
function theme_wp_enqueue_scripts() {
	global $theme_name;
	if ( ! is_admin() ) {
		$asset_file = include( get_theme_file_path( 'dist/app.asset.php' ) );
		wp_enqueue_script(
            $theme_name . '-app', // Unique handle
            get_theme_file_uri( 'build/app.js' ), // Path to your compiled JS
            $asset_file['dependencies'], // Dependencies array from app.asset.php
            $asset_file['version'], // Version from app.asset.php
            true // Load in footer
        );
        wp_enqueue_style(
            $theme_name . '-style', // Unique handle
            get_theme_file_uri( 'build/style-app.css' ), // Path to your compiled CSS
            [], // No specific dependencies for the style in this example
            $asset_file['version'] // Version from app.asset.php
        );
	}
}

// enqueue bulma and font awesome in backend

add_action( 'admin_enqueue_scripts', 'theme_admin_enqueue_scripts' );
function theme_admin_enqueue_scripts() {
	wp_enqueue_style(
        'font-awesome-admin', 
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', 
        array(), 
        '6.4.2'
    );
	wp_enqueue_style(
        'bulma-admin', 
        'https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css', 
        array(), 
        '1.0.4'
    );
}

add_action('admin_head', 'abi_add_bulma_variables_to_admin');
function abi_add_bulma_variables_to_admin() {
    echo '<style>
        :root {
          /* Primary color using HSL values for #006699 */
          --bulma-primary-h: 200deg;
          --bulma-primary-s: 100%;
          --bulma-primary-l: 30%;
        }
    </style>';
}

class ABI_Menu_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
		$item->classes[] = 'navbar-item';
        $output .= '<a class="' . implode( ' ', $item->classes ) . '" href="' . esc_attr($item->url) . '">' . esc_html($item->title) . '</a>';
    }
    public function start_lvl(&$output, $depth = 0, $args = []) {
    }
    public function end_lvl(&$output, $depth = 0, $args = []) {
    }
    public function end_el(&$output, $item, $depth = 0, $args = []) {
    }
}

class ABI_Footer_Menu_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $attributes = ! empty( $item->attr_target ) ? ' target="' . esc_attr( $item->attr_target ) . '"' : '';
        $attributes .= ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
        $attributes .= ! empty( $item->attr_rel ) ? ' rel="' . esc_attr( $item->attr_rel ) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
        $attributes .= ' class="has-text-white"';
        $output .= '<li><a' . $attributes . '>' . esc_html( $item->title ) . '</a></li>';
    }
    public function end_el(&$output, $item, $depth = 0, $args = []) {}
}

function abi_format_phone($phone_number) {
    $digits_only = preg_replace('/[^0-9]/', '', $phone_number);
    $digits_only = substr($digits_only, 1);
    if (strlen($digits_only) === 10) {
        $area_code = substr($digits_only, 0, 3);
        $prefix = substr($digits_only, 3, 3);
        $line_number = substr($digits_only, 6, 4);
        return "($area_code) $prefix-$line_number";
    }
    return $phone_number;
}

add_action( 'wp_head', 'abi_schema_data' );
function abi_schema_data() {
	global $post;
	if ( isset( $post->ID ) ) {
		$post_content = get_the_content( null, false, $post->ID );
		$blocks = parse_blocks( $post_content );
		$entities = array();
		foreach ($blocks as $block) {
			if ( $block['blockName'] === 'acf/faqs' ) {
				$faqs = get_field( 'field_68d866c41059a', $post->ID );
				for ( $i = 0; $i < $block['attrs']['data']['faqs']; $i++ ) {
					$entities[] = array(
						"@type" => "Question",
						"name" => $block['attrs']['data']['faqs_' . $i . '_faq_question'],
						"acceptedAnswer" => array(
							"@type" => "Answer",
							"text" => $block['attrs']['data']['faqs_' . $i . '_faq_answer']
						)
					);
				}
			}
		}
		if ( $entities ) {
			$schema = [
				"@context" => "https://schema.org",
				"@type" => "FAQPage",
				"mainEntity" => $entities
			];
			echo '<script type="application/ld+json">' . json_encode( $schema ) . '</script>';
		}
	}
}

function abi_buttons( $button_alignment, $buttons = array() ) {
	$align_class = 'has-text-centered';
	if ( $button_alignment === 'Left' ) {
		$align_class = 'has-text-left';
	}
	if ( $button_alignment === 'Right' ) {
        $align_class = 'has-text-right';
    }
	include( 'includes/buttons.php' );
}

function abi_remove_p( $str ) {
	return preg_replace( '/^<p>(.*)<\/p>$/s', '$1', $str );
}

?>

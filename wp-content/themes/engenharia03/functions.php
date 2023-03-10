<?php

	// Nomarlize Wordpress
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	remove_action('wp_head', 'wp_resource_hints', 2);
	remove_action('wp_head', 'print_emoji_detection_script', 7 );
	remove_action('admin_print_scripts', 'print_emoji_detection_script' );
	remove_action('wp_print_styles', 'print_emoji_styles' );
	remove_action('admin_print_styles', 'print_emoji_styles' );

	remove_action('wp_head', 'rest_output_link_wp_head');

	remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
	remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
	// Nomarlize Wordpress

	function remove_editor_page(){
		remove_post_type_support( 'page', 'editor' );
		remove_post_type_support( 'page', 'thumbnail' );
	}
	add_action( 'admin_init', 'remove_editor_page' );

	// adicionando svg
	function wp_check_filetype_and_ext_callback($filetype_ext_data, $file, $filename, $mimes) {
		if ( substr($filename, -4) === '.svg' ) {
			$filetype_ext_data['ext'] = 'svg';
			$filetype_ext_data['type'] = 'image/svg+xml';
		}
		return $filetype_ext_data;
	}
	add_filter('wp_check_filetype_and_ext', 'wp_check_filetype_and_ext_callback', 100, 4 );

	function add_svg_to_upload_mimes( $upload_mimes ) {
		$upload_mimes['svg'] = 'image/svg+xml';
		$upload_mimes['svgz'] = 'image/svg+xml';
		return $upload_mimes;
	}
	//add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );

	function svg_size() {
		echo '
			<style>
				svg:not([class^="yoast"]), img[src*=".svg"]{
					width: 150px !important;
					height: 150px !important;
				}
				svg.yst-traffic-light {
					width: 19px !important;
					height: 30px !important;
					margin: 0 0 0 5px !important;
				}
				.yoast-alert .yoast-seo-icon {
					width: 60px !important;
					height: 60px !important;
				}
			</style>
		';
	}
	//add_action('admin_head', 'svg_size');

	// Disabilitar sistema de coment??rios default do wordpress
	function remove_comments_wordpress() {
		remove_menu_page('edit-comments.php');
	}
	add_action('admin_init', 'remove_comments_wordpress');

	// Est?? fun????o registra os post types default do tema
	function posts_types_default(){

		// Gerais
		register_post_type('gerais',
			array(
				'labels' 			=> array(
					'name' 			=> __('Gerais'),
					'singular_name' => __('geral')
				),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-generic',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

		// Contatos
		register_post_type('contatos',
			array(
				'labels' 			=> array(
					'name' 			=> __('Contatos'),
					'singular_name' => __('contato')
				),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-phone',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

		// Redes sociais
		register_post_type('redes_sociais',
			array(
				'labels' 			=> array(
					'name' 			=> __('Redes sociais'),
					'singular_name' => __('contato')
				),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-share',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

	}
	add_action('init', 'posts_types_default');

	function meus_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Menu do cabe??alho' ),
				//'footer-menu' => __( 'Menu do rodap??' )
	    	)
		);
	}
	add_action( 'init', 'meus_menus' );

	// Fun????o para colocar imagem no html com o recorte e o title
	function getImageThumb($attachID, $size = null) {
		$imageFull = wp_get_attachment_image_src($attachID, $size);
		if ($imageFull !== NULL && $imageFull !== FALSE) {
			$postItem = get_post($attachID);
			$imageFull = '<img src="'.$imageFull[0].'" class="attachment-full size-full" alt="'.$postItem->post_title.'" title="'.$postItem->post_title.'" />';
		}else{
			$imageFull = "";
		}
		echo $imageFull;
	}

	foreach (glob(get_template_directory().'/includes/pages/*.php') as $filename) {
		include $filename;
	} // Incluindo pasta com os arquivos da pasta pages
	foreach (glob(get_template_directory().'/includes/adminpanel/*.php') as $filename) {
		include $filename;
	} // Incluindo pasta com os arquivos da pasta adminpanel
	foreach (glob(get_template_directory().'/includes/archives/*.php') as $filename) {
		include $filename;
	} // Incluindo pasta com os arquivos da pasta archives
	foreach (glob(get_template_directory().'/includes/gerais/*.php') as $filename) {
		include $filename;
	} // Incluindo pasta com os arquivos da pasta gerais
	foreach (glob(get_template_directory().'/includes/blog/*.php') as $filename) {
		include $filename;
	} // Incluindo pasta com os arquivos da pasta blog
	foreach (glob(get_template_directory().'/includes/contatos/*.php') as $filename) {
		include $filename;
	} // Incluindo pasta com os arquivos da pasta contatos
	foreach (glob(get_template_directory().'/includes/taxonomies/*.php') as $filename) {
		include $filename;
	} // Incluindo pasta com os arquivos da pasta taxonomies
	foreach (glob(get_template_directory().'/includes/menu/*.php') as $filename) {
		include $filename;
	} // Incluindo pasta com os arquivos da pasta menu

	include 'includes/defaults/include.php';
	include 'includes/defaults/settings.php';
	include 'includes/functions.php';
	include 'includes/thumbs.php';
	include 'includes/icons.php';
	include 'includes/removed-itens.php';



?>
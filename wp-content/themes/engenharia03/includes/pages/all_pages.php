<?php

	add_action( 'cmb2_admin_init', 'metaboxes_all_pages' );

	function metaboxes_all_pages() {

		// Metabox Banner
		$banner_all_pages = new_cmb2_box( array(
			'id'            => 'banner_all_pages',
			'title'         => __( 'Banner' ),
			'object_types'  => array( 'page', ),
			'show_on'      => array( 'key' => 'id', 'value' => array( 15, 16, 17, 18, 73 ) ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$banner_all_pages->add_field( array(
			'name'       => __( 'Imagem do banner' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x315</strong>' ),
			'id'         => 'wsg_banner_all_pages_img',
			'type' => 'file',
			'preview_size' => array( 1920/5, 315/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );

	}

?>
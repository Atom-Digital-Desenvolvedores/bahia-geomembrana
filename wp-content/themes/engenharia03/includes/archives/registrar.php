<?php

// Meus posts types
	function meus_post_types(){

		// Serviços
		register_post_type('servicos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Serviços'),
					'singular_name'	=> _x('Serviço', 'post type singular name'),
					'add_new'		=> _x('Novo serviço', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo serviço', 'portfolio item'),
					'edit_item'		=> _x('Editar serviço', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'servicos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);
		// Serviços
		register_post_type('projetos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Projetos'),
					'singular_name'	=> _x('projeto', 'post type singular name'),
					'add_new'		=> _x('Novo projeto', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo projeto', 'portfolio item'),
					'edit_item'		=> _x('Editar projeto', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'projetos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);
		// Equipe
		// register_post_type('equipe192',
		// 	array(
		// 		'labels' 			=> array(
		// 			'name' 			=> __('Equipe'),
		// 			'singular_name'	=> _x('membro', 'post type singular name'),
		// 			'add_new'		=> _x('Novo membro', 'portfolio item'),
		// 			'add_new_item'	=> _x('Adicionar novo membro', 'portfolio item'),
		// 			'edit_item'		=> _x('Editar membro', 'portfolio item'),
		// 		),
		// 		'rewrite' 			=> array('slug' => 'equipe'),
		// 		'public' 			=> true,
		// 		'has_archive' 		=> true,
		// 		'menu_icon' 		=> 'dashicons-groups',
		// 		'supports' 			=> array('title', 'page-attributes'),
		// 	)
		// );
		// Equipe
		register_post_type('depoimentos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Depoimentos'),
					'singular_name'	=> _x('depoimento', 'post type singular name'),
					'add_new'		=> _x('Novo depoimento', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo depoimento', 'portfolio item'),
					'edit_item'		=> _x('Editar depoimento', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'equipe'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-comments',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

	}
	add_action('init', 'meus_post_types');

?>
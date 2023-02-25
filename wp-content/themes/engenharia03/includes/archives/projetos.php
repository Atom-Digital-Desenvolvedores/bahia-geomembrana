<?php

	add_action( 'cmb2_admin_init', 'metaboxes_projetos' );

	function metaboxes_projetos() {

		// Detalhes do projeto na home
		$projeto_item = new_cmb2_box( array(
			'id'            => 'projeto_item',
			'title'         => __( 'Detalhes do projeto' ),
			'object_types'  => array( 'projetos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$projeto_item->add_field( array(
			'name'       => __( 'Imagem do projeto' ),
			'desc'       => __( 'Tamanho recomendado <strong>500x300</strong>' ),
			'id'         => 'wsg_projeto_item_icone',
			'type' => 'file',
			'preview_size' => array( 500/2, 300/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );


		// Página do projeto
		$projeto_interna = new_cmb2_box( array(
			'id'            => 'projeto_interna',
			'title'         => __( 'Página do projeto' ),
			'object_types'  => array( 'projetos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$projeto_interna->add_field( array(
			'name'       => __( 'Imagens do projeto' ),
			'desc'       => __( 'Tamanho recomendado <strong>1000x580</strong>' ),
			'id'         => 'wsg_projeto_interna_img',
			'type' => 'file_list',
			'preview_size' => array( 1000/2, 580/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$projeto_interna->add_field( array(
			'name'       => __( 'Conteúdo do projeto' ),
			'id'         => 'wsg_projeto_interna_conteudo',
			'type'       => 'wysiwyg',
		) );

		$projeto_categorias = new_cmb2_box( array(
			'id'            => 'projeto_categorias',
			'title'         => __( 'Categoria do projeto' ),
			'object_types'  => array( 'projetos192', ),
			'context'       => 'side',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$projeto_categorias->add_field( array(
			'id'             => 'projeto_categorias_radio',
			'taxonomy'       => 'projetos_categorias', // Enter Taxonomy Slug
			'type'           => 'taxonomy_radio',
			//'show_option_none' => false,
			'remove_default' => 'true'
		) );

		// Método de especificação de página
		// $projetosPage = get_page_by_path( 'servicos', OBJECT, 'page' );

		// $post_id;

		// if (isset($_GET['post'])) {
		// 	$post_id = $_GET['post'];
		// }else if(isset($_POST['post_ID'])) {
		// 	$post_id = $_POST['post_ID'];
		// }
		// if( !isset( $post_id ) ) return;

		// if($projetosPage && $projetosPage->ID != $post_id){
		// 	return;
		// }

		// // Metabox projetos
		// $projeto_01 = new_cmb2_box( array(
		// 	'id'            => 'projeto_01',
		// 	'title'         => __( 'projetos' ),
		// 	'object_types'  => array( 'page', ),
		// 	'context'       => 'normal',
		// 	'priority'      => 'high',
		// 	'show_names'    => true,
		// 	'closed'        => true,
		// ) );

		// $projeto_01->add_field( array(
		// 	'name'       => __( 'Título da seção' ),
		// 	'id'         => 'wsg_servicos_01_titulo',
		// 	'type'       => 'text',
		// ) );

		// $projeto_01->add_field( array(
		// 	'name'       => __( 'Subtítulo da seção' ),
		// 	'id'         => 'wsg_servicos_01_subtitulo',
		// 	'type'       => 'text',
		// ) );

	}

?>
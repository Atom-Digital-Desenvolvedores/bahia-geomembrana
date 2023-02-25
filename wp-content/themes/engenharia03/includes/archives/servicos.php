<?php

	add_action( 'cmb2_admin_init', 'metaboxes_servicos' );

	function metaboxes_servicos() {

		// Detalhes do serviço na home
		$servico_item = new_cmb2_box( array(
			'id'            => 'servico_item',
			'title'         => __( 'Detalhes do serviço' ),
			'object_types'  => array( 'servicos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$servico_item->add_field( array(
			'name'       => __( 'Ícone do serviço' ),
			'desc'       => __( 'Tamanho recomendado <strong>64x64</strong>' ),
			'id'         => 'wsg_servico_item_icone',
			'type' => 'file',
			'preview_size' => array( 64/1, 64/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$servico_item->add_field( array(
			'name'       => __( 'Imagens do projeto' ),
			'desc'       => __( 'Tamanho recomendado <strong>576x430</strong>' ),
			'id'         => 'wsg_servico_item_img',
			'type' => 'file_list',
			'preview_size' => array( 576/2, 430/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$servico_item->add_field( array(
			'name'       => __( 'Conteúdo do serviço' ),
			'id'         => 'wsg_servico_interna_conteudo',
			'type'       => 'wysiwyg',
		) );

		//Método de especificação de página
		$projetosPage = get_page_by_path( 'servicos', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($projetosPage && $projetosPage->ID != $post_id){
			return;
		}

		// Metabox Serviços
		$servico_01 = new_cmb2_box( array(
			'id'            => 'servico_01',
			'title'         => __( 'Serviços' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$servico_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_servicos_01_titulo',
			'type'       => 'text',
		) );
		$servico_01->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_servicos_01_texto',
			'type'       => 'wysiwyg',
		) );


	}

?>
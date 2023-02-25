<?php

	add_action( 'cmb2_admin_init', 'metaboxes_home' );

	function metaboxes_home() {

		// Método de especificação de página
		$homePage = get_page_by_path( 'home', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($homePage && $homePage->ID != $post_id){
			return;
		}

		// Metabox Banner
		$banner = new_cmb2_box( array(
			'id'            => 'banners',
			'title'         => __( 'Banners' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$banner_items = $banner->add_field( array(
			'id'            => 'banner_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );

		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Imagem do banner' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x560</strong>' ),
			'id'         => 'wsg_banner_items_img',
			'type' => 'file',
			'preview_size' => array( 1920/5, 560/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Titulo do banner' ),
			'id'         => 'wsg_banner_items_titulo',
			'type'       => 'text',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Texto do banner' ),
			'id'         => 'wsg_banner_items_texto',
			'type'       => 'wysiwyg',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'texto do botão' ),
			'id'         => 'wsg_banner_items_btn_texto',
			'type'       => 'text',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Link do botão' ),
			'id'         => 'wsg_banner_items_btn_link',
			'type'       => 'text',
		) );

		$pos_banner = new_cmb2_box( array(
			'id'            => 'pos_banner',
			'title'         => __( 'Abaixo do banner' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$pos_banner->add_field( array(
			'name'       => __( 'Texto da esquerda da seção' ),
			'id'         => 'wsg_pos_banner_texto_esq',
			'type'       => 'wysiwyg',
		) );
		$pos_banner->add_field( array(
			'name'       => __( 'Texto da direita da seção' ),
			'id'         => 'wsg_pos_banner_texto_dir',
			'type'       => 'wysiwyg',
		) );

		// Metabox Sobre
		$sobre = new_cmb2_box( array(
			'id'            => 'sobre',
			'title'         => __( 'Sobre nós' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			//'closed'        => true,
		) );

		$sobre->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_sobre_titulo',
			'type'       => 'text',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Resumo sobre nós' ),
			'id'         => 'wsg_sobre_conteudo',
			'type'       => 'wysiwyg',
		) );
		$sobre->add_field( array(
			'name'             => 'Está seção terá:',
			'id'               => 'wsg_sobre_radio',
			'type'             => 'radio',
			'show_option_none' => false,
			'options'          => array(
				'option1' => __( 'Imagem', 'cmb2' ),
				'option2' => __( 'Vídeo', 'cmb2' ),
			),
			'default' => 'option1',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Imagem de sobre nós' ),
			'desc'       => __( 'Tamanho recomendado <strong>530x415</strong>' ),
			'id'         => 'wsg_sobre_img',
			'type' => 'file',
			'preview_size' => array( 530/1, 415/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$sobre->add_field( array(
			'name'       => __( 'Link ao clicar na imagem' ),
			'id'         => 'wsg_sobre_img_link',
			'type' => 'text',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Iframe de vídeo' ),
			'id'         => 'wsg_sobre_iframe',
			'type'       => 'textarea_code',
		) );

		// Metabox Serviços
		$servicos = new_cmb2_box( array(
			'id'            => 'servicos',
			'title'         => __( 'Serviços' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$servicos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_servicos_titulo',
			'type'       => 'text',
		) );
		$servicos->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_servicos_texto',
			'type'       => 'wysiwyg',
		) );
		$servicos->add_field( array(
			'name'    => __( 'Listagem de serviços' ),
			'desc'    => __( 'Arraste os produtos da coluna da esquerda para a da direita para anexá-lo. <br/>Você pode reorganizar a ordem dos produtos na coluna da direita arrastando e soltando.'),
			'id'      => 'wsg_servicos_na_home',
			'type'    => 'custom_attached_posts',
			'column'  => true,
			'options' => array(
				'show_thumbnails' => true,
				'filter_boxes'    => true,
				'query_args'      => array(
					'posts_per_page' => -1,
					'post_type'      => 'servicos192',
				),
			),
		) );

		// Metabox Projetos
		$projetos = new_cmb2_box( array(
			'id'            => 'projetos',
			'title'         => __( 'Projetos' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$projetos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_projetos_titulo',
			'type'       => 'text',
		) );
		$projetos->add_field( array(
			'name'    => __( 'Listagem de projetos' ),
			'desc'    => __( 'Arraste os produtos da coluna da esquerda para a da direita para anexá-lo. <br/>Você pode reorganizar a ordem dos produtos na coluna da direita arrastando e soltando.'),
			'id'      => 'wsg_projetos_na_home',
			'type'    => 'custom_attached_posts',
			'column'  => true,
			'options' => array(
				'show_thumbnails' => true,
				'filter_boxes'    => true,
				'query_args'      => array(
					'posts_per_page' => 3,
					'post_type'      => 'projetos192',
				),
			),
		) );

		// Metabox call_to_action
		$call_to_action = new_cmb2_box( array(
			'id'            => 'call_to_action',
			'title'         => __( 'Chamada para ação' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$call_to_action->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_call_to_action_texto',
			'type'       => 'wysiwyg',
		) );
		$call_to_action->add_field( array(
			'name'       => __( 'Texto do botão da seção' ),
			'id'         => 'wsg_call_to_action_btn_texto',
			'type'       => 'text',
		) );
		$call_to_action->add_field( array(
			'name'       => __( 'Link do botão da seção' ),
			'id'         => 'wsg_call_to_action_btn_link',
			'type'       => 'text',
		) );
		$call_to_action->add_field( array(
			'name'       => __( 'Imagem de fundo' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x500</strong>' ),
			'id'         => 'wsg_call_to_action_img',
			'type' => 'file',
			'preview_size' => array( 1920/5, 500/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		// Metabox Depoimentos
		$depoimentos = new_cmb2_box( array(
			'id'            => 'depoimentos',
			'title'         => __( 'Depoimentos' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$depoimentos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_depoimentos_titulo',
			'type'       => 'text',
		) );
		$depoimentos->add_field( array(
			'name'       => __( 'Imagem de fundo' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x710</strong>' ),
			'id'         => 'wsg_depoimentos_img',
			'type' => 'file',
			'preview_size' => array( 1920/5, 710/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		// Metabox Marcas
		$marcas = new_cmb2_box( array(
			'id'            => 'marcas',
			'title'         => __( 'Marcas' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$marcas->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_marcas_titulo',
			'type'       => 'text',
		) );

		$marcas_items = $marcas->add_field( array(
			'id'            => 'marcas_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Marca {#}' ),
				'add_button'    => __( 'Adicionar outra marca' ),
				'remove_button' => __( 'Remover marca' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );

		$marcas->add_group_field( $marcas_items, array(
			'name'       => __( 'Imagem do marca' ),
			'desc'       => __( 'Tamanho recomendado <strong>270x100</strong>' ),
			'id'         => 'wsg_marcas_items_img',
			'type' => 'file',
			'preview_size' => array( 270/1, 100/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );


		// Metabox Últimas do blog
		$blog = new_cmb2_box( array(
			'id'            => 'blog',
			'title'         => __( 'Últimas do blog' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$blog->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_blog_titulo',
			'type'       => 'text',
		) );


	}

?>
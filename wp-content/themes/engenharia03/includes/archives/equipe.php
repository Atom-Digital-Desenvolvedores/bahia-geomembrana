<?php

	add_action( 'cmb2_admin_init', 'metaboxes_equipe' );

	function metaboxes_equipe() {
		$equipe_item = new_cmb2_box( array(
			'id'            => 'equipe_item',
			'title'         => __( 'Detalhes do membro da equipe' ),
			'object_types'  => array( 'equipe192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$equipe_item->add_field( array(
			'name'       => __( 'Imagem do projeto' ),
			'desc'       => __( 'Tamanho recomendado <strong>300x300</strong>' ),
			'id'         => 'wsg_equipe_item_img',
			'type' => 'file',
			'preview_size' => array( 300/2, 300/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$equipe_item->add_field( array(
			'name'       => __( 'Cargo do membro' ),
			'id'         => 'wsg_equipe_item_cargo',
			'type'       => 'text',
		) );
		$equipe_item->add_field( array(
			'name'       => __( 'Resumo do membro' ),
			'id'         => 'wsg_equipe_item_resumo',
			'type'       => 'wysiwyg',
		) );
		$equipe_item->add_field( array(
			'name'       => __( 'Redes sociais' ),
			'id'         => 'wsg_equipe_item_rd',
			'type'       => 'title',
		) );
		$equipe_redes_sociais = $equipe_item->add_field( array(
			'id'            => 'equipe_redes_sociais',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$equipe_item->add_group_field( $equipe_redes_sociais, array(
			'name'       => __( 'Ícone' ),
			'id'         => 'wsg_equipe_redes_sociais_icone',
			'type'       => 'text_small',
		) );
		$equipe_item->add_group_field( $equipe_redes_sociais, array(
			'name'       => __( 'Link' ),
			'id'         => 'wsg_equipe_redes_sociais_link',
			'type'       => 'text',
		) );


	}

?>
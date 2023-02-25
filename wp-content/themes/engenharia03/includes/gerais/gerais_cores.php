<?php

	add_action( 'cmb2_admin_init', 'metaboxes_cores' );

	function metaboxes_cores() {

		// Página de configurações da logo
		$cores_Conf = get_page_by_path( 'configuracoes-das-cores', OBJECT, 'gerais' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($cores_Conf && $cores_Conf->ID != $post_id){
			return;
		}


		// Metabox cores principais
		$cores_gerais = new_cmb2_box( array(
			'id'            => 'cores_gerais',
			'title'         => __( 'Cores Gerais' ),
			'object_types'  => array( 'gerais', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$cores_gerais->add_field( array(
			'name'			=> __( 'Cor dos textos' ),
			'id'			=> 'wsg_cor_texto',
			'type'			=> 'colorpicker',
			'default'		=> '#5c656d'
		) );
		$cores_gerais->add_field( array(
			'name'			=> __( 'Cor dos títulos' ),
			'id'			=> 'wsg_cor_titulo',
			'type'			=> 'colorpicker',
			'default'		=> '#42474c'
		) );
		$cores_gerais->add_field( array(
			'name'			=> __( 'Cor dos subtítulos' ),
			'id'			=> 'wsg_cor_subtitulo',
			'type'			=> 'colorpicker',
			'default'		=> '#5c656d'
		) );

		// Metabox cores principais
		$cores_principais = new_cmb2_box( array(
			'id'            => 'cores_principais',
			'title'         => __( 'Cores Principais' ),
			'object_types'  => array( 'gerais', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$cores_principais->add_field( array(
			'name'			=> __( 'Cor primária' ),
			'id'			=> 'wsg_cor_primaria',
			'type'			=> 'colorpicker',
			'default'		=> '#00e6dc'
		) );
		$cores_principais->add_field( array(
			'name'			=> __( 'Cor secundária' ),
			'id'			=> 'wsg_cor_secundaria',
			'type'			=> 'colorpicker',
			'default'		=> '#005059'
		) );

		// Metabox texto_selecionado
		$texto_selecionado = new_cmb2_box( array(
			'id'            => 'texto_selecionado',
			'title'         => __( 'Texto Selecionado' ),
			'object_types'  => array( 'gerais', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$texto_selecionado->add_field( array(
			'name'			=> __( 'Cor de fundo' ),
			'id'			=> 'wsg_texto_selecionado_bg',
			'type'			=> 'colorpicker',
			'default'		=> '#00e6dc'
		) );
		$texto_selecionado->add_field( array(
			'name'			=> __( 'Cor do texto' ),
			'id'			=> 'wsg_texto_selecionado_tx',
			'type'			=> 'colorpicker',
			'default'		=> '#ffffff'
		) );

		// Metabox btn_geral
		$btn_geral = new_cmb2_box( array(
			'id'            => 'btn_geral',
			'title'         => __( 'Botão Geral' ),
			'object_types'  => array( 'gerais', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$btn_geral->add_field( array(
			'name'			=> __( 'Cor do texto' ),
			'id'			=> 'wsg_btn_geral_tx',
			'type'			=> 'colorpicker',
			'default'		=> '#ffffff'
		) );
		$btn_geral->add_field( array(
			'name'			=> __( 'Cor de fundo' ),
			'id'			=> 'wsg_btn_geral_bg',
			'type'			=> 'colorpicker',
			'default'		=> '#00e6dc'
		) );
		$btn_geral->add_field( array(
			'name'			=> __( 'Cor de fundo ao passar o mouse' ),
			'id'			=> 'wsg_btn_geral_hover',
			'type'			=> 'colorpicker',
			'default'		=> '#005059'
		) );


		// Metabox header_cor
		$header_cor = new_cmb2_box( array(
			'id'            => 'header_cor',
			'title'         => __( 'Cores do cabeçalho' ),
			'object_types'  => array( 'gerais', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$header_cor->add_field( array(
			'name'			=> __( 'Cor do texto da barra de contato' ),
			'id'			=> 'wsg_header_top_cor_tx',
			'type'			=> 'colorpicker',
			'default'		=> '#42474c'
		) );
		$header_cor->add_field( array(
			'name'			=> __( 'Cor de fundo da barra de contato' ),
			'id'			=> 'wsg_header_top_cor_bg',
			'type'			=> 'colorpicker',
			'default'		=> '#f0f0f0'
		) );

		// Metabox banner_cor
		$banner_cor = new_cmb2_box( array(
			'id'            => 'banner_cor',
			'title'         => __( 'Cores do cabeçalho' ),
			'object_types'  => array( 'gerais', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$banner_cor->add_field( array(
			'name'			=> __( 'Cor dos títulos do banner' ),
			'id'			=> 'wsg_banner_cor_titulo',
			'type'			=> 'colorpicker',
			'default'		=> '#ffffff'
		) );
		$banner_cor->add_field( array(
			'name'			=> __( 'Cor dos textos do banner' ),
			'id'			=> 'wsg_banner_cor_subtitulo',
			'type'			=> 'colorpicker',
			'default'		=> '#ffffff'
		) );



		// Metabox footer_cor
		$footer_cor = new_cmb2_box( array(
			'id'            => 'footer_cor',
			'title'         => __( 'Cores do Rodapé' ),
			'object_types'  => array( 'gerais', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$footer_cor->add_field( array(
			'name'			=> __( 'Cor do texto do rodapé' ),
			'id'			=> 'wsg_footer_cor_tx',
			'type'			=> 'colorpicker',
			'default'		=> '#5c656d'
		) );
		$footer_cor->add_field( array(
			'name'			=> __( 'Cor de fundo do rodapé' ),
			'id'			=> 'wsg_footer_cor_bg',
			'type'			=> 'colorpicker',
			'default'		=> '#fafbfc'
		) );
		$footer_cor->add_field( array(
			'name'			=> __( 'Cor de fundo da barra de direitos autorais' ),
			'id'			=> 'wsg_footer_cor_copyright',
			'type'			=> 'colorpicker',
			'default'		=> '#f0f0f0'
		) );

		// Metabox Botão de Resetar
		$color_reset = new_cmb2_box( array(
			'id'            => 'color_reset',
			'title'         => __( 'Resetar Cores' ),
			'object_types'  => array( 'gerais', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$color_reset->add_field( array(
			'id'      => 'reset_setting_layout_color',
			'type'    => 'resetcolors',
		));

	}

	function cmb2_render_resetcolors_html( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
		$resetcolors = '<a class="button button-primary button-large" id="resetcolors">Redefinir cores</a>';
		echo $resetcolors;
	}
	add_action( 'cmb2_render_resetcolors', 'cmb2_render_resetcolors_html', 10, 5 );

	function cmb2_render_resetcolors_js(){
		echo "
			<script>
				jQuery('#resetcolors').click(function(){
					jQuery('#wsg_cor_texto').iris('color',						'#5c656d');
					jQuery('#wsg_cor_titulo').iris('color',						'#42474c');
					jQuery('#wsg_cor_subtitulo').iris('color',					'#5c656d');
					jQuery('#wsg_cor_primaria').iris('color',					'#00e6dc');
					jQuery('#wsg_cor_secundaria').iris('color',					'#005059');
					jQuery('#wsg_texto_selecionado_bg').iris('color',			'#00e6dc');
					jQuery('#wsg_texto_selecionado_tx').iris('color',			'#ffffff');
					jQuery('#wsg_btn_geral_tx').iris('color',					'#ffffff');
					jQuery('#wsg_btn_geral_bg').iris('color',					'#00e6dc');
					jQuery('#wsg_btn_geral_hover').iris('color',				'#005059');
					jQuery('#wsg_header_top_cor_tx').iris('color',				'#42474c');
					jQuery('#wsg_header_top_cor_bg').iris('color',				'#f0f0f0');
					jQuery('#wsg_banner_cor_titulo').iris('color',				'#ffffff');
					jQuery('#wsg_banner_cor_subtitulo').iris('color',			'#ffffff');
					jQuery('#wsg_footer_cor_tx').iris('color',					'#5c656d');
					jQuery('#wsg_footer_cor_bg').iris('color',					'#fafbfc');
					jQuery('#wsg_footer_cor_copyright').iris('color',			'#f0f0f0');
				});
			</script>
		";
	}


	add_action('admin_footer','cmb2_render_resetcolors_js');

?>
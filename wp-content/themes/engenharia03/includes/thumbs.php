<?php

	// tamanhos dinâmicos para thumbs
	function tamanhos_thumbs(){

		// Ativando suporte para imagem destacada
		add_theme_support('post-thumbnails');
		add_image_size( '1920x710', 1920, 710, true );
		add_image_size( '1920x560', 1920, 560, true );
		add_image_size( '1920x500', 1920, 500, true );
		add_image_size( '1920x315', 1920, 315, true );
		add_image_size( '1000x580', 1000, 580, true );
		add_image_size( '925x500', 925, 500, true );
		add_image_size( '890x520', 890, 520, true );
		add_image_size( '715x400', 715, 400, true );
		add_image_size( '700x480', 700, 480, true );
		add_image_size( '576x430', 576, 430, true );
		add_image_size( '530x415', 530, 415, true );
		add_image_size( '500x300', 500, 300, true );
		add_image_size( '387x270', 387, 270, true );
		add_image_size( '100x100', 100, 100, true );
		add_image_size( '64x64', 64, 64, true );

	}
	add_action('after_setup_theme', 'tamanhos_thumbs');

?>
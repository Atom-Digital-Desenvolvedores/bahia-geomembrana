$(function(){
	
	// função para funcionar o botão do menu

	jQuery('.wq-btn_menu').click(function() {
		jQuery('.wq-menu_principal').toggleClass("aberto")
		jQuery('.wq-btn_menu').toggleClass("btn-fechar")
	})

	// função de funcionamento da navbar

	if (jQuery('.wq-navbar_conteudo').length) {
		jQuery('.wq-navbar_btns button').each(function(index, value){
			jQuery(value).click(function(){
				var item = jQuery(this).data('item');
				jQuery('.wq-navbar_conteudo > div').each(function(index2, value2){
					jQuery(value2).removeClass('ver');
				});
				jQuery('.wq-navbar_conteudo > div[data-item='+item+']').addClass('ver');
				jQuery('.wq-navbar_btns button').each(function(index2, value2){
					jQuery(value2).removeClass('active');
				});
				jQuery(this).addClass('active');
			});
		});
		jQuery('.wq-navbar_btns button:eq(0)').click();
	}

	// função de funcionamento da acordeon

	if (jQuery('.wq-acordeon').length) {
		jQuery('.wq-acordeon_btn').each(function(index, value){
			jQuery(value).click(function(){
				var item = jQuery(this).data('acordeon');
				jQuery('.wq-acordeon_conteudo').each(function(index2, value2){
					jQuery(value2).removeClass('ver');
				});
				jQuery('.wq-acordeon_conteudo[data-acordeon='+item+']').addClass('ver');
				jQuery('.wq-acordeon_btn').each(function(index2, value2){
					jQuery(value2).removeClass('active');
				});
				jQuery(this).addClass('active');
			});
		});
		jQuery('.wq-acordeon_btn:eq(0)').click();
	}

	// função de funcionamento da modal

	if (jQuery('.wq-modal').length) {
		jQuery('.wq-modal_btn').each(function(index, value){
			jQuery(value).click(function(){
				var item = jQuery(this).data('modal');
				jQuery('.wq-modal').each(function(index2, value2){
					jQuery(value2).removeClass('ver');
				});
				jQuery('.wq-modal[data-modal='+item+']').addClass('ver');
				jQuery('.wq-modal_btn').each(function(index2, value2){
					jQuery(value2).removeClass('active');
				});
				jQuery(this).addClass('active');
			});
		});
	}
	jQuery('.wq-modal_btn-fechar').click(function(){
		jQuery('.wq-modal').removeClass('ver')
	})


	// Função para filtrar items na wq-galeria


	if (jQuery('.wq-galeria').length) {
		jQuery('.wq-galeria_btn').each(function(index, value){
			jQuery(value).click(function(){
				var item = jQuery(this).data('galeria');
				jQuery('.wq-galeria_item').each(function(index2, value2){
					jQuery(value2).removeClass('ver').removeClass('todos');
				});
				jQuery('.wq-galeria_item[data-galeria='+item+']').addClass('ver');
				jQuery('.wq-galeria_btn').each(function(index2, value2){
					jQuery(value2).removeClass('active');
				});
				jQuery(this).addClass('active');
			});
		});
	}
	jQuery('.wq-galeria_btn-todos').click(function(){
		jQuery('.wq-galeria_item').addClass('todos')
	})

	jQuery('.wq-galeria_btn-todos').click();

})
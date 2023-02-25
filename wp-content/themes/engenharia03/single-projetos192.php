<?php
	get_header();

	$id_page = get_page_by_path( 'servicos', OBJECT, 'page' )->ID;
	$id_contato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$wsg_contato_widget = get_post_meta($id_contato, 'wsg_contato_widget', true);
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-servicos_interna">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_7 wq-box_cp-12 wq-box_cl-12 wq-box_tp-7 wq-box_tl-7">
					<div class="wq-projetos-carousel">
						<?php
							$wsg_projeto_interna_img = get_post_meta( get_the_ID(), 'wsg_projeto_interna_img', true );

							foreach ( (array) $wsg_projeto_interna_img as $attachment_id => $attachment_url ) {
						?>
							<a href="<?php $attachment_url; ?>" data-lity>
								<figure>
									<?php
										getImageThumb($attachment_id,'715x400');
									?>
								</figure>
							</a>
						<?php } ?>
					</div>
				</div>
				<div class="wq-box_5 wq-box_cp-12 wq-box_cl-12 wq-box_tp-5 wq-box_tl-5">
					<h2 class="wq-titulo_1"><?php the_title(); ?></h2>
					<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_projeto_interna_conteudo', true )) ?>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-form-de-captura">
		<div class="wq-container">
			<div class="wq-formulario_servicos">
				<h2 class="wq-titulo_1">Faça seu orçamento</h2>
				<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

					<input type="hidden" name="subject_email" value="Enviado pelo site">
					<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">

					<div class="wq-flex">
						<div class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-4 wq-box_tl-4">
							<div class="wq-icones">
								<span class="flaticon-user-1"></span>
								<input type="hidden" name="label-send-data-name" value="Nome">
								<input required type="text" name="send-data-name" placeholder="Seu Nome*">
							</div>
						</div>

						<div class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-4 wq-box_tl-4">
							<div class="wq-icones">
								<span class="flaticon-mail-1"></span>
								<input type="hidden" name="label-send-data-email" value="Email">
								<input required type="email" name="send-data-email" placeholder="Seu E-mail*">
							</div>
						</div>
						<div class="wq-box_4 wq-box_cp-12 wq-box_cl-12 wq-box_tp-4 wq-box_tl-4">
							<div class="wq-icones">
								<span class="flaticon-phone-1"></span>
								<input type="hidden" name="label-send-data-phone" value="Telefone">
								<input required type="text" name="send-data-phone" placeholder="Seu Telefone*" class="inputphone">
							</div>
						</div>
						<div class="wq-box_12">
							<input type="hidden" name="label-send-data-message" value="Telefone">
							<textarea name="send-data-message" placeholder="Deixe-nos uma mensagem." required></textarea>
						</div>
					</div>

					<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>

					<button class="wq-btn_1 wq-btn_estilo-2" type="submit">Enviar Contato</button>
				</form>
			</div>
		</div>
	</section>

	<section class="wq-05 bg-gray">
		<div class="wq-container">
			<div class="wq-flex">
				<h2 class="wq-titulo_1">Outros projetos</h2>
				<a href="<?php bloginfo('url'); ?>/projetos" class="wq-btn_1"> Ver todos projetos</a>
			</div>
		</div>
		<div class="wq-flex">
			<?php

				$terms = get_the_terms( get_the_ID() , 'projetos_categorias' );
				foreach ($terms as $term) {

					$arrayQueryAgenda = array(
						'post_type'				=> array( 'projetos192' ),
						'posts_per_page'		=> '4',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'tax_query' => array(
							array(
								'taxonomy'		=> 'projetos_categorias',
								'field'			=> 'slug',
								'terms'			=> array($term->slug),
							)
						),
						'post__not_in'			=> array(
							get_the_ID()
						),
					);
					$queryAgenda = new WP_Query($arrayQueryAgenda);

					while ( $queryAgenda->have_posts()) {
					$queryAgenda->the_post();
			?>
				<div class="wq-box_4f wq-box_cp-12f wq-box_cl-4f wq-box_tp-4f wq-box_tl-4f">
					<a href="<?php the_permalink(); ?>">
						<figure>
							<?php
								$wsg_projeto_item_icone_id = get_post_meta( get_the_ID(), 'wsg_projeto_item_icone_id', true );
								getImageThumb($wsg_projeto_item_icone_id,'500x300');
							?>
							<figcaption>
								<h3><?php the_title(); ?></h3>
							</figcaption>
						</figure>
					</a>
				</div>
			<?php } } wp_reset_query(); ?>
		</div>
	</section>

	<!-- Aqui irá o contueod da interna -->

	<?php include 'inc-call_to_action.php'; ?>

<?php get_footer(); ?>